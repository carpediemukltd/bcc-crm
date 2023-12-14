<?php

namespace App\Models\Marketing;

use App\Models\Company;
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
        'uuid',
    ];

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
}
