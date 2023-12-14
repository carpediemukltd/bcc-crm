<?php

namespace App\Models\Marketing;

use App\Models\Marketing\CustomSmtp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingCampaignSmtp extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'custom_smtp_id',
        'marketing_campaign_id',
    ];

    /**
     * Get the custom SMTP associated with the campaign SMTP.
     */
    public function customSmtp()
    {
        return $this->belongsTo(CustomSmtp::class);
    }

    /**
     * Get the marketing campaign associated with the campaign SMTP.
     */
    public function marketingCampaign()
    {
        return $this->belongsTo(MarketingCampaign::class);
    }
}
