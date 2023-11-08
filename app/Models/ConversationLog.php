<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationLog extends Model
{
    use HasFactory;
    protected $fillable = ['from_user_id', 'to_user_id', 'subject', 'body', 'is_read', 'is_tracking', 'read_date'];
}
