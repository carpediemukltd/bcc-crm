<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Validator;
use Hash;
use Mail;

class GeneralController extends Controller
{
   public function index(){
      return view('index');
   }
}