<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ConversationLog;
use App\Services\ApiResponse;
use App\Http\Controllers\Controller;


class ConversationLogController extends Controller
{
    public function trackConversation($tracking_hash)
    {
        $log = ConversationLog::where(['tracking_hash' => $tracking_hash, 'is_tracking' => '1'])->first();
        if ($log) {
            ConversationLog::where(['tracking_hash' => $tracking_hash, 'is_tracking' => '1'])->update(['is_read' => '1', 'read_date' => date("Y-m-d H:i:s")]);
        }
        $pixel=include('assets/images/pixel.gif');
        return response($pixel)->header('Content-Type', 'image/gif');

    }
}
