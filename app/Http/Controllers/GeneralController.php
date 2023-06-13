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
   
   public function outlinedIcon(){
      return view('general.outlinedicon');
   }
 }
