<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'contact_id', 'note'];

    public static function getNotesByUser($id)
    {
        $data = Note::where(['contact_id' => $id])->join('users', function ($join) {
            $join->on('users.id', '=', 'notes.user_id');
        })
            ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
            ->orderBy('notes.id', 'DESC')->get();

        return $data;
    }
}
