<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class guardianLoginController extends Controller

{
    public function __construct(){
    $this->middleware('guest:guardian');
    }

    public function showLoginForm()
    {
        return view('auth.guardianLogin');
    }

    public function login(Request $request)
    {
        //Validate form data 
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //Attempt to log the admin in
        if (Auth::guard('guardian')->attempt(['email'=> $request->email, 'password' => $request->password])) {
            //if successful, then redirect to thier inttended location

            return redirect()->intended(route('guardian.index'));
        };

        //if unsuccessful, then redirect back to the login form with form data

        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout()
    {
        Auth::guard('guardian')->logout();
        return redirect('/guardian');
    }
}
