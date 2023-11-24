<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImport extends Model
{
    use HasFactory;
    protected $fillable = ['file_name', 'file_original_name', 'added_by', 'records', 'records_imported', 'status'];
}
