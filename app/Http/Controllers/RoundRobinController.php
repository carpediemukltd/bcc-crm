<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Deals;
use App\Models\Stages;
use App\Models\Pipelines;
use App\Models\UserOwner;
use App\Models\UserDetails;
use App\Helpers\Permissions;

use App\Models\CustomFields;
use Illuminate\Http\Request;
use App\Models\RoundRobinSetting;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class RoundRobinController extends Controller
{

    protected $user;
    protected $data;
    protected $company_id = 0;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->data['user'] = $this->user;
            if ($this->user->role != 'superadmin') {
                $this->company_id = $this->user->company_id;
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $this->data['current_slug'] = 'Round Robin';
        $this->data['slug']         = 'roundrobin';

        if ($request->isMethod('put')) {

            $access = Permissions::checkCompany($this->user, $request->company_id);
            if (!$access) {
                return redirect(route('dashboard'))->with('error', 'Access Denied.');
            }

            if ($request->round_robin > 0) {
                foreach ($request->priority as $key => $value) {
                    RoundRobinSetting::updateOrCreate(
                        ['company_id' => $request->company_id, 'owner_id' =>  $key],
                        ['priority' => $value]
                    );
                }
            }
            return redirect(url('roundrobin'))->withSuccess('Round Robin settings updated successfully.');
        } else if ($request->isMethod('get')) {

            $this->data['settings'] = RoundRobinSetting::getDataByCompany($this->company_id);
            return view("roundrobin.index", $this->data);
        }
    }
}
