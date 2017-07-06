<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guardian;
use Auth;

class guardianController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:guardian');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guardian = Guardian::findOrFail(Auth::user()->id)->get()->first();
        //dd($staff->password);
        if (password_verify ( 'ghanaparent', $guardian->password )) {
            //dd('uu');
          flash('You have to change the default password on your account.')->warning();
        }
        return view('guardian.index');
    }
}
