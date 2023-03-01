<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreliminaryApplication extends Model
{
    use HasFactory;
    protected $fillable = ['loan_lead_id', 'business_number', 'business_start_date', 'monthly_revenue', 'tax_id_number', 'cc_percentage_deposit', 'existing_loan_advance', 'liens', 'rent_or_own', 'owner_ssn', 'owner_home_address', 'ownership_percent', 'owner_estimated_fico_score', 'owner_dob', 'second_owner_first_name', 'second_owner_last_name', 'second_owner_phone', 'second_owner_email', 'second_owner_ssn', 'second_owner_address', 'second_owner_ownership_percent', 'second_owner_fico_score', 'second_owner_dob', 'collateral', 'collateral_type', 'total_estimated_value', 'total_estimated_debt_amount', 'owner_signature', 'second_owner_signature', 'todaysdate'];

    public function loan()
    {
        return $this->belongsTo(LoanLead::class);
    }
}
