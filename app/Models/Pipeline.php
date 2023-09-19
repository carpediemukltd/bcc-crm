<?php

namespace App\Models;

use App\Models\Deal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pipeline extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'company_id', 'title'];

    public function deal()
    {
        return $this->hasMany(Deal::class, 'pipeline_id');
    }
}
