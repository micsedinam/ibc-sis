<?php

namespace App\Http\Controllers;

use App\studFees;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class tryController extends Controller
{
    public function importItem()
    {
        return view('newImport');
    }
    public function handleImport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        /*$user = User::where('studentid', '=', Input::get('studentid'))->first();
        if ($user === null) {
            $message = flash('Student does not exist, Kindly review your list')->error();
            return redirect()
                ->back()
                ->withErrors($message);
        }*/
        $file = $request->file('file');
        $csvData = file_get_contents($file);
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        dd($rows);
        $header = array_shift($rows);

        foreach ($rows as $row) {
            $row = array_combine($header, $row);
            studFees::create([
                'studentid' => $row['studentid'],
                'term' => $row['term'],
                'academicyear' => $row['academicyear'],
                'amt_due' => $row['amt_due'],
                'amt_rem' => $row['amt_rem'],
                'amt_paid' => $row['amt_paid'],
            ]);
        }
        flash('Fees imported');
        return redirect()->back();
    }
}
