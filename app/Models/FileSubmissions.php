<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSubmissions extends Model
{
    use HasFactory;
    protected $fillable = ['id ', 'submissions_id', 'file_name', 'file_path'];
    
}
