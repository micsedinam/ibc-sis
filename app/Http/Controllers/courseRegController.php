<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courseRegister;
use App\Course;
use Illuminate\Support\Facades\Input;
use Excel;
use DB;
use Auth;
use Carbon\Carbon;

class courseRegController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('student.stureg');
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
        $dt = Carbon::now();
        $bt = Carbon::now()->addYear();
        // set some things
        $now = substr($dt->year, 0, 4);
        //dd($now);

        $next = substr($bt->year, 0, 4);
        //dd($next);

        $year = $now.'/'.$next;

        //dd($year);

        //dd($request->all());
        $reg = new courseRegister();

        $reg->studentid = Auth::user()->studentid;
        $reg->academicyear= $year;
        $reg->semester = $request['semester'];
        $reg->level = $request['level'];

        //dd($reg);

        if($reg->save()){
            flash('You Have Successfully Registered Your Courses')->success();
        }else{
            flash('Your Registeration Has Failed')->error();
        }

        return redirect()->back();
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

    public function courselist(Request $request)
    {
       //dd($request->all());
        $mysemester = $request['semester'];
        $mylevel = $request['level'];

       // dd($myacademic, $myterm, $mysubject);

        $course = Course::select('id', 'c_name', 'c_code', 'credit_hrs', 'semester', 'level')
                            ->where('semester', '=', $mysemester)
                            ->where('level', '=', $mylevel)
                            ->get();
       //dd($results);                 
        $courses = Course::select('id', 'c_name', 'c_code', 'credit_hrs', 'semester', 'level')
                            ->get();
       //dd($results);                        

        /*$subject = Results::select('subject_title')
            ->groupBy('subject_title')
            ->get();

        $term = Results::select('term')
            ->groupBy('term')
            ->get();

        $academic = Results::select('academicyear')
            ->groupBy('academicyear')
            ->get();*/

        return view('student.stureg') 
                ->with('course', $course)
                ->with('courses', $courses)
                ->with('mysemester', $mysemester)
                ->with('mylevel', $mylevel)
        ;
    }
}
