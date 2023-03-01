<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomLeadLog extends Model
{
    use HasFactory;
    protected $fillable = ['loan_lead_id', 'loan_lead_detail_id', 'exception', 'type', 'status'];
}
