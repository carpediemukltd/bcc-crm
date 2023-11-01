<?php

namespace App\Http\Controllers;

use App\Helpers\Permissions;
use App\Jobs\SendNotification;
use App\Models\Activity;
use App\Models\User;
use App\Models\Deal;
use App\Models\Stage;
use App\Models\Pipeline;
use App\Models\UserOwner;
use App\Models\UserDetails;

use App\Models\CustomField;
use Database\Seeders\Users;
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

    public function userDeals($id, $view = 'listing')
    {
        $this->data['current_slug'] = 'Deals';
        $this->data['slug']         = 'user_deals';

        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }

        $this->data['current_user_id'] = $id;
        $this->data['rs_deals'] = Deal::getDealsByUser($id, 0);
        $pipelines = Pipeline::orderBy('title', 'ASC')->get();
        $this->data['pipelines'] = $pipelines;
       /*  $pipeline_stages = array();
        if ($pipelines->isNotEmpty()) {
            foreach ($pipelines as $pipeline) {
                $pipeline_arr['id'] = $pipeline->id;
                $pipeline_arr['title'] = $pipeline->title;
                $stages = Stage::where('pipeline_id', $pipeline->id)->orderBy('title', 'ASC')->get();
                $stages_arr = array();
                if ($stages->isNotEmpty()) {
                    foreach ($stages as $stage) {
                        $this_stage['id'] = $stage->id;
                        $this_stage['title'] = $stage->title;
                        array_push($stages_arr, $this_stage);
                    }
                }
                $pipeline_arr['stages'] = $stages_arr;
                array_push($pipeline_stages, $pipeline_arr);
            }
        }
        $this->data['pipeline_stages'] = $pipeline_stages; */
        $this->data['stages'] = Stage::orderBy('sort', 'ASC')->get();
        if ($view == 'board') {
            return view("deals.board", $this->data);
        } else {
            return view("deals.list", $this->data);
        }
    }

    public function dealsList($id, $view = 'listing')
    {
        $this->data['current_slug'] = 'Deals';
        $this->data['slug']         = 'user_deals';

        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }

        $this->data['current_user_id'] = $id;
        $this->data['rs_deals'] = Deal::getDealsByUser($id, 0);
        $pipelines = Pipeline::orderBy('title', 'ASC')->get();
        $this->data['pipelines'] = $pipelines;
        /* $pipeline_stages = array();
        if ($pipelines->isNotEmpty()) {
            foreach ($pipelines as $pipeline) {
                $pipeline_arr['id'] = $pipeline->id;
                $pipeline_arr['title'] = $pipeline->title;
                $stages = Stage::where('pipeline_id', $pipeline->id)->orderBy('title', 'ASC')->get();
                $stages_arr = array();
                if ($stages->isNotEmpty()) {
                    foreach ($stages as $stage) {
                        $this_stage['id'] = $stage->id;
                        $this_stage['title'] = $stage->title;
                        array_push($stages_arr, $this_stage);
                    }
                }
                $pipeline_arr['stages'] = $stages_arr;
                array_push($pipeline_stages, $pipeline_arr);
            }
        } */
        $this->data['stages'] = Stage::orderBy('sort', 'ASC')->get();
        if ($view == 'board') {
            return view("deals.board", $this->data);
        } else {
            return view("deals.list", $this->data);
        }
    }

    public function deals_sandbox() {
        $slug = "deals-sandbox";
        return view('deals_report', compact('slug'));
    }

    public function filter_deals(Request $request) {
        
        $dates = explode("-",$request->daterange);
        $Date1 = rtrim(date('Y-m-d', strtotime($dates[0])));
        $Date2 = ltrim(date('Y-m-d', strtotime($dates[1])));

        $deals = Deal::with('stage', 'pipeline')->whereDate('created_at','>=', $Date1)->whereDate('created_at','<=', $Date2)->where('stage_id',$request->stages)->get();

       return response()->json($deals);
    }

    public function userDealsBoardCards($id, $pipeline_id)
    {
        $this->data['current_slug'] = 'Deals';
        $this->data['slug']         = 'user_deals_board_cards';

        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }

        $this->data['current_user_id'] = $id;
        $this->data['stages'] = Stage::orderBy('sort','ASC')->get();
        $this->data['deals'] = Deal::where('pipeline_id', $pipeline_id)->where('user_id', $id)->get();

        return view("deals.board_card", $this->data);
    }

    public function dealsAdd(Request $request, $id)
    {   

        
        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }

        if ($request->isMethod('post')) {
            $deal = Deal::create([
                'title' => $request->title,
                'user_id' => $id,
                'pipeline_id' => $request->pipeline_id,
                'stage_id' => $request->stage_id,
                'amount' => $request->amount,
                'deal_owner' => $request->deal_owner,
                'lead_source' => $request->lead_source,
                'depositing_institution' => $request->depositing_institution,
                'state' => $request->state,
                'submitted_bank' => $request->submitted_bank,
                'sub_type' => $request->sub_type,
            ]);

            $activity = Activity::create([
                'moduleName' => 'Deal',
                'user_id' => auth()->id(),
                'contact_id' => $id
               
            ]);

            if ($request->custom_fields_count > 0) {
                foreach ($request->custom_fields as $key => $value) {
                    UserDetails::updateOrCreate(
                        ['user_id' => 0, 'deal_id' => $deal->id, 'custom_field_id' => $key],
                        ['data' => $value]
                    );
                }
            }
            SendNotification::dispatch(['id' => $deal->id, 'type' => 'deal_added']);
            return redirect(route('user.deals', [$id, 'listing']))->withSuccess('Deal Created Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $this->data['current_slug'] = 'Add Deal';
            $this->data['slug'] = 'user_add_deal';
            $this->data['current_user_id'] = $id;
            $this->data['custom_fields'] =  CustomField::getDataByDeal($id);

            $this->data['rs_pipelines'] = Pipeline::getPipelineByUser($id);
            $this->data['rs_stages'] = Stage::orderBy('sort', 'ASC')->get();
            $this->data['owners'] = User::whereRole('owner')->get();
            return view("deals.add", $this->data);
        }
    } // dealsAdd

    public function dealsEdit(Request $request, $user_id, $id)
    {
        $access = Permissions::checkUserAccess($this->user, $user_id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }

        $this->data['rs_deal'] = Deal::getDeals($user_id, $id);
        if (!$this->data['rs_deal']) {
            return redirect(route('dashboard'))->with('error', 'Access Denied to Deal.');
        }

        if ($request->isMethod('post')) {
            Deal::where('id', $id)->update([
                'title' => $request->title,
                'pipeline_id' => $request->pipeline_id,
                'stage_id' => $request->stage_id,
                'amount' => $request->amount,
                'deal_owner' => $request->deal_owner,
                'lead_source' => $request->lead_source,
                'depositing_institution' => $request->depositing_institution,
                'state' => $request->state,
                'submitted_bank' => $request->submitted_bank,
                'sub_type' => $request->sub_type,
            ]);

            if ($request->custom_fields_count > 0) {
                foreach ($request->custom_fields as $key => $value) {
                    UserDetails::updateOrCreate(
                        ['user_id' => 0, 'deal_id' => $id, 'custom_field_id' => $key],
                        ['data' => $value]
                    );
                }
            }

            return redirect(route('user.deals', [$user_id, 'listing']))->withSuccess('Deal Update Successfully.')->withInput();
        } else if ($request->isMethod('get')) {
            $this->data['current_slug'] = 'Edit Deal';
            $this->data['slug'] = 'user_edit_deal';
            $this->data['current_user_id'] = $user_id;

            $this->data['rs_pipelines'] = Pipeline::getPipelineByUser($user_id);
            $this->data['rs_stages'] = Stage::orderBy('sort', 'ASC')->get();
            $this->data['custom_fields'] = CustomField::getDataByDeal($id);
            return view("deals.edit", $this->data);
        }
    } // dealsEdit

    public function dealsUpdateStage(Request $request, $user_id, $id)
    {

       
        $access = Permissions::checkUserAccess($this->user, $user_id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }

        $this->data['rs_deal'] = Deal::getDeals($user_id, $id);
        if (!$this->data['rs_deal']) {
            return redirect(route('dashboard'))->with('error', 'Access Denied to Deal.');
        }

        if ($request->isMethod('post')) {
            Deal::where('id', $id)->update([
                'stage_id' => $request->stage_id,
            ]);

            $satgeName = Stage::where('id',$request->stage_id)->get();

            $activity = Activity::create([
                'moduleName' => 'Stage',
                'user_id' => auth()->id(),
                'contact_id' => $user_id,
                'details' =>$satgeName[0]->title
               
            ]);

            SendNotification::dispatch(['id'=> $id, 'type'=> 'deal_stage_changed']);
            return redirect(route('user.deals', [$user_id, 'listing']))->withSuccess('Deal Update Successfully.')->withInput();
        }
    }

    public function exportXLS($id)
    {
        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }
        $this->data['user']       = User::where(['id' => $id])->first();
        $file_name = "deals_{$id}.xls";
        $deals = Deal::getDealsByUser($id, 0);

        $file = new Spreadsheet();
        $active_sheet = $file->getActiveSheet();

        $active_sheet->setCellValue('A1', 'Title');
        $active_sheet->setCellValue('B1', 'Amount');
        $active_sheet->setCellValue('C1', 'Deal Owner');
        $active_sheet->setCellValue('D1', 'Source');
        $active_sheet->setCellValue('E1', 'Depositing Institution');
        $active_sheet->setCellValue('F1', 'State');
        $active_sheet->setCellValue('G1', 'Submitted Bank');
        $active_sheet->setCellValue('H1', 'Sub Type');
        $active_sheet->setCellValue('I1', 'Pipeline');
        $active_sheet->setCellValue('J1', 'Stage');
        $active_sheet->setCellValue('K1', 'Created At');
        $cfields = CustomField::where('type', '=', 'deals')->where('visible', '=', 1)->get();

        $startColumn = 'L';
        $column = $startColumn;
        if (!$cfields->isEmpty()) {
            foreach ($cfields as $cfield) {
                $active_sheet->setCellValue($column . '1', $cfield->title);
                $column++;
            }
        }
        $count = 2;
        foreach ($deals as $deal) {
            $column = $startColumn;
            $custom_fields =  CustomField::getDataByDeal($deal->id);
            $active_sheet->setCellValue('A' . $count, $deal->title);
            $active_sheet->setCellValue('B' . $count, $deal->amount);
            $active_sheet->setCellValue('C' . $count, $deal->deal_owner);
            $active_sheet->setCellValue('D' . $count, $deal->lead_source);
            $active_sheet->setCellValue('E' . $count, $deal->depositing_institution);
            $active_sheet->setCellValue('F' . $count, $deal->state);
            $active_sheet->setCellValue('G' . $count, $deal->submitted_bank);
            $active_sheet->setCellValue('H' . $count, $deal->sub_type);
            $active_sheet->setCellValue('I' . $count, $deal->pipeline);
            $active_sheet->setCellValue('J' . $count, $deal->stage);
            $active_sheet->setCellValue('K' . $count, $deal->created_at);

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

    public function exportCSV($id)
    {
        $access = Permissions::checkUserAccess($this->user, $id);
        if (!$access) {
            return redirect(route('dashboard'))->with('error', 'Access Denied.');
        }

        $this->data['user']       = User::where(['id' => $id])->first();
        $file_name = "deals_{$id}.csv";
        $deals = Deal::getDealsByUser($id, 0);

        $columns = array('Title', 'Amount', 'Deal Owner', 'Source', 'Depositing Institution', 'State', 'Submitted Bank', 'Sub Type', 'Pipeline', 'Stage', 'Created At');
        $file = fopen($path = storage_path($file_name), 'w');
        $cfields = CustomField::where('type', '=', 'deals')->where('visible', '=', 1)->get();

        if (!$cfields->isEmpty()) {
            foreach ($cfields as $cfield) {
                array_push($columns, $cfield->title);
            }
        }
        fputcsv($file, $columns);

        foreach ($deals as $deal) {

            $custom_fields =  CustomField::getDataByDeal($deal->id);
            $row['Title'] = $deal->title;
            $row['Amount'] = $deal->amount;
            $row['Deal Owner'] = $deal->deal_owner;
            $row['Source'] = $deal->lead_source;
            $row['Depositing Institution'] = $deal->depositing_institution;
            $row['State'] = $deal->state;
            $row['Submitted Bank'] = $deal->submitted_bank;
            $row['Sub Type'] = $deal->sub_type;
            $row['Pipeline'] = $deal->pipeline;
            $row['Stage'] = $deal->stage;
            $row['Created At']  = $deal->created_at;

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
