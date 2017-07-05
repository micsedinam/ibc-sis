<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

class staffregisterController extends Controller
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
        $staff = Staff::select('firstname','surname','othername','dob','gender','phone','address','email','qualification', 'subjectid')->get();


        return view('admin.register-staff')->with('staff', $staff);
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

        $staff = new Staff();

        $staff->firstname = $request['firstname'];
        $staff->surname = $request['surname'];
        $staff->othername = $request['othername'];
        $staff->dob = $request['dob'];
        $staff->gender = $request['gender'];
        $staff->phone = $request['phone'];
        $staff->email = $request['email'];
        $staff->address = $request['address'];
        $staff->qualification = $request['qualification'];
        $staff->subjectid = $request['subjectid'];
        $staff->group = ('Staff');
        $staff->password = bcrypt('ghanastaff');

        //dd($staff);

        if ($staff->save()){
            flash($request['name'].' successfully saved.')->success();
            //echo 'saved';
        }else{
              flash($request['name'].' not saved.')->error();
            //echo 'Not saved';
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
