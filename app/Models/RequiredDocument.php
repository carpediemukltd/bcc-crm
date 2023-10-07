<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredDocument extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function listDocuments()
    {
        return self::select([
                "id",
                "document_name",
                "file_group_name",
                "document_type"
            ])
            ->where("status", 1)
            ->get()
            ->toArray();
    }
}
