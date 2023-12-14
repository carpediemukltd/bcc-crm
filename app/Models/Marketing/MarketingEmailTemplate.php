<?php

namespace App\Models\Marketing;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketingEmailTemplate extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name',
        'content',
    ];

    /**
     * Get the company that owns the email template.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
