<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\User;

class AppLoginController extends Controller {

	public function __construct(Guard $auth) {
		$this->auth = $auth;
	}

	public function login(Request $request) {
		$field = 'username';
		if (filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)) {
		    $field = 'user_email';
		}
		$request->merge([$field => $request->input('username')]);
		if ($this->auth->attempt($request->only($field, 'password'))) {

			$user 	= DB::table('mkb_users')
						->join('mkb_company','mkb_company.company_id','=','mkb_users.company_id')
						->select('mkb_users.*','mkb_company.company_status','mkb_company.delete_status as company_delete_status')
						->where('user_id','=',Auth::user()->user_id)
						->first();
			if(!$user) {
				return Response::json(array('status' => '0','message' =>'Sorry! Credential Mismatch.','user'=>null)); 	
			}
			else if($user->company_delete_status==1) {
				return Response::json(array('status' => '0','message' =>'Sorry! The Company account is deleted.','user'=>null)); 
			}
			else if($user->company_status==0) {
				return Response::json(array('status' => '0','message' =>'Sorry! The Company account is blocked.','user'=>null)); 
			}
			else if($user->delete_status==1) {
				return Response::json(array('status' => '0','message' =>'Sorry! This account is deleted.','user'=>null)); 
			}
			else if($user->user_status==0) {
				return Response::json(array('status' => '0','message' =>'Sorry! You are blocked.','user'=>null)); 
			}
			else {
				return Response::json(array('status' => '1','message' =>'Login Success.','user'=>$user)); 
			}
		}
		else {
			return Response::json(array('status' => '0','message' =>'Sorry! Credential Mismatch.','user'=>null)); 
		}
	}

}
