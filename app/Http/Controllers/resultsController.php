<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use Illuminate\Support\Facades\Input;
use Excel;
use DB;

class resultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $results = Results::select('id', 'studentid', 'subject_title', 'academicyear', 'term', 'ca_score', 'exam_score', 'total', 'grade')->get();

        $mysubject = ['subject_title'];

        $subject = Results::select('subject_title')
            ->groupBy('subject_title')
            ->get();

        return view('admin.results') ->with('subject', $subject) ->with('mysubject', $mysubject);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($result)
    {
        $results = Results::findOrFail($result);

        return view('admin.result-edit') ->with('results', $results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $result)
    {
        $results = Results::findOrFail($result);

        //Calculate total
        $total  = $request['ca_score'] + $request['exam_score'];

        //Calculate the grade
        switch ($grade = $total) {
            case $total >=80 && $total==100:
               $grade =  "A1";
                break;
            case $total>=75:
                $grade = "B2";
                break;
            case $total >=70:
                $grade = "B3";
                break;
            case $total >=65:
                $grade = "C4";
                break;
            case $total >=60:
                $grade = "C5";
                break;
            case $total >=55:
                $grade = "C6";
                break;
            case $total >=50:
                $grade = "D7";
                break;
            case $total >=40:
                $grade = "E8";
                break;
            case $total <39 && $total==0:
                $grade = "F9";
                break;
        }


        $results->studentid = $request['studentid'];
        $results->subject_title = $request['subject_title'];
        $results->academicyear = $request['academicyear'];
        $results->term = $request['term'];
        $results->ca_score = $request['ca_score'];
        $results->exam_score = $request['exam_score'];
        $results->total = $total;
        $results->grade = $grade;

        //dd($results);
        if ($results->update()){
            //flash($request['name'].' successfully saved.')->success();
            echo 'saved';
        }else{
            //flash($request['name'].' not saved.')->error();
            echo 'Not saved';
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($result)
    {
        $results = Results::findOrFail($result);

        if (Results::destroy($result)){
            //flash ('deleted successfully')->success();
            echo "saved";
        }else{
            //flash ('failed to delete')->warning();
            echo "Not saved";
        }

        return redirect()->back();
    }

    public function postImport()
    {

        Excel::load(Input::file('results'),function ($reader){
            $reader -> each (function ($sheet){
                Results::firstOrCreate($sheet -> toArray());
            });
        });

        return redirect() ->back();
    }

    public function getExport(){
        $results = Results::all();
        Excel::create('Edu Hub Student Results Export', function ($excel) use ($results){
            $excel -> sheet ('sheet 1', function ($sheet) use ($results){
                $sheet -> fromArray($results);
            });
        })->export ('csv');
    }

    public function resultsrecords(Request $request)
    {
        //dd($request->all());
        $mysubject = $request['subject_title'];
        $myterm = $request['term'];
        $myacademic = $request['academicyear'];

        $results = Results::select('results.id', 'results.studentid', 'results.subject_title', 'results.academicyear', 'results.term', 'results.ca_score', 'results.exam_score', 'results.total', 'results.grade')
                            ->where('results.subject_title', '=', $mysubject)
                            ->where('results.term', '=', $myterm)
                            ->where('results.academicyear', '=', $myacademic)
                            ->get();
       // dd($results);                        

        $subject = Results::select('subject_title')
            ->groupBy('subject_title')
            ->get();

        $term = Results::select('term')
            ->groupBy('term')
            ->get();

        $academic = Results::select('academicyear')
            ->groupBy('academicyear')
            ->get();

        return view('admin.manage-results') 
        ->with('results', $results) 
        ->with('subject', $subject) 
        ->with('term', $term)
        ->with('academic', $academic) 
        //->with('mysubject', $mysubject)
        ;
    }

}
