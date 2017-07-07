<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\Resultchange;
use App\Resultupdate;

class adminRController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
    	dd('u');
    	// $update = Resultupdate::join();

    	return view('admin.results-change');
    }
}
