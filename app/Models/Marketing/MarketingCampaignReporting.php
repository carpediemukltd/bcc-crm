<?php

namespace App\Models\Marketing;

use App\Models\Marketing\CustomSmtp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingCampaignReporting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'marketing_campaign_sequence_id',
        'custom_smtp_id',
        'email_sent',
        'sent_date',
        'sent_data',
        'email_open',
        'opened_date',
        'open_data',
        'email_failed',
        'failed_data',
        'email_verified',
        'bounced',
    ];

    /**
     * Get the user associated with the campaign reporting.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the marketing campaign sequence associated with the campaign reporting.
     */
    public function marketingCampaignSequence()
    {
        return $this->belongsTo(MarketingCampaignSequence::class);
    }

    /**
     * Get the custom SMTP associated with the campaign reporting.
     */
    public function customSmtp()
    {
        return $this->belongsTo(CustomSmtp::class);
    }
}
