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
use PhpParser\Node\Stmt\Else_;

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
            if (Auth::user()) {
                if ($this->user->role != 'superadmin') {
                    $this->company_id = $this->user->company_id;
                }
            }
            return $next($request);
        });
    }

    public function addUser(Request $request)
    {
        //    dd($request);
        $this->data['current_slug'] = 'Add Contact';
        $this->data['slug']         = 'add_user_jotform';
        $company_id = 1;
        $data = array();
        $this->data['round_robin_owner'] =  RoundRobinSetting::RoundRobinOwner($company_id);
        $user_type = "";
        if ($request->isMethod('post')) {

            if (isset($request->legalbusiness6)) {
                $name_arr  =  explode(" ", $request->legalbusiness6);
                $data['first_name'] = $name_arr[0];
                $data['last_name'] = $name_arr[1];
            } else if (isset($request->full_name)) {
                $data['first_name'] = $request->full_name['first'];
                $data['last_name'] = $request->full_name['last'];
            }
            $data['email'] = $request->email;
            if (isset($request->phoneNumber)) {
                $data['phone_number'] = preg_replace("/[^0-9]/", '', $request->phoneNumber['full']);
            } else if (isset($request->phonenumber['full'])) {
                $data['phone_number'] = preg_replace("/[^0-9]/", '', $request->phonenumber['full']);
            } else if (isset($request->businessnumber['phone'])) {
                $data['phone_number'] = preg_replace("/[^0-9]/", '', $request->businessnumber['phone']);
            } else if (isset($request->phonenumber)) {
                $data['phone_number'] = preg_replace("/[^0-9]/", '', $request->phonenumber);
            }


            $data['role'] = 'user';
            $data['password'] = Hash::make('asdfasdf');
            $data['owner'] = $this->data['round_robin_owner']->owner_id;
            $user_owner = $data['owner'];
            $user_id = 0;
            $existing_user = User::where('email', $request->email)->first();
            if ($existing_user) {
                $user_type = "existing";
                unset($data['email'], $data['owner']);
                User::where('email', $request->email)->update($data);
                $user = User::where('email', $request->email)->first();
                $user_id = $user->id;
                // return redirect()->back()->withSuccess('Contact Updated Successfully.');
            } else {
                $user_type = "new";
                $user = User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_number'  => $data['phone_number'],
                    'role' => $data['role'],
                    'company_id' => $company_id,
                    'password' => $data['password']
                ]);
                $user_id = $user->id;
                if ($data['role'] == 'user' && $data['owner'] > 0) {
                    UserOwner::create([
                        'user_id' => $user->id,
                        'owner_id' => $user_owner
                    ]);
                    RoundRobinSetting::where('company_id', $company_id)->where('owner_id', $user_owner)
                        ->update(['last_lead' => date("Y-m-d H:i:s")]);
                    $fields = array();
                }
                // return redirect()->back()->withSuccess('Contact Created Successfully.');
            }
            if ($user_type == "existing" || $user_type == "new") {
                if ($request->formID == 232325871332452 || $request->formID == 231903466626459) {
                    //BCCUSA Preliminary Form (Get Started Now)
                    $fields = array(
                        "Legal Business Name" => $request->legalbusiness6,
                        "Amount Requested" => $request->amountrequested,
                        "Business Address" => $request->businessaddress['addr_line1'] . " " . $request->businessaddress['addr_line2'],
                        "Business City" => $request->businessaddress['city'],
                        "Business State" => $request->businessaddress['state'],
                        "Business Zip Code" => $request->businessaddress['postal'],
                        "Business Structure/Type" => $request->businessstructuretype,
                        "Industry Type" => $request->industrytype,
                        "Business Start Date" => $request->businessstart63['year'] . "-" . $request->businessstart63['month'] . "-" . $request->businessstart63['day'],
                        "Monthly Revenue" => $request->monthlyrevenue,
                        "TaxID Number" => $request->taxid,
                        "Business Website" => $request->businesswebsite,
                        "Monthly Business Rent Amount" => $request->businessWebsite97,
                        "Officer Name" => $request->officerownername['first'] . " " . $request->officerownername['last'],
                        "Owner Email" => $request->email,
                        "SSN" => $request->ssn,
                        "Home Address" => $request->homeaddress['addr_line1'] . " " . $request->homeaddress['addr_line2'],
                        "Home City" => $request->homeaddress['city'],
                        "Home State" => $request->homeaddress['state'],
                        "Home Zip Code" => $request->homeaddress['postal'],
                        "Date of Birth" => $request->dateof['year'] . "-" . $request->dateof['month'] . "-" . $request->dateof['day'],
                        "US Citizen" => $request->uscitizen,
                        "Second Owner Yes/No" => $request->doyou,
                        "Second Officer Name" => $request->secondofficerowner['first'] . " " . $request->secondofficerowner['last'],
                        "2nd Officer Email" => $request->email34,
                        "2nd Officer SSN" => $request->ssn35,
                        "2nd Officer Home Address" => $request->homeaddress36['addr_line1'] . " " . $request->homeaddress36['addr_line2'],
                        "2nd Officer Home City" => $request->homeaddress36['city'],
                        "2nd Officer Home State" => $request->homeaddress36['state'],
                        "2nd Officer Home Zip Code" => $request->homeaddress36['postal'],
                        "2nd Officer Date of Birth" => $request->dateof40['year'] . "-" . $request->dateof40['month'] . "-" . $request->dateof40['day'],
                        "2nd Officer US Citizen" => $request->ownerus81,
                    );
                } else if ($request->formID == 232325998161462 || $request->formID == 232286307893464) {
                    //Preliminary Application BCCUSA-FB Ads
                    $fields = array(
                        "Legal Business Name" => $request->legalbusiness6,
                        "Amount Requested" => $request->amountrequested,
                        "Business Address" => $request->businessaddress['addr_line1'] . " " . $request->businessaddress['addr_line2'],
                        "Business City" => $request->businessaddress['city'],
                        "Business State" => $request->businessaddress['state'],
                        "Business Zip Code" => $request->businessaddress['postal'],
                        "Business Structure/Type" => $request->businessstructuretype,
                        "Industry Type" => $request->industrytype,
                        "Business Start Date" => $request->businessstart63['year'] . "-" . $request->businessstart63['month'] . "-" . $request->businessstart63['day'],
                        "Monthly Revenue" => $request->monthlyrevenue,
                        "TaxID Number" => $request->taxid,
                        "Business Website" => $request->businesswebsite,
                        "Monthly Business Rent Amount" => $request->businesswebsite91,
                        "Officer Name" => $request->officerownername['first'] . " " . $request->officerownername['last'],
                        "Owner Email" => $request->email24,
                        "SSN" => $request->ssn,
                        "Home Address" => $request->homeaddress['addr_line1'] . " " . $request->homeaddress['addr_line2'],
                        "Home City" => $request->homeaddress['city'],
                        "Home State" => $request->homeaddress['state'],
                        "Home Zip Code" => $request->homeaddress['postal'],
                        "Date of Birth" => $request->dateof['year'] . "-" . $request->dateof['month'] . "-" . $request->dateof['day'],
                        "US Citizen" => $request->uscitizen,
                        "Second Officer Name" => $request->secondofficerowner['first'] . " " . $request->secondofficerowner['last'],
                        "2nd Officer Email" => $request->email34,
                        "2nd Officer SSN" => $request->ssn35,
                        "2nd Officer Home Address" => $request->homeaddress36['addr_line1'] . " " . $request->homeaddress36['addr_line2'],
                        "2nd Officer Home City" => $request->homeaddress36['city'],
                        "2nd Officer Home State" => $request->homeaddress36['state'],
                        "2nd Officer Home Zip Code" => $request->homeaddress36['postal'],
                        "2nd Officer Date of Birth" => $request->dateof40['year'] . "-" . $request->dateof40['month'] . "-" . $request->dateof40['day'],
                        "2nd Officer US Citizen" => $request->ownerus81,
                    );
                }
                if (is_array($fields) && count($fields) > 0) {
                    foreach ($fields as $field => $value) {
                        if (!empty($value))
                            self::saveCustomFieldData($user_id, $field, $value);
                    }
                }
            }
            
            return redirect()->back()->withSuccess('Contact Created Successfully.');
        }
    }

    private static function saveCustomFieldData($user_id, $field, $data)
    {
        $custom_field = CustomFields::firstOrCreate(
            ["title" =>  $field],
            ["title" =>  $field, "type" => "contact", "visible" => 0],
        );
        UserDetails::updateOrCreate(
            ['user_id' => $user_id, 'deal_id' => 0, 'custom_field_id' => $custom_field->id],
            ['data' => $data]
        );
    }
}
