<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\NotificationSettingDetail;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $data = Notification::whereUserId(auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('notifications.notifications', ['data'=> $data]);
     }
     public function notificationMarkRead(Request $request){
         Notification::where('user_id', auth()->user()->id)->whereId($request->id)->update(['is_read'=> '1']);
         return response()->json(['message' => 'Notification marked as read!']);
     }
     public function clearBellBadge(){
         User::whereId(auth()->user()->id)->update(['bell_notification_count'=> 0]);
     }
     public function notificationSettings(){
        $data['settings'] = NotificationSetting::whereUserId(auth()->user()->id)->with('detail')->get();
        $data['stages']    = Stage::get();
        if(!count($data['settings'])){
           NotificationSetting::create(['user_id'=> auth()->user()->id, 'setting_name'=> 'notification_contact_added', 'status'=> 'disabled']);
           NotificationSetting::create(['user_id'=> auth()->user()->id, 'setting_name'=> 'notification_specific_deal_stage', 'status'=> 'disabled']);
           NotificationSetting::create(['user_id'=> auth()->user()->id, 'setting_name'=> 'notification_round_robin', 'status'=> 'disabled']);  
           $data['settings'] = NotificationSetting::whereUserId(auth()->user()->id)->with('detail')->get();
        }
    
        return view('notifications.setting', ['data'=> $data]);
     }
     public function updateNotificationSetting(Request $request){
       NotificationSetting::whereId($request->id)->update(['status'=> $request->status]);
       return response()->json(['message' => 'Notification updated successfully!']);
     }
     public function updateStageSettingsOptions(Request $request){
        NotificationSettingDetail::where('notification_settings_id',$request->settingId)->delete();
        if($request->selectedOptions){
            $stageIds = explode(',', $request->selectedOptions);
            foreach ($stageIds as  $stageId) {
                NotificationSettingDetail::create(['notification_settings_id'=> $request->settingId, 'stage_id'=> $stageId]);
            } 
        }
        return response()->json(['message' => 'Deal Stages updated successfully!']);
     }

}
