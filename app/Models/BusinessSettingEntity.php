<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BusinessSettingEntity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'type_id'];

    public function type()
    {
        return $this->belongsTo(BusinessSettingEntityType::class, 'type_id');
    }
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('j F, Y @ g:i A');
    }

}
