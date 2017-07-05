<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use Auth;

class studResultController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function showresult()
    {
        //dd(all());

        $result = Results::select('*')
            ->where('studentid','=',Auth::user()->studentid)
            ->latest()
            ->get()
        ;

        $results = Results::select('*')
        	->where('studentid', '=', Auth::user()->studentid)
        	->latest()
        	->get()
        	;	

        return view ('student.results') ->with ('result', $result) ->with ('results', $results);
    }
}
