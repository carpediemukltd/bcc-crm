<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitLoanDocs extends Model
{
    use HasFactory;
    protected $fillable = ['file_name', 'file_path', 'file_dir', 'loan_lead_id', 'loan_doc_signature', 'file_type'];
    
}
