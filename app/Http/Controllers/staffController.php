<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Resultchange;
use Auth;

class staffController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $staff = Staff::findOrFail(Auth::user()->id)->get()->first();
        //dd($staff->password);
        if (password_verify ( 'ghanastaff', $staff->password )) {
            //dd('uu');
          flash('You have to change the default password on your account.')->warning();
        }
        $requested = Resultchange::select('id','state')
            ->where('staffid', Auth::user()->staffid)
            ->get();
        $rn = sizeof($requested);
        
        return view('staff.index', compact('rn'));
    }
}
