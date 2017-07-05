<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use Illuminate\Support\Facades\Input;
use Excel;
use DB;

class resultController extends Controller
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

    public function index()
    {
        $results = Results::select('studentid', 'subject_title', 'academicyear', 'term', 'ca_score', 'exam_score', 'total', 'grade')->get();

        return view('admin.results');
    }

    public function postImport()
    {

        Excel::load(Input::file('results'),function ($reader){
            $reader -> each (function ($sheet){
                Results::firstOrCreate($sheet -> toArray());
            });
        });

        return redirect() ->back();
    }

    public function resultsrecords()
    {
        $results = Results::select('id', 'studentid', 'subject_title', 'academicyear', 'term', 'ca_score', 'exam_score', 'total', 'grade')->get();

        return view('admin.manage-results') ->with('results', $results);
    }

}
