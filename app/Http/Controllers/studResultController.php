<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use Auth;
use App\Setting;
use App\Resultchange;

class studResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showresult()
    {
        $setting = Setting::select('*')->latest()->get()->first();
        // return $Setting;

        $result = Results::select('*')
            ->where('academicyear','=',$setting->acyear)
            ->where('term','=',$setting->term)
            ->where('studentid','=',Auth::user()->studentid)
            ->get()
        ;
        $requested = Resultchange::select('*')
            ->where('studid', Auth::user()->studentid)
            ->get();

        // dd($requested);

        return view ('student.results', compact('requested')) ->with ('result', $result);
    }
}
