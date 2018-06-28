<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCourseRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.studcoursereg');
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
        $mystudid = $request['level'];

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
