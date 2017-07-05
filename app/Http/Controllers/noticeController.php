<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Auth;

class noticeController extends Controller
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
        $notice = Notice::select('id', 'post_title', 'post_category', 'message', 'group', 'date')->get();

        return view('admin.postnotice') ->with('notice',$notice);
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

        $notice = new Notice();

        $notice->post_title = $request['post_title'];
        $notice->post_category = $request['post_category'];
        $notice->message = $request['message'];
        $notice->group = $request['group'];
        $notice->date = $request['date'];

        if ($notice->save()){
            //flash($request['name'].' successfully saved.')->success();
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
    public function edit($notice)
    {
        $notice = Notice::findOrFail($notice);

        return view('admin.notice-edit')->with('notice', $notice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $notice)
    {
        //dd($request->all());
        $notice = Notice::findOrFail($notice);

        $notice->post_title = $request['post_title'];
        $notice->post_category = $request['post_category'];
        $notice->message = $request['message'];
        $notice->group = $request['group'];
        $notice->date = $request['date'];

        if ($notice->update()){
            //flash($request['name'].' successfully saved.')->success();
            echo 'saved';
        }else{
            //  flash($request['name'].' not saved.')->error();
            echo 'Not saved';
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($notice)
    {
        $notices = Notice::findOrFail($notice);

        if (Notice::destroy($notice)){
            //flash ('deleted successfully')->success();
            echo "saved";
        }else{
            //flash ('failed to delete')->warning();
            echo "Not saved";
        }

        return redirect()->back();
    }

    public function viewNotice()
    {
        $notice =Notice::select('notices')
            ->select('*')
            //->paginate(6)
            ->latest()
            ->get();

        /*$general =Notice::select('notices')
            ->where('group', '=', 'General Notice')
            ->select('post_title', 'post_category', 'message', 'date', 'group')
            ->get();*/

        //dd($notice, $general);
        return view('admin.notices') ->with('notice', $notice);
    }
}
