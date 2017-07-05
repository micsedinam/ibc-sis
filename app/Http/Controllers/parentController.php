<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guardian;

class parentController extends Controller
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

        $guardian = Guardian::select('firstname', 'surname', 'othername', 'dob', 'gender', 'phone', 'email', 'address')->get();


        return view('admin.register-parent')->with('guardian', $guardian);
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
        $parent = new Guardian();

        $parent->firstname = $request['firstname'];
        $parent->surname = $request['surname'];
        $parent->othername = $request['othername'];
        $parent->dob = $request['dob'];
        $parent->gender = $request['gender'];
        $parent->phone = $request['phone'];
        $parent->email = $request['email'];
        $parent->address = $request['address'];
        $parent->group = ('Guardian');
        $parent->password = bcrypt('ghanaparent');

        if ($parent->save()){
            //  flash($request['name'].' successfully saved.')->success();
            echo 'saved';
        }else{
            //  flash($request['name'].' not saved.')->error();
            echo 'Not saved';
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
