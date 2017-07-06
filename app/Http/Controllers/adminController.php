<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Guardian;
use App\Staff;

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
        $staff = Staff::select('*')->get();
        $guard = Guardian::select('*')->get();
        $admin = Admin::select('*')->get();
        $student = User::select('*')->get();

        $s = sizeof($staff);
        $g = sizeof($guard);
        $a = sizeof($admin);
        $u = sizeof($student);
        
        return view('admin.index', compact('s','g','a','u'));
    }
}
