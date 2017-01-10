<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Projects;
use App\Clients;
use App\User;
use App\Files;
use File;
use App\Tasks;
use Validator;

class ProjectController extends Controller
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
    	$data = Projects::paginate(10);
    	return view('Projects.index',[
    			'data' => $data,
    		]);
    }

    public function add()
    {
    	$clients = Clients::all();
    	$users	 = User::all();
    	return view('Projects.add',[
    			'clients' => $clients,
    			'users'	  => $users,
    		]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    			"client_id" => 'required',
    			"name" => 'required',
    			"assign_to" => 'required',
    			'start_at' => 'required|date',
    			'end_at' => 'required|date',
    		]);

    	$datas = [
    		"client_id" => $request->client_id,
    		"name" => $request->name,
    		"description" => $request->description,
    		"assign_to" => $request->assign_to,
    		"start_at" => $request->start_at,
    		"end_at" => $request->end_at,
    	];

    	if(Projects::create($datas)):
    		return redirect('/dashboard/project')->with('status', 'Add Project Success');
    	else:
    		return redirect()->back()->with('status', 'Add project Failed');
    	endif;
    }

    public function getData(Projects $project)
    {
    	$clients = Clients::all();
    	$users	 = User::all();
    	return view('Projects.edit',[
    			'data' => $project,
    			'clients' => $clients,
    			'users'	  => $users,
    		]);
    }

    public function edit(Projects $project, Request $request)
    {
    	$this->validate($request, [
    			"client_id" => 'required',
    			"name" => 'required',
    			"assign_to" => 'required',
    			'start_at' => 'required|date',
    			'end_at' => 'required|date',
    		]);

    	$datas = [
    		"client_id" => $request->client_id,
    		"name" => $request->name,
    		"description" => $request->description,
    		"assign_to" => $request->assign_to,
    		"start_at" => $request->start_at,
    		"end_at" => $request->end_at,
    	];

    	if($project->update($datas)):
    		return redirect('/dashboard/project')->with('status', 'Update Project Success');
    	else:
    		return redirect()->back()->with('status', 'Update project Failed');
    	endif;
    }

    public function delete(Request $request)
    {
    	if(Projects::find($request->id_delete)->delete()):
    		return redirect('/dashboard/projects')->with('status', 'Delete Project Success');
    	else:
    		return redirect()->back()->with('status', 'Delete project Failed');
    	endif;
    }

    public function view(Projects $project)
    {
        /*$dataUserProject = $project->user_team->pluck('id');
    	$users = User::whereNotIn('id', $dataUserProject)->get();*/
        $users = User::all();
    	return view('Projects.view',[
    			'data' => $project,
    			'users' => $users,
    		]);
    }

    public function AddTeam(Projects $project, Request $request)
    {
        if($request->ajax()):
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
            ]);
            if($validator->fails()):
                return response()->json(["data" => $validator->errors(), "status" => "validation",]);
            else:
                $project->user_team()->attach($request->user_id);
                return response()->json(["data" => $request->user_id, "status" => "sukses"]);
            endif;
        endif;
    	$project->user_team()->attach($request->user_id);
    	return redirect('/dashboard/project/'.$project->id.'/view');
    }

    public function getEditTeam(Projects $project, User $user)
    {        
        $dataUser = User::all();
        return response()->json($user);        
    }

    public function EditTeam(Projects $project, Request $request)
    {
        if($request->user_id_edit!=$request->edit_user_id):
            $project->user_team()->toggle([$request->user_id_edit, $request->edit_user_id]);
            return redirect()->back();
        else:
            return redirect()->back();
        endif;
    }

    public function teamDelete(Projects $project, Request $request)
    {
        $project->user_team()->toggle([$request->id_delete]);
        return redirect()->back();
    }

    public function getTask(Projects $project)
    {
    	$users = User::all();
    	return view('Projects.Tasks.add',[
    			'data' => $project,
    			'users' => $users,
    		]);
    }

    public function AddTask(Projects $project, Request $request)
    {
        $this->validate($request,[
                "name" => 'required',
                "description" => 'required',
                "assign_to" => 'required',
                "start_at" => 'required|date',
                "end_at" => 'required|date',
            ]);

    	/*$datas = [
    		"name" => $request->name,
    		"description" => $request->description,
    		"assign_to" => $request->assign_to,
    		"start_at" => $request->start_at,
    		"end_at" => $request->end_at,
    	];
    	$project->task()->create($datas);*/

        $task = new Tasks;
        $task->project_id = $project->id;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->assign_to = $request->assign_to;
        $task->start_at = $request->start_at;
        $task->end_at = $request->end_at;
        $task->save();

        if($request->file('document')!=null):

            $name = date("YmdHis")."_".pathinfo( $request->file('document')->getClientOriginalName(), PATHINFO_FILENAME );
            $extension = $request->file('document')->getClientOriginalExtension();
            $fullname = $name.".".$extension;
            $path = "files";
            $mime = $request->file('document')->getClientMimeType();
            File::makeDirectory($path, $mode = 0777, true, true);

            if($request->file('document')->move($path, $fullname)):

                $document = new Files;
                $document->name = $name;
                $document->path = $path ."/". $fullname;
                $document->extension = $extension;
                $document->mimetype = $mime;
                if ($document->save()):

                    $task->file_task()->attach($document->id);
                    return redirect('/dashboard/project/'.$project->id.'/view');

                else:

                    return redirect('/dashboard/project/'.$project->id.'/view');

                endif;
            
            else:

                return redirect('/dashboard/project/'.$project->id.'/view');

            endif;

        else:

            return redirect('/dashboard/project/'.$project->id.'/view');

        endif;

    }

    public function ViewTask(Projects $project, Tasks $task)
    {
        $fileTask = $task->file_task()->get();
        return response()->json([
            "task" => $task,
            "user" => $task->user->name,
            "file_task" => $fileTask,
            ]);
    }

    public function getEditTask(Projects $project, Tasks $task)
    {
        $users = User::all();
        return view('Projects.Tasks.edit',[
                "data" => $task,
                "users" => $users,
            ]);
    }

    public function EditTask(Projects $project, Tasks $task, Request $request)
    {   
        $this->validate($request,[
                "name" => 'required',
                "description" => 'required',
                "assign_to" => 'required',
                "start_at" => 'required|date',
                "end_at" => 'required|date',
            ]);

        $task->project_id = $project->id;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->assign_to = $request->assign_to;
        $task->start_at = $request->start_at;
        $task->end_at = $request->end_at;
        $task->update();

        if($request->file('document')!=null):

            $name = date("YmdHis")."_".pathinfo( $request->file('document')->getClientOriginalName(), PATHINFO_FILENAME );
            $extension = $request->file('document')->getClientOriginalExtension();
            $fullname = $name.".".$extension;
            $path = "files";
            $mime = $request->file('document')->getClientMimeType();
            File::makeDirectory($path, $mode = 0777, true, true);

            if($request->file('document')->move($path, $fullname)):

                $document = new Files;
                $document->name = $name;
                $document->path = $path ."/". $fullname;
                $document->extension = $extension;
                $document->mimetype = $mime;

                if ($document->save()):

                    $task->file_task()->attach($document->id);
                    return redirect('/dashboard/project/'.$project->id.'/view');

                else:

                    return redirect('/dashboard/project/'.$project->id.'/view');

                endif;
            
            else:

                return redirect('/dashboard/project/'.$project->id.'/view');

            endif;

        else:

            return redirect('/dashboard/project/'.$project->id.'/view');

        endif;

    }

    public function DeleteTask(Request $request)
    {
        Tasks::find($request->id_delete)->delete();
        return redirect()->back();
    }

    public function DeleteTaskFile(Projects $project, Tasks $task, Request $request)
    {
        $task->file_task()->toggle([$request->id_delete]);
        return redirect()->back();
    }

    public function DeleteProjectFile(Projects $project, Files $files, Request $request)
    {
        $project->file_project()->toggle([$request->id_delete]);
        return redirect()->back();
    }

    public function AddFile(Projects $project, Request $request)
    {

        $name = date("YmdHis")."_".pathinfo( $request->file('document')->getClientOriginalName(), PATHINFO_FILENAME );
        $extension = $request->file('document')->getClientOriginalExtension();
        $fullname = $name.".".$extension;
        $path = "files";
        $mime = $request->file('document')->getClientMimeType();
        File::makeDirectory($path, $mode = 0777, true, true);

        if($request->file('document')->move($path, $fullname)):

            $document = new Files;
            $document->name = $name;
            $document->path = $path ."/". $fullname;
            $document->extension = $extension;
            $document->mimetype = $mime;
            if ($document->save()):

                $project->file_project()->attach($document->id);
                return redirect()->back();

            else:

                return redirect()->back();

            endif;

        else:

            return redirect('/dashboard/project/'.$project->id.'/view');

        endif;
    }

}
