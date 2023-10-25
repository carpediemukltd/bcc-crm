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
        $limit  = $request->limit ?? 10;
        $offset = $request->offset ?? 0;
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
            $notification = $query->find($id);
            if ($notification) {
                $notification->markAsRead();
                return ApiResponse::success([], 'Notification marked as read.', 200);
            } else {
                return ApiResponse::error('Notification not found.', 404);
            }
        } else {
            $query->markAsRead();
            return ApiResponse::success([], 'Notifications marked as read.', 200);
        }
       
    }
}
