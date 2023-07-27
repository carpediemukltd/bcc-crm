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

class PipelineController extends Controller
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
}
