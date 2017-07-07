<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\Resultchange;
use App\Resultupdate;

class approveController extends Controller
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = Resultupdate::select('*', \DB::raw('resultupdates.ca_score as new_ca, resultupdates.exam_score as new_exam ,resultupdates.state as state_ '))
            ->join('results',  'resultupdates.resultid', '=',  'results.id')
            ->join('resultchanges', 'resultupdates.requestid', '=' ,'resultchanges.id')
            ->get();
        //dd($request);

        return view('admin.results-change', compact('request'));
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
        $pdate = $request['update'];
       // return $request->all();
        //dd($request->update);
        $results = Results::findOrFail($request->result);

        //Calculate total
        $total  = $request['new_ca'] + $request['new_exam'];

        //Calculate the grade
        switch ($grade = $total) {
            case $total >=80 || $total==100:
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

        $results->ca_score = $request['new_ca'];
        $results->exam_score = $request['new_exam'];
        $results->total = $total;
        $results->grade = $grade;

       // dd($request->update);
        if ($results->update()){
           
            //dd($request->requested);
            $request = Resultchange::findOrFail($request->requested);
            $request->state = 'updated';
            //dd($request);
            $request->update();

            $update = Resultupdate::findOrFail($pdate);
            $update->state = 'approved';
                        //dd($update);

            $update->update();

            //echo 'saved';
             flash('Results successfully updated.')->success();
        }else{
            flash('Results not saved.')->error();
            //echo 'Not saved';
        }

        return redirect('/admin/approve');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
