<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Validator;
use Hash;
use Mail;

class StagesController 
{
   public function stagesview(){
      return view('admin.stagesview');
   }
   public function contactlisting(){
      return view('admin.contactlisting');
   }
   public function contactdetails(){
      return view('admin.contactdetails');
   }
   public function customfields(){
      return view('admin.customfields');
   }
   public function dealslisting(){
      return view('admin.dealslisting');
   }
   public function fieldlisting(){
      return view('admin.fieldlisting');
   }
   public function viewportal(){
      return view('admin.viewportal');
   }
}
