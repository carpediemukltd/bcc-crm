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
    public function dashboard()
    {
        $this->data['current_slug'] = 'Dashboard';
        $this->data['slug']         = 'dashboard';
        if (Auth::check()) {

            $this->data['slug']     = 'dashboard';
            $user = auth()->user();
            if (!$user->hasAnyRole(['admin', 'owner', 'user'])) {
                $user->assignRole($user->role);
            }
            return view('dashboard', $this->data);
        }

        return redirect("login", $this->data)->withError('Opps! session is timeout plz login again.');
    }


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
        if ($user->two_factor_type == 'email') {
            try {
                $templateBody = "<p>BCC CRM Verification Code: <b>" . $code . "</b> </p>";

                $mail = new PHPMailer(true);

                // $mail->SMTPDebug = 3;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'apikey';                     //SMTP username
                $mail->Password   = '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';                                //SMTP password
                $mail->SMTPSecure = 'ssl';              //Enable implicit TLS encryption
                $mail->Port       = 465;

                $mail->setFrom('info@bccsba.com');
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
            $toPhoneNumber      = $user->phone_number;
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
            
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))

            // Redirect to the dashboard or any desired page
            return response()->json(['success' => 'Code verified successfully.']);
        }
        return response()->json(['error' => 'Invalid verification code or code has expired.']);
    }
}
