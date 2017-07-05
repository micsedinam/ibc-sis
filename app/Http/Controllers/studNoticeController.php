<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Auth;

class studNoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function viewNotice()
    {
        $notice = Notice::select('notices')
            ->where('group', '=', Auth::user()->programme)
            ->select('post_title', 'post_category', 'message', 'date', 'group')
            ->latest()
            ->get();

        $general = Notice::select('notices')
            ->where('group', '=', 'General Notice')
            ->select('post_title', 'post_category', 'message', 'date', 'group')
            //->paginate(5)
            ->latest()
            ->get();

            /*$general = Notice::paginate(2)
                    ->where('group', '=', 'General Notice');*/

        //dd($notice, $general);

        return view('student.notice') ->with('notice', $notice) ->with('general', $general);
    }
}
