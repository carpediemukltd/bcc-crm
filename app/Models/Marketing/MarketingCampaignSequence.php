<?php

namespace App\Models\Marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingCampaignSequence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marketing_campaign_id',
        'wait_for',
        'subject',
        'body',
        'status',
    ];

    /**
     * Get the marketing campaign associated with the sequence.
     */
    public function marketingCampaign()
    {
        return $this->belongsTo(MarketingCampaign::class);
    }
    public function marketingCampaignReporting()
    {
        return $this->hasMany(MarketingCampaignReporting::class);   
    }
}
