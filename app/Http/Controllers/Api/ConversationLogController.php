<?php

namespace App\Http\Controllers\Api;



use PDO;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ApiResponse;
use App\Models\ConversationLog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ConversationLogController extends Controller
{
    public function addEmailConversation(Request $request)
    {
        if ($request->isMethod('post')) {
            return ApiResponse::success([], 'Conversation Logged successfully.', 200);
            $from_user_id = 0;
            if ($request->id) {
                $from_user_id = $request->id;
            }
            $from_user = User::whereId($from_user_id)->first();
            $to_user_id = 0;
            $to_user = User::where('email', $request->email)->where('company_id', $from_user->company_id)->first();
            if ($to_user) {
                $to_user_id = $to_user->id;
            }

            if (!$to_user_id) {
                $name = explode('@', $request->email);
                $n_user = array(
                    'first_name' => $name[0],
                    'last_name' => 'n/a',
                    'email' => $request->email,
                    'phone_number'  => '000',
                    'role' => 'user',
                    'company_id' => $from_user->company_id,
                    'password' => Hash::make('chrome_extension')
                );
                $new_user = User::create($n_user);
                $to_user_id = $new_user->id;
            }
            $subject = '';
            if ($request->subject) {
                $subject = $request->subject;
            }
            $is_tracking = '0';
            if ($request->is_tracking == '1') {
                $is_tracking = '1';
            }

            // $body = str_replace("\n", '<br />', $request->body);
            $body = $request->body;

            $tracking_hash = '';
            if ($request->tracking_hash && $is_tracking == '1') {
                $tracking_hash = $request->tracking_hash;
                $body = str_replace("/track/$tracking_hash", '/track/just-dont-' . $tracking_hash, $body);
            }

            $data = ConversationLog::create([
                'subject' => $subject, 'body' => $body,
                'from_user_id' => $from_user_id, 'to_user_id' => $to_user_id, 'tracking_hash' => $tracking_hash,
                'is_tracking' => $is_tracking
            ]);

            // return response(['message' => 'success', 'data' => ConversationLog::where('id', $data->id)->first()]);
            return ApiResponse::success([], 'Conversation Logged successfully.', 200);
        }
    }
}
