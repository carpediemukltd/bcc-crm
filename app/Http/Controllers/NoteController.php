<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Note;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function noteAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = auth()->user();
            $request->validate([
                'contact_id' => 'required',
                'note' => 'required'
            ]);

            $note = Note::create([
                'user_id' => $user->id,
                'contact_id' => $request->contact_id,
                'note' => $request->note
            ]);
            $note = Note::where(['notes.id' => $note->id])->join('users', function ($join) {
                $join->on('users.id', '=', 'notes.user_id');
            })
                ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
                ->orderBy('notes.id', 'DESC')->first();
                
            return response()->json($note);
        } else {
            return "Invalid Request";
        }
    }
}
