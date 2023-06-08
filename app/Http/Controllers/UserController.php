<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomFields;
use DB;
use Validator;
// use Hash;
use Mail;
use App\Core\Chat\Soachat;

session_start();
class UserController extends Controller
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

   public function index(){
      if(empty($_SESSION)){
         return redirect(url('login'));
      }
      $this->data['current_slug'] = 'dashboard';
      return view("admin.dashboard", $this->data);
   }

   public function Profile(Request $request){
      if(empty($_SESSION)){
         return redirect(url('login'));
      } 
      if($request->first_name){
         $update_data = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'phone_number' => $request->phone_number
         ];

         if ($request->password && !$request->confirm_password) {
            $_SESSION['msg_error'] = 'Confirm password is required.';
            return redirect()->back()->withErrors('Confirm password is required.')->withInput();
         } else if ($request->password && ($request->password != $request->confirm_password)) {
            $_SESSION['msg_error'] = 'Password and Confirm password are not same.';
            return redirect()->back()->withErrors('Password and Confirm password are not same.')->withInput();
         } else if ($request->password && strlen($request->password) < 6) {
            $_SESSION['msg_error'] = 'Password must be 6 digits.';
            return redirect()->back()->withErrors('Password must be 6 digits.')->withInput();
         } else if ($request->password && strlen($request->password) >= 6 && ($request->password == $request->confirm_password)) {
            $update_data['password'] = Hash::make($request->password);
         }
         User::whereId($_SESSION['id'])->update($update_data);
         $_SESSION['msg_success'] = 'Profile Update Successfully.';
         return redirect(url('user/profile'))->withSeuucess('Profile Update Successfully.')->withInput();
      }else{
         return view("profile.edit", $this->data);
      }
   }

   public function contactListing(Request $request){
      if(empty($_SESSION)){
         return redirect(url('login'));
      }
      //orderBy('id', 'desc')->
      $this->data['rs_users'] = User::where('role', 'user')->paginate(5);
      if($request->ajax()){
         $this->data['rs_users'] = User::where('role', 'user')
                                       ->when($request->seach_term, function($q)use($request){
                                          $q->where('first_name', 'like', '%'.$request->seach_term.'%')
                                          ->orWhere('last_name', 'like', '%'.$request->seach_term.'%')
                                          ->orWhere('email', 'like', '%'.$request->seach_term.'%')
                                          ->orWhere('phone_number', 'like', '%'.$request->seach_term.'%');
                                    })
                                    ->when($request->status, function($q)use($request){
                                          $q->where('status',$request->status);
                                    })
                                    ->when($request->start_date, function($q)use($request){
                                          $q->whereBetween('created_at', [$request->start_date, $request->end_date]);
                                    })
                                    ->paginate(5);

         return view('admin.contact.contact_pagination', $this->data)->render();
      }
      $this->data['current_slug'] = 'contact_listing';
      return view('admin.contact.contactlisting', $this->data);
   } // contactListing

   public function CustomFields(Request $request){
      if(empty($_SESSION)){
         return redirect(url('login'));
      }
      $this->data['rs_fields'] = CustomFields::paginate(5);
      if($request->ajax()){
         $this->data['rs_fields'] = CustomFields::
                                          when($request->seach_term, function($q)use($request){
                                             $q->where('title', 'like', '%'.$request->seach_term.'%')
                                             ->orWhere('type', 'like', '%'.$request->seach_term.'%');
                                          })
                                          ->when($request->status, function($q)use($request){
                                                $q->where('type',$request->status);
                                          })
                                          ->paginate(5);
         return view('admin.customfields.fields_pagination', $this->data)->render();
      }
      $this->data['current_slug'] = 'fields_list';
      return view('admin.customfields.list', $this->data);
   } // CustomFields

   public function addField(Request $request){
      if(empty($_SESSION)){
         return redirect(url('login'));
      }
      if($request->title){
         CustomFields::create([
            'title' => $request->title,
            'type'  => $request->type
         ]);
         $_SESSION['msg_success'] = 'Create Custom Field Successfully.';
         return redirect(url('user/customfields'))->withSeuucess('Create Custom Field Successfully.')->withInput();
      }else{
         $this->data['current_slug'] = 'fields_list';
         return view('admin.customfields.add', $this->data);
      }   
   } // addField

   public function editField(Request $request, $id){
      if(empty($_SESSION)){
         return redirect(url('login'));
      }
      if($request->title){
         CustomFields::whereId($id)->update(['title' => $request->title]);
         $_SESSION['msg_success'] = 'Update Custom Field Successfully.';
         return redirect(url('user/customfields'))->withSeuucess('Update Custom Field Successfully.')->withInput();
      }else{
         $this->data['rs_field']     = CustomFields::whereId($id)->first();
         $this->data['current_slug'] = 'fields_list';
         return view('admin.customfields.edit', $this->data);
      }   
   } // editField

   public function deleteField($id){
      if(empty($_SESSION)){
         return redirect(url('login'));
      }
      CustomFields::whereId($id)->delete();
      
      $_SESSION['msg_success'] = 'Delete Custom Field Successfully.';
      return redirect(url('user/customfields'))->withSeuucess('Delete Custom Field Successfully.')->withInput();
   } // deleteField


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
      session_destroy();
      return redirect()->route('login');
   }
}
