<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;

class studentregisterController extends Controller
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
        $student = User::select('firstname', 'surname', 'othername','dob','gender','phone','address','email','programme','studentid', 'class')->get();


        return view('admin.register-student')->with('student', $student);
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

         // if(stristr($request['programme'], '@')!== false){
         //    dd('');
         // }

        // $short = substr($request['programme'],0,2);
        // dd($short);

        $student = new User();

        $student->firstname = $request['firstname'];
        $student->surname = $request['surname'];
        $student->othername = $request['othername'];
        $student->dob = $request['dob'];
        $student->gender = $request['gender'];
        $student->phone = $request['phone'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->programme = $request['programme'];
        $student->class = $request['class'];
        $student->studentid = $request['studentid'];
        $student->password = bcrypt('ghanastudent');

        if ($student->save()){
              flash($request['name'].' successfully saved.')->success();
            //echo 'saved';
        }else{
             flash($request['name'].' not saved.')->error();
           // echo 'Not saved';
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
        $student = User::findOrFail(Auth::user()->$id);

        $student->password = bcrypt($request['password']);

        if ($student->update()){
            //  flash($request['name'].' successfully saved.')->success();
            echo 'saved';
        }else{
            //  flash($request['name'].' not saved.')->error();
            echo 'Not saved';
        }

        return redirect()->back() ->with('student', $student);
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
