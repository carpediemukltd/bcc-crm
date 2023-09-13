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

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if(Auth::check()){
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
        if(Auth::check()){
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
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        $user_exist = User::where('email', $request->email)->first();
        if($user_exist){
            if($user_exist->role == 'user' || $user_exist->role == 'contact'){
                return redirect('login')->withError('No user found with the provided Email Address.')->withInput();
            }
            if($user_exist->status == 'banned'){
                return redirect('login')->withError('You have been blocked by Admin, Please contact Admin.')->withInput();
            }
            if($user_exist->status == 'inactive'){
                return redirect('login')->withError('Your accout is inactive, Please contact Admin.')->withInput();
            }
            if($user_exist->status == 'deleted'){
                return redirect('login')->withError('This account deleted earlier.')->withInput();
            }
        }
   
        $credentials = $request->only('email', 'password');
        if (isset($credentials['email'])) {
            $credentials['email'] = strtolower($credentials['email']);
        }
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withError('You have entered invalid credentials')->withInput();
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
    public function dashboard(){
        $this->data['current_slug'] = 'Dashboard';
        $this->data['slug']         = 'dashboard';
        if(Auth::check()) {

            $this->data['slug']     = 'dashboard';
            $user = auth()->user();
            if(!$user->hasAnyRole(['admin','owner', 'user'])) {
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
    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}