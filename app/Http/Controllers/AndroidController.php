<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserApi;
use App\Transformers\UserTransformer;
use App\User;
use App\Projects;
use App\Transformers\ProjectsTransformer;

class AndroidController extends Controller
{
    //
    public function index(Request $request)
    {
    	/*$usersApi = UserApi::all();*/
        /*return response()->json($users);*/
        /*return fractal()->collection($usersApi)->transformWith(new UserTransformer)->toArray();*/

        $user = User::where('email', $request->username)->where('password', $request->password)->get();
        if ($user!=null) {
        	$result = "true";
        }
        else{
        	$result = "false";
        }

        return $result;

    }

    public function projects()
    {
        $projects = Projects::all();
        return fractal()->collection($projects)->transformWith(new ProjectsTransformer)->toArray();
    }

}
