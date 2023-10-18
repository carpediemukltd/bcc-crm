<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiResponse;

class UserController extends Controller
{
    public function deleteAccount(){
        $user = auth()->user();

        // Revoke all tokens for the user
        $user->tokens->each->revoke();
    
        // Update the user's status to 'deleted'
        $user->status = 'deleted';
        $user->save();
        return ApiResponse::success([], 'User account deleted successfully.', 200);

    }
    public function profileUpdate(Request $request){
        if ($request->has('first_time_login')) {
            // Set the authenticated user's 'first_time_login' attribute to 0
            auth()->user()->update(['first_time_login' => '0']);
        }
        if($request->has('first_name')){
            auth()->user()->update(['first_name' => $request->first_name]);
        }
        if($request->has('last_name')){
            auth()->user()->update(['last_name' => $request->first_name]);
        }
        return ApiResponse::success([], 'Profile updated successfully.', 200);

    }
    
}
