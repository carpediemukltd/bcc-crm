<?php

namespace App\Models;

use App\Models\Stage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pipeline extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title'];

    public function stage()
    {
        return $this->hasMany(Stage::class, 'pipeline_id');
    }
}
