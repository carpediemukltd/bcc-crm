<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deals extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'user_id', 'pipeline_id', 'stage_id', 'amount', 'deal_owner', 'lead_source'];
 
    public static function getDeals($user_id,$deal_id)
    {
        $data = Deals::where('id', $deal_id)->where('user_id', $user_id)->first();

        return $data;
    }

    public static function getDealsByUser($id)
    {
        $Deals = Deals::where('user_id', $id)
        ->join('pipelines', function ($join) {
            $join->on('pipelines.id', '=', 'deals.pipeline_id');
        })
        ->join('stages', function ($join) {
            $join->on('stages.id', '=', 'deals.stage_id');
        })
        ->select('deals.*', 'pipelines.title as pipeline', 'stages.title as stage')
        ->orderBy('id', 'DESC')->paginate(10);

        return $Deals;
    }

    public function stage() {
        return $this->hasOne(Stages::class, 'id', 'stage_id');
    }

    public function pipeline() {
        return $this->hasOne(Pipelines::class, 'id', 'pipeline_id');
    }
}
