<?php

namespace App\Http\Controllers;

use App\studFees;
use App\Fees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class studBillController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $student = DB::table('');


    }

    public function showbill()
    {

        $bill = studFees::select('*')
                        ->where('studentid','=',Auth::user()->studentid)
                        ->latest()
                        ->get()
                        ->first()
        ;

        //dd($bill);

        $bills = Fees::select('*')
                        ->where('programme','=',Auth::user()->programme)
                        ->get()
        ;
        //dd(Auth::user()->stud_id);
        //dd($bill);
        return view ('student.fees') ->with ('bill', $bill) ->with ('bills', $bills);
    }

}
