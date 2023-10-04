<?php

namespace App\Http\Controllers;

use App\Helpers\Permissions;
use App\Jobs\SendNotification;
use Illuminate\Http\Request;
use App\Models\RoundRobinSetting;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
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
            if ($request->round_robin > 0) {
                foreach ($request->priority as $key => $value) {
                    if($request->company_id){
                        $companyid = $request->company_id;
                    }else{
                        $user = User::whereId($key)->first();
                        $companyid = $user->company_id;
                    }                    
                    RoundRobinSetting::updateOrCreate(
                        ['company_id' => $companyid, 'owner_id' =>  $key],
                        ['priority' => $value]
                    );
                    SendNotification::dispatch(['id'=> $key, 'type'=>'round_robin_owner_added']);
                }
            }
            return redirect(url('roundrobin'))->withSuccess('Round Robin settings updated successfully.');
        } else if ($request->isMethod('get')) {

            $this->data['settings'] = RoundRobinSetting::getDataByCompany($this->company_id);
            return view("roundrobin.index", $this->data);
        }
    }
}
