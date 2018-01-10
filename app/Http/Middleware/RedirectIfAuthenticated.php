<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }*/
        if(!Auth::check()) {
            return redirect('/')->withErrors(['error' => 'Your session has expired! Please login to continue.']);
        }
        else {
            $company    = Company::where('company_id','=',Auth::user()->company_id)
                                ->first();
            if($company->company_delete_status==1) {
                return redirect('/')->withErrors(['error' => 'Sorry! The Company account is deleted.']);
            }
            else if($company->company_status == 0) {
                return redirect('/')->withErrors(['error' => 'Sorry! The Company account is blocked.']);
            }
            else if(Auth::user()->delete_status == 1) {
                return redirect('/')->withErrors(['error' => 'Sorry! This account is deleted.']);
            }
            else if(Auth::user()->user_status == 0) {
                return redirect('/')->withErrors(['error' => 'Sorry! You are blocked.']);
            }
        }
        return $next($request);
    }
}
