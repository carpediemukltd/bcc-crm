<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiResponse;
use Illuminate\Support\Facades\Storage;
use Validator;

class UserController extends Controller
{
    public function deleteAccount()
    {
        $user = auth()->user();

        // Revoke all tokens for the user
        $user->tokens->each->revoke();

        // Update the user's status to 'deleted'
        $user->status = 'deleted';
        $user->save();
        return ApiResponse::success([], 'User account deleted successfully.', 200);
    }
    public function profileUpdate(Request $request)
    {
        if ($request->hasFile('consent_sign_file')) {
            $validator = Validator::make($request->all(), [
                'consent_sign_file'              => 'file|mimes:pdf,jpeg,png,jpg, JPEG, PNG, JPG, MPEG, heif, heic, heif-sequence, heic-sequence', // File validation for PDF and images
            ]);
    
            if ($validator->fails()) {
                return ApiResponse::error($validator->errors()->first(), 400);
            }
            
            $fileData = $request->file('consent_sign_file'); // Get the uploaded file
            $fileName = $fileData->getClientOriginalName();
    
            $path = 'users-consent/' . auth()->user()->id . "/" . time() . '-' . preg_replace('/[^a-z0-9]/i', '_', $fileName);
            // Storage::disk('s3')->put($path, file_get_contents($fileData), 'public');
            Storage::disk('s3')->put($path, file_get_contents($fileData), ['ContentDisposition' => 'attachment']);
    
            $url = Storage::disk('s3')->url($path);
            auth()->user()->update(['consent_sign_image' => $url]);
        
        }
        if ($request->has('first_time_login')) {
            // Set the authenticated user's 'first_time_login' attribute to 0
            auth()->user()->update(['first_time_login' => '0']);
        }
        if ($request->has('first_name')) {
            auth()->user()->update(['first_name' => $request->first_name]);
        }
        if ($request->has('last_name')) {
            auth()->user()->update(['last_name' => $request->first_name]);
        }

        return ApiResponse::success([], 'Profile updated successfully.', 200);
    }
}
