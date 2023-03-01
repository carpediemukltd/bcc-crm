<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $fillable = ['id ', 'user_id', 'type', 'file_group_name', 'file_name', 'file_path'];
    
}
