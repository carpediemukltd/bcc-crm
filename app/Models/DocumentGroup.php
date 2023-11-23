<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentGroup extends Model
{
    use HasFactory;

    public function DocumentGroup(){
        return $this->hasMany(DocumentManager::class);
    }
}
