<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        return Notification::whereUserId(auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
     }
     public function notificationMarkRead(Request $request){
         Notification::where('user_id', auth()->user()->id)->whereId($request->id)->update(['is_read'=> '1']);
         return response()->json(['message' => 'Notification marked as read!']);
     }
     public function clearBellBadge(){
         User::whereId(auth()->user()->id)->update(['bell_notification_count'=> 0]);
     }
     public function notificationSettings(){
        $checkExists = NotificationSetting::whereUserId(auth()->user()->id)->first();
        if(!$checkExists){
           NotificationSetting::create(['user_id'=> auth()->user()->id, 'setting_name'=> 'notification_contact_added', 'status'=> 'enabled']);
           NotificationSetting::create(['user_id'=> auth()->user()->id, 'setting_name'=> 'notification_specific_deal_stage', 'status'=> 'enabled']); 
        }
        $data = NotificationSetting::whereUserId(auth()->user()->id)->get();
        return view('notifications.setting', ['data'=>$data]);
     }
     public function updateNotificationSetting(Request $request){
       NotificationSetting::whereId($request->id)->update(['status'=> $request->status]);
       return response()->json(['message' => 'Notification updated successfully!']);
     }

}
