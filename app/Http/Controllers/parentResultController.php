<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\User;

class parentResultController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:guardian');
    }

    public function index()
    {
    	$myresult = ['studentid'];

        $result = Results::select('*')
            ->where('studentid','=',$myresult)
            ->latest()
            ->get()
        ;

        $results = Results::select('*')
        	->where('studentid', '=', $myresult)
        	->latest()
        	->first()
        ;	

        $student = User::select('users')
        				->where('studentid', '=', $myresult)
        				->select('firstname', 'surname', 'programme', 'studentid')
        				->get()
        ;

        return view ('guardian.results') ->with ('result', $result) ->with ('results', $results) ->with ('student', $student);
    }

    public function view(Request $request)
    {

        $myresult = $request['studentid'];

        $result = Results::select('*')
            ->where('studentid','=', $myresult)
            ->latest()
            ->get()
        ;

        $results = Results::select('*')
        	->where('studentid', '=', $myresult)
        	->latest()
        	->get()
        ;	

        $student = User::select('users')
        				->where('studentid', '=', $myresult)
        				->select('firstname', 'surname', 'programme', 'studentid')
        				->get()
        ;

        //dd($result, $results, $student);

        return view ('guardian.results') ->with ('result', $result) ->with ('results', $results) ->with ('student', $student);
    }

}
