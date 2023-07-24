<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Deals;
use App\Models\Stages;
use App\Models\Pipelines;
use App\Models\UserOwner;
use App\Models\UserDetails;

use App\Models\CustomFields;
use Illuminate\Http\Request;
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
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->data['user'] = $this->user;
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
        $this->data['custom_fields'] = CustomFields::all();
        $user = auth()->user();
        $company_id = $user->company_id;
        $this->data['owners'] = User::where('role', '=', 'owner')->where('company_id', '=', $company_id)
            ->when(($user->role == 'owner'), function ($q) use ($user) {
                $q->where('id', '=', $user->id);
            })->get();
        $owners = array();
        foreach ($this->data['owners'] as $owner) {
            array_push($owners, $owner->id);
        }
        $this->data['admins'] = User::where('role', '=', 'admin')->where('company_id', '=', $company_id)->get();

        $roles = array('');
        if ($user->role == 'superadmin') {
            $roles = array('admin', 'owner', 'user');
        } else if ($user->role == 'admin') {
            $roles = array('owner', 'user');
        } else if ($user->role == 'owner') {
            $roles = array('user');
        } else if ($user->role == 'user') {
            $roles = array('');
        }
        $this->data['roles'] = $roles;
        if ($request->isMethod('post')) {
            if (!in_array($request->role, $roles)) {
                return redirect()->back()->with('error','You\'ve selected an invalid role.')->withInput();
            }
            if (!in_array($request->owner, $owners)) {
                return redirect()->back()->with('error','You\'ve selected an invalid owner.')->withInput();
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

                if ($request->custom_fields_count > 0) {
                    foreach ($request->custom_fields as $key => $value) {
                        UserDetails::create([
                            'user_id' => $new_user->id,
                            'custom_field_id' => $key,
                            'data' => $value
                        ]);
                    }
                }

                if ($data['role'] == 'user') {
                    UserOwner::create([
                        'user_id' => $new_user->id,
                        'owner_id' => $data['owner'],
                        'data' => $value
                    ]);
                }

                return redirect(url('contacts'))->withSuccess('Contact Created Successfully.')->withInput();
            }
        } else if ($request->isMethod('get')) {
            return view("user.add", $this->data);
        }
    } // addUser

    public function userList(Request $request)
    {
        $company_id = 0;
        $user = auth()->user();
        if (!$user->hasPermissionTo('list user')) {
            return redirect(url("dashboard"))->with("error", "No permission to view user list.");
        }

        $user_id = $user->id;
        $roles = array('');
        if ($user->role == 'superadmin') {
            $roles = array('admin', 'owner', 'user');
        } else if ($user->role == 'admin') {
            $roles = array('admin', 'owner', 'user');
        } else if ($user->role == 'owner') {
            $roles = array('user');
        } else if ($user->role == 'user') {
            $roles = array('no-permission');
        }
        if ($user->role != 'superadmin') {
            $company_id = $this->user->company_id;
        }
        $this->data['current_slug'] = 'Contacts';
        $this->data['slug']         = 'user_list';

        $this->data['users'] = User::whereIn('role', $roles)->where('users.id', '!=', $user_id)
            ->when(($company_id > 0), function ($q) use ($company_id) {
                $q->where('company_id', '=', $company_id);
            })
            ->when($request->search_term, function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('first_name', 'like', '%' . $request->search_term . '%');
                    $query->orWhere('last_name', 'like', '%' . $request->search_term . '%');
                    $query->orWhere('email', 'like', '%' . $request->search_term . '%');
                    $query->orWhere('phone_number', 'like', '%' . $request->search_term . '%');
                });
            })
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->role, function ($q) use ($request) {
                $q->where('role', $request->role);
            })
            ->when($request->start_date, function ($q) use ($request) {
                $q->whereBetween('created_at', [$request->start_date, $request->end_date]);
            })
            ->when((auth()->user()->role == 'owner'), function ($q) use ($user_id) {
                $q->join('user_owners', function ($join) use ($user_id) {
                    $join->on('users.id', '=', 'user_owners.user_id');
                    $join->on('user_owners.owner_id', '=', DB::raw($user_id));
                });
            })
            ->select('users.*')
            ->orderBy('users.id', 'DESC')->paginate(10);
            
        if ($request->ajax())
            return view('user.user_pagination', $this->data)->render();
        else
            return view("user.list", $this->data);
    }

    public function userDetails(Request $request, $id)
    {
        $this->data['current_slug']  = 'Contact Details';
        $this->data['slug']          = 'user_details';
        
        $company_id = 0;
        $user = auth()->user();
        if ($user->role != 'superadmin') {
            $company_id = $this->user->company_id;
        }
        $this->data['user']       = User::where(['id' => $id])
        ->when(($company_id > 0), function ($q) use ($company_id) {
            $q->where('company_id', '=', $company_id);
        })->first();
        if(!$this->data['user']){
            return redirect(route('dashboard'))->with('error','Access Denied.');
        }elseif(($this->data['user'])->role != 'user'){
            return redirect(route('dashboard'))->with('error','Access Denied.');
        }

        $this->data['notes'] = Note::where(['contact_id' => $id])->join('users', function ($join) {
            $join->on('users.id', '=', 'notes.user_id');
        })
        ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
        ->orderBy('notes.id', 'DESC')->get();

        $this->data['deals'] = Deals::leftJoin('pipelines', function ($join) {
            $join->on('deals.pipeline_id', '=', 'pipelines.id');
        })->leftJoin('stages', function ($join) {
            $join->on('deals.stage_id', '=', 'stages.id');
        })->select('deals.*', 'pipelines.title as pipeline', 'stages.title as stage')->where('user_id', $id)->get();

        $this->data['id'] = $id;
        $this->data['custom_fields'] =  CustomFields::leftJoin('user_details', function ($join) {
            $join->on('custom_fields.id', '=', 'user_details.custom_field_id');
            $join->on('user_details.user_id', '=', DB::raw($this->data['id']));
        })->select('custom_fields.*', 'user_details.data')->get();

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
                        ['user_id' => $id, 'custom_field_id' => $key],
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

        $company_id = 0;
        $user = auth()->user();
        if ($user->role != 'superadmin') {
            $company_id = $this->user->company_id;
        }
        $this->data['user']       = User::where(['id' => $id])
        ->when(($company_id > 0), function ($q) use ($company_id) {
            $q->where('company_id', '=', $company_id);
        })->first();
        if(!$this->data['user']){
            return redirect(route('dashboard'))->with('error','Access Denied.');
        }
        $this->data['custom_fields'] = CustomFields::all();

        $this->data['user_details']  = UserDetails::where('user_id', '=', $id)->get();

        $this->data['id'] = $id;
        $this->data['custom_fields'] =  CustomFields::leftJoin('user_details', function ($join) {
            $join->on('custom_fields.id', '=', 'user_details.custom_field_id');
            $join->on('user_details.user_id', '=', DB::raw($this->data['id']));
        })->select('custom_fields.*', 'user_details.data')->get();

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

    public function exportXLS()
    {
        $file_name = 'contacts.xls';
        $company_id = 0;
        $user = auth()->user();

        $user_id = $user->id;
        $roles = array('');
        if ($user->role == 'superadmin') {
            $roles = array('admin', 'owner', 'user');
        } else if ($user->role == 'admin') {
            $roles = array('admin', 'owner', 'user');
        } else if ($user->role == 'owner') {
            $roles = array('user');
        } else if ($user->role == 'user') {
            $roles = array('no-permission');
        }
        if ($user->role != 'superadmin') {
            $company_id = $this->user->company_id;
        }

        $users = User::whereIn('role', $roles)->where('users.id', '!=', $user_id)
            ->when(($company_id > 0), function ($q) use ($company_id) {
                $q->where('company_id', '=', $company_id);
            })
            ->when((auth()->user()->role == 'owner'), function ($q) use ($user_id) {
                $q->join('user_owners', function ($join) use ($user_id) {
                    $join->on('users.id', '=', 'user_owners.user_id');
                    $join->on('user_owners.owner_id', '=', DB::raw($user_id));
                });
            })
            ->select('users.*')
            ->orderBy('users.id', 'DESC')->get();

        $file = new Spreadsheet();
        $active_sheet = $file->getActiveSheet();

        $active_sheet->setCellValue('A1', 'First Name');
        $active_sheet->setCellValue('B1', 'Last Name');
        $active_sheet->setCellValue('C1', 'Email');
        $active_sheet->setCellValue('D1', 'Phone Number');
        $active_sheet->setCellValue('E1', 'Status');
        $active_sheet->setCellValue('F1', 'Created At');
        $cfields = CustomFields::all();

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

            $custom_fields =  CustomFields::leftJoin('user_details', function ($join) {
                $join->on('custom_fields.id', '=', 'user_details.custom_field_id');
                $join->on('user_details.user_id', '=', DB::raw($this->data['user_id']));
            })->select('custom_fields.*', 'user_details.data')->get();

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

    public function exportCSV()
    {
        $file_name = 'contacts.csv';
        $company_id = 0;
        $user = auth()->user();

        $user_id = $user->id;
        $roles = array('');
        if ($user->role == 'superadmin') {
            $roles = array('admin', 'owner', 'user');
        } else if ($user->role == 'admin') {
            $roles = array('admin', 'owner', 'user');
        } else if ($user->role == 'owner') {
            $roles = array('user');
        } else if ($user->role == 'user') {
            $roles = array('no-permission');
        }
        if ($user->role != 'superadmin') {
            $company_id = $this->user->company_id;
        }

        $users = User::whereIn('role', $roles)->where('users.id', '!=', $user_id)
            ->when(($company_id > 0), function ($q) use ($company_id) {
                $q->where('company_id', '=', $company_id);
            })
            ->when((auth()->user()->role == 'owner'), function ($q) use ($user_id) {
                $q->join('user_owners', function ($join) use ($user_id) {
                    $join->on('users.id', '=', 'user_owners.user_id');
                    $join->on('user_owners.owner_id', '=', DB::raw($user_id));
                });
            })
            ->select('users.*')
            ->orderBy('users.id', 'DESC')->get();


        $columns = array('First Name', 'Last Name', 'Email', 'Phone Number', 'Status', 'Created At');

        $file = fopen($path = storage_path($file_name), 'w');
        $cfields = CustomFields::all();

        if (!$cfields->isEmpty()) {
            foreach ($cfields as $cfield) {
                array_push($columns, "'" . $cfield->title . "'");
            }
        }
        fputcsv($file, $columns);

        foreach ($users as $user) {
            $this->data['user_id'] = $user->id;

            $custom_fields =  CustomFields::leftJoin('user_details', function ($join) {
                $join->on('custom_fields.id', '=', 'user_details.custom_field_id');
                $join->on('user_details.user_id', '=', DB::raw($this->data['user_id']));
            })->select('custom_fields.*', 'user_details.data')->get();

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
