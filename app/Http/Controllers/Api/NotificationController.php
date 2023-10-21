<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $limit  = $request->limit??10;
        $offset = $request->offset??0;
        $data   = Notification::whereUserId(auth()->user()->id)->limit($limit)->offset($offset)->orderBy('created_at', 'desc')->get();
        return ApiResponse::success($data, '', 200);
    }
    public function clearBellBadge()
    {
        User::whereId(auth()->user()->id)->update(['bell_notification_count' => 0]);
        return ApiResponse::success([], 'Cleared Bell Badge.', 200);
    }
    public function notificationMarkRead(Request $request, $id = null)
    {
        $query = Notification::byUserId(auth()->user()->id);
        if ($id) {
            $query->whereId($id)->markAsRead();
            $message = 'Notification marked as read.';
        } else {
            $query->markAsRead();
            $message = 'Notifications marked as read.';
        }
        return ApiResponse::success([], $message, 200);
    }
}
