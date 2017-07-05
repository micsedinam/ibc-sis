<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guardian;
use Auth;

class guardianResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:guardian');
    }

    public function index()
    {
        $student = Guardian::select('password')->get();

        return view('guardian.passreset');
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
        //$student =User::findOrFail(Auth::user()->$id);

        //return view('student.passreset') ->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $passreset)
    {
        //dd($request->all());
        $guardian = Guardian::first(Auth::user()->$passreset);

        $guardian->password = bcrypt($request['password']);

        if ($guardian->update()){
            //  flash($request['name'].' successfully saved.')->success();
            echo 'saved';
        }else{
            //  flash($request['name'].' not saved.')->error();
            echo 'Not saved';
        }

        return redirect()->to('guardian/login') ->with('guardian', $guardian);
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
