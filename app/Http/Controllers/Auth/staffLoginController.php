<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;


class staffLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:staff');
	}

    public function showLoginForm()
    {
    	return view('auth.staffLogin');
    }
    public function login(Request $request)
    {
    	//Validate form data 
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	//Attempt to log the staff in
    	if (Auth::guard('staff')->attempt(['email'=> $request->email, 'password' => $request->password])) {
    		//if successful, then redirect to thier inttended location

    		return redirect()->intended(route('staff.index'));
    	};

    	//if unsuccessful, then redirect back to the login form with form data

    	return redirect()->back()->withInput($request->only('email', 'remember'));

    }
}
