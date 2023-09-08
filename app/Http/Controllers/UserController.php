<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Deal;
use App\Models\UserOwner;
use App\Models\UserDetails;
use App\Helpers\Permissions;
use App\Jobs\SendNotification;
use App\Models\CustomField;
use Illuminate\Http\Request;
use App\Models\RoundRobinSetting;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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
            $update_data = [
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'phone_number' => $request->phone_number
            ];

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
        $company_id = $user->company_id;
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
            if (!in_array($request->owner, $owners) && $request->role == 'user') {
                return redirect()->back()->with('error', 'You\'ve selected an invalid owner.')->withInput();
            }

            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'role' => 'required',
                'owner' => ($request->role == 'user') ? 'required' : '',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ]);
            $data = $request->all();

            if ($data) {
                $new_user = User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_number'  => $data['phone_number'],
                    'role' => $data['role'],
                    'company_id' => $company_id,
                    'password' => Hash::make($data['password'])
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

                if ($data['role'] == 'user' && $data['owner'] > 0) {
                    UserOwner::create([
                        'user_id' => $new_user->id,
                        'owner_id' => $data['owner'],
                    ]);
                    RoundRobinSetting::where('company_id', $company_id)->where('owner_id', $data['owner'])
                        ->update(['last_lead' => date("Y-m-d H:i:s")]);
                }
                SendNotification::dispatch(['id' => $new_user->id, 'type' => 'contact_added']);
                return redirect(url('contacts'))->withSuccess('Contact Created Successfully.')->withInput();
            }
        } else if ($request->isMethod('get')) {
            return view("user.add", $this->data);
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
        } elseif ($access->role != 'user') {
            return redirect(route('dashboard'))->with('error', 'Access Denied to User.');
        }

        $this->data['id'] = $id;
        $this->data['user'] = User::where('id', $id)->first();
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
                    UserDetails::updateOrCreate(
                        ['user_id' => $id, 'deal_id' => 0, 'custom_field_id' => $key],
                        ['data' => $value]
                    );
                }
            }
            return redirect(route('user.details', $id))->withSuccess('Contact Update Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            return view("user.details", $this->data);
        }
    } // userDetails

    public function editUser(Request $request, $id)
    {
        $this->data['current_slug'] = 'Edit Contact';
        $this->data['slug']         = 'edit_user';
        $this->data['all_status']   = ['inactive', 'active', 'archived', 'deleted', 'banned'];

        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }
        $this->data['id'] = $id;
        $this->data['user'] = User::where(['id' => $id])->first();
        $this->data['custom_fields'] =  CustomField::getDataByUser($id);

        if ($request->isMethod('put')) {
            $update_data = [
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'phone_number' => $request->phone_number,
                'status'       => $request->status
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
            return redirect(url('contacts'))->withSuccess('Contact Updated Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
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
}
