<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Deal;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use Hash;
use DateInterval;
use DatePeriod;
use DateTime;
use PHPMailer\PHPMailer\PHPMailer;
use Twilio\Rest\Client;
use Validator;
use libphonenumber\PhoneNumberUtil;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect("dashboard");
        }
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        if (Auth::check()) {
            return redirect("dashboard");
        }
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'No user found with the provided Email Address.']);
        }
        if ($user) {
            if ($user->role == 'user' || $user->role == 'contact') {
                return response()->json(['error' => 'No user found with the provided Email Address.']);
            }
            if ($user->status == 'banned') {
                return response()->json(['error' => 'You have been blocked by Admin, Please contact Admin.']);
            }
            if ($user->status == 'inactive') {
                return response()->json(['error' => 'Your account is inactive, Please contact Admin.']);
            }
            if ($user->status == 'deleted') {
                return response()->json(['error' => 'This account has been deleted earlier.']);
            }
        }
        // Validate the provided email and password
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::validate($credentials)) {
            if (!$user->two_factor_enabled) {
                if (Auth::attempt($credentials)) {
                    return response()->json(['success' => 'loggedin']);
                }
            }
            // Generate a 2FA code and return a success message
            $response = $this->generate2FACode($user);
            if ($response) {
                return response()->json(['error' => $response]);
            }
            return response()->json(['success' => 'require_2fa']);
        }
        // If the email and password are incorrect, return an error message
        return response()->json(['error' => 'These credentials do not match our records.']);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'first_name'   => 'required',
            'last_name'    => 'required',
            'phone_number' => 'required',
            'email'        => 'required|email|unique:users',
            'password'     => 'required|confirmed|min:6'
        ]);

        $data  = $request->all();
        $check = $this->create($data);

        return redirect("login")->withSuccess('Great! You have Successfully Registered');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function create(array $data)
    {
        return User::create([
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'phone_number'  => $data['phone_number'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
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
        if ($user->two_factor_type == 'email' && $user->email_verified) {
            try {
                $templateBody = "<p>Lendotics Verification Code: <b>" . $code . "</b> </p>";

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

                $mail->Subject = 'Lendotics 2FA Verification Code';

                $mail->addAddress($user->email); //Name is optional
                $mail->Body    = $templateBody;
                $mail->send();
            } catch (\Exception $e) {
                error_log($e->getMessage());
            }
        }
        if ($user->two_factor_type == 'phone' && $user->mobile_verified) {
            $message            = 'Your Lendotics Verification Code is: ' . $code;
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
            try {
                $templateBody = "<p>Verification Code: <b>" . $code . "</b> </p>";

                $mail = new PHPMailer(true);

                // $mail->SMTPDebug = 3;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = env('EMAIL_HOST');                     //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = env('EMAIL_USERNAME');                     //SMTP username
                $mail->Password = env('EMAIL_PASSWORD');                                //SMTP password
                $mail->SMTPSecure = env('EMAIL_SMTP');              //Enable implicit TLS encryption
                $mail->Port = env('EMAIL_PORT');
                $mail->setFrom(env('EMAIL_FROM'));
                $mail->isHTML(true); //Set email format to HTML

                $mail->Subject = 'Bankportal 2FA Verification Code';

                $mail->addAddress($user->email); //Name is optional
                $mail->Body    = $templateBody;
                $mail->send();
            }
            catch (\Exception $e) {
                error_log($e->getMessage());
            }

            $message            = 'Your Bankportal Verification Code is: ' . $code;
            $twilioPhoneNumber  = env('TWILIO_NUMBER');
            $twilioSid          = env('TWILIO_SID');
            $twilioToken        = env('TWILIO_AUTH_TOKEN');
            $client             = new Client($twilioSid, $twilioToken);
            $toPhoneNumber      = $user->phone_number;
            try {
                $client->messages->create(
                    $toPhoneNumber,
                    [
                        'from' => $twilioPhoneNumber,
                        'body' => $message,
                    ]
                );

            }
            catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function verify2FA(Request $request)
    {
        // Manually validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'verification_code' => 'required|digits:6',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            $errors = $validator->errors()->all(); // Get all validation error messages
            return response()->json(['error' => $errors[0]]); // Return the first error message
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
            if ($request->has('mobileVerified'))
            {
                if ($request->mobileVerified == 1)
                {
                    $iEmailVerified = $request->EmailVerified;
                    $two_factor_type = 'phone';

                    if ($iEmailVerified == 1)
                        $two_factor_type = 'both';

                    $user->update([
                        'mobile_verified' => '1',
                        'two_factor_enabled' => '1',
                        'two_factor_type' => $two_factor_type
                    ]);
                }
            }

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            }

            // Redirect to the dashboard or any desired page
            return response()->json(['success' => 'Code verified successfully.']);
        }
        return response()->json(['error' => 'Invalid verification code or code has expired.']);
    }
    public function resendVerificationCode(Request $request){
        $user = User::where(['email' =>  $request->email])->first();

        if ($request->has('phoneNumber'))
        {
            $phoneNumberUtil = PhoneNumberUtil::getInstance();

            $phoneNumberObj = $phoneNumberUtil->parse($request->phoneNumber, 'US');

            if(!$phoneNumberUtil->isValidNumberForRegion($phoneNumberObj,'US'))
                return response()->json(['error' => 'Phone Number is invalid.']);

            $user = User::where(['email' => $request->email,'phone_number' => $request->phoneNumber])->first();
            if (!$user)
                return response()->json(['error' => 'Unable to find Phone Number.']);
        }

        $response = $this->generate2FACode($user);
            if ($response) {
                return response()->json(['error' => $response]);
            }
            return response()->json(['success' => 'Code sent successfully.']);

    }
}
