<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\User;
use App\Http\Controllers\App\AppDefaultController;

class AppUserController extends Controller {

	public function addUserDetails($user_id){
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$user_id)
					->first();
		if($user) {
			if($user->user_role==1) {
				$users 	= DB::table('mkb_users')
							->where('mkb_users.company_id','=',$user->company_id)
							->get();
			}
			else {
				$user_array	= array();
				array_push($user_array,$user_id);
				$user_array	= $this->hierarchicalUsers($user_id,$user_array);
				$users 	= DB::table('mkb_users')
							->whereIn('mkb_users.user_id',$user_array)
							->where('mkb_users.delete_status','=','0')
							->get();
			}
			if($users) {
				foreach ($users as $user) {
					if ($user->user_id==$user_id) {
						$user->user_firstname 	= 'Myself';
						$user->user_lastname	= '';
					}
				}
			}
			$user_count	= count($users);
			$country 	= AppDefaultController::fetchCountry();
			return Response::json(array('status'=>'1','user_count'=>$user_count,'users'=>$users,'country'=>$country));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occured.'));
		}
	}

	public static function hierarchicalUsers($user_id,$user_array) {
		$users 	= DB::table('mkb_users')
					->where('mkb_users.user_assign_to_id','=',$user_id)
					->where('mkb_users.user_role','=','2')
					->where('mkb_users.delete_status','=','0')
					->get();
		
		if($users) {
			foreach ($users as $user) {
				array_push($user_array, $user->user_id);
				$user_array = AppUserController::hierarchicalUsers($user->user_id,$user_array);
			}
		}
		
		return $user_array;
	}

	public function checkEmail(Request $request) {
		$dataCheck 	= DB::table('mkb_users')
							->where('user_email','=',$request->user_email)
							->count();
		if($dataCheck>0) {
			return Response::json(array('status'=>'0','message'=>'Email address already in use.'));
		}
		else {
			return Response::json(array('status'=>'1','message'=>'Email address available.'));
		}
	}

	public function checkMobile(Request $request) {
		$dataCheck 	= DB::table('mkb_users')
							->where('user_mobile','=',$request->user_mobile)
							->count();
		if($dataCheck>0) {
			return Response::json(array('status'=>'0','message'=>'Mobile number already in use.'));
		}
		else {
			return Response::json(array('status'=>'1','message'=>'Mobile number available.'));
		}
	}

	public function checkPhone(Request $request) {
		$dataCheck 	= DB::table('mkb_users')
							->where('user_telephone','=',$request->user_telephone)
							->count();
		if($dataCheck>0) {
			return Response::json(array('status'=>'0','message'=>'Phone number already in use.'));
		}
		else {
			return Response::json(array('status'=>'1','message'=>'Phone number available.'));
		}
	}

	public function checkUserName(Request $request) {
		$dataCheck 	= DB::table('mkb_users')
							->where('username','=',$request->username)
							->count();
		if($dataCheck>0) {
			return Response::json(array('status'=>'0','message'=>'Username already in use.'));
		}
		else {
			return Response::json(array('status'=>'1','message'=>'Username available.'));
		}
	}
	
	public function addUser(Request $request) {
		$user 					= new User();
		$user->company_id		= $request->company_id;
		$user->country_id		= $request->country_id;
		$user->state_id			= $request->state_id;
		$user->zipcode_id		= $request->zipcode_id;
		$user->role_id			= $request->role_id;
		$user->user_creater_id	= $request->user_creater_id;
		$user->user_assigner_id	= $request->user_assigner_id;
		$user->user_assign_to_id= $request->user_assign_to_id;
		$user->user_firstname	= $request->user_firstname;
		$user->user_lastname	= $request->user_lastname;
		$user->user_email		= $request->user_email;
		$user->user_mobile		= $request->user_mobile;
		$user->user_telephone	= $request->user_telephone;
		$user->user_address		= $request->user_address;
		$user->user_latitude	= sprintf("%.6f", $request->user_latitude);
		$user->user_longitude	= sprintf("%.6f", $request->user_longitude);
		$user->username			= $request->username;
		$user->password 		= bcrypt($request->password);
		$user->user_key			= str_random(128);
		$user->user_role 		= '2';
		$user->user_status 		= '1';
		$user->delete_status 	= '0';
		$user->save();

		if($user) {
			return Response::json(array('status'=>'1','message'=>'User added successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occured.'));
		}
	}

}
