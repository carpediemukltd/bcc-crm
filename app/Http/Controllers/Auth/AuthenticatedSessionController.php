<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
session_start();
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(isset($_SESSION['user_role']) && !empty($_SESSION['user_role'])){
            return redirect(url('user/dashboard')); 
        }else{
            return view('login');
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    { 
        $checkUser = User::where(['email' =>  $request->email])->first();
        if(!$checkUser){
            $_SESSION['msg_error'] = 'Email Address does not exists.';
            return redirect()->back()->withErrors('Email Address does not exists.')->withInput();
        }
        if($checkUser->status == 'banned'){
            $_SESSION['msg_error'] = 'You have been blocked by Admin, Please contact Admin.';
            return redirect()->back()->withErrors('You have been blocked by Admin, Please contact Admin.')->withInput();
        }
        if($checkUser->status == 'inactive'){
            $_SESSION['msg_error'] = 'Your accout is inactive, Please contact Admin.';
            return redirect()->back()->withErrors('Your accout is inactive, Please contact Admin.')->withInput();
        }
        if($checkUser->status == 'deleted'){
            $_SESSION['msg_error'] = 'This account deleted earlier.';
            return redirect()->back()->withErrors('This account deleted earlier.')->withInput();
	    }
        if($checkUser->email == $request->email){
            if(Hash::check($request->password, $checkUser->password)){
                $_SESSION["id"] = $checkUser->id;
                $_SESSION["full_name"] = $checkUser->first_name . ' ' . $checkUser->last_name;
                            $_SESSION["first_name"] = $checkUser->first_name;
                            $_SESSION["last_name"] = $checkUser->last_name;
                            $_SESSION["phone_number"] = $checkUser->phone_number;
                            $_SESSION["email"] = $checkUser->email;
                $_SESSION["user_role"] = $checkUser->role;
                            $_SESSION["profile_image"] = $checkUser->profile_image;
                return redirect(url('user/dashboard'));
            }
        }
        $_SESSION['msg_error'] = 'These credentials do not match our records.';
        return redirect()->back()->withErrors('These credentials do not match our records.')->withInput();
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Auth::guard('user')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect('/login');
    }
}
