<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use Auth;
use App\Setting;
use App\Resultchange;

class resultchangeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function edit($id)
    {
    	//dd('hey');

       $result = Results::findOrFail($id);

       return view('student.requestchange', compact('result'));
        
    }

    public function save(Request $request, $id)
    {
    	// dd($id);
      $result = Results::findOrFail($id);

      $change = new Resultchange();

      $change->resultid = $result->id;
      $change->studid = $result->studentid;
      $change->staffid = $result->staffid;
      $change->type = 'request';
      $change->request = $request['request'];

      if ($change->save()) {
       	flash("Your request have been made.")->success();
      }else{
       	flash('Error')->error();
      }
      return redirect('/results');
    }
}
