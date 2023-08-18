<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{

    public static function recent()
    {
        $data['notifications'] = Notification::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->limit(5)->get();
        $data['bell_notification_count'] = auth()->user()->bell_notification_count;
        return $data;
    }
}
