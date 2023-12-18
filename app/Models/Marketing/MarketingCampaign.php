<?php

namespace App\Models\Marketing;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class MarketingCampaign extends Model
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
        'status',
        'start_date',
        'uuid',
    ];
    protected $appends = ['total_emails', 'emails_sent', 'formatted_start_date'];

    /**
     * Boot function to hook into model events.
     */
    protected static function boot()
    {
        parent::boot();

        // When creating a new MarketingCampaign, generate a UUID if it's not set.
        static::creating(function ($model) {
            $model->uuid = $model->uuid ?: (string) Str::uuid();
        });
    }

    /**
     * Get the company that owns the campaign.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function marketingCampaignUser()
    {
        return $this->hasMany(MarketingCampaignUser::class);
    }
    public function marketingCampaignSequence()
    {
        return $this->hasMany(MarketingCampaignSequence::class);
    }
    public function getTotalEmailsAttribute()
    {
        return MarketingCampaignUser::whereMarketingCampaignId($this->id)->count();
    }
    public function getEmailsSentAttribute()
    {
        return MarketingCampaignUser::whereMarketingCampaignId($this->id)->whereEmailSent('1')->count();
    }
    public function getFormattedStartDateAttribute()
    {
        $startDate = $this->attributes['start_date'];

        // Parse the start date using Carbon
        $carbonStartDate = Carbon::parse($startDate);
    
        // Format the date as desired
        return $carbonStartDate->format('d, M Y @ g:i A');
    }
}
