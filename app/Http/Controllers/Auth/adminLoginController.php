<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class adminLoginController extends Controller

{
    public function __construct(){
	$this->middleware('guest:admin');
	}

    public function showLoginForm()
    {
    	return view('auth.adminlogin');
    }

    public function login(Request $request)
    {
    	//Validate form data 
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	//Attempt to log the admin in
    	if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password' => $request->password])) {
    		//if successful, then redirect to thier inttended location

    		return redirect()->intended(route('admin.index'));
    	};

    	//if unsuccessful, then redirect back to the login form with form data

    	return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
