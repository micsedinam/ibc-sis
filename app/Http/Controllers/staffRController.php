<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resultchange;
use App\Results;
use App\Resultupdate;;
use Auth;


class staffRController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    public function index()
    {
    	$results = Resultchange::select('*',\DB::raw('resultchanges.id as changeid'))
    		->join('results', 'results.id', '=', 'resultchanges.resultid')
    		->where('resultchanges.staffid', Auth::user()->staffid)
    		->get();
    		// dd($results);

    		return view('staff.resultschange', compact('results'));
    }

    public function edit($id)
    {
    	$result = Resultchange::select('*', \DB::raw('resultchanges.id as changeid'))
    		->join('results', 'results.id', '=', 'resultchanges.resultid')
    		->where('resultchanges.id', $id)
    		->get()
    		->first();
    	    // dd($result);
    	 $response = Resultupdate::select('*')
    	 	->where('staffid', Auth::user()->staffid)
    	 	->where('requestid', $id)
    	 	->get()
    	 	->first()
    	 	;
      //dd($response);
    	return view('staff.resultschange-edit', compact('result', 'response'));
    }

    public function deny($id)
    {
      //dd($id);
    	$deny = Resultchange::findOrFail($id);
    	$deny->state = 'denied';

    	if ($deny->update()) {
    		flash("Change Request denied.")->info();
    	}else{
        flash("Oops, somthing went wrong.")->error();
      }
    	return redirect('staff/result/change');
    }

    public function update(Request $request , $id)
    {
    	$change = Resultchange::findOrFail($id);
       	$update = new Resultupdate();

       	$update->studid = $change->studid;
       	$update->staffid = $change->staffid;
       	$update->resultid = $change->resultid;
       	$update->requestid = $change->id;
       	$update->ca_score = $request['ca_score'];
       	$update->exam_score = $request['exam_score'];
       	$update->state = 'pending';
       	
      // 	dd($update);
       	if ($update->save()) {
       		
       		$change->state = 'accepted';
       		$change->update();
       		flash("Your Update request have been made.")->success();
       	}else{
       		flash('Error')->error();
       	}
       	return redirect('staff/result/change');
    }
}
