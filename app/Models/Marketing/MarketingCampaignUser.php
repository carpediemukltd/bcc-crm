<?php

namespace App\Models\Marketing;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'uuid'
    ];
    protected $with = ['user'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }


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
