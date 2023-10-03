<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    //

    public function list(Request $request)
    {

        // dd("abc");
        $activityReport  = ActivityLog::all();
        $user = User::all();

        return view("LogReport.list", compact('activityReport','user')); 
    }

}
