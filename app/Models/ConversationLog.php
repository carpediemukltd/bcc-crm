<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationLog extends Model
{
    use HasFactory;
    protected $fillable = ['from_user_id', 'to_user_id', 'subject', 'body', 'is_read', 'is_tracking', 'tracking_hash', 'read_date'];

    public static function getConversationByUser($id)
    {
        $data = ConversationLog::where(['to_user_id' => $id])->join('users', function ($join) {
            $join->on('users.id', '=', 'conversation_logs.to_user_id');
        })
            ->select('conversation_logs.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
            ->orderBy('conversation_logs.id', 'DESC')->get();

        return $data;
    }
}
