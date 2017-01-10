<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Files;
use File;

class FileController extends Controller
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
    	$data = Files::paginate(10);
    	return view('Files.index',[
    			'data' => $data,
    		]);
    }

    public function add(Request $request)
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
                return redirect()->back();
            else:
                return redirect()->back();
            endif;
    	endif;
    }

    public function edit(Request $request)
    {
    	if($request->file('document')!=null):

    		$dataFile = Files::find($request->id);

    		$name = date("YmdHis")."_".pathinfo( $request->file('document')->getClientOriginalName(), PATHINFO_FILENAME );
    		$extension = $request->file('document')->getClientOriginalExtension();
    		$fullname = $name.".".$extension;
    		$path = "files";
    		$mime = $request->file('document')->getClientMimeType();
    		File::makeDirectory($path, $mode = 0777, true, true);

    		if($request->file('document')->move($path, $fullname)):

    			$datas = [
    				"name" => $name,
    				"path" => $path ."/". $fullname,
    				"extension" => $extension,
    				"mimetype" => $mime,
    			];

    			if ($dataFile->update($datas)):
	                return redirect()->back();
            	else:
	                return redirect()->back();
            	endif;

    		endif;

    	else:

			return redirect()->back();

    	endif;
    }

    public function delete(Request $request)
    {
    	Files::find($request->id_delete)->delete();
    	return redirect()->back();
    }

}
