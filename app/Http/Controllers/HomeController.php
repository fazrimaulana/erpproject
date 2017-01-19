<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Projects;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::all();
        /*$task = Auth::user()->task()->get();*/
        return view('home',[
                'projects' => $projects,
                /*'task' => $task,*/
            ]);
    }
}
