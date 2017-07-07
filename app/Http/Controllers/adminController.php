<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Guardian;
use App\Staff;
use App\Studentparent;
use App\Resultchange;
use App\Resultupdate;
use Auth;

class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $add = Admin::findOrFail(Auth::user()->id)->get()->first();
        //dd($staff->password);
        if (password_verify ( 'ghanaadmin', $add->password )) {
            //dd('uu');
          flash('You have to change the default password on your account.')->warning();
        }

        $staff = Staff::select('*')->get();
        $guard = Guardian::select('*')->get();
        $admin = Admin::select('*')->get();
        $student = User::select('*')->get();
        $studentP = Studentparent::select('*')->where('state','pending')->get();
        $resultCh = Resultupdate::select()->where('state', 'pending')->get();


        $s = sizeof($staff);
        $g = sizeof($guard);
        $a = sizeof($admin);
        $u = sizeof($student);
        $sp = sizeof($studentP);
        $rc = sizeof($resultCh);

        
        return view('admin.index', compact('s','g','a','u','sp','rc'));
    }
}
