<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImport extends Model
{
    use HasFactory;
    protected $fillable = ['file_name', 'file_original_name', 'added_by', 'records', 'records_imported', 'status'];
    
    public function getUpdatedAtAttribute($value){
        $updatedAt = new DateTime($value);
        return $updatedAt->format('j F, Y \a\t g:i a');
    }
    public function getStatusAttribute($value){
        return ucwords($value);
    }
    public function getFileNameAttribute($value){
        return env('APP_URL')."/csv/imports/".$value;
    }
    public function user(){
        return $this->belongsTo(User::class, 'added_by', 'id');

    }
}
