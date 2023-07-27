<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'user_id', 'pipeline_id', 'stage_id', 'amount', 'deal_owner', 'lead_source'];
    
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
}
