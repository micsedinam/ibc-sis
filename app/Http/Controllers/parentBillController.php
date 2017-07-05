<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studFees;
use App\Fees;
use App\User;

class parentBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:guardian');
    }

    public function index()
    {
    	$mybill = ['studentid'];

        //dd($mybill);

        $bill = studFees::select('*')
                        ->where('studentid','=',$mybill)
                        ->latest()
                        ->get()
        ;


        $bills = Fees::select('fees')
                        ->join('users', 'fees.programme', '=', 'users.programme')
                        ->where('users.studentid', '=', $mybill)
                        ->select('fees.*')
                        ->get()
        ;
        //dd($bills);

        $student = User::select('users')
        				->where('studentid', '=', $mybill)
        				->select('firstname', 'surname', 'programme', 'studentid')
        				->get()
        ;


        //dd(Auth::user()->stud_id);
        //dd($bill);
        return view ('guardian.fees') ->with ('bill', $bill) ->with ('bills', $bills) ->with ('student', $student);
    }

    public function view(Request $request)
    {

        $mybill = $request['studentid'];

        //dd($mybill);

        $bill = studFees::select('*')
                        ->where('studentid','=',$mybill)
                        ->latest()
                        ->get()
        ;


        $bills = Fees::select('fees')
                        ->join('users', 'fees.programme', '=', 'users.programme')
                        ->where('users.studentid', '=', $mybill)
                        ->select('fees.*')
                        ->get()
        ;
        //dd($bills);

        $student = User::select('users')
        				->where('studentid', '=', $mybill)
        				->select('firstname', 'surname', 'programme', 'studentid')
        				->get()
        ;

        //dd($bill, $bills, $student);
        return view ('guardian.fees') ->with ('bill', $bill) ->with ('bills', $bills) ->with ('student', $student);
    }
}
