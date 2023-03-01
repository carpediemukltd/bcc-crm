<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPdf extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'ssn', 'pdf_name'];
    protected $table    = 'user_pdf';
}