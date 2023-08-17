<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'setting_name', 'status'];
    public function detail()
    {
        return $this->hasMany(NotificationSettingDetail::class, 'notification_settings_id');
    }
}
