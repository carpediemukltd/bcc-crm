<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreliminaryOwner extends Model
{
    use HasFactory;
    protected $fillable = ['loan_lead_id', 'first_name', 'last_name', 'phone', 'email', 'ssn', 'address', 'ownership', 'fisco_score', 'dob', 'signaure'];
}
