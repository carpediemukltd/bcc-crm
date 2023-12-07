<?php

namespace App\Models\SendGrid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomSmtp extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['company_id', 'host', 'username', 'password', 'port', 'encryption_type', 'reply_to', 'username_display'];    
}
