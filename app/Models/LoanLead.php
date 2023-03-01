<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class LoanLead extends Model
{
    use HasFactory;
    protected $fillable = ['referral_source_specify', 'ghl_contact_id','hubspot_contact_id', 'hubspot_deal_id', 'loan_type', 'loan_type_sub', 'loan_amount', 'monthly_payment', 'loan_term', 'interest_rate', 'apr_with_fees', 'first_name', 'last_name', 'email', 'phone', 'business', 'promo', 'referral_source', 'status', 'uuid'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
    
    public function loandetails()
    {
        return $this->hasOne(LoanLeadDetail::class);
    }
    public function loanapplication()
    {
        return $this->hasOne(PreliminaryApplication::class);
    }
    public function preliminaryowners()
    {
        return $this->hasMany(PreliminaryOwner::class);
    }
}
