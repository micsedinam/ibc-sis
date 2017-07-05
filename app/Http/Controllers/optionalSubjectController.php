<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectsOptionals;
use App\Programme;

class optionalSubjectController extends Controller
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
        $optional = SubjectsOptionals::select('subjectid', 'subject_title', 'class', 'programme')->get();

        $programme = Programme::select('name')
                                ->groupBy('name')
                                ->get();

        return view('admin.register-electives') ->with ($optional, 'optional') ->with('programme', $programme);
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

        $optional = new SubjectsOptionals();

        $optional -> subjectid = $request['subjectid'];
        $optional -> subject_title = $request['subject_title'];
        $optional -> class = $request['class'];
        $optional -> programme = $request['programme'];

        //dd($optional);

        if ($optional->save()) {
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
