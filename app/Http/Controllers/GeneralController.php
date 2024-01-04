<?php

namespace App\Http\Controllers;

use App\Jobs\CleanDummyData;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
   public function privacySetting()
   {
      $this->data['current_slug'] = 'Privacy Setting';
      return view('privacysetting', $this->data);
   } //privacySetting


   public function userList()
   {
      return view('general.userlist');
   }

   public function userProfile()
   {
      return view('general.userprofile');
   }

   public function userAdd()
   {
      return view('general.useradd');
   }

   public function userForm()
   {
      return view('general.userform');
   }

   public function userTable()
   {
      return view('general.usertable');
   }

   public function contactDetails()
   {
      return view('general.contactdetails');
   }

   public function outlinedIcon()
   {
      return view('general.outlinedicon');
   }
   public function stagesCard()
   {
      return view('general.stagescard');
   }
   public function dealsListing()
   {
      return view('general.dealslisting');
   }
   public function companyOnboarding()
   {
      return view('general.companyOnboarding');
   }
   public function dynamicBanner()
   {
      return view('general.dynamicbanner');
   }
   public function help()
   {
      return view('help');
   }
   public function contact()
   {
      return view('contact');
   }
   public function about()
   {
      return view('about');
   }
   public function robinsetting()
   {
      return view('robinsetting');
   }
   public function editsetting()
   {
      return view('editsetting');
   }
   public function robinaddsetting()
   {
      return view('robinaddsetting');
   }
   public function boardview()
   {
      return view('boardview');
   }
   public function dealsboardview()
   {
      return view('dealsboardview');
   }
   public function searchingBar()
   {
      return view('searching-bar');
   }
   public function getCleanDummyData()
   {
      $data['current_slug'] = 'Clean Dummy Data';
      $data['slug']         = 'clean_data';
      return view('admin.clean-data', $data);
   }

   public function postCleanDummyData(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'column'    => 'required|in:first_name,last_name,email,phone_number,status,created_at',
         'operators' => 'required|in:=,!=,<,<=,>,>=,contains,starts_with,ends_with',
         'value'     => 'required',
      ]);

      if ($validator->fails()) {
         return redirect()->back()->with(['error' => $validator->errors()->first()], 403);
      }

      // Get form data
      $column     = $request->input('column');
      $operator   = $request->input('operators');
      $value      = $request->input('value');
      $userEmail  = auth()->user()->email;

      // Dispatch the job with form data
      $data = [
         'column'    => $column,
         'operator'  => $operator,
         'value'     => $value,
         'userEmail' => $userEmail,
      ];
      $query = User::query();

      if ($operator === 'contains') {
         $query->where($column, 'LIKE', '%' . $value . '%');
      } elseif ($operator === 'starts_with') {
         $query->where($column, 'LIKE', $value . '%');
      } elseif ($operator === 'ends_with') {
         $query->where($column, 'LIKE', '%' . $value);
      } else {
         $query->where($column, $operator, $value);
      }

      $usersExist = $query->count();

      if (!$usersExist) {
         return redirect()->back()->with('error', 'There are no users found with the filters you selected!');
      }
      CleanDummyData::dispatch($data);

      return redirect()->back()->with('success', 'You will be notified on you email address once data is erased successfully!');
   }
}
