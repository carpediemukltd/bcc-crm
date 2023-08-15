<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        return Notification::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
     }
     public function notificationMarkRead(Request $request){
         Notification::where('user_id', auth()->user()->id)->whereId($request->id)->update(['is_read'=> '1']);
         return response()->json(['message' => 'Notification marked as read!']);
     }
     public function clearBellBadge(){
         User::whereId(auth()->user()->id)->update(['bell_notification_count'=> 0]);
     }
}
