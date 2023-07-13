<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
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

    public function addCompany(Request $request)
    {
        
        $this->data['current_slug'] = 'Add Company';
        $this->data['slug']         = 'add_company';
        
        $user = auth()->user();
        /* if (!$user->hasPermissionTo('create company')) {
            return redirect(url("dashboard"))->with("error", "You don't have permission.");
        } */
        
        if ($request->isMethod('post')) {
       
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'role' => 'required',
                'company_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ]);

            $data = $request->all();
            
            $roles = array('admin');
            if (!in_array($request->role, $roles)) {
                return redirect()->back()->with('error','You\'ve selected an invalid role.')->withInput();
            }

            if ($data) {
                $new_company = Company::create([
                    'name' => $data['company_name']
                ]);

                User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_number'  => $data['phone_number'],
                    'role' => $data['role'],
                    'company_id' => $new_company->id,
                    'password' => Hash::make($data['password'])
                ]);

                return redirect(route('company.list'))->withSuccess('Company Created Successfully.');
            }
        } else if ($request->isMethod('get')) {
            return view("company.add", $this->data);
        }
    }

    public function listCompany(Request $request)
    {
        
        $this->data['current_slug'] = 'Companies';
        $this->data['slug']         = 'list_company';

        $user = auth()->user();
        /* if (!$user->hasPermissionTo('list company')) {
            return redirect(url("dashboard"))->with("error", "No permission to view user list.");
        } */

        $this->data['companies'] = Company::join('users', function ($join) {
            $join->on('companies.id', '=', 'users.company_id');
        })->where('role', '=','admin')
            ->when($request->search_term, function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('first_name', 'like', '%' . $request->search_term . '%');
                    $query->orWhere('last_name', 'like', '%' . $request->search_term . '%');
                    $query->orWhere('email', 'like', '%' . $request->search_term . '%');
                    $query->orWhere('phone_number', 'like', '%' . $request->search_term . '%');
                });
            })
            ->when($request->status, function ($q) use ($request) {
                $q->where('users.status', $request->status);
            })
            ->when($request->role, function ($q) use ($request) {
                $q->where('role', $request->role);
            })
            ->when($request->start_date, function ($q) use ($request) {
                $q->whereBetween('created_at', [$request->start_date, $request->end_date]);
            })
            ->orderBy('users.id', 'DESC')->paginate(10);

        if ($request->ajax())
            return view('company.pagination', $this->data)->render();
        else
            return view("company.list", $this->data);
    }
}
