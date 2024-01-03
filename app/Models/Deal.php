<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deal extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'user_id', 'pipeline_id', 'stage_id', 'amount', 'deal_owner', 'lead_source', 'depositing_institution', 'state', 'submitted_bank', 'sub_type', 'reference_id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            // assign random string and deal id
            $model->reference_id = self::generateRandomString(10);
        });
    }

    public static function getDeals($user_id, $deal_id)
    {
        $data = Deal::where('id', $deal_id)->where('user_id', $user_id)->first();
        return $data;
    }

    public static function getDealsByUser($id, $pipeline_id)
    {
        $Deals = Deal::where('user_id', $id)
            ->join('pipelines', function ($join) {
                $join->on('pipelines.id', '=', 'deals.pipeline_id');
            })
            ->join('stages', function ($join) {
                $join->on('stages.id', '=', 'deals.stage_id');
            })
            ->when($pipeline_id > 0, function ($q) use ($pipeline_id) {
                $q->where('pipelines.id', '=', DB::raw($pipeline_id));
            })
            ->select('deals.*', 'pipelines.title as pipeline', 'stages.title as stage')
            ->orderBy('id', 'DESC')->paginate(10);

        return $Deals;
    }

    public static function getDealsByFilters($filters)
    {
        $Deals = Deal::join('users', function ($join) {
            $join->on('users.id', '=', 'deals.user_id');
        })
            ->join('companies', function ($join) {
                $join->on('companies.id', '=', 'users.company_id');
                $join->on('companies.status', '=',  DB::raw("'active'"));
            })
            ->join('pipelines', function ($join) {
                $join->on('pipelines.id', '=', 'deals.pipeline_id');
            })
            ->join('stages', function ($join) {
                $join->on('stages.id', '=', 'deals.stage_id');
            })
            ->when(isset($filters['depositing_institution']) && !empty($filters['depositing_institution']), function ($q) use ($filters) {
                $q->where('deals.depositing_institution', 'like', '%' . $filters['depositing_institution'] . '%');
            })
            ->when(isset($filters['state']) && !empty($filters['state']), function ($q) use ($filters) {
                $q->where('deals.state', 'like', '%' . $filters['state'] . '%');
            })
            ->when(isset($filters['submitted_bank']) && !empty($filters['submitted_bank']), function ($q) use ($filters) {
                $q->where('deals.submitted_bank', 'like', '%' . $filters['submitted_bank'] . '%');
            })
            ->when(isset($filters['sub_type']) && !empty($filters['sub_type']), function ($q) use ($filters) {
                $q->where('deals.sub_type', 'like', '%' . $filters['sub_type'] . '%');
            })
            ->when(isset($filters['company_id']) && $filters['company_id'] > 0, function ($q) use ($filters) {
                $q->where('users.company_id', '=', DB::raw($filters['company_id']));
            })
            ->when(isset($filters['user_id']) && $filters['user_id'] > 0, function ($q) use ($filters) {
                $q->where('users.id', '=', DB::raw($filters['user_id']));
            })
            ->select('deals.*', 'pipelines.title as pipeline', 'stages.title as stage', 'users.id as user_id', 'companies.id as company_id', 'companies.name as company_name')
            ->orderBy('id', 'DESC');
        if ($filters['paginate'] > 0)
            $Deals = $Deals->paginate($filters['paginate']);
        else
            $Deals = $Deals->get();

        return $Deals;
    }

    public function stage()
    {
        return $this->hasOne(Stage::class, 'id', 'stage_id');
    }

    public function pipeline()
    {
        return $this->hasOne(Pipeline::class, 'id', 'pipeline_id');
    }

    public static function getApplicationStatus($iUserId)
    {
        return self::from("deals AS D")
            ->join("stages AS S", "S.id", "D.stage_id")
            #->join("pipelines AS P", "P.id", "D.pipeline_id")
            ->select(["S.title"])
            ->where("D.user_id", $iUserId)
            ->get();
    }

    private static function generateRandomString($length=10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // characters to be used in the random string
        $rand   = mt_rand(1, 99);
        return substr(str_shuffle($characters), 0, $length) . $rand; // generate random string
    }
}
