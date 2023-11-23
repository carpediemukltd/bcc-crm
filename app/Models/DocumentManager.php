<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentManager extends Model
{
    use HasFactory;
    protected $fillable = ['id ', 'title', 'type', 'value', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function DocumentGroup(){
        return $this->belongsTo(DocumentGroup::class);
    }
}
