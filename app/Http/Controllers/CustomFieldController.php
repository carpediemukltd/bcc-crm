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

class CustomFieldController extends Controller
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

                $visible = 0;
                if (isset($request->visible) && $request->visible == 'on')
                    $visible = 1;

                CustomFields::create([
                    'title' => $data['title'],
                    'type'  => $data['type'],
                    'sort'  => $sort,
                    'visible'  => $visible
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
            
            $visible = 0;
            if (isset($request->visible) && $request->visible == 'on')
                $visible = 1;

            $update_data = [
                'title' => $request->title,
                'type' => $request->type,
                'visible' => $visible,
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


}
