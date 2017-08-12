<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;
use Auth;
use App\Helpers\ApiHelper;

class AuthController extends Controller
{

    public function index()
    {
        $users = User::all();
        return fractal()->collection($users)->transformWith(new UserTransformer)->toArray();
    }
	
    public function register(Request $request, User $user){
    	$this->validate($request, [
    			'name' 		=> 'required|max:255',
            	'email' 	=> 'required|email|max:255|unique:users',
            	'password'	=> 'required|min:6',
    		]);

    	$data = $user->create([
    			'name' 		=> $request->name,
    			'email' 	=> $request->email,
    			'password' 	=> bcrypt($request->password),
                'team_id'   => $request->team_id,
                'api_token' => bcrypt($request->email)
    		]);

    	$response = fractal()->item($data)->transformWith(new UserTransformer)->addMeta(['token' => $data->api_token])->toArray();

    	return response()->json($response, 201);

    }

    public function login(Request $request, User $user){
        
    	if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    		return response()->json(['error' => 'Your credential is wrong'], 401);
    	}

    	$data = $user->find(Auth::user()->id);

    	return fractal()->item($data)->transformWith(new UserTransformer)->addMeta(['token' => $data->api_token])->toArray();
    }

    public function profile(Request $request)
    {

        ApiHelper::cekLogin($request->api_token);

        if(Auth::user()):
            return fractal()
            ->item(Auth::user())
            ->transformWith(new UserTransformer)
            ->toArray();
        else:
            return response()->json(["Status" => "Token Missmatch"]);
        endif;

    }

}
