<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $AuthUser= User::findOrFail(Auth::user()->id);

        // if(AuthUser->role == "admin") {
        //     return $next($request);
        // }else{
        //     return redirect()->route("login")->withErrors("error","you are not admin");
        // }

        if(Auth::check()){
            return $next($request);
        }else{
            return redirect()->route("login");
        }
    }
}
