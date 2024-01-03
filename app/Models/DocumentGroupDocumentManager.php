<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentGroupDocumentManager extends Model
{
    use HasFactory;
    protected $table = 'document_group_document_manager';
    protected $fillable = ['document_group_id', 'document_manager_id'];
}
