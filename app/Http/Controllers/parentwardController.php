<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Studentparent;
use Auth;

class parentwardController extends Controller
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
    	 $wards = User::select('firstname','surname','othername','class','studentid','studentparents.stud_id','studentparents.parent_id','users.programme','studentparents.id','studentparents.state')
            ->join('studentparents', 'studentparents.stud_id', '=', 'users.id')
            ->where('studentparents.parent_id', Auth::user()->id)
            ->get();
         $wardcount = sizeof($wards);


    	return view('guardian.parent-ward', compact('wards', 'wardcount'));
    }
    public function indexfind(Request $request)
    {
    	//dd($request->all());
    	 $wards = User::select('firstname','surname','othername','class','studentid','studentparents.stud_id','studentparents.parent_id','users.programme','studentparents.id','studentparents.state')
            ->join('studentparents', 'studentparents.stud_id', '=', 'users.id')
            ->where('studentparents.parent_id', Auth::user()->id)
            ->get();
         $wardcount = sizeof($wards);

        $find = User::select('id', 'studentid', 'firstname', 'surname','othername', 'class')
        	->where('users.studentid', $request->input('studentid'))
        	->get()
        	->first();
        $findcount = sizeof($find);
        	//dd($find);
         if ($findcount == 0) {
         	flash('Student with id '.$request->input('studentid').' does not exist.')->error();
         }
    	return view('guardian.parent-wardfind', compact('wards', 'wardcount', 'find','findcount'));
    }

	public function addward($id)
	{
		$added = Studentparent::where('parent_id', '=', Auth::user()->id)
		->where('stud_id', '=', $id)->first();
		//dd($added);
		if ($added === null) {
   			// record doesn't exist
			$add = new Studentparent();
			$add->parent_id = Auth::user()->id;
			$add->stud_id = $id;

			if ($add->save()) {
				flash('Nice, you added a new ward. Please wait for Admin\'s approval.')->success();
			} else {
				flash('Oops, could not add ward.')->error();
			}
			
		}else{
   			flash('Sorry, you cannot add the same ward twice')->error();
		}

		return redirect('guardian/ward/find');
		
	}

	public function deleteward($id)
	{
		$mine = Studentparent::findOrFail($id);
		//dd($mine);
		if ($mine->parent_id === Auth::user()->id) {

			$mine->delete();
			flash('Deleted')->success();
		} else{
			flash('Nothing to delete')->error();
		}
		return redirect('guardian/ward/find');
	}

}
