<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\User;
use App\Studentparent;
use Auth;

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
       $student = User::select('users')
            ->where('studentid', '=', $myresult)
            ->select('id','firstname', 'surname', 'programme', 'studentid')
            ->get()->first()
        ;

        //dd($student);
        if ($student != null) {
            $mine = Studentparent::where('parent_id', '=', Auth::user()->id)
            ->where('stud_id', '=', $student->id)
            ->get()
            ->first();

            //dd($mine);
            if ($mine != null ) {
                if ($mine->state === 'approved') {
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
                } else {
                    flash('Your ward request has not yet been approved.' )->error();
                    return redirect('guardian/results');
                }
                
            }else{
                flash('This is not your ward check the ID and try again')->error();
                
               return redirect('guardian/results');

            }

         }else{

            flash('Student does not exist')->error();
            
            return redirect('guardian/results');

        }

    }

}


       