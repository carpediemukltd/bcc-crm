<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Validator;
use Hash;
use Mail;
use App\Models\User;

session_start();
class StagesController 
{
   function __construct(){
      ini_set('max_execution_time', -1);
      $this->data['current_slug'] = '';

      if(isset($_SESSION['user_role']) && !empty($_SESSION['user_role'])){
         $this->data['login_user'] = User::whereId($_SESSION['id'])->first();
      }else{
         $this->data['login_user'] = [];
      }
   }

   public function stagesview(){
      return view('admin.stagesview', $this->data);
   }
   public function contactlisting(){
      return view('admin.contactlisting', $this->data);
   }
   public function contactdetails(){
      return view('admin.contactdetails', $this->data);
   }
   public function customfields(){
      return view('admin.customfields', $this->data);
   }
   public function dealslisting(){
      return view('admin.dealslisting', $this->data);
   }
   public function fieldlisting(){
      return view('admin.fieldlisting', $this->data);
   }
   public function viewportal(){
      return view('admin.viewportal', $this->data);
   }
}
