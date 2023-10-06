<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChromeExtensionController extends Controller
{
    protected $user;
    protected $data;
    public function __construct()
    {
        /* $this->middleware(function ($request, $next) {
            return $next($request);
        }); */
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->select('users.*')->first();
        $data['status'] = 'success';
        $data['id'] = $user->id;
        $data['name'] = $user->first_name." ". $user->last_name ;
        $data['email'] = $user->email;
        $data['role'] = $user->role;
        return response(['response' => $data]);
    }
}
