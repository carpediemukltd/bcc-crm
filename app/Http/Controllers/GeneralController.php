<?php

 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\User;

 class GeneralController extends Controller
 {
   public function privacySetting(){
      $this->data['current_slug'] = 'Privacy Setting';
      return view('privacysetting', $this->data);
   } //privacySetting
   
   

   public function adminList(){
      return view('adminlist');
   }
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
 }
