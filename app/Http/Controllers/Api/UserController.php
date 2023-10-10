<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
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
    
}
