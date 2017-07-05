<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studFees;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;

class studFeesController extends Controller
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
        $fees = studFees::select('id', 'studentid', 'term', 'academicyear', 'amt_due', 'amt_rem', 'amt_paid')->get();

        return view('admin.fees') ->with('fees', $fees);
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
    public function edit($fee)
    {
        $fees = studFees::findOrFail($fee);

        return view('admin.fee-edit') ->with('fees', $fees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fee)
    {
        //dd($request->all());

        $fees = studFees::findOrFail($fee);

        $remainder  = $request['amt_paid'] - $request['amt_due'];

        $fees->studentid = $request['studentid'];
        $fees->academicyear = $request['academicyear'];
        $fees->term = $request['term'];
        $fees->amt_due = $request['amt_due'];
        $fees->amt_paid = $request['amt_paid'];
        $fees->amt_rem = $remainder;

        //dd($fees);
        if ($fees->update()){
              //flash($request['name'].' successfully saved.')->success();
            echo 'saved';
        }else{
              //flash($request['name'].' not saved.')->error();
            echo 'Not saved';
        }

        return redirect() ->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fee)
    {
        $fees = studFees::findOrFail($fee);

        if (studFees::destroy($fee)){
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

        Excel::load(Input::file('fees'),function ($reader){
            $reader -> each (function ($sheet){
                studFees::firstOrCreate($sheet -> toArray());
            });
        });

        return redirect() ->back();
    }

    public function getExport(){
        $fees = studFees::all();
        Excel::create('Edu Hub Student Fees Export', function ($excel) use ($fees){
            $excel -> sheet ('sheet 1', function ($sheet) use ($fees){
                $sheet -> fromArray($fees);
            });
        })->export ('csv');
    }

    public function deleteAll(){
        DB::table('stud_fees')->delete();

        return redirect() ->back();
    }

    public function feerecords()
    {
        $fees = studFees::select('id', 'studentid', 'term', 'academicyear', 'amt_due', 'amt_rem', 'amt_paid')->get();

        return view('admin.fee-list') ->with('fees', $fees);
    }
}
