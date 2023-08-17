<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSettingDetail extends Model
{
    use HasFactory;
    protected $fillable = ['notification_settings_id', 'stage_id'];
    public function setting()
    {
        return $this->belongsTo(NotificationSetting::class, 'notification_settings_id');
    }
}
