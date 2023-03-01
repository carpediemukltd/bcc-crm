<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanLeadDetail extends Model
{
    use HasFactory;
    protected $fillable = ['describe_your_business_other', 'loan_lead_id', 'is_your_business_profitable_or_break_even', 'do_you_have_commercial_accounts_receivables', 'business_duration', 'business_location', 'business_location_suit', 'entity_type', 'owner_us_citizen', 'is_your_revenue_more_than_150k', 'is_your_fico_score_above_650', 'are_your_clients_consumers_or_businesses', 'businesses_type', 'what_type_of_credit_facility_are_you_seeking', 'tangible_assets', 'describe_your_business', 'longterm_liabilities', 'eligibility_result','status'];
    
    public function loan()
    {
        return $this->belongsTo(LoanLead::class);
    }
}
