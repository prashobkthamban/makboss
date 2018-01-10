<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\Customer;
use App\Http\Controllers\App\AppDefaultController;
use App\Http\Controllers\App\AppUserController;
use App\Http\Controllers\App\AppCustomerPaymentController;
use App\Http\Controllers\App\AppScheduleController;

class AppCustomerController extends Controller {

	public static function fetchCustomers($customer_owners) {
		$customers 	= DB::table('mkb_customer')
						->join('mkb_users','mkb_users.user_id','=','mkb_customer.customer_assigned_to_id')
						->join('mkb_payment_terms','mkb_payment_terms.payment_terms_id','=','mkb_customer.payment_terms_id')
						->LeftJoin('mkb_auto_schedule','mkb_auto_schedule.customer_id','=','mkb_customer.customer_id')
						->select('mkb_customer.*',DB::raw("CONCAT(mkb_users.user_firstname,' ',mkb_users.user_lastname) as assigned_to_user_name"),'mkb_payment_terms.payment_terms_name','mkb_auto_schedule.repeat_days')
						->whereIn('mkb_customer.customer_assigned_to_id',$customer_owners)
						->where('mkb_customer.delete_status','=','0')
						->orderBy('mkb_customer.customer_id', 'desc')
						->get();
		if ($customers) {
			foreach ($customers as $customer) {
			//Set customer_status value
			if ($customer->customer_status==0&&$customer->show_status>0) {
				$customer->customer_status = 2;
			}
				$customer->repeat_days 	= explode(",",$customer->repeat_days);
				$visit 	= DB::table('mkb_schedule')
							->where('mkb_schedule.customer_id','=',$customer->customer_id)
							->where('mkb_schedule.schedule_status','=','0')
							->orderBy('schedule_id','desc')
							->first();
				if($visit) {
					$customer->visit_schedule = date('d M Y',strtotime($visit->schedule_from_on)).' to '.date('d M Y',strtotime($visit->schedule_to_on));
				}
				else {
					$customer->visit_schedule = 'No visits scheduled';
				}
			}
		}
		return $customers;
	}

