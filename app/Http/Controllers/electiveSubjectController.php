<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectsElectives;

class electiveSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $elective = SubjectsElectives::select('subjectid', 'subject_title', 'class', 'programme')->get();

        return view('admin.register-electives');
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
        //dd($request ->all());

        $elective = new SubjectsElectives();

        $elective -> subjectid = $request['subjectid'];
        $elective -> subject_title = $request['subject_title'];
        $elective -> class = $request['class'];
        $elective -> programme = $request['programme'];

        //dd($elective);

        if ($elective->save()) {
            //  flash($request['name'].' successfully saved.')->success();
            echo "saved";
        }else{
            //  flash($request['name'].' not saved.')->error();
            echo "not saved";
        }

        return redirect() ->back();
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
