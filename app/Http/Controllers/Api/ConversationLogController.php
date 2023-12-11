<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\Models\ConversationLog;
use App\Models\User;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use PDO;

class ConversationLogController extends Controller
{
    public function addEmailConversation(Request $request)
    {
        if ($request->isMethod('post')) {

            /*  if (empty($request->subject)) {
                return redirect()->back()->withError('Subject can not be empty.')->withInput();
            }

            if (empty($request->body)) {
                return redirect()->back()->withError('Body can not be empty.')->withInput();
            } */
            $to_user_id = 0;
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $to_user_id = $user->id;
            }
            $from_user_id = 0;
            if ($request->id) {
                $from_user_id = $request->id;
            }
            $subject = '';
            if ($request->subject) {
                $subject = $request->subject;
            }
            $tracking_hash = '';
            if ($request->uuid) {
                $tracking_hash = $request->uuid;
            }
            $is_tracking = '0';
            if ($request->is_tracking=='1') {
                $is_tracking = '1';
            }
            $body = str_replace("\n", '<br />', $request->body);

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
