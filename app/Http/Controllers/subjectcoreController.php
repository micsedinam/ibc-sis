<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectsCore;
use App\Programme;

class subjectcoreController extends Controller
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
        $core = SubjectsCore::select('subjectid', 'subject_title')->get();

        $programme = Programme::select('name')
                                ->groupBy('name')
                                ->get();


        return view('admin.register-electives')->with('core', $core) ->with('programme', $programme);
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

        $core = new SubjectsCore();

        $core -> subjectid = $request['subjectid'];
        $core -> subject_title = $request['subject_title'];

        //dd($core);

        if ($core->save()) {
              flash($request['subject_title'].' successfully saved.')->success();
            //echo "saved";
        }else {
              flash($request['subject_title'].' not saved.')->error();
            //echo "not saved";
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
}
