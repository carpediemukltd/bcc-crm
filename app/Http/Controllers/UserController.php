<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use DB;
use Validator;
// use Hash;
use Mail;
use App\Core\Chat\Soachat;



class UserController extends Controller
{

   public function Index(){
      // return view('admin.profile.index');
   }

   public function Profile(Request $request){
      if($request->first_name){
         $updat_data = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'phone_number' => $request->phone_number
         ];

         if($request->password && !$request->password_confirmation){
            return redirect()->back()->withErrors('Confirm password is required.')->withInput();
         }else if($request->password && ($request->password != $request->password_confirmation)){
            return redirect()->back()->withErrors('Password and Confirm password are not same.')->withInput();
         }else if($request->password && strlen($request->password) < 6){
            return redirect()->back()->withErrors('Password must be 6 digits.')->withInput();
         }else if($request->password && strlen($request->password) >= 6 && ($request->password == $request->password_confirmation)){
            $updat_data['password'] = Hash::make($request->password);
         }
         User::whereId(Auth::user()->id)->update($updat_data);
         return redirect(url('user/profile'))->withSeuucess('Profile Update Successfully.')->withInput();
      }else{
         return view("profile.index");
      }
   }

   public function editProfile(){
      return view("profile.edit");
   }

   public function dashboard(){
      return view("admin.dashboard");
   }

   private function _existSuperAdmin(){
      if(Auth()->user()->role != 'superadmin'){
         return redirect(url('user/dashboard')); 
      }
   }
   
   public function users(){
      // $all_users = User::where('id','!=', Auth()->user()->id)->get();
      $all_users = User::whereNotIn('id', [1, Auth()->user()->id])->get();
      return view("admin.userlisting", ['users' => $all_users]);
   }
   
   public function addUser(Request $request){
      $this->_existSuperAdmin();
      if($_POST){
         $insert_data = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'role'         => $request->role,
            'status'       => $request->status
         ];

         if($request->password && ($request->password != $request->confirm_password)){
            return redirect()->back()->withErrors('Password and Confirm password are not same.')->withInput();
         }else if($request->password && strlen($request->password) < 6){
            return redirect()->back()->withErrors('Password must be 6 digits.')->withInput();
         }else if($request->password && strlen($request->password) >= 6 && ($request->password == $request->confirm_password)){
            $insert_data['password'] = Hash::make($request->password);
         }

         User::create($insert_data);
         return redirect(url('user/all'))->withSeuucess('Create User Successfully.')->withInput();
      }else{
         return view("admin.create");
      }
   }

   public function editUser(Request $request, $id){
      $this->_existSuperAdmin();
      if($_POST){
         $update_data = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'role'         => $request->role,
            'status'       => $request->status
         ];

         if($request->password && !$request->confirm_password){
            return redirect()->back()->withErrors('Confirm password is required.')->withInput();
         }else if($request->password && ($request->password != $request->confirm_password)){
            return redirect()->back()->withErrors('Password and Confirm password are not same.')->withInput();
         }else if($request->password && strlen($request->password) < 6){
            return redirect()->back()->withErrors('Password must be 6 digits.')->withInput();
         }else if($request->password && strlen($request->password) >= 6 && ($request->password == $request->confirm_password)){
            $update_data['password'] = Hash::make($request->password);
         }

         User::whereId($id)->update($update_data);
         return redirect(url('user/all'))->withSeuucess('User Update Successfully.')->withInput();
      }else{
         $this->data['user']   = User::where('id', $id)->first();
         $this->data['roles']  = ['admin', 'user'];
         $this->data['status'] = ['inactive', 'active', 'deleted', 'banned'];
         return view("admin.edit", $this->data);
      }
   }

   public function logout(){
      Auth::guard('user')->logout();
      return redirect()->route('home');
   }
}
