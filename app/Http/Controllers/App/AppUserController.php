<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\MakbossMail;
use DB;
use Response;
use Auth;
use File;
use Mail;
use App\User;
use App\Http\Controllers\App\AppDefaultController;
use App\Http\Controllers\App\AppCustomerController;
use App\Http\Controllers\App\AppCompanyController;
use App\Http\Controllers\App\EmailController;

class AppUserController extends Controller {

	public function testMail($user_id) {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$user_id)
					->first();
		$password = "123456";
		if($user) {
			Mail::to('pkt.prashob@gmail.com')->queue(new MakbossMail($user,$password));
			return Response::json(array('status'=>'1','message'=>'Mail Send!!!'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
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

	public static function includeUserDetails($user) {
		$user->manager_assigned		= 0;
		$user->supervisor_assigned	= 0;
		$user->executive_assigned	= 0;
		$user->customer_assigned	= 0;
		//Set user_status value
		if ($user->user_status==0&&$user->show_status>0) {
			$user->user_status = 2;
		}
		$assigned_user 	= DB::table('mkb_users')
							->where('mkb_users.user_id','=',$user->user_assign_to_id)
							->first();
		if ($assigned_user) {
			$user->assigned_to_user_name 	= $assigned_user->user_firstname.' '.$assigned_user->user_lastname;
		}
		else {
			$user->assigned_to_user_name	= "No one";
		}
		$manager_assigned = DB::table('mkb_users')
							->where('mkb_users.user_assign_to_id','=',$user->user_id)
							->where('mkb_users.role_id','=','1')
							->get();
		if (count($manager_assigned)>0) {
			$user->manager_assigned	= 1;
		}
		$supervisor_assigned = DB::table('mkb_users')
								->where('mkb_users.user_assign_to_id','=',$user->user_id)
								->where('mkb_users.role_id','=','2')
								->get();
		if (count($supervisor_assigned)>0) {
			$user->supervisor_assigned	= 1;
		}
		$executive_assigned = DB::table('mkb_users')
								->where('mkb_users.user_assign_to_id','=',$user->user_id)
								->where('mkb_users.role_id','=','3')
								->get();
		if (count($executive_assigned)>0) {
			$user->executive_assigned	= 1;
		}
		$customer_assigned = DB::table('mkb_customer')
								->where('mkb_customer.customer_assigned_to_id','=',$user->user_id)
								->get();
		if (count($customer_assigned)>0) {
			$user->customer_assigned	= 1;
		}
		return $user;
	}
	
	public function viewUsers($user_id,$role_id) {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$user_id)
					->where('mkb_users.delete_status','=','0')
					->first();
		if($user) {
			$user_array	= array();
			if($user->user_role!=1) {
				array_push($user_array,$user_id);
			}
			$user_array	= $this->hierarchicalUsers($user_id,$user_array);
			$users 	= DB::table('mkb_users')
						->whereIn('mkb_users.user_id',$user_array)
						->where('mkb_users.role_id','=',$role_id)
						->where('mkb_users.delete_status','=','0')
						->orderBy('mkb_users.user_id', 'desc')
						->get();
			if ($users) {
				foreach ($users as $user) {
					$user 	= $this->includeUserDetails($user);
				}
			}
			$user_count	= count($users);

			return Response::json(array('status'=>'1','users'=>$users,'user_count'=>$user_count));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}
	
	public function viewAssignedUsers($user_id,$role_id) {
		$users 	= DB::table('mkb_users')
					->where('mkb_users.user_assign_to_id','=',$user_id)
					->where('mkb_users.role_id','=',$role_id)
					->where('mkb_users.delete_status','=','0')
					->orderBy('mkb_users.user_id', 'desc')
					->get();
		if ($users) {
			foreach ($users as $user) {
				$user 	= $this->includeUserDetails($user);
			}
		}
		if($users) {
			return Response::json(array('status'=>'1','users'=>$users));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function viewUserDetails($user_id) {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$user_id)
					->where('mkb_users.delete_status','=','0')
					->first();
		if($user) {
			return Response::json(array('status'=>'1','user'=>$user));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function createUserDetails($user_id){
		$user 	= DB::table('mkb_users')
					->join('mkb_company','mkb_company.company_id','=','mkb_users.company_id')
					->where('mkb_users.user_id','=',$user_id)
					->where('mkb_users.delete_status','=','0')
					->first();
		if($user) {
			$user_array	= array();
			array_push($user_array,$user_id);
			$user_array	= $this->hierarchicalUsers($user_id,$user_array);
			$users 	= DB::table('mkb_users')
						->whereIn('mkb_users.user_id',$user_array)
						->where('mkb_users.delete_status','=','0')
						->where('mkb_users.user_status','=','1')
						->orderBy('mkb_users.role_id', 'asc')
						->get();
			if($users) {
				foreach ($users as $user1) {
					if ($user1->user_id==$user_id) {
						$user1->user_firstname 	= 'Myself';
						$user1->user_lastname	= '';
					}
				}
			}
			$user_count	= count($users);
			$country 	= AppDefaultController::fetchCountry();
			return Response::json(array('status'=>'1','user'=>$user,'user_count'=>$user_count,'users'=>$users,'country'=>$country));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}
	
	public function createUser(Request $request) {
		$emailCheck 	= DB::table('mkb_users')
							->where('user_email','=',$request->user_email)
							->where('mkb_users.delete_status','=','0')
							->count();
		$mobileCheck 	= DB::table('mkb_users')
							->where('user_mobile','=',$request->user_mobile)
							->where('mkb_users.delete_status','=','0')
							->count();
		if($emailCheck>0 && $mobileCheck>0) {
			return Response::json(array('status'=>'2'));	
		}
		else if($emailCheck>0) {
			return Response::json(array('status'=>'3'));	
		}
		else if($mobileCheck>0) {
			return Response::json(array('status'=>'4'));	
		}
		else {
			$password 				= str_random(6);
			$user 					= new User();
			$user->company_id		= $request->company_id;
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
			$user->user_latitude	= "";
			$user->user_longitude	= "";
			$user->username			= "";
			$user->password 		= bcrypt($password);
			$user->user_key			= str_random(128);
			$user->user_role 		= '2';
			$user->user_status 		= '1';
			$user->delete_status 	= '0';
			$user->save();

			if($user) {
				$user 	= DB::table('mkb_users')
							->where('mkb_users.user_id','=',$user->id)
							->first();
				$status 	= $this->updateImage($user,$request->user_image);
				$status 	= AppCompanyController::updateQuota($user->company_id,1);
				//Mail::to($user->user_email)->queue(new MakbossMail($user,$password));
				return Response::json(array('status'=>'1','user'=>$user,'message'=>'User created successfully.'));
			}
			else {
				return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
			}			
		}
	}
	
	public function editUser(Request $request) {
		$emailCheck 	= DB::table('mkb_users')
							->where('mkb_users.user_id','!=',$request->user_id)
							->where('user_email','=',$request->user_email)
							->where('mkb_users.delete_status','=','0')
							->count();
		$mobileCheck 	= DB::table('mkb_users')
							->where('mkb_users.user_id','!=',$request->user_id)
							->where('user_mobile','=',$request->user_mobile)
							->where('mkb_users.delete_status','=','0')
							->count();
		if($emailCheck>0 && $mobileCheck>0) {
			return Response::json(array('status'=>'2'));	
		}
		else if($emailCheck>0) {
			return Response::json(array('status'=>'3'));	
		}
		else if($mobileCheck>0) {
			return Response::json(array('status'=>'4'));	
		}
		else {
			$checkUser = DB::table('mkb_users')
							->where('mkb_users.user_id','!=',$request->user_id)
							->where('mkb_users.delete_status','=','0')
							->first();
			DB::table('mkb_users')
				->where('user_id','=',$request->user_id)
				->update([
					'modified_by'=>$request->modified_by,
					'user_assign_to_id'=>$request->user_assign_to_id,
					'user_firstname'=>$request->user_firstname,
					'user_lastname'=>$request->user_lastname,
					'user_email'=>$request->user_email,
					'user_mobile'=>$request->user_mobile,
					'user_telephone'=>$request->user_telephone,
					'user_address'=>$request->user_address,
					'updated_at'=>date('Y-m-d H:i:s')
				]);

			$user 	= DB::table('mkb_users')
						->where('mkb_users.user_id','=',$request->user_id)
						->where('mkb_users.delete_status','=','0')
						->first();

			if ($checkUser->user_assign_to_id!=$user->user_assign_to_id) {
				//user is reassigned
				if ($user->user_status!=1) {
					//$status 	= $this->modifyBlockStatus(user);
				}
			}

			$user 		= $this->includeUserDetails($user);
			$status 	= $this->updateImage($user,$request->user_image);
			//$status 	= EmailController::createUserMail($user,$password);

			if($user) {
				return Response::json(array('status'=>'1','user'=>$user,'message'=>'User updated successfully.'));
			}
			else {
				return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
			}			
		}
	}	

	public static function updateImage($user,$user_image) {
		$file = $user_image;
		if($file!=null)	{
			$extension = $file->getClientOriginalExtension();
			$bytes = File::size($file);
			if($extension=="jpg"||$extension=="png"||$extension=="jpeg") {
				$path = public_path('images/user_pic').'/';
				if(File::exists($path.$user->user_image)) {
					File::Delete($path.$user->user_image);
				}
				$new_filename=date("YmdHisu").".".$extension;
				$file->move($path, $new_filename);
				DB::table('mkb_users')
					->where('user_id','=',$user->user_id)
					->update(['user_image'=>$new_filename]);
				return 1;
			}
			else {
				return 0;
			}
		}
		return 2;
	}

	public function deleteUser(Request $request) {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$request->user_id)
					->where('mkb_users.delete_status','=','0')
					->first();
		if($user) {
			$user_array	= array();
			array_push($user_array, $request->deleted_user_id);
			$user_array	= $this->hierarchicalUsers($request->deleted_user_id,$user_array);
			DB::table('mkb_users')
				->whereIn('mkb_users.user_id',$user_array)
				->where('mkb_users.delete_status','=','0')
				->update([
					'delete_status'=>'1',
					'deleted_at'=>date('Y-m-d H:i:s'),
					'user_last_deleted_on'=>date('Y-m-d H:i:s'),
					'deleted_by'=>$user->user_id
				]);
			$status = AppCustomerController::deleteCustomers($user_array,$user->user_id);
			$status = AppCompanyController::updateQuota($user->company_id,0);
			return Response::json(array('status'=>'1','message'=>'User and associated records deleted successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function blockUser(Request $request) {
		$block_string = date('YmdHis').$request->user_id.$request->blocked_user_id.str_random(64);
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$request->user_id)
					->where('mkb_users.delete_status','=','0')
					->first();
		if($user) {
			$user_array	= array();
			array_push($user_array, $request->blocked_user_id);
			$user_array	= $this->hierarchicalUsers($request->blocked_user_id,$user_array);
			//Block the selected user
			DB::table('mkb_users')
				->where('mkb_users.user_id','=',$request->blocked_user_id)
				->where('mkb_users.delete_status','=','0')
				->where('mkb_users.user_status','=','1')
				->update([
					'user_status'=>'0',
					'block_string'=>$block_string,
					'show_status'=>'0',
					'blocked_on'=>date('Y-m-d H:i:s'),
					'user_last_blocked_on'=>date('Y-m-d H:i:s'),
					'blocked_by'=>$user->user_id
				]);
			//Block team
			DB::table('mkb_users')
				->whereIn('mkb_users.user_id',$user_array)
				->where('mkb_users.user_id','!=',$request->blocked_user_id)
				->where('mkb_users.delete_status','=','0')
				->where('mkb_users.user_status','=','1')
				->update([
					'user_status'=>'2',
					'block_string'=>$block_string,
					'show_status'=>'0',
					'blocked_on'=>date('Y-m-d H:i:s'),
					'user_last_blocked_on'=>date('Y-m-d H:i:s'),
					'blocked_by'=>$user->user_id
				]);
			DB::table('mkb_users')
				->whereIn('mkb_users.user_id',$user_array)
				->where('mkb_users.user_id','!=',$request->blocked_user_id)
				->where('mkb_users.delete_status','=','0')
				->where('mkb_users.user_status','=','0')
				->increment('mkb_users.show_status','1');
			$status = AppCustomerController::blockCustomers($user_array,$user->user_id,$block_string);
			return Response::json(array('status'=>'1','message'=>'User and associated records blocked successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function unBlockUser(Request $request) {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$request->user_id)
					->where('mkb_users.delete_status','=','0')
					->first();
		if($user) {
			$blocked_user 	= DB::table('mkb_users')
								->where('mkb_users.user_id','=',$request->blocked_user_id)
								->where('mkb_users.delete_status','=','0')
								->first();
			$block_string = $blocked_user->block_string;
			$user_array	= array();
			array_push($user_array, $request->blocked_user_id);
			$user_array	= $this->hierarchicalUsers($request->blocked_user_id,$user_array);
			//Unblock the selected user
			DB::table('mkb_users')
				->where('mkb_users.user_id','=',$request->blocked_user_id)
				->where('mkb_users.delete_status','=','0')
				->where('mkb_users.user_status','=','0')
				->update([
					'user_status'=>'1',
					'block_string'=>null,
					'blocked_on'=>null,
					'blocked_by'=>null
				]);
			//Unblock team
			DB::table('mkb_users')
				->whereIn('mkb_users.user_id',$user_array)
				->where('mkb_users.user_id','!=',$request->blocked_user_id)
				->where('mkb_users.delete_status','=','0')
				->where('mkb_users.user_status','=','2')
				->where('mkb_users.block_string','=',$block_string)
				->update([
					'user_status'=>'1',
					'block_string'=>null,
					'blocked_on'=>null,
					'blocked_by'=>null
				]);
			DB::table('mkb_users')
				->whereIn('mkb_users.user_id',$user_array)
				->where('mkb_users.user_id','!=',$request->blocked_user_id)
				->where('mkb_users.delete_status','=','0')
				->where('mkb_users.user_status','=','0')
				->decrement('mkb_users.show_status','1');
			$status = AppCustomerController::unBlockCustomers($user_array,$user->user_id,$block_string);
			return Response::json(array('status'=>'1','message'=>'User and associated records unblocked successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public static function modifyBlockStatus($user) {
		$old_block_string 	= $user->block_string;
		$block_string = date('YmdHis').$user->modified_by.$user->user_id.str_random(64);
		if($user) {
			$user_array	= array();
			array_push($user_array, $user->user_id);
			$user_array	= AppUserController::hierarchicalUsers($user->user_id,$user_array);
			//Block the selected user
			DB::table('mkb_users')
				->where('mkb_users.user_id','=',$user->user_id)
				->where('mkb_users.delete_status','=','0')
				->update([
					'user_status'=>'0',
					'block_string'=>$block_string,
					'show_status'=>'0',
					'blocked_on'=>date('Y-m-d H:i:s'),
					'user_last_blocked_on'=>date('Y-m-d H:i:s'),
					'blocked_by'=>$user->modified_by
				]);
			//Block team
			DB::table('mkb_users')
				->whereIn('mkb_users.user_id',$user_array)
				->where('mkb_users.user_id','!=',$user->user_id)
				->where('mkb_users.delete_status','=','0')
				->update([
					'user_status'=>'2',
					'block_string'=>$block_string,
					'show_status'=>'0',
					'blocked_on'=>date('Y-m-d H:i:s'),
					'user_last_blocked_on'=>date('Y-m-d H:i:s'),
					'blocked_by'=>$user->modified_by
				]);
			DB::table('mkb_users')
				->whereIn('mkb_users.user_id',$user_array)
				->where('mkb_users.user_id','!=',$user->user_id)
				->where('mkb_users.delete_status','=','0')
				->where('mkb_users.user_status','=','0')
				->increment('mkb_users.show_status','1');
			$status = AppCustomerController::blockCustomers($user_array,$user->user_id,$block_string);
			return 1;
		}
		else {
			return 0;
		}
	}

}
