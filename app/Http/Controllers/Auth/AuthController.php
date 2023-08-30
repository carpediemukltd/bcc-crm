<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
            if($user_exist->role == 'user'){
                return redirect('login')->withError('You have been barred from login, Please contact Admin.')->withInput();
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
           
        $data = $request->all();
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

            $this->data['slug']       = 'dashboard';
            
            $user = auth()->user();
            if(!$user->hasAnyRole(['admin','owner', 'user'])) {
                $user->assignRole($user->role);
            }

            return view('dashboard', $this->data);
        }
  
        return redirect("login", $this->data)->withError('Opps! session is timeout plz login again.');
    }

    public function dashboard_sandbox() {

        $datesWithWeeks = [];
        $today          = Carbon::today();

        $lastSunday    = Carbon::now()->previous('Sunday');
        $lastMonday    = Carbon::now()->previous('Monday');
        $lastTuesday   = Carbon::now()->previous('Tuesday');
        $lastWednesday = Carbon::now()->previous('Wednesday');
        $lastThursday  = Carbon::now()->previous('Thursday');
        $lastFriday    = Carbon::now()->previous('Friday');
        $lastSaturday  = Carbon::now()->previous('Saturday');

        
        for ($i = 6; $i >= 0; $i--) {
            $date = $today->subDays($i);
            $datesWithWeeks[] = [
                'date' => $date->toDateString(),
                'week_name' => $date->format('l'), // 'l' returns the full weekday name
            ];
        }

        $sunday     = $lastSunday->toDateString();
        $monday     = $lastMonday->toDateString();
        $tuesday    = $lastTuesday->toDateString();
        $wednesday  = $lastWednesday->toDateString();
        $thursday   = $lastThursday->toDateString();
        $friday     = $lastFriday->toDateString();
        $saturday   = $lastSaturday->toDateString();
        
        if(Auth::check()) {
            
            $current_date = date('Y-m-d');
            $last_7_date  = date('Y-m-d', strtotime('-7 days'));
            $user_count   = User::where('id', '!=', 1)->where('created_at', '>=', $last_7_date)->where('created_at', '<=', $current_date)->count();
        
            $sun_count   = User::whereDate('created_at', $sunday)->count();
            $mon_count   = User::whereDate('created_at', $monday)->count();
            $tue_count   = User::whereDate('created_at', $tuesday)->count();
            $wed_count   = User::whereDate('created_at', $wednesday)->count();
            $thu_count   = User::whereDate('created_at', $thursday)->count();
            $fri_count   = User::whereDate('created_at', $friday)->count();
            $sat_count   = User::whereDate('created_at', $saturday)->count();

            $week_data = [
                "sun_count" => $sun_count,
                "mon_count" => $mon_count,
                "tue_count" => $tue_count,
                "wed_count" => $wed_count,
                "thu_count" => $thu_count,
                "fri_count" => $fri_count,
                "sat_count" => $sat_count,
            ];
            $user = auth()->user();
            if(!$user->hasAnyRole(['admin','owner', 'user'])) {
                $user->assignRole($user->role);
            }
            $slug = "dashboard-sandbox";
            return view('dashboard-sandbox',compact('user_count', 'week_data', 'slug'));
        
        }

        return redirect("login", $this->data)->withError('Opps! session is timeout plz login again.');
    }

    public function sandbox_daterange(Request $request) {

        $dates = explode("-",$request->daterange);
        $Date1 = rtrim(date('Y-m-d', strtotime($dates[0])));
        $Date2 = ltrim(date('Y-m-d', strtotime($dates[1])));

        
        // Declare an empty array
        $dateRange = [];
        
        // Use strtotime function
        $Variable1 = strtotime($Date1);
        $Variable2 = strtotime($Date2);
        
        // Use for loop to store dates into array
        // 86400 sec = 24 hrs = 60*60*24 = 1 day
        for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) {
                                            
            $Store = date('Y-m-d', $currentDate);
            $dateRange[] = $Store;
        }

        $sunday     = $dateRange[0];
        $monday     = $dateRange[1];
        $tuesday    = $dateRange[2];
        $wednesday  = $dateRange[3];
        $thursday   = $dateRange[4];
        $friday     = $dateRange[5];
        $saturday   = $dateRange[6];

        $sun_name = date('D', strtotime($sunday));
        $mon_name = date('D', strtotime($monday));
        $tue_name = date('D', strtotime($tuesday));
        $wed_name = date('D', strtotime($wednesday));
        $thu_name = date('D', strtotime($thursday));
        $fri_name = date('D', strtotime($friday));
        $sat_name = date('D', strtotime($saturday));

        $user_count   = User::where('id', '!=', 1)->where('created_at', '>=', $Date1)->where('created_at', '<=', $Date2)->count();
        
        $sun_count   = User::whereDate('created_at', $sunday)->count();
        $mon_count   = User::whereDate('created_at', $monday)->count();
        $tue_count   = User::whereDate('created_at', $tuesday)->count();
        $wed_count   = User::whereDate('created_at', $wednesday)->count();
        $thu_count   = User::whereDate('created_at', $thursday)->count();
        $fri_count   = User::whereDate('created_at', $friday)->count();
        $sat_count   = User::whereDate('created_at', $saturday)->count();

        $week_data = [
            "sun_count" => $sun_count,
            "mon_count" => $mon_count,
            "tue_count" => $tue_count,
            "wed_count" => $wed_count,
            "thu_count" => $thu_count,
            "fri_count" => $fri_count,
            "sat_count" => $sat_count,
            "user_count" => $user_count,
            "sun_name"   => $sun_name,
            "mon_name"   => $mon_name,
            "tue_name"   => $tue_name,
            "wed_name"   => $wed_name,
            "thu_name"   => $thu_name,
            "fri_name"   => $fri_name,
            "sat_name"   => $sat_name,

        ];


        return response()->json($week_data);
        
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
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}