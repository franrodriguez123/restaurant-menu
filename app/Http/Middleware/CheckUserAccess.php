<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckUserAccess
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
        $controller = get_class(Route::getCurrentRoute()->getController());
        
        if(Auth::check()) {
            if(
                in_array($controller, config('permissions.' . Auth::user()->role_id))
                and Auth::user()->role_id != User::ADMIN
            ) {
                abort(401);
            }
        }
        
        return $next($request);
    }
}
