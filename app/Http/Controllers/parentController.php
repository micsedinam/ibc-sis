<?php

namespace App\Http\Controllers;
use App\Http\Requests\parentRequest;

use Illuminate\Http\Request;
use App\Guardian;
use App\User;
use App\Studentparent;

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

       $guardian = Guardian::select('id','firstname', 'surname', 'othername', 'dob', 'gender', 'phone', 'email', 'address')->get();


        return view('admin.parent-list')
        ->with('guardian', $guardian);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guardian = Guardian::select('firstname', 'surname', 'othername', 'dob', 'gender', 'phone', 'email', 'address')->get();


        return view('admin.register-parent')->with('guardian', $guardian);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(parentRequest $request)
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
    public function edit($parent)
    {
        $parent = Guardian::findOrFail($parent);

        $wards = User::select('firstname','surname','othername','class','studentid','studentparents.stud_id','studentparents.parent_id','users.programme','studentparents.id','studentparents.state')
            ->join('studentparents', 'studentparents.stud_id', '=', 'users.id')
            ->where('studentparents.parent_id', $parent->id)
            ->get();
            $wardcount = count($wards);
            //dd($wards);

        return view('admin.parent-edit')
            ->with('wards', $wards)
            ->with('wardcount', $wardcount)
            ->with('parent', $parent);
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
        $guard = Guardian::findOrFail($id);
        $guard->delete();
        flash('Deleted.');
        return back();
    }

    public function confirm($id)
    {
       // dd($id);
        $confirm = Studentparent::findOrFail($id);
        $confirm->state = 'approved';

        if ($confirm->update()) {
            flash('Request Approved')->success();
        }else{
            flash('Oops Error ocured')->error();
        }
        return back();

    }
    public function deny($id)
    {
       // dd($id);
        $confirm = Studentparent::findOrFail($id);
        $confirm->state = 'pending';

        if ($confirm->update()) {
            flash('Request Denied')->success();
        }else{
            flash('Oops Error ocured')->error();
        }
        return back();
    }
}
