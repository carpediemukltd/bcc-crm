<?php

namespace App\Models\EmailMarketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailMarketingEmailTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'editor',
        'subject',
        'html_content',
        'plain_content',
        'generate_plain_content',
    ];
}
