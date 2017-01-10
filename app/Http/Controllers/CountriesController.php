<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Countries;

class CountriesController extends Controller
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
        include "../public/datacountries.php";

        foreach ($countries as $key => $value) {
            Countries::create($value);
        }
       
        return redirect('/');
    }
}
