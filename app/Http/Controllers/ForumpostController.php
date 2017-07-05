<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forumpost;
use Auth;

class ForumpostController extends Controller
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
        $post = Forumpost::select('*')
            ->latest()
            ->get()
        ;

        return view('admin.createpost') ->with('post', $post);
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
        /*$this -> validate($request[
            'forum_body' =>'required|max:1000',]);*/
        $post = new Forumpost();

        $post->forum_title = $request['forum_title'];
        $post->forum_category = $request['forum_category'];
        $post->forum_body = $request['forum_body'];
        $message = 'There was ana error';
        if ($request->user()->forumposts()->save($post)) {
            $message ='Post successfully created!';
        }

        /*$post->forum_title = $request['forum_title'];
        $post->forum_category = $request['forum_category'];
        $post->forum_body = $request['forum_body'];
        $post->user_id = Auth::user()->id;

        //dd($post);

        if ($post->save()){
            //flash($request['name'].' successfully saved.')->success();
            echo 'saved';
        }else{
            //flash($request['name'].' not saved.')->error();
            echo 'Not saved';
        }*/

        return redirect()->back() ->with(['message' => $message]);
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
