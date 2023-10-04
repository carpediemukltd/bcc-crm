<?php

namespace App\Models;

use App\Models\Deal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'sort'];

    public function deal()
    {
        return $this->hasMany(Deal::class, 'stage_id');
    }
}
