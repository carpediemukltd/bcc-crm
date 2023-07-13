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

            Note::create([
                'user_id' => $user->id,
                'contact_id' => $request->contact_id,
                'note' => $request->note
            ]);
            return redirect()->back()->withSuccess('Note Created Successfully.');
        } else {
            return "Invalid Request";
        }
    }
}
