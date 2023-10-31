<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CustomField;
use App\Models\Note;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NoteController extends Controller
{
    protected $user;
    protected $data;
    protected $company_id = 0;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->data['user'] = $this->user;
            if ($this->user->role != 'superadmin') {
                $this->company_id = $this->user->company_id;
            }
            return $next($request);
        });
    }

    public function listNote($contact_id)
    {
        $this->data['notes'] = Note::where(['contact_id' => $contact_id])
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'notes.user_id');
            })
            ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
            ->orderBy('notes.id', 'DESC')->get();
        return view("note.list", $this->data);
    }

    public function addNote(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'contact_id' => 'required',
                'note' => 'required'
            ]);

            $note = Note::create([
                'user_id' => $this->user->id,
                'contact_id' => $request->contact_id,
                'note' => $request->note
            ]);

            if ($note->id > 0) {
                $this->data['notes'] = Note::where(['contact_id' => $request->contact_id])
                    ->join('users', function ($join) {
                        $join->on('users.id', '=', 'notes.user_id');
                    })
                    ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
                    ->orderBy('notes.id', 'DESC')->get();

                if($request->has('mentions')){
                    $mentions = $request->input('mentions');
                    foreach ($mentions as $mention){
                        $user = User::whereId($mention)->first();
                        $custom_field = CustomField::whereTitle('Legal Business Name')->first();
                        $legal_business_name = null;
                        if($custom_field){
                            $user_details = UserDetails::whereCustomFieldIdAndUserId($custom_field->id, $user->id)->first();
                            if($user_details){
                                $legal_business_name = $user_details->data;
                            }
                        }
                        Mail::send('email.mentionEmail', [
                            'note' => $note->note,
                            'sender_full_name' => $this->user->first_name. " ".$this->user->last_name,
                            'url' => route('user.details', $request->contact_id)."#profile-notes?note=$note->id",
                            'mention' => $user->first_name.' '.$user->last_name,
                            'companies' => Company::whereId($user->company_id)->get(),
                            'email' => $user->email,
                            'phone' => $user->phone_number,
                            'legal_business_name' => $legal_business_name
                        ], function($message) use($user){
                            $message->to($user->email);
                            $message->subject('BCCUSA: Admin has mention you in a contact!');
                        });
                    }
                }
                return view('note.list', $this->data);
            } else {
                return "Unknown Error occurred.";
            }
        } else {
            return response(['error_msg' => 'Invalid Request'], 403);
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
            $note = Note::whereId($id)->first();

            if ($note->user_id != $this->user->id || $note->contact_id != $request->contact_id) {
                return response(['error_msg' => 'Invalid Request'], 403);
            }

            $update_data = [
                'note' => $request->note,
            ];

            Note::whereId($id)->update($update_data);

            $this->data['notes'] = Note::where(['contact_id' => $request->contact_id])->join('users', function ($join) {
                $join->on('users.id', '=', 'notes.user_id');
            })
                ->select('notes.*', 'users.id as user_id', 'users.first_name', 'users.last_name', 'users.role')
                ->orderBy('notes.id', 'DESC')->get();

            if($request->has('mentions')){
                $mentions = $request->input('mentions');
                foreach ($mentions as $mention){
                    $user = User::whereId($mention)->first();
                    Mail::send('email.mentionEmail', [
                        'note' => $request->note,
                        'sender_full_name' => $this->user->first_name. " ".$this->user->last_name,
                        'url' => route('user.details', $request->contact_id)."#profile-notes?note=$note->id",
                        'mention' => $user->first_name.' '.$user->last_name,
                        'companies' => Company::whereId($user->company_id)->get(),
                        'email' => $user->email
                    ], function($message) use($user){
                        $message->to($user->email);
                        $message->subject('BCCUSA: Admin has mention you in a contact!');
                    });
                }
            }
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
            $note = Note::whereId($id)->first();

            if ($note->user_id != $this->user->id || $note->contact_id != $request->contact_id) {
                return response(['error_msg' => 'Invalid Request'], 403);
            }
            Note::whereId($id)->delete();

            $this->data['notes'] = Note::where(['contact_id' => $request->contact_id])
                ->join('users', function ($join) {
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
