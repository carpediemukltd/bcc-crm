<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentManagerUser extends Model
{
    use HasFactory;
    protected $table = 'document_manager_user';
    protected $fillable = ['user_id', 'document_manager_id'];

}
