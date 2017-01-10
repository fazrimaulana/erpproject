<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Team;
use Illuminate\Support\Facades\Route;
use Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$data = User::find(Auth::user()->id);
    	return view('User.index', [
    			'data' => $data
    		]);
    }

    public function show(User $user)
    {
        return view('User.profile',[
                'data' => $user,
            ]);
    }

    public function getData(User $user, Request $request)
    {
    	$team = Team::all();
    	if($request->segment(4)=="edit"):
    	
    		return view('User.edit', [
    			'data' => $user,
    			'team' => $team,
    		]);
    	
    	elseif($request->segment(4)=="changePassword"):

    		return view('User.changePassword', [
    			'data' => $user,
    			'team' => $team,
    		]);

    	endif;
    }

    public function edit(Request $request, User $user)
    {
    	if($request->segment(4)=="edit"):

    		$this->validate($request,[
    			"name" => 'required',
    			"team" => 'required',
    			"birthday" => 'date',
    			"here_date" => 'date',
    		]);
    	
    		$datas = [
	    		"name" => $request->name,
    			"email" => $request->email,
    			"team_id" => $request->team,
    			"birthday" => $request->birthday,
    			"here_date" => $request->here_date,
    			"avatar" => "",
    		];

    	else:

    		$this->validate($request,[
    			"password_baru" => 'required',
    			"password_lama" => 'required',
    		]);

    		if(Hash::check($request->password_lama, $user->password)):
    			
    			$datas = [
		    		"password" => bcrypt($request->password_baru),
    			];

    		else:

    			return redirect()->back()->with('status', 'Password Lama Tidak Cocok');

    		endif;

    	endif;

    	$user->update($datas);
    	return redirect('/dashboard/profile');
    }

}