	public function viewCustomers($user_id,$include_all) {
		$customer_owners	= array();
		array_push($customer_owners, $user_id);
		if($include_all==1) {
			$customer_owners	= AppUserController::hierarchicalUsers($user_id,$customer_owners);
		}
		$customers 	= $this->fetchCustomers($customer_owners);
		if($customers) {
			return Response::json(array('status'=>'1','customers'=>$customers));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function createCustomerDetails($user_id) {
		$user 	= DB::table('mkb_users')
					->join('mkb_company','mkb_company.company_id','=','mkb_users.company_id')
					->where('mkb_users.user_id','=',$user_id)
					->where('mkb_users.delete_status','=','0')
					->where('mkb_users.user_status','=','1')
					->first();
		if($user) {
			$user_array	= array();
			if($user->user_role!=1) {
				array_push($user_array,$user_id);
			}
			$user_array	= AppUserController::hierarchicalUsers($user_id,$user_array);
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
			if ($country) {
				foreach ($country as $cntry) {
					$cntry->states 	= AppDefaultController::fetchState($cntry->country_id);
				}
			}
			$pay_terms 	= AppCustomerPaymentController::fetchPaymentTerms();
			return Response::json(array('status'=>'1','users'=>$users,'country'=>$country,'pay_terms'=>$pay_terms));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function createCustomer(Request $request) {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$request->user_id)
					->where('mkb_users.delete_status','=','0')
					->where('mkb_users.user_status','=','1')
					->first();
		$emailCheck 	= DB::table('mkb_customer')
							->where('customer_email','=',$request->customer_email)
							->where('mkb_customer.delete_status','=','0')
							->count();
		$mobileCheck 	= DB::table('mkb_customer')
							->where('customer_mobile','=',$request->customer_mobile)
							->where('mkb_customer.delete_status','=','0')
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
			$customer 							= new Customer();
			$customer->company_id				= $request->company_id;
			$customer->country_id				= $request->country_id;
			$customer->state_id					= $request->state_id;
			$customer->payment_terms_id			= $request->payment_terms_id;
			$customer->customer_creator_id		= $user->user_id;
			$customer->customer_assigner_id		= $user->user_id;
			$customer->customer_assigned_to_id	= $request->customer_assigned_to_id;
			$customer->customer_name			= $request->customer_name;
			$customer->customer_contact_name	= $request->customer_contact_name;
			$customer->customer_email			= $request->customer_email;
			$customer->customer_mobile			= $request->customer_mobile;
			$customer->customer_telephone		= $request->customer_telephone;
			$customer->customer_address			= $request->customer_address;
			$customer->customer_credit_limit	= $request->customer_credit_limit;
			if($request->payment_terms_id==1 || $user->user_role==1) {
				$customer->approved_by 				= $user->user_id;
				$customer->approved_on				= date('Y-m-d H:i:s');
				$customer->customer_status			= 1;
				$customer->delete_status			= 0;
			}
			else {
				$customer->customer_status			= 0;
				$customer->delete_status			= 1;
			}
			$customer->save();

			if($customer) {
				if (count($request->repeat_days)>0) {
					$repeat_days 	= "";
					$days 	= $request->repeat_days;
					for ($i=0; $i < count($days) ; $i++) {
						if ($i==0) {
							$repeat_days 	= $days[$i];
						}
						else {
							$repeat_days 	= $repeat_days.','.$days[$i];
						}
					}
					$status 	= AppScheduleController::createAutoSchedule($customer->id,$customer->customer_assigned_to_id,$repeat_days);
				}
				if($customer->delete_status==1) {
					//some function to send notification to higher authority for approval
					return Response::json(array('status'=>'1','message'=>'Customer submitted for approval.','customer'=>$customer));
				}
				else {
					return Response::json(array('status'=>'1','message'=>'Customer created successfully.','customer'=>$customer));
				}
			}
			else {
				return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
			}
		}
	}

	public function editCustomer(Request $request) {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$request->user_id)
					->where('mkb_users.delete_status','=','0')
					->where('mkb_users.user_status','=','1')
					->first();
		$emailCheck 	= DB::table('mkb_customer')
							->where('customer_id','!=',$request->customer_id)
							->where('customer_email','=',$request->customer_email)
							->where('mkb_customer.delete_status','=','0')
							->count();
		$mobileCheck 	= DB::table('mkb_customer')
							->where('customer_id','!=',$request->customer_id)
							->where('customer_mobile','=',$request->customer_mobile)
							->where('mkb_customer.delete_status','=','0')
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
			$customer 	= DB::table('mkb_customer')
								->where('customer_id','=',$request->customer_id)
								->first();
			if ($customer) {
				if ($customer->payment_terms_id!=$request->payment_terms_id) {
					if($request->payment_terms_id==1 || $user->user_role==1) {
						$approved_by 				= $user->user_id;
						$approved_on				= date('Y-m-d H:i:s');
						$customer_status			= 1;
						$delete_status				= 0;
					}
					else {
						$approved_by 				= NULL;
						$approved_on				= NULL;
						$customer_status			= 0;
						$delete_status				= 1;
					}
					$customer_payment_terms_id_modified_on = date('Y-m-d H:i:s');
				}
				else {
					$approved_by 				= $customer->approved_by;
					$approved_on				= $customer->approved_on;
					$customer_status			= $customer->customer_status;
					$delete_status				= $customer->delete_status;
					$customer_payment_terms_id_modified_on = NULL;
				}
				if ($customer->customer_credit_limit!=$request->customer_credit_limit) {
					$customer_credit_limit_modified_on = date('Y-m-d H:i:s');
				}
				else {
					$customer_credit_limit_modified_on = NULL;
				}
			}
			DB::table('mkb_customer')
				->where('customer_id','=',$request->customer_id)
				->update([
					'country_id' 				=> $request->country_id,
					'state_id'					=> $request->state_id,
					'payment_terms_id'			=> $request->payment_terms_id,
					'customer_assigner_id'		=> $user->user_id,
					'customer_assigned_to_id'	=> $request->customer_assigned_to_id,
					'customer_name'				=> $request->customer_name,
					'customer_contact_name'		=> $request->customer_contact_name,
					'customer_email'			=> $request->customer_email,
					'customer_mobile'			=> $request->customer_mobile,
					'customer_telephone'		=> $request->customer_telephone,
					'customer_address'			=> $request->customer_address,
					'customer_credit_limit'		=> $request->customer_credit_limit,
					'modified_by'				=> $user->user_id,
					'customer_payment_terms_id_modified_on'	=> $customer_payment_terms_id_modified_on,
					'customer_credit_limit_modified_on'	=> $customer_credit_limit_modified_on,
					'approved_by'				=> $approved_by,
					'approved_on' 				=> $approved_on,
					'customer_status'			=> $customer_status,
					'delete_status'				=> $delete_status
				]);
			$customer 	= DB::table('mkb_customer')
								->where('customer_id','=',$request->customer_id)
								->first();

			if($customer) {
				if (count($request->repeat_days)>0) {
					$repeat_days 	= "";
					$days 	= $request->repeat_days;
					for ($i=0; $i < count($days) ; $i++) {
						if ($i==0) {
							$repeat_days 	= $days[$i];
						}
						else {
							$repeat_days 	= $repeat_days.','.$days[$i];
						}
					}
					$status 	= AppScheduleController::createAutoSchedule($customer->customer_id,$customer->customer_assigned_to_id,$repeat_days);
				}
				if($customer->delete_status==1) {
					//some function to send notification to higher authority for approval
					return Response::json(array('status'=>'1','message'=>'Customer submitted for approval.','customer'=>$customer));
				}
				else {
					return Response::json(array('status'=>'1','message'=>'Customer updated successfully.','customer'=>$customer));
				}
			}
			else {
				return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
			}
		}
	}

