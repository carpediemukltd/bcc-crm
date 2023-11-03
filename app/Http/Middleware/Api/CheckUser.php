<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Middleware\Api;

use App\Services\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class CheckUser
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
        if (in_array(auth()->user()->role, ['user', 'contact'])) {
            return $next($request);
        }
        return ApiResponse::error("You dont't have access.", 401);

    }
}
