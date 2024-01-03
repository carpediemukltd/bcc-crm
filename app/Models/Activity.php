<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['moduleName','user_id','contact_id','details'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
