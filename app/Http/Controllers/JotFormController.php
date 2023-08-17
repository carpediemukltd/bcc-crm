<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Deals;
use App\Models\Stages;
use App\Models\Pipelines;
use App\Models\UserOwner;
use App\Models\UserDetails;
use App\Helpers\Permissions;

use App\Models\CustomFields;
use Illuminate\Http\Request;
use App\Models\RoundRobinSetting;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class JotFormController extends Controller
{
    protected $user;
    protected $data;
    protected $company_id = 0;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->data['user'] = $this->user;
            if(Auth::user()){
            if ($this->user->role != 'superadmin') {
                $this->company_id = $this->user->company_id;
            }
        }
            return $next($request);
        });
    }

    public function addUser(Request $request)
    {
     
        $this->data['current_slug'] = 'Add Contact';
        $this->data['slug']         = 'add_user_jotform';
        $company_id = 1;
        $this->data['round_robin_owner'] =  RoundRobinSetting::RoundRobinOwner($company_id);

        if ($request->isMethod('post')) {

            $data['first_name'] = $request->full_name['first'];
            $data['last_name'] = $request->full_name['last'];
            $data['email'] = $request->email;
            $data['phone_number'] = preg_replace("/[^0-9]/", '', $request->phonenumber['full']);
            $data['role'] = 'user';
            $data['password'] = Hash::make('asdfasdf');
            $data['owner'] = $this->data['round_robin_owner']->owner_id;

            $existing_user = User::where('email', $request->email)->first();
            if ($existing_user) {
                unset($data['email'], $data['owner']);
                User::where('email', $request->email)->update($data);
                return redirect()->back()->withSuccess('Contact Updated Successfully.');
            }else{
                $new_user = User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_number'  => $data['phone_number'],
                    'role' => $data['role'],
                    'company_id' => $company_id,
                    'password' => $data['password']
                ]);

                if ($data['role'] == 'user' && $data['owner'] > 0) {
                    UserOwner::create([
                        'user_id' => $new_user->id,
                        'owner_id' => $data['owner']
                    ]);
                    RoundRobinSetting::where('company_id', $company_id)->where('owner_id', $data['owner'])
                    ->update(['last_lead' => date("Y-m-d H:i:s")]);
                }
                return redirect()->back()->withSuccess('Contact Created Successfully.');
            }
        }
    }
}