	public function approveCustomer($user_id,$customer_id,$approve_status) {
		if($approve_status==1) {
			$customer_status			= 1;
			$delete_status				= 0;
		}
		else {
			$customer_status			= 0;
			$delete_status				= 1;
		}

		$customer 	= DB::table('mkb_customer')
						->where('mkb_customer.customer_id','=',$customer_id)
						->where('mkb_customer.delete_status','=','0')
						->update([
							'approved_by'=>$user_id,
							'approved_on'=>date('Y-m-d H:i:s'),
							'customer_status'=>$customer_status,
							'delete_status'=>$delete_status
						]);
		//function to send the approved/rejected message to the creator/assigned to user
		if($customer) {
			if ($approve_status==1) {
				return Response::json(array('status'=>'1','message'=>'Customer approved successfully.'));
			}
			else {
				return Response::json(array('status'=>'1','message'=>'Customer rejected successfully.'));
			}
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public static function deleteCustomers($customer_owners,$user_id) {
		DB::table('mkb_customer')
			->whereIn('mkb_customer.customer_assigned_to_id',$customer_owners)
			->where('mkb_customer.delete_status','=','0')
			->update([
				'delete_status'=>'1',
				'deleted_at'=>date('Y-m-d H:i:s'),
				'customer_last_deleted_on'=>date('Y-m-d H:i:s'),
				'deleted_by'=>$user_id
			]);
		return 1;
	}

	public static function blockCustomers($customer_owners,$user_id,$block_string) {
		DB::table('mkb_customer')
			->whereIn('mkb_customer.customer_assigned_to_id',$customer_owners)
			->where('mkb_customer.delete_status','=','0')
			->where('mkb_customer.customer_status','=','1')
			->update([
				'customer_status'=>'2',
				'block_string'=>$block_string,
				'show_status'=>'0',
				'blocked_on'=>date('Y-m-d H:i:s'),
				'customer_last_blocked_on'=>date('Y-m-d H:i:s'),
				'blocked_by'=>$user_id
			]);
		DB::table('mkb_customer')
			->whereIn('mkb_customer.customer_assigned_to_id',$customer_owners)
			->where('mkb_customer.delete_status','=','0')
			->where('mkb_customer.customer_status','=','0')
			->increment('mkb_customer.show_status','1');
		return 1;
	}

	public static function unBlockCustomers($customer_owners,$user_id,$block_string) {
		DB::table('mkb_customer')
			->whereIn('mkb_customer.customer_assigned_to_id',$customer_owners)
			->where('mkb_customer.delete_status','=','0')
			->where('mkb_customer.customer_status','=','2')
			->where('mkb_customer.block_string','=',$block_string)
			->update([
				'customer_status'=>'1',
				'block_string'=>null,
				'blocked_on'=>null,
				'blocked_by'=>null
			]);
		DB::table('mkb_customer')
			->whereIn('mkb_customer.customer_assigned_to_id',$customer_owners)
			->where('mkb_customer.delete_status','=','0')
			->where('mkb_customer.customer_status','=','0')
			->decrement('mkb_customer.show_status','1');
		return 1;
	}

	public function delete(Request $request) {
		$customer 	= DB::table('mkb_customer')
						->where('mkb_customer.customer_id','=',$request->customer_id)
						->where('mkb_customer.delete_status','=','0')
						->update([
							'delete_status'=>'1',
							'deleted_at'=>date('Y-m-d H:i:s'),
							'customer_last_deleted_on'=>date('Y-m-d H:i:s'),
							'deleted_by'=>$request->user_id
						]);
		if($customer) {
			return Response::json(array('status'=>'1','message'=>'Customer deleted successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function block(Request $request) {
		$customer 	= DB::table('mkb_customer')
						->where('mkb_customer.customer_id','=',$request->customer_id)
						->where('mkb_customer.delete_status','=','0')
						->update([
							'customer_status'=>'0',
							'blocked_on'=>date('Y-m-d H:i:s'),
							'customer_last_blocked_on'=>date('Y-m-d H:i:s'),
							'blocked_by'=>$request->user_id
						]);
		if($customer) {
			return Response::json(array('status'=>'1','message'=>'Customer blocked successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function unBlock(Request $request) {
		$customer 	= DB::table('mkb_customer')
						->where('mkb_customer.customer_id','=',$request->customer_id)
						->where('mkb_customer.delete_status','=','0')
						->update([
							'customer_status'=>'1',
							'blocked_on'=>null,
							'blocked_by'=>null
						]);
		if($customer) {
			return Response::json(array('status'=>'1','message'=>'Customer unblocked successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

}
