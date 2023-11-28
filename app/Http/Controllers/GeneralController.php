<?php

 namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\DocumentManagerUser;
use App\Models\Documents;
use App\Models\MagicLink;
use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\NotificationSettingDetail;
use Illuminate\Http\Request;
 use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserOwner;
use Illuminate\Support\Facades\DB;

 class GeneralController extends Controller
 {
   public function privacySetting(){
      $this->data['current_slug'] = 'Privacy Setting';
      return view('privacysetting', $this->data);
   } //privacySetting
   

   public function userList(){
      return view('general.userlist');
   }

   public function userProfile(){
      return view('general.userprofile');
   }

   public function userAdd(){
      return view('general.useradd');
   }

   public function userForm(){
      return view('general.userform');
   }

   public function userTable(){
      return view('general.usertable');
   }

   public function contactDetails(){
      return view('general.contactdetails');
   }
   
   public function outlinedIcon(){
      return view('general.outlinedicon');
   }
   public function stagesCard(){
      return view('general.stagescard');
   }
   public function dealsListing(){
      return view('general.dealslisting');
   }
   public function companyOnboarding(){
      return view('general.companyOnboarding');
   }
   public function dynamicBanner(){
      return view('general.dynamicbanner');
   }
   public function help(){
      return view('help');
   }
   public function contact(){
      return view('contact');
   }
   public function about(){
      return view('about');
   }
   public function robinsetting(){
      return view('robinsetting');
   }
   public function editsetting(){
      return view('editsetting');
   }
   public function robinaddsetting(){
      return view('robinaddsetting');
   }
   public function boardview(){
      return view('boardview');
   }
   public function dealsboardview(){
      return view('dealsboardview');
   }
   public function searchingBar(){
      return view('searching-bar');
   }
   public function cleanupDummyUsers()
   {   
       // Step 1: Retrieve users with dummy email domains
       $userIds = User::where('email', 'like', '%mailinator.com')->orWhere('email', 'like', '%yopmail.com')->pluck('id');   
       
       // Delete deals
       Deal::whereIn('user_id', $userIds)->delete();
   
       // Delete documents and related records
       Documents::whereIn('user_id', $userIds)->each(function ($doc) {
           DB::table('ocrolus_book_detail')->where('document_id', $doc->id)->delete();
           DB::table('ocrolus_book_level_fraud')->where('document_id', $doc->id)->delete();
           DB::table('ocrolus_book_summaries')->where('book_pk', $doc->ocrolus_book_pk)->delete();
       });
       Documents::whereIn('user_id', $userIds)->delete();
   
       // Delete report details and queries
       $reportQueryIds = DB::table('report_queries')->whereIn('user_id', $userIds)->pluck('id')->toArray();
       DB::table('report_details')->whereIn('report_query_id', $reportQueryIds)->delete();
       DB::table('report_queries')->whereIn('id', $reportQueryIds)->delete();
   
       // Delete other related records
       UserDetails::whereIn('user_id', $userIds)->delete();
       UserOwner::whereIn('user_id', $userIds)->delete();
       DocumentManagerUser::whereIn('user_id', $userIds)->delete();
       MagicLink::whereIn('user_id', $userIds)->delete();
       Notification::whereIn('user_id', $userIds)->delete();
   
       // Delete notification settings and details
       $notificationSettingIds = NotificationSetting::whereIn('user_id', $userIds)->pluck('id')->toArray();
       NotificationSettingDetail::whereIn('notification_settings_id', $notificationSettingIds)->delete();
       NotificationSetting::whereIn('id', $notificationSettingIds)->delete();
   
       // Step 2: Delete users
       User::whereIn('id', $userIds)->delete();
       return count($userIds).' Users data removed successfully!';
   }
   
 }
