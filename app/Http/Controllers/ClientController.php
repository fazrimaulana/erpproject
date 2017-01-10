<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Clients;
use App\Countries;

class ClientController extends Controller
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
    	$data = Clients::paginate(10);
    	return view('Clients.index', [
    			'data' => $data
    		]);
    }

    public function add()
    {
    	$country_code = Countries::all();
    	return view('Clients.add',[
    			"country_code" => $country_code,
    		]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    			"name" => 'required',
    			"company_name" => 'required',
    			"country_code" => 'required',
    			"address" => 'required',
    			"province" => 'required',
    			"city" => 'required',
    			"pos_code" => 'required',
    			"email" => 'required|email',
    			"no_hp" => 'required|size:12',
    		]);

    	$datas = [
    		"name" => $request->name,
    		"company_name" => $request->company_name,
    		"country_code" => $request->country_code,
    		"address" => json_encode($request->address),
    		"province" => $request->province,
    		"city" => $request->city,
    		"pos_code" => $request->pos_code,
    		"email" => $request->email,
    		"no_hp" => $request->no_hp,
    	];

    	if (Clients::create($datas)):
    		return redirect('/dashboard/clients')->with('status', 'Add New Client Success');
    	else:
    		return redirect()->back()->with('status', 'Add New Client Failed');
    	endif;
    }

    public function getData(Clients $client)
    {
    	$country_code = Countries::all();
    	return view('Clients.edit',[
    			"data" => $client,
    			"country_code" => $country_code,
    		]);
    }

    public function edit(Clients $client, Request $request)
    {

    	$this->validate($request, [
    			"name" => 'required',
    			"company_name" => 'required',
    			"country_code" => 'required',
    			"address" => 'required',
    			"province" => 'required',
    			"city" => 'required',
    			"pos_code" => 'required',
    			"email" => 'required|email',
    			"no_hp" => 'required|size:12',
    		]);

    	$datas = [
    		"name" => $request->name,
    		"company_name" => $request->company_name,
    		"country_code" => $request->country_code,
    		"address" => json_encode($request->address),
    		"province" => $request->province,
    		"city" => $request->city,
    		"pos_code" => $request->pos_code,
    		"email" => $request->email,
    		"no_hp" => $request->no_hp,
    	];

    	if ($client->update($datas)):
    		return redirect('/dashboard/clients')->with('status', 'Update Client Success');
    	else:
    		return redirect()->back()->with('status', 'Update Client Failed');
    	endif;

    }

    public function delete(Clients $client, Request $request)
    {
    	Clients::find($request->id_delete)->delete();
    	return redirect()->back()->with('status', 'Delete Client Success');
    }

    public function view(Clients $client)
    {
    	$country_code = Countries::all();
    	return view('Clients.view',[
    			"data" => $client,
    			"country_code" => $country_code,
    		]);
    }

}
