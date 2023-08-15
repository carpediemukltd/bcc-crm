<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'target_url', 'title', 'is_read'];

    public function getFormattedCreatedAtAttribute()
    {
        $createdAt = Carbon::parse($this->created_at);
        return $createdAt->format('jS, F Y - h:i A');
    }
}
