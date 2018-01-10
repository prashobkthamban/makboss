<?php namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\Customer;
use App\Http\Controllers\Web\DefaultController;
use App\Http\Controllers\Web\UserController;

class CustomerController extends Controller {

	public static function fetchCustomers($customer_owners) {
		$customers 	= DB::table('mkb_customer')
						->join('mkb_users','mkb_users.user_id','=','mkb_customer.customer_assigned_to_id')
						->select('mkb_customer.*','mkb_users.user_firstname','mkb_users.user_lastname')
						->whereIn('mkb_customer.customer_assigned_to_id',$customer_owners)
						->where('mkb_customer.delete_status','=','0')
						->where('mkb_users.delete_status','=','0')
						->get();
		if($customers) {
			foreach ($customers as $customer) {
				$auto_schedule 	= DB::table('mkb_auto_schedule')
									->where('mkb_auto_schedule.customer_id','=',$customer->customer_id)
									->where('mkb_auto_schedule.delete_status','=','0')
									->first();
				$customer->auto_schedule_id = 0;
				$customer->repeat_days 		= "";
				if($auto_schedule) {
					$customer->auto_schedule_id	= $auto_schedule->auto_schedule_id;
					$customer->repeat_days 		= $auto_schedule->repeat_days;
				}
			}
		}
		return $customers;
	}

	public function filterCustomers($user_id) {
		$user_array	= array();
		array_push($user_array,$user_id);
		$customers 	= $this->fetchCustomers($user_array);
		return Response::json(array('status'=>'1','customers'=>$customers));
	}

	public function viewCustomers($user_id) {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$user_id)
					->where('mkb_users.delete_status','=','0')
					->first();
		if($user) {
			if($user->user_role==1) {
				$user_array = DB::table('mkb_users')
								->select('mkb_users.user_id')
								->where('mkb_users.company_id','=',$user->company_id)
								->where('mkb_users.delete_status','=','0')
								->get();
				$user_array	= $user_array->toArray();
			}
			else {
				$user_array	= array();
				array_push($user_array,$user_id);
				$user_array	= UserController::hierarchicalUsers($user_id,$user_array);
			}
			$customers 	= $this->fetchCustomers($user_array);
			if($customers) {
				foreach ($customers as $customer) {
					if ($customer->customer_assigned_to_id==$user_id) {
						$customer->user_firstname 	= 'Myself';
						$customer->user_lastname	= '';
					}
				}
			}
			return view('customers',compact('customers'));
		}
		else {
			return redirect(URL::previous())->withErrors('Sorry! An error occurred.');
		}
	}

	public function addCustomerDetails() {
		$user 	= DB::table('mkb_users')
					->where('mkb_users.user_id','=',$user_id)
					->where('mkb_users.delete_status','=','0')
					->first();
		if($user) {
			if($user->user_role==1) {
				$users 	= DB::table('mkb_users')
							->where('mkb_users.company_id','=',$user->company_id)
							->where('mkb_users.user_id','!=',$user->user_id)
							->where('mkb_users.delete_status','=','0')
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
			$country 	= DefaultController::fetchCountry();
			if($country) {
				foreach ($country as $cntry) {
					$cntry->state 	= DefaultController::fetchState($cntry->country_id);
				}
			}
			$pay_terms 	= CustomerPaymentController::fetchPaymentTerms();
			return view('create_customer',compact('users','country','pay_terms'));
		}
		else {
			return redirect(URL::previous())->withErrors('Sorry! An error occurred.');
		}
	}

	public function checkCustomerEmail(Request $request) {
		$dataCheck 	= DB::table('mkb_customer')
							->where('customer_email','=',$request->customer_email)
							->count();
		if($dataCheck>0) {
			return Response::json(array('status'=>'0','message'=>'Email address already in use.'));
		}
		else {
			return Response::json(array('status'=>'1','message'=>'Email address available.'));
		}
	}

	public function checkCustomerMobile(Request $request) {
		$dataCheck 	= DB::table('mkb_customer')
							->where('customer_mobile','=',$request->customer_mobile)
							->count();
		if($dataCheck>0) {
			return Response::json(array('status'=>'0','message'=>'Mobile number already in use.'));
		}
		else {
			return Response::json(array('status'=>'1','message'=>'Mobile number available.'));
		}
	}

	public function checkCustomerPhone(Request $request) {
		$dataCheck 	= DB::table('mkb_customer')
							->where('customer_telephone','=',$request->customer_telephone)
							->count();
		if($dataCheck>0) {
			return Response::json(array('status'=>'0','message'=>'Phone number already in use.'));
		}
		else {
			return Response::json(array('status'=>'1','message'=>'Phone number available.'));
		}
	}


	public function addCustomer(Request $request) {
		$customer 							= new Customer();
		$customer->company_id				= $request->company_id;
		$customer->country_id				= $request->country_id;
		$customer->state_id					= $request->state_id;
		$customer->zipcode_id				= $request->zipcode_id;
		$customer->payment_terms_id			= $request->payment_terms_id;
		$customer->customer_creator_id		= Auth::user()->user_id;
		$customer->customer_assigner_id		= Auth::user()->user_id;
		$customer->customer_assigned_to_id	= $request->customer_assigned_to_id;
		$customer->customer_name			= $request->customer_name;
		$customer->customer_contact_name	= $request->customer_contact_name;
		$customer->customer_email			= $request->customer_email;
		$customer->customer_mobile			= $request->customer_mobile;
		$customer->customer_telephone		= $request->customer_telephone;
		$customer->customer_address			= $request->customer_address;
		$customer->customer_credit_limit	= $request->customer_credit_limit;
		$customer->customer_longitude		= $request->customer_longitude;
		$customer->customer_status			= 1;
		$customer->delete_status			= 0;
		$customer->save();

		if($customer) {
			return redirect(URL::previous())->with('message','Customer added successfully.');
		}
		else {
			return redirect(URL::previous())->withErrors('Sorry! An error occurred.');
		}
	}

}
