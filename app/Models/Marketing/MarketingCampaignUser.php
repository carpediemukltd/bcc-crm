<?php

namespace App\Models\Marketing;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingCampaignUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'marketing_campaign_id',
        'email_verified',
        'email_sent',
        'email_failed',
        'email_opened',
        'email_bounced',
    ];
    protected $with = ['user'];


    /**
     * Get the user associated with the marketing campaign user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the marketing campaign associated with the user.
     */
    public function marketingCampaign()
    {
        return $this->belongsTo(MarketingCampaign::class);
    }
}
