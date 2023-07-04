<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deals;
use App\Models\Stages;
use App\Models\Pipelines;
use App\Models\UserDetails;
use App\Models\CustomFields;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
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
        if ($request->isMethod('post')) {
            $request->validate([
                'first_name'   => 'required',
                'last_name'    => 'required',
                'phone_number' => 'required',
                'email'        => 'required|email|unique:users',
                'password'     => 'required|min:6'
            ]);
            $data = $request->all();

            if ($data) {
                $new_user = User::create([
                    'first_name'    => $data['first_name'],
                    'last_name'     => $data['last_name'],
                    'email'         => $data['email'],
                    'phone_number'  => $data['phone_number'],
                    'password'      => Hash::make($data['password'])
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
                return redirect(url('contacts'))->withSuccess('Contact Created Successfully.')->withInput();
            }
        } else if ($request->isMethod('get')) {
            return view("user.add", $this->data);
        }
    } // addUser

    public function userList(Request $request)
    {
        $company_id = 0;
        $roles = array('admin', 'owner', 'user');
        if (auth()->user()->role != 'superadmin') {
            $company_id = $this->user->company_id;
            if (auth()->user()->role == 'admin') {
                $roles = array('owner', 'user');
            } else if (auth()->user()->role == 'owner') {
                $roles = array('user');
            }
        }
        $this->data['current_slug'] = 'Contacts';
        $this->data['slug']         = 'user_list';

        $this->data['users'] = User::whereIn('role', $roles)
            ->when(($company_id > 0), function ($q) use ($company_id) {
                $q->where('company_id', '=', $company_id);
            })
            ->when($request->seach_term, function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('first_name', 'like', '%' . $request->seach_term . '%');
                    $query->orWhere('last_name', 'like', '%' . $request->seach_term . '%');
                    $query->orWhere('email', 'like', '%' . $request->seach_term . '%');
                    $query->orWhere('phone_number', 'like', '%' . $request->seach_term . '%');
                });
            })
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->start_date, function ($q) use ($request) {
                $q->whereBetween('created_at', [$request->start_date, $request->end_date]);
            })
            ->orderBy('id', 'DESC')->paginate(10);

        if ($request->ajax())
            return view('user.user_pagination', $this->data)->render();
        else
            return view("user.list", $this->data);
    } // addUser

    public function userDetails(Request $request, $id)
    {
        $this->data['current_slug']  = 'Contact Details';
        $this->data['slug']          = 'user_details';
        $this->data['rs_user']       = User::where(['id' => $id])->first();

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

    public function userDeals($id)
    {
        $this->data['current_slug'] = 'Deals';
        $this->data['slug']         = 'user_deals';
        $this->data['current_user_id'] = $id;
        $this->data['rs_deals'] = Deals::where('user_id', $id)->orderBy('id', 'DESC')->paginate(10);
        return view("user.deals.list", $this->data);
    } // userDeals

    public function dealsAdd(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            Deals::create([
                'title'       => $request->title,
                'user_id'     => $id,
                'pipeline_id' => $request->pipeline_id,
                'stage_id'    => $request->stage_id,
                'amount'      => $request->amount,
                'deal_owner'  => $request->deal_owner,
                'lead_source' => $request->lead_source
            ]);
            return redirect(route('user.deals', $id))->withSuccess('Deal Created Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $this->data['current_slug']    = 'Add Deal';
            $this->data['slug']            = 'user_add_deal';
            $this->data['current_user_id'] = $id;

            $this->data['rs_pipelines'] = Pipelines::orderBy('title', 'ASC')->get();
            $this->data['rs_stages']    = Stages::orderBy('title', 'ASC')->get();
            return view("user.deals.add", $this->data);
        }
    } // dealsAdd

    public function dealsEdit(Request $request, $user_id, $id)
    {
        if ($request->isMethod('post')) {
            Deals::where('id', $id)->update([
                'title'       => $request->title,
                'pipeline_id' => $request->pipeline_id,
                'stage_id'    => $request->stage_id,
                'amount'      => $request->amount,
                'deal_owner'  => $request->deal_owner,
                'lead_source' => $request->lead_source
            ]);
            return redirect(route('user.deals', $user_id))->withSuccess('Deal Update Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $this->data['current_slug']    = 'Edit Deal';
            $this->data['slug']            = 'user_edit_deal';
            $this->data['current_user_id'] = $user_id;

            $this->data['rs_pipelines'] = Pipelines::orderBy('title', 'ASC')->get();
            $this->data['rs_stages']    = Stages::orderBy('title', 'ASC')->get();
            $this->data['rs_deal']      = Deals::where('id', $id)->first();
            return view("user.deals.edit", $this->data);
        }
    } // dealsEdit

    public function editUser(Request $request, $id)
    {
        $this->data['current_slug'] = 'Edit Contact';
        $this->data['slug']         = 'edit_user';
        $this->data['all_status']   = ['inactive', 'active', 'deleted', 'banned'];

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
            return redirect(url('contacts'))->withSuccess('Contact Update Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $this->data['user'] = User::where('id', $id)->first();
            return view("user.edit", $this->data);
        }
    } // editUser


    public function pipelines(Request $request, $action, $id = NULL)
    {
        if ($action == 'add') {
            $this->data['current_slug']    = 'Add Pipeline';
            $this->data['slug']            = 'add_pipeline';

            if ($request->isMethod('post')) {
                $inserted_data = Pipelines::create(['title' => $request->title]);
                if (isset($request->stages) && !empty($request->stages)) {
                    $sort = 0;
                    foreach ($request->stages as $rec_stage_title) {
                        Stages::create([
                            'pipeline_id' => $inserted_data->id,
                            'title'       => $rec_stage_title,
                            'sort'        => $sort
                        ]);
                        $sort++;
                    }
                }
                return redirect(route('pipeline', ['action' => 'list']))->withSuccess('Pipeline Created Successfully.')->withInput();
            } else if ($request->isMethod('get')) {
                return view("pipeline.add", $this->data);
            }
        } // add

        if ($action == 'edit') {
            $this->data['current_slug'] = 'Edit Pipeline';
            $this->data['slug']         = 'edit_pipeline';
            $this->data['rs_pipeline']  = Pipelines::where('id', $id)->first();
            $this->data['rs_stages']    = Stages::where('pipeline_id', $id)->orderBy('sort', 'ASC')->get();

            if ($request->isMethod('post')) {
                Pipelines::whereId($id)->update(['title' => $request->title]);
                if (isset($request->stages) && !empty($request->stages)) {
                    $sort = 0;
                    foreach ($request->stages as $rec_stage_title) {
                        if (isset($rec_stage_title['title']) && isset($rec_stage_title['stage_id']) && !empty($rec_stage_title['title'])) {
                            Stages::whereId($rec_stage_title['stage_id'])->update([
                                'title' => $rec_stage_title['title'],
                                'sort'  => $sort
                            ]);
                        } else {
                            Stages::create([
                                'pipeline_id' => $id,
                                'title'       => $rec_stage_title,
                                'sort'        => $sort
                            ]);
                        }
                        $sort++;
                    }
                }
                return redirect(route('pipeline', ['action' => 'list']))->withSuccess('Pipeline Updated Successfully.')->withInput();
            } else if ($request->isMethod('get')) {
                return view("pipeline.edit", $this->data);
            }
        } //edit

        if ($action == 'list') {
            $this->data['current_slug'] = 'Pipelines';
            $this->data['slug']         = 'pipelines';
            $this->data['rs_pipeline']  = Pipelines::orderBy('id', 'DESC')->paginate(10);
            return view("pipeline.list", $this->data);
        } //view

        if ($action == 'delete_stage') {
            if (Deals::where('stage_id', $id)->first()) {
                echo json_encode(['status' => 1, 'error' => 'Delete this stage associate deals than try again.']);
            } else {
                Stages::where('id', $id)->delete();
                echo json_encode(['status' => 2, 'error' => '']);
            }
        }
    } // pipelines

    public function stages($id)
    {
        $this->data['current_slug']  = 'Stages';
        $this->data['slug']          = 'pipeline_stages';
        // $this->data['rs_user']       = User::where(['role' => 'user', 'id' => $id])->first();
        // $this->data['total_details'] = Deals::where('user_id', $id)->get()->count();

        return view("pipeline.stages", $this->data);
    } // userDetails


    public function addField(Request $request)
    {
        $this->data['current_slug'] = 'Add Custom Field';
        $this->data['slug']         = 'add_field';
        if ($request->isMethod('post')) {
            $request->validate([
                'title'  => 'required|unique:custom_fields',
                'type'   => 'required'
            ]);
            $data = $request->all();
            if ($data) {
                $sort = 0;
                $last_sort = CustomFields::select('sort')->where('type', $data['type'])->orderBy('sort', 'desc')->first();
                if ($last_sort) {
                    $sort = $last_sort['sort'] + 1;
                }
                CustomFields::create([
                    'title' => $data['title'],
                    'type'  => $data['type'],
                    'sort'  => $sort
                ]);
                return redirect(url('customfield'))->withSuccess('Custom Field Created Successfully.')->withInput();
            }
        } else if ($request->isMethod('get')) {
            return view("customfield.add", $this->data);
        }
    } // addField

    public function editField(Request $request, $id)
    {
        $this->data['current_slug'] = 'Edit Custom Field';
        $this->data['slug']         = 'edit_field';
        $this->data['fields_type']  = ['contact', 'deals'];

        if ($request->isMethod('put')) {
            $update_data = [
                'title'   => $request->title,
                'type'    => $request->type
            ];
            CustomFields::whereId($id)->update($update_data);
            return redirect(url('customfield'))->withSuccess('Custom Field Update Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $this->data['rs_field'] = CustomFields::where('id', $id)->first();
            return view("customfield.edit", $this->data);
        }
    } // editField

    public function fieldList(Request $request)
    {
        $this->data['current_slug'] = 'Custom Field';
        $this->data['slug']         = 'field_list';

        if ($request->isMethod('post')) {
            foreach ($request->sorting as $index => $id) {
                CustomFields::whereId($id)->update(['sort' => $index]);
            }
            return redirect(url('customfield'))->withSuccess('Sorted Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $this->data['rs_field']     = CustomFields::orderBy('sort', 'asc')->get();
            return view("customfield.list", $this->data);
        }
    } // fieldList

    public function getPipelineStages($id, $stage_id = NULL)
    {
        $stages = Stages::where('pipeline_id', $id)->orderBy('title', 'ASC')->get();
        $stages_data = "";

        if ($stage_id) {
            foreach ($stages as $rec) {
                $stages_data .= "<option value='$rec->id'";

                if ($rec->id == $stage_id) {
                    $stages_data .= "selected='selected'";
                }
                $stages_data .= ">$rec->title</option>";
            }
        } else {
            foreach ($stages as $rec) {
                $stages_data .= "<option value='$rec->id'>$rec->title</option>";
            }
        }
        echo $stages_data;
    } // getPipelineStages

    public function exportXLS()
    {
        $file_name = 'contacts.xls';
        $users = User::where('role', '=', 'user')->get();

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
        $users = User::where('role', '=', 'user')->get();
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
