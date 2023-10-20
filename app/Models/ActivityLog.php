<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',  // Add 'user_id' to the fillable fields
        'action',
        'entity',
        'data',
        'module_id',
    ];
   
    
    
    
    
    
}
