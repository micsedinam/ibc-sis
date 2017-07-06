<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;

class programmeController extends Controller
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
        return view('admin.programme');
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
        $programme = new Programme();

        $programme->code = $request['code'];
        $programme->name = $request['name'];

        //dd($programme);

        if($programme->save()){
            flash($request['name']. ' Successfully Saved.')->success();
        }else{
            flash($request['name']. ' Not Saved.')->error();
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
    public function edit($programme)
    {
        $prog = Programme::findOrFail($programme);

        return view('admin.prog-edit') ->with('prog', $prog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $programme)
    {
        //dd($request->all());
        $prog = Programme::findOrFail($programme);

        $prog->code = $request['code'];
        $prog->name = $request['name'];

        //dd($programme);

        if($prog->update()){
            flash($request['name']. ' Successfully Saved.')->success();
        }else{
            flash($request['name']. ' Not Saved.')->error();
        }

        return redirect() ->back();
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
        $prog = Programme::select('id', 'code', 'name')->get();

        return view('admin.manage-prog') ->with('prog', $prog);
    }
}
