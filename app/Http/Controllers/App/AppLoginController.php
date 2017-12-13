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
		if ($this->auth->attempt($request->only('username', 'password'))) {

			$user 	= DB::table('mkb_users')
						->join('mkb_company','mkb_company.company_id','=','mkb_users.company_id')
						->select('mkb_users.*','mkb_company.company_status','mkb_company.delete_status as company_delete_status')
						->where('username','=',$request->username)
						->first();
			if(!$user) {
				return Response::json(array('status' => '0','message' =>'Credential Mismatch.','user'=>[])); 	
			}
			else if($user->company_delete_status==1) {
				return Response::json(array('status' => '0','message' =>'The company is deleted.','user'=>[])); 
			}
			else if($user->company_status==0) {
				return Response::json(array('status' => '0','message' =>'The company is blocked.','user'=>[])); 
			}
			else if($user->delete_status==1) {
				return Response::json(array('status' => '0','message' =>'Credential Mismatch.','user'=>[])); 
			}
			else if($user->user_status==0) {
				return Response::json(array('status' => '0','message' =>'The user is blocked.','user'=>[])); 
			}
			else {
				return Response::json(array('status' => '1','message' =>'Login Success.','user'=>$user)); 
			}
		}
		else {
			return Response::json(array('status' => '0','message' =>'Credential Mismatch.','user'=>[])); 
		}
	}

}
