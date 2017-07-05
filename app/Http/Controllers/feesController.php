<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;

class feesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $details = Fees::select('programme', 'description', 'amount')->get();

        return view('admin.fee-details');
    }

    public function postImport(){

        Excel::load(Input::file('fees'),function ($reader){
            $reader -> each (function ($sheet){
                Fees::firstOrCreate($sheet -> toArray());
                flash('Details uploaded successfully.') ->success();
            });
        });

        return redirect() ->back();
    }
}
