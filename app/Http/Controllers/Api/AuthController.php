<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use Twilio\Rest\Client;
use Validator;
use App\Services\ApiResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors()->first(), 400);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return ApiResponse::error('No user found with the provided Email Address.', 404);
        }
        if (!in_array($user->role, ['user', 'contact'])) {
            return ApiResponse::error('No user found with the provided Email Address.', 404);
        } 

        if ($user->status == 'banned') {
            return ApiResponse::error('You have been blocked by Admin, Please contact Admin.', 403);
        }

        if ($user->status == 'inactive') {
            return ApiResponse::error('Your account is inactive, Please contact Admin.', 403);
        }

        if ($user->status == 'deleted') {
            return ApiResponse::error('This account has been deleted earlier.', 403);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->two_factor_enabled) {
                $data = [
                    'user_id'       => auth()->user()->id,
                    'email'         => auth()->user()->email,
                    'first_name'    => auth()->user()->first_name,
                    'last_name'     => auth()->user()->last_name,
                    'require_2FA'   => true,
                    'profile_image' => auth()->user()->profile_image
                ];
                return ApiResponse::success($data, 'Requires 2FA', 200);
            } else {
                // User info
                $token = auth()->user()->createToken('CRM')->accessToken;
                $data = [
                    'user_id'               => auth()->user()->id,
                    'email'                 => auth()->user()->email,
                    'first_name'            => auth()->user()->first_name,
                    'last_name'             => auth()->user()->last_name,
                    'profile_image'         => auth()->user()->profile_image,
                    'require_2FA'           => false,
                    'token'                 => $token,
                    'is_first_time_login'   => $user->first_time_login == '1'?true:false,
                    'consent_content'       => 'I understand by clicking the "Submit" button I am providing consent to contact via personal cell phone, business cell phone and business e-mail address and hereby consent to the receipt of correspondence/messages regarding transactions with BCCUSA and/or its affiliates on either medium. I also hereby consent to the receipt of text messages and push notifications if utilizing the mobile application knowing that msg. and data rates may apply. I understand that consent to receive texts is not a condition of approval. I can expect approx. 10 msgs./month. I certify that all the information contained herein is complete, true and accurate.'
                ];
            }

            return ApiResponse::success($data, 'Login successful', 200);
        } else {
            return ApiResponse::error('These credentials do not match our records.', 401);
        }
    }

    public function generate2FACode($user)
    {
        // Generate a random 6-digit code
        $code = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);

        // Store the code and its expiry time in the user's record
        $user->update([
            'verification_code' => $code,
            'verification_code_expiry' => Carbon::now()->addMinutes(2), // Code expires in 2 minutes
        ]);
        if ($user->two_factor_type == 'email') {
            try {
                $templateBody = "<p>BCC CRM Verification Code: <b>" . $code . "</b> </p>";

                $mail = new PHPMailer(true);

                // $mail->SMTPDebug = 3;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = env('MAIL_HOST');                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = env('MAIL_USERNAME');                     //SMTP username
                $mail->Password   = env('MAIL_PASSWORD');                                //SMTP password
                $mail->SMTPSecure = env('MAIL_ENCRYPTION');              //Enable implicit TLS encryption
                $mail->Port       = env('MAIL_PORT');

                $mail->setFrom(env('MAIL_FROM_ADDRESS'));
                $mail->isHTML(true); //Set email format to HTML

                $mail->Subject = 'BCC CRM 2FA Verification Code';

                $mail->addAddress($user->email); //Name is optional
                $mail->Body    = $templateBody;
                $mail->send();
            } catch (\Exception $e) {
                error_log($e->getMessage());
            }
        }
        if ($user->two_factor_type == 'phone') {
            $message            = 'Your BCC CRM Verification Code is: ' . $code;
            $twilioPhoneNumber  = env('TWILIO_NUMBER');
            $twilioSid          = env('TWILIO_SID');
            $twilioToken        = env('TWILIO_AUTH_TOKEN');
            $client             = new Client($twilioSid, $twilioToken);
            // Remove spaces from the phone number
            $toPhoneNumber = str_replace(' ', '', $user->phone_number);
            try {
                $client->messages->create(
                    $toPhoneNumber,
                    [
                        'from' => $twilioPhoneNumber,
                        'body' => $message,
                    ]
                );
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        //send code to both email and phone number
        elseif ($user->two_factor_type == 'both') {
        }
    }

    public function verifyCode(Request $request)
    {
        // Manually validate the request
        $validator = Validator::make($request->all(), [
            'email'             => 'required|email',
            'verification_code' => 'required|digits:6',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            $errors = $validator->errors()->all(); // Get all validation error messages
            return ApiResponse::error($errors[0], 400); // Return the first error message with a 400 status code
        }

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the verification code and its expiry time are valid
        if (
            $user->verification_code === $request->verification_code &&
            Carbon::now()->lt($user->verification_code_expiry)
        ) {
            // Authentication successful, you can log in the user here
            // Clear the verification code and its expiry time
            $user->update([
                'verification_code' => null,
                'verification_code_expiry' => null,
            ]);

            // Authenticate the user by ID
            Auth::loginUsingId($user->id);

            // Check if the authentication was successful
            if (Auth::check()) {
                $token = auth()->user()->createToken('CRM')->accessToken;
                $data = [
                    'user_id'       => auth()->user()->id,
                    'email'         => auth()->user()->email,
                    'first_name'    => auth()->user()->first_name,
                    'last_name'     => auth()->user()->last_name,
                    'profile_image' => auth()->user()->profile_image,
                    'require_2FA'   => false,
                    'token'         => $token
                ];
                // Redirect to the dashboard or any desired page
                return ApiResponse::success($data, 'Code verified successfully.');
            }
        }

        return ApiResponse::error('Invalid verification code or code has expired.', 400);
    }

    public function generateVerificationCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors()->first(), 400);
        }
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return ApiResponse::error('No user found with the provided Email Address.', 404);
        }

        if (!in_array($user->role, ['user', 'contact'])) {
            return ApiResponse::error('No user found with the provided Email Address.', 404);
        } 

        if ($user->status == 'banned') {
            return ApiResponse::error('You have been blocked by Admin, Please contact Admin.', 403);
        }

        if ($user->status == 'inactive') {
            return ApiResponse::error('Your account is inactive, Please contact Admin.', 403);
        }

        if ($user->status == 'deleted') {
            return ApiResponse::error('This account has been deleted earlier.', 403);
        }
        $response = $this->generate2FACode($user);
        if ($response) {
            return ApiResponse::error($response, 403);
        }

        return ApiResponse::success([], 'Code sent successfully.', 200);
    }
    public function resendVerificationCode(Request $request){
        $user = User::where(['email' =>  $request->email])->first();    
        if (!$user) {
            return ApiResponse::error('No user found with the provided Email Address.', 404);
        }

        if (!in_array($user->role, ['user', 'contact'])) {
            return ApiResponse::error('No user found with the provided Email Address.', 404);
        } 

        if ($user->status == 'banned') {
            return ApiResponse::error('You have been blocked by Admin, Please contact Admin.', 403);
        }

        if ($user->status == 'inactive') {
            return ApiResponse::error('Your account is inactive, Please contact Admin.', 403);
        }

        if ($user->status == 'deleted') {
            return ApiResponse::error('This account has been deleted earlier.', 403);
        }

        $response = $this->generate2FACode($user);
            if ($response) {
                return ApiResponse::error($response, 403);
            }
            return ApiResponse::success([], 'Code sent successfully.', 200);

    }
    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'email'             => 'required|email',
            'password'          => 'required|min:6', // You might want to add a minimum length for the password.
            'confirm_password'  => 'required|same:password', // Ensure 'confirm_password' matches 'password'.
        ]);
        
        if ($validator->fails()) {
            return ApiResponse::error($validator->errors()->first(), 400);
        }
        $user = User::where('email', $request->email)->first();        

        if (!$user) {
            return ApiResponse::error('No user found with the provided Email Address.', 404);
        }

        if (!in_array($user->role, ['user', 'contact'])) {
            return ApiResponse::error('No user found with the provided Email Address.', 404);
        } 

        if ($user->status == 'banned') {
            return ApiResponse::error('You have been blocked by Admin, Please contact Admin.', 403);
        }

        if ($user->status == 'inactive') {
            return ApiResponse::error('Your account is inactive, Please contact Admin.', 403);
        }

        if ($user->status == 'deleted') {
            return ApiResponse::error('This account has been deleted earlier.', 403);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return ApiResponse::success([],'Password reset successfully.', 200);

    }
    public function logout()
    {
        auth()->user()->tokens()->where('revoked', false)->update(['revoked' => true]);
        return ApiResponse::success([],'Logged out successfully.', 200);
    }
}
