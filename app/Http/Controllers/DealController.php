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

class DealController extends Controller
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
    
    public function userDeals($id)
    {
        $this->data['current_slug'] = 'Deals';
        $this->data['slug']         = 'user_deals';
        
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


        $this->data['current_user_id'] = $id;
        $this->data['rs_deals'] = Deals::where('user_id', $id)->orderBy('id', 'DESC')->paginate(10);
        return view("user.deals.list", $this->data);
    } // userDeals

    public function dealsAdd(Request $request, $id)
    {
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
        $company_id = 0;
        $user = auth()->user();
        if ($user->role != 'superadmin') {
            $company_id = $this->user->company_id;
        }
        $this->data['user']       = User::where(['id' => $user_id])
        ->when(($company_id > 0), function ($q) use ($company_id) {
            $q->where('company_id', '=', $company_id);
        })->first();
        if(!$this->data['user']){
            return redirect(route('dashboard'))->with('error','Access Denied.');
        }

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

    public function exportXLS($id)
    {
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
        
        $file_name = "deals_{$id}.xls";
        $deals = Deals::where('user_id', $id)->orderBy('id', 'DESC')->get();
        $columns = array('Title', 'Amount', 'Deal Owner', 'Source', 'Created At');
        
        $file = new Spreadsheet();
        $active_sheet = $file->getActiveSheet();

        $active_sheet->setCellValue('A1', 'Title');
        $active_sheet->setCellValue('B1', 'Amount');
        $active_sheet->setCellValue('C1', 'Deal Owner');
        $active_sheet->setCellValue('D1', 'Source');
        $active_sheet->setCellValue('E1', 'Created At');
        $count=2;
        foreach ($deals as $deal) {
            $active_sheet->setCellValue('A' . $count, $deal->title);
            $active_sheet->setCellValue('B' . $count, $deal->amount);
            $active_sheet->setCellValue('C' . $count, $deal->deal_owner);
            $active_sheet->setCellValue('D' . $count, $deal->lead_source);
            $active_sheet->setCellValue('E' . $count, $deal->created_at);
            $count++;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xls');
        $writer->save($path = storage_path($file_name));

        return response()->download($path)->deleteFileAfterSend();
    }

    public function exportCSV($id)
    {
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
        
        $file_name = "deals_{$id}.csv";
        $deals = Deals::where('user_id', $id)->orderBy('id', 'DESC')->get();
        $columns = array('Title', 'Amount', 'Deal Owner', 'Source', 'Created At');
        $file = fopen($path = storage_path($file_name), 'w');
        fputcsv($file, $columns);

        foreach ($deals as $deal) {

            $row['Title'] = $deal->title;
            $row['Amount'] = $deal->amount;
            $row['Deal Owner'] = $deal->deal_owner;
            $row['Source'] = $deal->lead_source;
            $row['Created At']  = $user->created_at;
            fputcsv($file, $row);
        }
        fclose($file);
        return response()->download($path)->deleteFileAfterSend();
    }
}
