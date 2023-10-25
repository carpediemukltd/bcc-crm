<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Stage;
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
                'consent_sign_file' => 'file|mimes:pdf,jpeg,png,jpg, JPEG, PNG, JPG, MPEG, heif, heic, heif-sequence, heic-sequence', // File validation for PDF and images
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
        if ($request->hasFile('profile_image')) {
            $validator = Validator::make($request->all(), [
                'profile_image' => 'file|mimes:pdf,jpeg,png,jpg, JPEG, PNG, JPG, MPEG, heif, heic, heif-sequence, heic-sequence', // File validation for PDF and images
            ]);

            if ($validator->fails()) {
                return ApiResponse::error($validator->errors()->first(), 400);
            }

            $image = $request->file('profile_image');

            // Get the current year and month
            $year   = now()->year;
            $month  = now()->format('m');

            // Create the directory if it doesn't exist
            $directory = public_path("profile/$year/$month");
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // Generate a unique filename for the uploaded image
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            // Move the uploaded file to the dynamic directory
            $image->move($directory, $filename);

            // At this point, the image has been uploaded to public/profile/year/month/filename

            // You can store the path or filename in your database if needed.
            $filePath = "profile/$year/$month/$filename";
            auth()->user()->update(['profile_image' => $filePath]);
            $data['profile_image'] = env('APP_URL').$filePath;

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

        return ApiResponse::success($data??[], 'Profile updated successfully.', 200);
    }
    public function deals()
    {
        $query = Deal::where('user_id', auth()->user()->id)->with('stage');
        if (request()->has('stage')) {
            if (!Stage::where('id', request('stage'))->first()) {
                return ApiResponse::error('Invalid Stage Selection.', 400);
            }
            $query->where('stage_id', request('stage'));
        }
        $data['deals']  = $query->select('id', 'user_id', 'title', 'stage_id', 'amount')->get();
        $data['stages'] = Stage::get();
        return ApiResponse::success($data, '', 200);
    }
}
