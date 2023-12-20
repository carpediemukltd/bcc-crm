<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KixieLog;

class KixieLogController extends Controller
{
    public function list($type){
        $logs = KixieLog::whereType($type)->paginate(10);
        return view('logs.list')->with(['logs' => $logs, 'type' => $type]);
    }

    public function details($id){
        $log_details = KixieLog::whereId($id)->first();
        return view('logs.detail')->with(['details' => $log_details, 'type' => $log_details->type]);
        echo "<pre>".print_r(unserialize($log_details->data),1)."</pre>";exit;
    }
}
