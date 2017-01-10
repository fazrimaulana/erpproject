<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;

class TeamController extends Controller
{
    //
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
    	$data = Team::paginate(10);
    	return view('Team.index',[
    			'data' => $data,
    		]);
    }

    public function add(Request $request)
    {
    	$this->validate($request, [
    			"name" => 'required',
    		]);

    	if(Team::create([
    			"name" => $request->name,
    			"description" => $request->description,
    		]) ):

    		return redirect()->back()->with('status', 'Add Team Success !!!');

    	else:

    		return redirect()->back()->with('status', 'Add Team Failed !!!');

    	endif;
    }

    public function viewTeam(Team $team)
    {
    	$dataUser = User::where('team_id', '=', $team->id)->get();
    	return response()->json(["name" => $team->name, "user" => $dataUser]);
    }

    public function edit(Request $request)
    {
    	$this->validate($request, [
    			"name_edit" => 'required',
    		]);

    	$team = Team::find($request->id_edit);

    	if($team->update([
    			"name" => $request->name_edit,
    			"description" => $request->description_edit,
    		]) ):

    		return redirect()->back()->with('status', 'Update Team Success !!!');

    	else:

    		return redirect()->back()->with('status', 'Update Team Failed !!!');

    	endif;
    }

    public function delete(Request $request)
    {
    	$team = Team::find($request->id_delete);

    	if($team->delete()):

    		return redirect()->back()->with('status', 'Delete Team Success !!!');

    	else:

    		return redirect()->back()->with('status', 'Delete Team Failed !!!');

    	endif;
    }
}
