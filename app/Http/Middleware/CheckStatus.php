<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }
        return redirect("login")->withSuccess('Session timeout please login again.');

        // if (isset(auth()->user()->id)) {
        //     return $next($request);
        // }
        // return response()->json('Plz login first');

    }
}
