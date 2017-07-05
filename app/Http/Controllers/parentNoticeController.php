<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Auth;

class parentNoticeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:guardian');
    }

    public function viewNotice()
    {
        $notice =Notice::select('notices')
            ->where('group', '=', Auth::user()->group)
            ->select('post_title', 'post_category', 'message', 'date', 'group')
            ->get();

        $general =Notice::select('notices')
            ->where('group', '=', 'General Notice')
            ->select('post_title', 'post_category', 'message', 'date', 'group')
            ->get();

        //dd($notice, $general);

        return view('guardian.notice') ->with('notice', $notice) ->with('general', $general);
    }
}
