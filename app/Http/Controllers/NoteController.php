<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Note;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    protected $data;
    public function listNote(Request $request, $contact_id)
    {
        $this->data['notes'] = Note::where(['contact_id' => $contact_id])->join('users', function ($join) {
            $join->on('users.id', '=', 'notes.user_id');
        })
            ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
            ->orderBy('notes.id', 'DESC')->get();
        return view("note.list", $this->data);
    }

    public function addNote(Request $request)
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
            if ($note->id > 0) {
                $this->data['notes'] = Note::where(['contact_id' => $request->contact_id])->join('users', function ($join) {
                    $join->on('users.id', '=', 'notes.user_id');
                })
                    ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
                    ->orderBy('notes.id', 'DESC')->get();

                return view('note.list', $this->data);
            } else {
                return "Unknown Error occurred.";
            }
        } else {
            return "Invalid Request";
        }
    }

    public function editNote(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'id' => 'required',
                'user_id' => 'required',
                'contact_id' => 'required',
                'note' => 'required'
            ]);
            $user = auth()->user();
            $this_note = Note::whereId($id)->first();

            if ($this_note->user_id != $user->id || $this_note->contact_id != $request->contact_id) {
                return response(['error' => 'Invalid Request'], 403);
            }

            $update_data = [
                'note'   => $request->note,
            ];

            Note::whereId($id)->update($update_data);

            $this->data['notes'] = Note::where(['contact_id' => $request->contact_id])->join('users', function ($join) {
                $join->on('users.id', '=', 'notes.user_id');
            })
                ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
                ->orderBy('notes.id', 'DESC')->get();

            return view('note.list', $this->data);
        } else {
            return "Invalid Request";
        }
    }

    public function deleteNote(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'id' => 'required',
                'user_id' => 'required',
                'contact_id' => 'required',
            ]);
            $user = auth()->user();
            $this_note = Note::whereId($id)->first();

            if ($this_note->user_id != $user->id || $this_note->contact_id != $request->contact_id) {
                return response(['error' => 'Invalid Request'], 403);
            }
            Note::whereId($id)->delete();

            $this->data['notes'] = Note::where(['contact_id' => $request->contact_id])->join('users', function ($join) {
                $join->on('users.id', '=', 'notes.user_id');
            })
                ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
                ->orderBy('notes.id', 'DESC')->get();

            return view('note.list', $this->data);
        } else {
            return "Invalid Request";
        }
    }
}
