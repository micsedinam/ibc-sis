<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use DB;

class gradeReportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	return view('admin.grade-report');
    }

    public function subresults(Request $request)
    {
       //dd($request->all());
        $myclass = $request['class'];
        $mysubject = $request['subject'];
        $myterm = $request['term'];
        $myacademic = $request['academic'];

       // dd($myacademic, $myterm, $mysubject);

        $results = Results::select('id', 'studentid', 'subject_title', 'academicyear', 'term', 'ca_score', 'exam_score', 'total', 'grade')
                            ->where('class', '=', $myclass)
                            ->where('subject_title', '=', $mysubject)
                            ->where('term', '=', $myterm)
                            ->where('academicyear', '=', $myacademic)
                            ->get();
       //dd($results);                        

        $subject = Results::select('subject_title')
            ->groupBy('subject_title')
            ->get();

        $term = Results::select('term')
            ->groupBy('term')
            ->get();

        $academic = Results::select('academicyear')
            ->groupBy('academicyear')
            ->get();

        $class = Results::select('class')
            ->groupBy('class')
            ->get();

        $report = Results::select(DB::raw('count(grade) as gradecount'), 'grade')
                            ->where('class', '=', $myclass)
                            ->where('subject_title', '=', $mysubject)
                            ->where('term', '=', $myterm)
                            ->where('academicyear', '=', $myacademic)
                            ->groupBy('grade')
                            ->get();
        //dd($report);

        return view('admin.grade-report') 
        ->with('results', $results) 
        ->with('subject', $subject) 
        ->with('class', $class) 
        ->with('term', $term)
        ->with('academic', $academic) 
        ->with('report', $report) 
        //->with('mysubject', $mysubject)
        ;
    }
}
