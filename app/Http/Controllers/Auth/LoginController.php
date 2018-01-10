<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Company;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'user_email' : 'username';
        $request->merge([$field => $request->input('username')]);
        
        if ($this->auth->attempt($request->only($field, 'password'))) {
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
            else {
                return redirect('home');
            }
        }
        else
        {
            return redirect('/')->withErrors(['error' => 'Sorry! Credential Mismatch.']);
        }
    }
}
