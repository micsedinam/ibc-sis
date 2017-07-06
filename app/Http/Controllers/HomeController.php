<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stud = User::findOrFail(Auth::user()->id)->get()->first();
        //dd($stud->password);
        if (password_verify ( 'ghanastudent', $stud->password )) {
            //dd('uu');
          flash('You have to change the default password on your account.')->warning();
        }
        return view('student.index');
    }
}
