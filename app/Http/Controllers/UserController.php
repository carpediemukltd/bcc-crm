<?php

namespace App\Http\Controllers;

use App\Models\DocumentGroup;
use App\Models\DocumentManager;
use App\Models\Note;
use App\Models\User;
use App\Models\Deal;
use App\Models\UserAssignBankUser;
use App\Models\UserOwner;
use App\Models\UserDetails;
use App\Helpers\Permissions;
use App\Jobs\SendNotification;
use App\Models\Activity;
use App\Models\Company;
use App\Models\CustomField;
use App\Models\DocumentManagerUser;
use App\Models\Documents;
use Illuminate\Http\Request;
use App\Models\RoundRobinSetting;
use App\Models\Stage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use libphonenumber\PhoneNumberUtil;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;
use Mail;
use Twilio\Rest\Client;

class UserController extends Controller
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

    public function editProfile(Request $request)
    {
        $this->data['current_slug'] = 'My Profile';
        if ($request->isMethod('post')) {
            $phoneNumberUtil = PhoneNumberUtil::getInstance();
            $phoneNumberObj = $phoneNumberUtil->parse($request->phone_country_code.$request->phone_number, 'US');

            if(!$phoneNumberUtil->isValidNumberForRegion($phoneNumberObj,'US'))
                return redirect()->back()->with('error', 'Phone number is invalid.');

            $update_data = [
                'first_name'            => $request->first_name,
                'last_name'             => $request->last_name,
                'phone_number'          => $request->phone_country_code." ".$request->phone_number,
                'two_factor_enabled'    => $request->has('two_factor') ? '1' : '0',
            ];
            if ($request->has('two_factor')) {

                $mobileVerifiedcheckbox = $request->input('mobileVerifiedcheckbox');
                $emailVerifiedcheckbox = $request->input('emailVerifiedcheckbox');

                $mobileVerified = $request->has('mobileVerified') ? $request->input('mobileVerified') : $request->input('mobileVerifiedHidden');
                $emailVerified = $request->has('emailVerified') ? $request->input('emailVerified') : $request->input('emailVerifiedHidden');

                if (($mobileVerifiedcheckbox == 1 && $mobileVerified) && ($emailVerifiedcheckbox == 1 && $emailVerified))
                    $update_data['two_factor_type'] = 'both';
                elseif ($mobileVerifiedcheckbox == 1 && $mobileVerified)
                    $update_data['two_factor_type'] = 'phone';
                elseif ($emailVerifiedcheckbox == 1 && $emailVerified)
                    $update_data['two_factor_type'] = 'email';

                $update_data['mobile_verified'] = $mobileVerified;
                $update_data['email_verified'] = $emailVerified;
            }
            else
            {
                $mobileVerified = $request->has('mobileVerified') ? $request->input('mobileVerified') : $request->input('mobileVerifiedHidden');
                $emailVerified  = $request->has('emailVerified') ? $request->input('emailVerified') : $request->input('emailVerifiedHidden');

                $update_data['mobile_verified'] = $mobileVerified;
                $update_data['email_verified'] = $emailVerified;
            }
            if ($request->password && !$request->confirm_password) {
                return redirect()->back()->withError('Confirm password is required.')->withInput();
            } else if ($request->password && ($request->password != $request->confirm_password)) {
                return redirect()->back()->withError('Password and Confirm password are not same.')->withInput();
            } else if ($request->password && strlen($request->password) < 6) {
                return redirect()->back()->withError('Password must be 6 digits.')->withInput();
            } else if ($request->password && strlen($request->password) >= 6 && ($request->password == $request->confirm_password)) {
                $update_data['password'] = Hash::make($request->password);
            }
            User::whereId($this->user->id)->update($update_data);
            return redirect(url('profile'))->withSuccess('Profile Update Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            return view("profile", $this->data);
        }
    } // editProfile

    public function addUser(Request $request)
    {
        $this->data['current_slug'] = 'Add Contact';
        $this->data['slug']         = 'add_user';
        $user = auth()->user();
        $company_id = $request->company??$user->company_id;
        $this->data['custom_fields'] =  CustomField::getDataByUser($user->id);
        $this->data['round_robin_owner'] =  RoundRobinSetting::RoundRobinOwner($company_id);

        $this->data['owners'] = User::where('role', '=', 'owner')->where('company_id', '=', $company_id)
            ->when(($user->role == 'owner'), function ($q) use ($user) {
                $q->where('id', '=', $user->id);
            })->get();
        $owners = array();

        foreach ($this->data['owners'] as $owner) {
            array_push($owners, $owner->id);
        }
        $this->data['admins'] = User::where('role', '=', 'admin')->where('company_id', '=', $company_id)->get();

        $roles = Permissions::getSubRoles($this->user);
        $this->data['roles'] = $roles;
        if ($request->isMethod('post')) {
            if (!in_array($request->role, $roles)) {
                return redirect()->back()->with('error', 'You\'ve selected an invalid role.')->withInput();
            }

            $validate = [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'role' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ];

            if (in_array($request->role, ['user', 'contact'])) {
                $validate['document_types'] = 'required|array|min:1';
                $validate['document_types.*'] = 'exists:document_managers,id';
            }

            $request->validate($validate);
            $phoneNumberUtil = PhoneNumberUtil::getInstance();
            $phoneNumberObj = $phoneNumberUtil->parse($request->phone_country_code.$request->phone_number, 'US');

            if(!$phoneNumberUtil->isValidNumberForRegion($phoneNumberObj,'US'))
                return redirect()->back()->with('error', 'Phone number is invalid.');

            $data = $request->all();

            if (!in_array($request->role,['user', 'contact']))
                $newUserArray = [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_number'  => $data['phone_country_code']." ".$data['phone_number'],
                    'role' => $data['role'],
                    'company_id' => $company_id,
                    'password' => Hash::make($data['password'])
                ];
            else
                $newUserArray = [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_number'  => $data['phone_country_code']." ".$data['phone_number'],
                    'role' => $data['role'],
                    'company_id' => $company_id,
                    'password' => Hash::make($data['password']),
                    'email_verified' => $data['emailVerified'],
                    'mobile_verified' => $data['mobileVerified']
                ];

            if ($data) {
                $new_user = User::create($newUserArray);


                $activity = Activity::create([
                    'moduleName' => 'Contact',
                    'user_id' => auth()->id(),
                    'contact_id' => $new_user->id

                ]);

                if ($data['role'] == 'owner')
                    RoundRobinSetting::create([
                        'company_id' => $company_id,
                        'owner_id' => $new_user->id,
                        'priority' => 'low'
                    ]);

                if ($request->custom_fields_count > 0) {
                    foreach ($request->custom_fields as $key => $value) {
                        UserDetails::create([
                            'user_id' => $new_user->id,
                            'custom_field_id' => $key,
                            'data' => $value
                        ]);
                    }
                }

                if (in_array($request->role, ['user', 'contact'])) {
                    $due_date = date('Y-m-d h:m:s', strtotime(date('Y-m-d h:m:s') . ' +7 days'));
                    $new_user->documentManagers()->attach($request->document_types, [
                        'due_date' => $due_date,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    try{
                        Mail::send('email.newRegistration', [
                            'first_name' => $new_user->first_name,
                            'documents' => DocumentManager::whereIn('id', $request->document_types)->get(),
                            'due_date' => date('F j, Y', strtotime($due_date))
                        ], function($message) use($new_user){
                            $message->to($new_user->email);
                            $message->subject('Welcome to BCCUSA');
                        });

                        $message            = "Hi $new_user->first_name, Your secure login to the BCCUSA bank portal has been created! It is accessible here: ".route('login').". Your email address is your login and your password is BCCUSA.com until you login and change it. Please upload all requested documents securely via our portal. \nDue Date: ".date('F j, Y', strtotime($due_date))."\nReply STOP to opt out of text notifications.";
                        $twilioPhoneNumber  = env('TWILIO_NUMBER');
                        $twilioSid          = env('TWILIO_SID');
                        $twilioToken        = env('TWILIO_AUTH_TOKEN');
                        $client             = new Client($twilioSid, $twilioToken);
                        // Remove spaces from the phone number
                        $toPhoneNumber = str_replace(' ', '', $new_user->phone_number);
                        $client->messages->create(
                            $toPhoneNumber,
                            [
                                'from' => $twilioPhoneNumber,
                                'body' => $message,
                            ]
                        );
                    } catch(\Exception $ex){
                        echo $ex->getMessage();
                    }
                }


                if ($data['role'] == 'contact' || $data['role'] == 'user') {
                    UserOwner::create([
                        'user_id' => $new_user->id,
                        'owner_id' => auth()->user()->id,
                    ]);
                    RoundRobinSetting::where('company_id', $company_id)->where('owner_id', auth()->user()->id)
                        ->update(['last_lead' => date("Y-m-d H:i:s")]);
                    SendNotification::dispatch(['id' => $new_user->id, 'type' => 'contact_added']);
                }

                $company = Company::whereId($company_id)->first();
                \App\addContactToZapier([
                    'firstName' => $new_user->first_name,
                    'lastName' => $new_user->last_name,
                    'phone' => $new_user->phone_number,
                    'email' => $new_user->email,
                    'companyName' => !$company ? null : $company->name
                ]);
                $type = ($data['role'] == 'user') ? 'Contact' : (($data['role'] == 'owner') ? 'Super User' : ucfirst($data['role']));
                return redirect(url('contacts'))->withSuccess("$type Created Successfully.")->withInput();
            }
        } else if ($request->isMethod('get')) {
            $this->data['roles']     = array_diff($this->data['roles'], ['user']);
            $this->data['companies'] = Company::whereStatus('active')->get();
            $documents = DocumentManager::with('DocumentGroup')->get();
            $sortedDocuments = $documents->sort(function ($a, $b) {
                // Custom sorting function
                $pattern = '/^\d+/'; // Regular expression to match numbers at the beginning of the title

                // Extract numbers from the beginning of the titles
                preg_match($pattern, $a->title, $matchesA);
                preg_match($pattern, $b->title, $matchesB);

                // Compare titles using natural order comparison
                if (!empty($matchesA) && empty($matchesB)) {
                    return 1; // Move titles starting with numbers to the end
                } elseif (empty($matchesA) && !empty($matchesB)) {
                    return -1; // Keep other titles at the beginning
                } else {
                    return strnatcasecmp($a->title, $b->title);
                }
            });

            $sortedDocumentsArray = $sortedDocuments->values()->all();
            $this->data['documents'] = $sortedDocumentsArray;
            $this->data['document_groups'] = DocumentGroup::orderBy('order')->get();
            return view($request->type == 'admin' ? 'user.add-admin' : 'user.add', $this->data);
        }
    }

    public function userList(Request $request)
    {
        /* if (!$user->hasPermissionTo('list user')) {
            return redirect(url("dashboard"))->with("error", "No permission to view user list.");
        } */

        $roles = Permissions::getSubRoles($this->user);

        $this->data['current_slug'] = 'Contacts';
        $this->data['slug']         = 'user_list';
        $filters['roles'] = $roles;
        $filters['user_id'] = $this->user->id;
        $filters['company_id'] = $this->company_id;
        $filters['search_term'] = $request->search_term;
        $filters['status'] = $request->status;
        $filters['role'] = $request->role;
        $filters['start_date'] = $request->start_date;
        $filters['end_date'] = $request->end_date;
        $filters['paginate'] = 10;
        $this->data['users'] = User::getUsers($filters);

        if ($request->ajax())
            return view('user.user_pagination', $this->data)->render();
        else
            return view("user.list", $this->data);
    }

    public function userDetails(Request $request, $id)
    {
        $this->data['current_slug']  = 'Contact Details';
        $this->data['slug']          = 'user_details';
        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        } elseif ($access->role != 'contact') {
            return redirect(route('dashboard'))->with('error', 'Access Denied to User.');
        }
        $this->data['id'] = $id;
        $this->data['user'] = User::with('documentManagers')->where(['id' => $id])->first();
        $this->data['notes'] = Note::getNotesByUser($id);
        $this->data['deals'] = Deal::getDealsByUser($id, 0);
        $this->data['custom_fields'] =  CustomField::getDataByUser($id);

        if ($request->isMethod('put')) {
            $update_data = [
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'phone_number' => $request->phone_number
            ];

            User::whereId($id)->update($update_data);
            if ($request->custom_fields_count > 0) {
                foreach ($request->custom_fields as $key => $value) {
                   $abc =  UserDetails::updateOrCreate(
                        ['user_id' => $id, 'deal_id' => 0, 'custom_field_id' => $key],
                        ['data' => $value]
                    );
                }
            }


            $activity = Activity::create([
                'moduleName' => 'Custom Field',
                'user_id' => auth()->id(),
                'contact_id' =>$id

            ]);


            // dd($request, $id , $abc);
            return redirect(route('user.details', $id))->withSuccess('Contact Update Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $activity = Activity::where('contact_id',$id)->get();
            $userRecord = User::all();
            $document = Documents::where('user_id',$id)->get();
            $customFieldDetails = UserDetails::where('user_id',$id)->get();
            $customField = CustomField::all();

            // dd($customFieldDetails , $customField);
            $deal = Deal::where('user_id',$id)->get();
            $stage = Stage::all();

            $documents = DocumentManager::with('DocumentGroup')->get();
            $sortedDocuments = $documents->sort(function ($a, $b) {
                // Custom sorting function
                $pattern = '/^\d+/'; // Regular expression to match numbers at the beginning of the title

                // Extract numbers from the beginning of the titles
                preg_match($pattern, $a->title, $matchesA);
                preg_match($pattern, $b->title, $matchesB);

                // Compare titles using natural order comparison
                if (!empty($matchesA) && empty($matchesB)) {
                    return 1; // Move titles starting with numbers to the end
                } elseif (empty($matchesA) && !empty($matchesB)) {
                    return -1; // Keep other titles at the beginning
                } else {
                    return strnatcasecmp($a->title, $b->title);
                }
            });

            $dueDate = '';
//            echo "<pre>".print_r($this->data['user']->DocumentManagers,1)."</pre>";exit;
            foreach($this->data['user']->DocumentManagers as $documentManager){
                if($documentManager->pivot->document_uploaded == 0){
                    $dueDate = $documentManager->pivot->due_date;
                    break;
                }
            }

            $sortedDocumentsArray = $sortedDocuments->values()->all();
            $this->data['documents'] = $sortedDocumentsArray;
            $this->data['selected_documents'] = $this->data['user']->DocumentManagers;
            $this->data['bankusers'] = User::whereRole('bank')->get();
            $this->data['document_groups'] = DocumentGroup::orderBy('order')->get();
            $this->data['due_date'] = $dueDate;
            return view("user.details", $this->data,compact('activity','userRecord','document','customFieldDetails','customField','deal','stage'));
        }
    } // userDetails

    public function editUser(Request $request, $id)
    {
        $this->data['current_slug'] = 'Edit Contact';
        $this->data['slug']         = 'edit_user';
        $this->data['all_status']   = ['inactive', 'active', 'archived', 'deleted', 'banned'];
        $auth_user = auth()->user();
        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }
        $this->data['id'] = $id;
        $this->data['user'] = User::with(['DocumentManagers' => function($query){
            $query->select('id');
        }])->where(['id' => $id])->first();

        $this->data['custom_fields'] =  CustomField::getDataByUser($id);

        if ($request->isMethod('put')) {
            $validate = [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
            ];

            if (in_array($this->data['user']->role, ['user', 'contact'])){
                $validate['document_types'] = 'required|array|min:1';
                $validate['document_types.*'] = 'exists:document_managers,id';
            }

            $request->validate($validate);

            $phoneNumberUtil = PhoneNumberUtil::getInstance();
            $phoneNumberObj = $phoneNumberUtil->parse($request->phone_country_code.$request->phone_number, 'US');

            if(!$phoneNumberUtil->isValidNumberForRegion($phoneNumberObj,'US'))
                return redirect()->back()->with('error', 'Phone number is invalid.');

            $update_data = [
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'phone_number' => $request->phone_country_code." ".$request->phone_number,
                'status'       => $request->status,
                'email_verified' => $request->emailVerified,
                'mobile_verified' => $request->mobileVerified
            ];

            if ($request->password && strlen($request->password) < 6) {
                return redirect()->back()->withError('Password must be 6 digits.')->withInput();
            } else if ($request->password && strlen($request->password) >= 6) {
                $update_data['password'] = Hash::make($request->password);
            }

            User::whereId($id)->update($update_data);
            if ($request->custom_fields_count > 0) {
                foreach ($request->custom_fields as $key => $value) {
                    UserDetails::updateOrCreate(
                        ['user_id' => $id, 'custom_field_id' => $key],
                        ['data' => $value]
                    );
                }
            }


            if(in_array($this->data['user']->role, ['user', 'contact'])){
                $existingDocumentManagerIds = DocumentManagerUser::whereUserId($id)->pluck('document_manager_id');
                $newDocumentManagerIds = $request->document_types;
                $notificationForNewIds = array();

                if (count($existingDocumentManagerIds) < count($newDocumentManagerIds) && is_array($newDocumentManagerIds)) {
                    // Find new ids in $newDocumentManagerIds that do not exist in $existingDocumentManagerIds
                    $newIdsToAdd = array_diff($newDocumentManagerIds, $existingDocumentManagerIds->toArray());

                    // Store new ids in $notificationForNewIds
                    $notificationForNewIds = array_values($newIdsToAdd);
                }


                DocumentManagerUser::whereUserId($id)->whereNotIn('document_manager_id',$request->document_types)->delete();
                $due_date = date('Y-m-d h:m:s', strtotime(date('Y-m-d h:m:s') . ' +7 days'));
//                echo $due_date;exit;
                foreach ($request->document_types as $type) {
                    foreach ($request->document_types as $type) {
                        $document_exists = DocumentManagerUser::whereUserIdAndDocumentManagerId($id, $type)->first();
                        if($document_exists){
                            if($document_exists->document_uploaded === 0){
                                DocumentManagerUser::whereUserIdAndDocumentManagerId($id, $type)->update(['due_date' => $due_date]);
                            }
                        }else{
                            DocumentManagerUser::create(['user_id' =>$id , 'document_manager_id' => $type, 'due_date' => $due_date]);
                        }
                    }
                }

                $user = User::whereId($id)->first();
                try{
                    $documents = DocumentManager::whereIn('id', $notificationForNewIds)->get();
                    if($documents != null){
                        Mail::send('email.userDocumentsSelectionUpdate', [
                            'first_name' => $user->first_name,
                            'documents' => $documents,
                            'due_date' => date('F j, Y', strtotime($due_date))
                        ], function($message) use($user){
                            $message->to($user->email);
                            $message->subject('Request for new documents');
                        });

                        $message            = "Hi $user->first_name, An additional document request has been added for your bank financing application with BCCUSA!\nThe following document(s) have been added:\n";
                        foreach ($documents as $document){
                            $message .= "\u{2022} ".$document->title."\n";
                        }

                        $message .= "Please login https://dashboard.bccusa.com/ to finalize your application. \nDue Date: ".date('F j, Y', strtotime($due_date))."\nReply STOP to opt out of text notifications.";
                        $twilioPhoneNumber  = env('TWILIO_NUMBER');
                        $twilioSid          = env('TWILIO_SID');
                        $twilioToken        = env('TWILIO_AUTH_TOKEN');
                        $client             = new Client($twilioSid, $twilioToken);
                        // Remove spaces from the phone number
                        $toPhoneNumber = str_replace(' ', '', $user->phone_number);
                        $client->messages->create(
                            $toPhoneNumber,
                            [
                                'from' => $twilioPhoneNumber,
                                'body' => $message,
                            ]
                        );
                    }
                if($this->data['user']->phone_number != $update_data['phone_number']){
                    $update_data = [
                        'first_name'   => $request->first_name,
                        'last_name'    => $request->last_name,
                        'phone_number' => $request->phone_country_code." ".$request->phone_number,
                        'status'       => $request->status,
                    ];
                    \App\addContactToZapier([
                        'firstName' => $update_data['first_name'],
                        'lastName' => $update_data['last_name'],
                        'phone' => $update_data['phone_number'],
                        'email' => $this->data['user']->email,
                        'companyName' => $request->company??$auth_user->company_id
                    ]);
                }
                } catch(\Exception $ex){
                    echo $ex->getMessage();
                }
            }

            return redirect(url('contacts'))->withSuccess('Contact Updated Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $documents = DocumentManager::with('DocumentGroup')->get();
            $sortedDocuments = $documents->sort(function ($a, $b) {
                // Custom sorting function
                $pattern = '/^\d+/'; // Regular expression to match numbers at the beginning of the title

                // Extract numbers from the beginning of the titles
                preg_match($pattern, $a->title, $matchesA);
                preg_match($pattern, $b->title, $matchesB);

                // Compare titles using natural order comparison
                if (!empty($matchesA) && empty($matchesB)) {
                    return 1; // Move titles starting with numbers to the end
                } elseif (empty($matchesA) && !empty($matchesB)) {
                    return -1; // Keep other titles at the beginning
                } else {
                    return strnatcasecmp($a->title, $b->title);
                }
            });

            $sortedDocumentsArray = $sortedDocuments->values()->all();
            $this->data['documents'] = $sortedDocumentsArray;
            $this->data['selected_documents'] = $this->data['user']->DocumentManagers;
            $this->data['document_groups'] = DocumentGroup::orderBy('order')->get();
            return view("user.edit", $this->data);
        }
    } // editUser

    public function exportXLS(Request $request)
    {
        $file_name = 'contacts.xls';
        $roles = Permissions::getSubRoles($this->user);

        $filters['roles'] = $roles;
        $filters['user_id'] = $this->user->id;
        $filters['company_id'] = $this->company_id;
        $filters['search_term'] = $request->search_term;
        $filters['status'] = $request->status;
        $filters['role'] = $request->role;
        $filters['start_date'] = $request->start_date;
        $filters['end_date'] = $request->end_date;
        $filters['paginate'] = 0;
        $users = User::getUsers($filters);

        $file = new Spreadsheet();
        $active_sheet = $file->getActiveSheet();

        $active_sheet->setCellValue('A1', 'First Name');
        $active_sheet->setCellValue('B1', 'Last Name');
        $active_sheet->setCellValue('C1', 'Email');
        $active_sheet->setCellValue('D1', 'Phone Number');
        $active_sheet->setCellValue('E1', 'Status');
        $active_sheet->setCellValue('F1', 'Created At');
        $cfields = CustomField::where('type', '=', 'contact')->where('visible', '=', 1)->get();

        $startColumn = 'G';
        $column = $startColumn;
        if (!$cfields->isEmpty()) {
            foreach ($cfields as $cfield) {
                $active_sheet->setCellValue($column . '1', $cfield->title);
                $column++;
            }
        }
        $count = 2;
        foreach ($users as $user) {
            $column = $startColumn;
            $this->data['user_id'] = $user->id;
            $custom_fields =  CustomField::getDataByUser($this->data['user_id']);

            $active_sheet->setCellValue('A' . $count, $user->first_name);
            $active_sheet->setCellValue('B' . $count, $user->last_name);
            $active_sheet->setCellValue('C' . $count, $user->email);
            $active_sheet->setCellValue('D' . $count, $user->phone_number);
            $active_sheet->setCellValue('E' . $count, $user->status);
            $active_sheet->setCellValue('F' . $count, $user->created_at);

            if (!$custom_fields->isEmpty()) {
                foreach ($custom_fields as $custom_field) {
                    $active_sheet->setCellValue($column . $count, $custom_field->data);
                    $column++;
                }
            }
            $count++;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xls');
        $writer->save($path = storage_path($file_name));

        return response()->download($path)->deleteFileAfterSend();
    }

    public function exportCSV(Request $request)
    {
        $file_name = 'contacts.csv';
        $roles = Permissions::getSubRoles($this->user);

        $filters['roles'] = $roles;
        $filters['user_id'] = $this->user->id;
        $filters['company_id'] = $this->company_id;
        $filters['search_term'] = $request->search_term;
        $filters['status'] = $request->status;
        $filters['role'] = $request->role;
        $filters['start_date'] = $request->start_date;
        $filters['end_date'] = $request->end_date;
        $filters['paginate'] = 0;
        $users = User::getUsers($filters);

        $columns = array('First Name', 'Last Name', 'Email', 'Phone Number', 'Status', 'Created At');

        $file = fopen($path = storage_path($file_name), 'w');
        $cfields = CustomField::where('type', '=', 'contact')->where('visible', '=', 1)->get();

        if (!$cfields->isEmpty()) {
            foreach ($cfields as $cfield) {
                array_push($columns, "'" . $cfield->title . "'");
            }
        }
        fputcsv($file, $columns);

        foreach ($users as $user) {
            $this->data['user_id'] = $user->id;
            $custom_fields =  CustomField::getDataByUser($this->data['user_id']);

            $row['First Name'] = $user->first_name;
            $row['Last Name'] = $user->last_name;
            $row['Email'] = $user->email;
            $row['Phone Number'] = $user->phone_number;
            $row['Status']  = $user->status;
            $row['Created At']  = $user->created_at;

            if (!$custom_fields->isEmpty()) {
                foreach ($custom_fields as $custom_field) {
                    $row[$custom_field->title]  = $custom_field->data;
                }
            }
            fputcsv($file, $row);
        }
        fclose($file);
        return response()->download($path)->deleteFileAfterSend();
    }
    public function dashboard_sandbox() {
        $slug = "dashboard-sandbox";
        return view('dashboard-sandbox',compact('slug'));
    }
    public function dashboard() {

        $datesWithWeeks = [];
        $today          = Carbon::today();
        $lastSunday    = Carbon::now()->previous('Sunday');
        $lastMonday    = Carbon::now()->previous('Monday');
        $lastTuesday   = Carbon::now()->previous('Tuesday');
        $lastWednesday = Carbon::now()->previous('Wednesday');
        $lastThursday  = Carbon::now()->previous('Thursday');
        $lastFriday    = Carbon::now()->previous('Friday');
        $lastSaturday  = Carbon::now()->previous('Saturday');


        for ($i = 6; $i >= 0; $i--) {
            $date = $today->subDays($i);
            $datesWithWeeks[] = [
                'date' => $date->toDateString(),
                'week_name' => $date->format('l'), // 'l' returns the full weekday name
            ];
        }

        $sunday     = $lastSunday->toDateString();
        $monday     = $lastMonday->toDateString();
        $tuesday    = $lastTuesday->toDateString();
        $wednesday  = $lastWednesday->toDateString();
        $thursday   = $lastThursday->toDateString();
        $friday     = $lastFriday->toDateString();
        $saturday   = $lastSaturday->toDateString();

        if(Auth::check()) {

            $current_date = date('Y-m-d');
            $last_7_date  = date('Y-m-d', strtotime('-7 days'));
            $user_count   = User::where('id', '!=', 1)->where('created_at', '>=', $last_7_date)->where('created_at', '<=', $current_date)->count();

            $sun_count   = User::whereDate('created_at', $sunday)->count();
            $mon_count   = User::whereDate('created_at', $monday)->count();
            $tue_count   = User::whereDate('created_at', $tuesday)->count();
            $wed_count   = User::whereDate('created_at', $wednesday)->count();
            $thu_count   = User::whereDate('created_at', $thursday)->count();
            $fri_count   = User::whereDate('created_at', $friday)->count();
            $sat_count   = User::whereDate('created_at', $saturday)->count();

            $week_data = [
                "sun_count" => $sun_count,
                "mon_count" => $mon_count,
                "tue_count" => $tue_count,
                "wed_count" => $wed_count,
                "thu_count" => $thu_count,
                "fri_count" => $fri_count,
                "sat_count" => $sat_count,
            ];
            $user = auth()->user();
            /* if(!$user->hasAnyRole(['admin','owner', 'user'])) {
                $user->assignRole($user->role);
            } */
            $slug = "dashboard";
            return view('dashboard',compact('user_count', 'week_data', 'slug'));

        }

        return redirect("login", $this->data)->withError('Opps! session is timeout plz login again.');
    }

    public function sandbox_daterange(Request $request) {

        $dates = explode("-",$request->daterange);
        $Date1 = rtrim(date('Y-m-d', strtotime($dates[0])));
        $Date2 = ltrim(date('Y-m-d', strtotime($dates[1])));


        // Declare an empty array
        $dateRange = [];

        // Use strtotime function
        $Variable1 = strtotime($Date1);
        $Variable2 = strtotime($Date2);

        // Use for loop to store dates into array
        // 86400 sec = 24 hrs = 60*60*24 = 1 day
        for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) {

            $Store = date('Y-m-d', $currentDate);
            $dateRange[] = $Store;
        }

        $sunday     = $dateRange[0];
        $monday     = $dateRange[1];
        $tuesday    = $dateRange[2];
        $wednesday  = $dateRange[3];
        $thursday   = $dateRange[4];
        $friday     = $dateRange[5];
        $saturday   = $dateRange[6];

        $sun_name = date('D', strtotime($sunday));
        $mon_name = date('D', strtotime($monday));
        $tue_name = date('D', strtotime($tuesday));
        $wed_name = date('D', strtotime($wednesday));
        $thu_name = date('D', strtotime($thursday));
        $fri_name = date('D', strtotime($friday));
        $sat_name = date('D', strtotime($saturday));

        $user_count   = User::where('id', '!=', 1)->where('created_at', '>=', $Date1)->where('created_at', '<=', $Date2)->count();

        $sun_count   = User::whereDate('created_at', $sunday)->count();
        $mon_count   = User::whereDate('created_at', $monday)->count();
        $tue_count   = User::whereDate('created_at', $tuesday)->count();
        $wed_count   = User::whereDate('created_at', $wednesday)->count();
        $thu_count   = User::whereDate('created_at', $thursday)->count();
        $fri_count   = User::whereDate('created_at', $friday)->count();
        $sat_count   = User::whereDate('created_at', $saturday)->count();

        $week_data = [
            "sun_count" => $sun_count,
            "mon_count" => $mon_count,
            "tue_count" => $tue_count,
            "wed_count" => $wed_count,
            "thu_count" => $thu_count,
            "fri_count" => $fri_count,
            "sat_count" => $sat_count,
            "user_count" => $user_count,
            "sun_name"   => $sun_name,
            "mon_name"   => $mon_name,
            "tue_name"   => $tue_name,
            "wed_name"   => $wed_name,
            "thu_name"   => $thu_name,
            "fri_name"   => $fri_name,
            "sat_name"   => $sat_name,

        ];


        return response()->json($week_data);

    }

    public function sendEmailNotification(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                "bank_users" => "required|array|min:1",
                "bank_users.*" => "required|distinct|min:1|exists:users,id",
                'user_id' => 'required|exists:users,id',
                'url' => 'required|url',
            ],
            [
                'bank_users.required' => 'Bank user(s) are required',
                'bank_users.array' => 'Bank user(s) must be array',
                'bank_users.min' => 'Minimum one bank users is required',
                'bank_users.*.required' => 'Bank user(s) are required',
                'bank_users.*.min' => 'Minimum one bank users is required',
                'bank_users.*.exists' => 'Bank user not found',
                'user_id.required' => 'User id is required',
                'user_id.exists' => 'User not found',
                'url.required' => 'User url is required',
                'url.url' => 'User url must be valid url',
            ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()], 403);
        }

        foreach ($request->bank_users as $bank_user) {
            if(UserAssignBankUser::whereBankUserIdAndUserId($bank_user,$request->user_id)->count()  == 0){
                $user_assigned_bank_user = new UserAssignBankUser();
                $user_assigned_bank_user->bank_user_id = $bank_user;
                $user_assigned_bank_user->user_id = $request->user_id;
                $user_assigned_bank_user->url = $request->url;
                $user_assigned_bank_user->create_by = auth()->user()->id;
                $user_assigned_bank_user->save();
            }
        }

        foreach ($request->bank_users as $bank_user) {
            $bank_user_data = User::whereId($bank_user)->first();
            Mail::send('email.sendDocuments', ['first_name' => $bank_user_data->first_name,'url' => $request->url], function($message) use($bank_user_data){
                $message->to($bank_user_data->email);
                $message->subject('BCCUSA: New Client File Received!');
            });
        }

        return response()->json(['success' => true, 'message' => 'Email sent successfully']);
    }

    public function searchUserToMention(Request $request){
        $keyword = $request->keyword;
        $query = User::where(function($query) use ($keyword) {
            $query->where(function($query) use ($keyword) {
                $query->where('email', 'LIKE', $keyword.'%')
                    ->orWhere('first_name', 'LIKE', $keyword.'%')
                    ->orWhere('last_name', 'LIKE', $keyword.'%')
                    ->orwhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", [$keyword.'%']);
            })
                ->where(function($query) use ($keyword) {
                    $query->whereIn('role', ['superadmin', 'admin']);
//                    ->whereIn('company_id', ['0','1']);
                });
        });

        if ($request->has('skip_ids')) {
            $skipIds = $request->input('skip_ids');
            $query->whereNotIn('id', $skipIds);
        }

        $users = $query->select('id', 'role', 'first_name', 'last_name', 'email', DB::raw("CONCAT(first_name, ' ', last_name) AS fullname"))->get();
        return response()->json(['users' => $users]);
    }
    public function admins(Request $request){
        $this->data['current_slug'] = 'Admins';
        $this->data['slug']         = 'admins';
        $filters['roles']           = ['admin', 'owner'];
        $filters['user_id']         = $this->user->id;
        $filters['company_id']      = $this->company_id;
        $filters['search_term']     = $request->search_term;
        $filters['status']          = $request->status;
        $filters['role']            = '';
        $filters['start_date']      = $request->start_date;
        $filters['end_date']        = $request->end_date;
        $filters['paginate']        = 10;
        $filters['associate_company']=true;
        $this->data['users']        = User::getUsers($filters);

        if ($request->ajax())
            return view('admin.admin_pagination', $this->data)->render();
        else
            return view("admin.list", $this->data);
    }

    public function updateDocumentManager(Request $request, $id){
        $validate = [
            'document_types' => 'required|array|min:1',
            'document_types.*' => 'exists:document_managers,id'
        ];

        $request->validate($validate);

        $existingDocumentManagerIds = DocumentManagerUser::whereUserId($id)->pluck('document_manager_id');
        $newDocumentManagerIds = $request->document_types;
        $notificationForNewIds = array();

        if (count($existingDocumentManagerIds) < count($newDocumentManagerIds) && is_array($newDocumentManagerIds)) {
            // Find new ids in $newDocumentManagerIds that do not exist in $existingDocumentManagerIds
            $newIdsToAdd = array_diff($newDocumentManagerIds, $existingDocumentManagerIds->toArray());

            // Store new ids in $notificationForNewIds
            $notificationForNewIds = array_values($newIdsToAdd);
        }

        DocumentManagerUser::whereUserId($id)->whereNotIn('document_manager_id', $request->document_types)->delete();
        $due_date = date('Y-m-d h:m:s', strtotime(date('Y-m-d h:m:s') . ' +7 days'));
        foreach ($request->document_types as $type) {
            $document_exists = DocumentManagerUser::whereUserIdAndDocumentManagerId($id, $type)->first();
            if($document_exists){
                if($document_exists->document_uploaded === 0){
                    DocumentManagerUser::whereUserIdAndDocumentManagerId($id, $type)->update(['due_date' => $due_date]);
                }
            }else{
                DocumentManagerUser::create(['user_id' =>$id , 'document_manager_id' => $type, 'due_date' => $due_date]);
            }
        }
        $user = User::whereId($id)->first();
        try{
            $documents = DocumentManager::whereIn('id', $notificationForNewIds)->get();
            if(count($documents)){
                Mail::send('email.userDocumentsSelectionUpdate', [
                    'first_name' => $user->first_name,
                    'documents' => $documents,
                    'due_date' => date('F j, Y', strtotime($due_date))
                ], function($message) use($user){
                    $message->to($user->email);
                    $message->subject('Request for new documents');
                });

                $message            = "Hi $user->first_name, An additional document request has been added for your bank financing application with BCCUSA!\nThe following document(s) have been added:\n";
                foreach ($documents as $document){
                    $message .= "\u{2022} ".$document->title."\n";
                }

                $message .= "Please login https://dashboard.bccusa.com/ to finalize your application.\nDue Date: ".date('F j, Y', strtotime($due_date))."\nReply STOP to opt out of text notifications.";
                $twilioPhoneNumber  = env('TWILIO_NUMBER');
                $twilioSid          = env('TWILIO_SID');
                $twilioToken        = env('TWILIO_AUTH_TOKEN');
                $client             = new Client($twilioSid, $twilioToken);
                // Remove spaces from the phone number
                $toPhoneNumber = str_replace(' ', '', $user->phone_number);
                $client->messages->create(
                    $toPhoneNumber,
                    [
                        'from' => $twilioPhoneNumber,
                        'body' => $message,
                    ]
                );
            }

        } catch(\Exception $ex){
            echo $ex->getMessage();
        }
        return back()->withSuccess('Documents updated Successfully.');
    }

    public function userDueDate(Request $request, $id){
        $request->validate([
            'due_date' => [
                'required',
                'date',
                'after_or_equal:tomorrow', // Ensures the due_date is today or a future date
            ],
        ]);

        try{
            DocumentManagerUser::whereUserId($id)->update(['due_date' => $request->due_date]);
            $existingDocumentManagerIds = DocumentManagerUser::whereUserId($id)->pluck('document_manager_id');
            $documents = DocumentManager::whereIn('id', $existingDocumentManagerIds)->get();
            $user = User::whereId($id)->first();
            if(count($documents)){
                Mail::send('email.dueDateChange', [
                    'first_name' => $user->first_name,
                    'documents' => $documents,
                    'due_date' => date('F j, Y', strtotime($request->due_date))
                ], function($message) use($user){
                    $message->to($user->email);
                    $message->subject('Due date changed');
                });

                $message            = "Hi $user->first_name, The due date of your document package submission for the following documents is now: ".date('F j, Y', strtotime($request->due_date))."\n\n";
                foreach ($documents as $document){
                    $message .= "\u{2022} ".$document->title."\n";
                }

                $message .= "\nPlease understand the importance of providing these documents to expedite your financing application. We want to ensure a smooth and as timely submission as possible.\n\nPlease login https://dashboard.bccusa.com/ to finalize your application.\n\nReply STOP to opt out of text notifications.";
                $twilioPhoneNumber  = env('TWILIO_NUMBER');
                $twilioSid          = env('TWILIO_SID');
                $twilioToken        = env('TWILIO_AUTH_TOKEN');
                $client             = new Client($twilioSid, $twilioToken);
                // Remove spaces from the phone number
                $toPhoneNumber = str_replace(' ', '', $user->phone_number);
                $client->messages->create(
                    $toPhoneNumber,
                    [
                        'from' => $twilioPhoneNumber,
                        'body' => $message,
                    ]
                );
            }

        } catch(\Exception $ex){
            echo $ex->getMessage();
        }
        return back()->withSuccess('Due date updated Successfully.');
    }
}
