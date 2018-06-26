<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\studentRequest;
use App\Student;
use App\User;
use App\Programme;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Excel;
use DB;

class studentregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $student = User::select('firstname', 'surname', 'othername','dob','gender','phone','address','email','programme','studentid', 'class')->get();

        $programme = Programme::select('name')
                                ->groupBy('name')
                                ->get();


        return view('admin.register-student')->with('student', $student) ->with('programme', $programme);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(studentRequest $request)
    {
       // dd($request->all());

         // if(stristr($request['programme'], '@')!== false){
         //    dd('');
         // }

        // $short = substr($request['programme'],0,2);
        // dd($short);
        $clas = substr($request['class'],0,4);
        //$stud = substr($request['studentid'],0,2);
        //dd($clas);
        $dt = Carbon::now();
        //$bt = Carbon::now()->addYear();
        // set some things
        $now = substr($dt->year, 2, 3);
        //dd($now);

        //$next = substr($bt->year, 1, 3);
        //dd($next);


        $prifdate = $now;
        switch ($clas) {
            case 'rtp':
                $stud = 'RTP';
               if ($stud !== 'RTP') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                $programme = 'RTP';
               }
                break;
            case 'tp':
                $stud = 'TP';
             if ($stud !== 'TP') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                    $programme = 'TP';
                }
                 break;
            case 'rp':
                $stud = 'RP';
                if ($stud !== 'RP') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                   $programme = 'RP';
               }
               break;
            case 'tpfa':
                $stud = 'TPACT';
                if ($stud !== 'TPACT') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                    $programme = 'TPACT';
                }
                break;
            case 'vch':
                $stud = 'VEDCH';
                if ($stud !== 'VEDCH') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                    $programme = 'VEDCH';
                }
                break;
            case 'ved':
                $stud = 'VED';
                if ($stud !== 'VED') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                    $programme = 'VED';
                }
                break;
            case 'ch':
                $stud = 'CH';
                if ($stud !== 'CH') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                    $programme = 'CH';
                }
                break; 
            case 'vse':
                $stud = 'VEDSE';
                if ($stud !== 'VEDSE') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                    $programme = 'VEDSE';
                }
                break;
            case 'av':
                $stud = 'ADCVED';
                if ($stud !== 'ADCVED') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                    $programme = 'ADCVED';
                }
                break;            
            default:
                $stud = 'FDACT';
            if ($stud !== 'FDACT') {
                  flash('Ooops, Student Id '.$request['studentid'].' cannot be in the selected class.')->error();
                  return back();
               }else{
                    $programme = 'FDACT';
                }
                break;
        }

        $student = new User();


        $student->firstname = $request['firstname'];
        $student->surname = $request['surname'];
        $student->othername = $request['othername'];
        $student->dob = $request['dob'];
        $student->gender = $request['gender'];
        $student->phone = $request['phone'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->programme = $programme;
        $student->class = $request['class'];
        $student->studentid = $programme.$prifdate.$request['studentid'];
        $student->password = bcrypt('ghanastudent');

        $full = $student->firstname.' '.$student->surname.' '.$student->othername;
        //dd($student);
        if ($student->save()){
              flash($full.' successfully saved.')->success();
            //echo 'saved';
        }else{
             flash($full.' not saved.')->error();
           // echo 'Not saved';
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = User::findOrFail(Auth::user()->$id);

        $student->password = bcrypt($request['password']);

        if ($student->update()){
              flash('Password successfully saved.')->success();
            //echo 'saved';
        }else{
              flash('Password not saved.')->error();
            //echo 'Not saved';
        }

        return redirect()->back() ->with('student', $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function subresults()
    {

        $class = User::select('class')
            ->groupBy('class')
            ->get();

        return view('admin.manage-students')
            ->with('class', $class)
            ;
    }

    public function classList(Request $request)
    {
        //dd($request->all());
        $myclass = $request['class'];
        $myid = $request['academicyear'];

        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name,
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.

        $classList = User::select('*')
                            ->where('class', '=', $myclass)
                            ->where('studentid', '=', '%'.$myid.'%')
                            ->select('studentid')
                            ->get();
        //dd($classList);

        // Initialize the array which will be passed into the Excel
        // generator.
        $classListArray = [];

        // Define the Excel spreadsheet headers
        $classListArray[] = ['studentid','term','academicyear','staffid', 'ca_score', 'exam_score', 'total', 'grade'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($classList as $item) {
            $classListArray[] = $item->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Edu Hub Class List Export', function($excel) use ($classListArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Class List');
            $excel->setCreator('EDU HUB SIS')->setCompany('Notre Dame Girls SHS');
            $excel->setDescription('Results Marksheet');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($classListArray) {
                $sheet->fromArray($classListArray, null, 'A1', false, false);
            });

        })->download('csv');

        return view('admin.manage-students')
            ->with('myid', $myid)
            ->with('myclass', $myclass)
            ;

    }
}
