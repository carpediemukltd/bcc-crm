<?php

namespace App\Models;

use App\Models\Deal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Pipeline extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'company_id', 'title'];

    public function deal()
    {
        return $this->hasMany(Deal::class, 'pipeline_id');
    }

    public static function getPipelineByUser($user_id)
    {
        $data = Pipeline::join('users', function ($join) {
            $join->on('users.company_id', '=', 'pipelines.company_id');
            $join->on('users.company_id', '>', DB::raw(0));
        })
        ->where('users.id', $user_id)
        ->select('pipelines.*')
        ->orderBy('title', 'ASC')
        ->get();
        
        return $data;
    }
}
