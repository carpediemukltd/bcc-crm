<?php

namespace App\Http\Controllers;


use App\Models\Deal;
use App\Models\User;
use App\Models\Stage;
use App\Models\Company;
use App\Models\Pipeline;
use App\Helpers\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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

    public function companyDeals()
    {
        $this->data['current_slug'] = 'Company Deals';
        $this->data['slug']         = 'deals_company';

        $pipelines = Pipeline::orderBy('title', 'ASC')->get();
        $companies = Company::orderBy('name', 'ASC')->get();
        $stages = Stage::orderBy('sort', 'ASC')->get();
        $this->data['pipelines'] = $pipelines;
        $this->data['companies'] = $companies;
        $this->data['stages'] = $stages;
        return view("deals.company", $this->data);
    }

    public function companyDealsDetail($view, Request $request)
    {
        $filters['company_id'] = $request->company_id;
        $filters['depositing_institution'] = $request->depositing_institution;
        $filters['state'] = $request->state;
        $filters['submitted_bank'] = $request->submitted_bank;
        $filters['sub_type'] = $request->sub_type;
        $filters['paginate'] = 10;
        $this->data['deals'] = Deal::getDealsByFilters($filters);
        $this->data['stages'] = Stage::orderBy('sort', 'ASC')->get();

        if ($view == 'board') {
            return view("deals.company_board", $this->data);
        } else {
            return view("deals.company_list", $this->data);
        }
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
                'name' => 'required|unique:companies',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ]);

            $data = $request->all();

            $roles = array('admin');
            if (!in_array($request->role, $roles)) {
                return redirect()->back()->with('error', 'You\'ve selected an invalid role.')->withInput();
            }

            if ($data) {
                $new_company = Company::create([
                    'name' => $data['name']
                ]);

                User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_number'  => $data['phone_country_code']." ".$data['phone_number'],
                    'role' => $data['role'],
                    'company_id' => $new_company->id,
                    'password' => Hash::make($data['password'])
                ]);

                Pipeline::create([
                    'company_id' => $new_company->id,
                    'title' => $data['name'] . " Pipeline",

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
        })
            ->where('role', '=', 'admin')
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
            ->select('users.*', 'companies.id as the_company_id', 'companies.name as company_name')
            // ->groupBy('the_company_id')
            ->orderBy('users.id', 'DESC')->paginate(10);

        if ($request->ajax())
            return view('company.pagination', $this->data)->render();
        else
            return view("company.list", $this->data);
    }

    public function editCompany(Request $request, $id)
    {
        $this->data['current_slug'] = 'Edit Company';
        $this->data['slug']         = 'edit_company';
        $this->data['all_status']   = ['inactive', 'active', 'deleted', 'banned'];

        if ($request->isMethod('put')) {

            $request->validate([
                'company_id' => 'required',
                'admin_id' => 'required',
                'name' => 'required|unique:companies,name,' . $id,
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'role' => 'required',
                'status' => 'required',
            ]);

            $data = $request->all();

            if ($request->password && strlen($request->password) < 6) {
                return redirect()->back()->withError('Password must be 6 digits.')->withInput();
            } else if ($request->password && strlen($request->password) >= 6) {
                $data['password'] = Hash::make($request->password);
            }
            $user_data = [
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'phone_number' => $request->phone_country_code." ".$request->phone_number,
                'status'       => $request->status
            ];
            $company_data = [
                'name'   => $request->name,
            ];
            if (isset($data['password'])) {
                $user_data['password'] = $data['password'];
            }
            if ($data['admin_id'] > 0) {
                User::whereId($data['admin_id'])->update($user_data);
            }
            if ($data['company_id'] > 0) {
                Company::whereId($data['company_id'])->update($company_data);
            }
            return redirect(url('companies'))->withSuccess('Company Updated Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $this->data['company'] = Company::join('users', function ($join) {
                $join->on('companies.id', '=', 'users.company_id');
            })
                ->where('role', '=', 'admin')->where('companies.id', '=', $id)
                ->select('users.*', 'companies.id as company_id', 'companies.name as company_name')
                ->orderBy('users.id', 'DESC')->first();
            return view("company.edit", $this->data);
        }
    }

     public function exportDealsXLS(Request $request)
    {
        $file_name = 'company_deals.xls';
        $filters['user_id'] = $this->user->id;
        $filters['company_id'] = $request->company_id;
        $filters['depositing_institution'] = $request->depositing_institution;
        $filters['state'] = $request->state;
        $filters['submitted_bank'] = $request->submitted_bank;
        $filters['sub_type'] = $request->sub_type;
        $filters['paginate'] = 0;
        $deals = Deal::getDealsByFilters($filters);

        $file = new Spreadsheet();
        $active_sheet = $file->getActiveSheet();

        $active_sheet->setCellValue('A1', 'Company');
        $active_sheet->setCellValue('B1', 'Stage');
        $active_sheet->setCellValue('C1', 'Title');
        $active_sheet->setCellValue('D1', 'Amount');
        $active_sheet->setCellValue('E1', 'Deal Owner');
        $active_sheet->setCellValue('F1', 'Source');
        $active_sheet->setCellValue('G1', 'Depositing Institution');
        $active_sheet->setCellValue('H1', 'State');
        $active_sheet->setCellValue('I1', 'Submitted Bank');
        $active_sheet->setCellValue('J1', 'Sub Type');

        $count = 2;
        foreach ($deals as $deal) {
            $active_sheet->setCellValue('A' . $count, $deal->company_name);
            $active_sheet->setCellValue('B' . $count, $deal->stage);
            $active_sheet->setCellValue('C' . $count, $deal->title);
            $active_sheet->setCellValue('D' . $count, $deal->amount);
            $active_sheet->setCellValue('E' . $count, $deal->deal_owner);
            $active_sheet->setCellValue('F' . $count, $deal->lead_source);
            $active_sheet->setCellValue('G' . $count, $deal->depositing_institution);
            $active_sheet->setCellValue('H' . $count, $deal->state);
            $active_sheet->setCellValue('I' . $count, $deal->submitted_bank);
            $active_sheet->setCellValue('J' . $count, $deal->sub_type);

            $count++;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xls');
        $writer->save($path = storage_path($file_name));

        return response()->download($path)->deleteFileAfterSend();
    }
 
    public function exportDealsCSV(Request $request)
    {
        $file_name = 'company_deals.csv';
        $filters['user_id'] = $this->user->id;
        $filters['company_id'] = $request->company_id;
        $filters['depositing_institution'] = $request->depositing_institution;
        $filters['state'] = $request->state;
        $filters['submitted_bank'] = $request->submitted_bank;
        $filters['sub_type'] = $request->sub_type;
        $filters['paginate'] = 0;
        $deals = Deal::getDealsByFilters($filters);

        $columns = array('Company', 'Stage', 'Title', 'Amount', 'Deal Owner', 'Source', 'Depositing Institution', 'State', 'Submitted Bank', 'Sub Type');

        $file = fopen($path = storage_path($file_name), 'w');

        fputcsv($file, $columns);

        foreach ($deals as $deal) {

            $row['Company'] = $deal->company_name;
            $row['Stage'] = $deal->stage;
            $row['Title'] = $deal->title;
            $row['Amount'] = $deal->amount;
            $row['Deal Owner'] = $deal->deal_owner;
            $row['Source'] = $deal->lead_source;
            $row['Depositing Institution'] = $deal->depositing_institution;
            $row['State'] = $deal->state;
            $row['Submitted Bank'] = $deal->submitted_bank;
            $row['Sub Type'] = $deal->sub_type;

            fputcsv($file, $row);
        }
        fclose($file);
        return response()->download($path)->deleteFileAfterSend();
    }
}
