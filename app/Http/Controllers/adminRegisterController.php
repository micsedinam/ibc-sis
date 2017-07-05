<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class adminRegisterController extends Controller
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
        $admin = Admin::select('firstname','surname','othername','phone', 'email')->get();


        return view('admin.register-admin')->with('admin', $admin);
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

        $admin = new Admin();

        $admin->firstname = $request['firstname'];
        $admin->surname = $request['surname'];
        $admin->othername = $request['othername'];
        $admin->phone = $request['phone'];
        $admin->email = $request['email'];
        $admin->password = bcrypt('ghanaadmin');

        if ($admin->save()){
              flash($request['firstname'].' successfully saved.')->success();
            //echo 'saved';
        }else{
              flash($request['firstname'].' not saved.')->error();
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
