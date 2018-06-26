<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class courseController extends Controller
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
        return view ('admin.course');
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
        //dd($request->all());
        $course = new Course();

        $course->c_code = $request['c_code'];
        $course->c_name = $request['c_name'];
        $course->credit_hrs= $request['credit_hrs'];
        $course->semester = $request['semester'];
        $course->level = $request['level'];

        //dd($course);

        if($course->save()){
            flash($request['name']. ' Successfully Saved.')->success();
        }else{
            flash($request['name']. ' Not Saved.')->error();
        }

        return redirect('/admin/course-manage');
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
    public function edit($course)
    {
        $course = Course::findOrFail($course);

        return view('admin.course-edit') ->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course)
    {
        //dd($request->all());
        $course = Course::findOrFail($course);

        $course->c_code = $request['c_code'];
        $course->c_name = $request['c_name'];
        $course->credit_hrs= $request['credit_hrs'];
        $course->semester = $request['semester'];
        $course->year = $request['level'];

        //dd($course);

        if($course->update()){
            flash($request['name']. ' Successfully Saved.')->success();
        }else{
            flash($request['name']. ' Not Saved.')->error();
        }

        return redirect()->back();
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

    public function manage()
    {
        $course = Course::select('id', 'c_code', 'c_name', 'credit_hrs')->get();

        return view('admin.manage-course') ->with('course', $course);
    }
}
