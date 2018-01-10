<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use File;
use App\Schedule;
use App\AutoSchedule;
use App\Http\Controllers\App\AppUserController;
use App\Http\Controllers\App\AppCustomerController;

class AppScheduleController extends Controller {

	public static function createAutoSchedule($customer_id,$schedule_attender_id,$repeat_days) {
		$checkSchedule 		= AutoSchedule::where('mkb_auto_schedule.customer_id','=',$customer_id)
								->where('mkb_auto_schedule.delete_status','=','0')
								->first();
		if($checkSchedule) {
			DB::table('mkb_auto_schedule')
				->where('auto_schedule_id','=',$checkSchedule->auto_schedule_id)
				->update(['repeat_days'=>$repeat_days]);
		}
		else {
			$schedule 						= new AutoSchedule();
			$schedule->customer_id			= $customer_id;
			$schedule->schedule_attender_id	= $schedule_attender_id;
			$schedule->repeat_days 			= $repeat_days;
			$schedule->delete_status		= 0;
			$schedule->save();
		}

		return 1;
	}

	public function updateAutoSchedule(Request $request) {
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
			$status 	= $this->createAutoSchedule($request->customer_id,$request->schedule_attender_id,$repeat_days);
		}
		return Response::json(array('status'=>'1','message'=>'Auto schedule updated successfully.'));
	}

	public function viewCreateSchedule($user_id) {
		$user 	= DB::table('mkb_users')
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
				foreach ($users as $user) {
					if ($user->user_id==$user_id) {
						$user->user_firstname 	= 'Myself';
						$user->user_lastname	= '';
					}
				}
			}
			$customers 	= DB::table('mkb_customer')
								->whereIn('mkb_customer.customer_assigned_to_id',$user_array)
								->where('mkb_customer.delete_status','=','0')
								->where('mkb_customer.customer_status','=','1')
								->get();
			return Response::json(array('status'=>'1','users'=>$users,'customers'=>$customers));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}
	
	public function createSchedule(Request $request) {
		$schedule 						= new Schedule();
		$schedule->customer_id 			= $request->customer_id;
		$schedule->schedule_attender_id = $request->schedule_attender_id;
		$schedule->schedule_creater_id 	= $request->user_id;
		$schedule->schedule_description = $request->schedule_description;
		$schedule->schedule_from_on 	= date('Y-m-d',strtotime($request->schedule_from_on));
		$schedule->schedule_to_on 		= date('Y-m-d',strtotime($request->schedule_to_on));
		$schedule->schedule_status 		= 0;
		$schedule->delete_status 		= 0;
		$schedule->save();
		if ($schedule) {
			return Response::json(array('status'=>'1','message'=>'Schedule created successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function viewSchedule($schedule_status,$user_id,$selected_user_id=NULL,$customer_id=NULL,$from_date=NULL,$to_date=NULL) {
		$user 	= DB::table('mkb_users')
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
						//->where('mkb_users.user_status','=','1')
						->orderBy('mkb_users.role_id', 'asc')
						->get();		
			if($users) {
				foreach ($users as $user) {
					if ($user->user_id==$user_id) {
						$user->user_firstname 	= 'Myself';
						$user->user_lastname	= '';
					}
				}
			}
			$customers 	= DB::table('mkb_customer')
								->whereIn('mkb_customer.customer_assigned_to_id',$user_array)
								->where('mkb_customer.delete_status','=','0')
								//->where('mkb_customer.customer_status','=','1')
								->get();
			$customer_array 	= array();
			if ($customers) {
				foreach ($customers as $customer) {
					array_push($customer_array, $customer->customer_id);
				}
			}
			$selected_customer_array 	= array();
			if ($selected_user_id==0) {
				//all customers
				$selected_customer_array 	= $customer_array;
			}
			else {
				if ($customer_id==0) {
					//all customers of selected user
					$selected_customers 	= DB::table('mkb_customer')
								->where('mkb_customer.customer_assigned_to_id',$selected_user_id)
								->where('mkb_customer.delete_status','=','0')
								//->where('mkb_customer.customer_status','=','1')
								->get();
					if ($selected_customers) {
						foreach ($selected_customers as $customer) {
							array_push($selected_customer_array, $customer->customer_id);
						}
					}
				}
				else {
					//single customer
					array_push($selected_customer_array, $customer_id);
				}
			}
			if ($schedule_status==0) {
				//scheduled visit
				if ($from_date==NULL) {
					$from_date	= date('Y-m-d');
				}
				if ($to_date==NULL) {
					$to_date	= date('Y-m-d');
				}
			}
			else if ($schedule_status==1) {
				//closed visits
				if ($from_date==NULL) {
					$from_date	= date('Y-m-d');
				}
				if ($to_date==NULL) {
					$to_date	= date('Y-m-d');
				}
			}
			else {
				//pending visits
				if ($from_date==NULL) {
					$from_date	= date('Y-m-d',(strtotime(date('Y-m-d'))-(60*60*24)));
				}
				if ($to_date==NULL) {
					$to_date	= date('Y-m-d',(strtotime(date('Y-m-d'))-(60*60*24)));
				}
			}
			$schedules 	= DB::table('mkb_schedule')
							->join('mkb_customer','mkb_schedule.customer_id','=','mkb_customer.customer_id')
							->join('mkb_users','mkb_users.user_id','=','mkb_customer.customer_assigned_to_id')
							->select('mkb_schedule.*',DB::raw("CONCAT(DATE_FORMAT(mkb_schedule.schedule_from_on, '%d %b %Y'),' to ',DATE_FORMAT(mkb_schedule.schedule_to_on, '%d %b %Y')) as scheduled_date"),DB::raw("CONCAT(mkb_users.user_firstname,' ',mkb_users.user_lastname) as assigned_to_user_name"),DB::raw("DATE_FORMAT(mkb_schedule.schedule_reported_on, '%d %b %Y') as reported_date"),'mkb_customer.*')
							->whereIn('mkb_schedule.customer_id',$selected_customer_array)
							->where('mkb_schedule.schedule_status','=',$schedule_status)
							->where('mkb_schedule.delete_status','=','0')
							->where(function($query) use($from_date,$to_date,$schedule_status) {
								if ($schedule_status==1) {
									$query->where(function($query) use($from_date,$to_date) {
										if ($from_date) {
											$query->where('schedule_reported_on','>=',date('Y-m-d',strtotime($from_date)));
										}
										if ($to_date) {
											$query->where('schedule_reported_on','<=',date('Y-m-d',strtotime($to_date)));
										}
									});
								}
								else {
									$query->where(function($query) use($from_date,$to_date) {
										if ($from_date) {
											$query->where('schedule_from_on','>=',date('Y-m-d',strtotime($from_date)));
										}
										if ($to_date) {
											$query->where('schedule_from_on','<=',date('Y-m-d',strtotime($to_date)));
										}
									})
									->orWhere(function($query) use($from_date,$to_date) {
										if ($from_date) {
											$query->where('schedule_to_on','>=',date('Y-m-d',strtotime($from_date)));
										}
										if ($to_date) {
											$query->where('schedule_to_on','<=',date('Y-m-d',strtotime($to_date)));
										}
									});
								}
							})
							//->where('mkb_users.user_status','=','1')
							//->where('mkb_customer.customer_status','=','1')
							->orderBy('mkb_schedule.schedule_id', 'desc')
							->get();
			if ($schedules) {
				foreach ($schedules as $schedule) {
					$schedule->visit_photos 	= explode(",",$schedule->visit_photos);
				}
			}
			return Response::json(array('status'=>'1','users'=>$users,'customers'=>$customers,'schedules'=>$schedules,'selected_user_id'=>$selected_user_id,'customer_id'=>$customer_id,'from_date'=>$from_date,'to_date'=>$to_date));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}

	}

	public function checkoutSchedule(Request $request) {
		$checkSchedule 	= DB::table('mkb_schedule')
							->where('schedule_id','=',$request->schedule_id)
							->first();
		if ($checkSchedule) {
			DB::table('mkb_schedule')
				->where('schedule_id','=',$request->schedule_id)
				->update([
					'schedule_report_sale_value' => $request->schedule_report_sale_value,
					'schedule_report_collection' => $request->schedule_report_collection,
					'schedule_report_notes' 	 => $request->schedule_report_notes,
					'schedule_report_latitude' 	 => sprintf("%.6f", $request->latitude),
					'schedule_report_longitude'	 => sprintf("%.6f", $request->longitude),
					'schedule_status'			 => '1',
					'schedule_reported_on'		 => date('Y-m-d H:i:s')
				]);
			$status = $this->updateVisitPhotos($request->schedule_id,$request->visit_photos);
			return Response::json(array('status'=>'1','message'=>'Schedule checked out successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public static function updateVisitPhotos($schedule_id,$photos) {
		$schedule 	= DB::table('mkb_schedule')
						->where('schedule_id','=',$schedule_id)
						->first();
		$visit_photos 	= '';
		if ($schedule) {
			if ($schedule->visit_photos) {
				$visit_photos = $schedule->visit_photos.',';
			}
		}
		for ($i=0; $i < count($photos) ; $i++) { 
			$file = $photos[$i];
			if($file!=null)	{
				$extension = $file->getClientOriginalExtension();
				$bytes = File::size($file);
				if($extension=="jpg"||$extension=="png"||$extension=="jpeg") {
					$path = public_path('images/visit_photos').'/';
					$new_filename='visit'.$schedule_id.date("YmdHisu").".".$extension;
					$file->move($path, $new_filename);
					if ($i==0) {
						$visit_photos 	= $visit_photos.$new_filename;
					}
					else {
						$visit_photos 	= $visit_photos.','.$new_filename;
					}
				}
			}
		}
		DB::table('mkb_schedule')
			->where('schedule_id','=',$schedule_id)
			->update(['visit_photos'=>$visit_photos]);
		return 1;
	}

	public function removeSchedule(Request $request) {
		$checkSchedule 	= DB::table('mkb_schedule')
							->where('schedule_id','=',$request->schedule_id)
							->first();
		if($checkSchedule) {
			DB::table('mkb_schedule')
				->where('schedule_id','=',$request->schedule_id)
				->update([
					'delete_status'	=>'1',
					'deleted_at'	=>date('Y-m-d H:i:s')
				]);
			return Response::json(array('status'=>'1','message'=>'Schedule removed successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function addInstantSale(Request $request) {
		$schedule 								= new Schedule();
		$schedule->customer_id 					= $request->customer_id;
		$schedule->schedule_attender_id 		= $request->user_id;
		$schedule->schedule_creater_id 			= $request->user_id;
		$schedule->schedule_reported_on 		= date('Y-m-d',strtotime($request->sale_date)).' '.date('H:i:s');
		$schedule->schedule_report_sale_value 	= $request->sale_value;
		$schedule->schedule_report_collection 	= $request->sale_collection;
		$schedule->schedule_report_notes 		= $request->sale_notes;
		$schedule->schedule_report_latitude 	= sprintf("%.6f", $request->latitude);
		$schedule->schedule_report_longitude	= sprintf("%.6f", $request->longitude);
		$schedule->schedule_status 				= 3;
		$schedule->delete_status 				= 0;
		$schedule->save();
		if ($schedule) {
			return Response::json(array('status'=>'1','message'=>'Sale submitted successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function viewVisitReport($user_id,$selected_user_id,$customer_id,$from_date=NULL,$to_date=NULL) {
		$user 	= DB::table('mkb_users')
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
						//->where('mkb_users.user_status','=','1')
						->orderBy('mkb_users.role_id', 'asc')
						->get();		
			if($users) {
				foreach ($users as $user) {
					if ($user->user_id==$user_id) {
						$user->user_firstname 	= 'Myself';
						$user->user_lastname	= '';
					}
				}
			}
			$customers 	= DB::table('mkb_customer')
								->whereIn('mkb_customer.customer_assigned_to_id',$user_array)
								->where('mkb_customer.delete_status','=','0')
								//->where('mkb_customer.customer_status','=','1')
								->get();
			$customer_array 	= array();
			if ($customers) {
				foreach ($customers as $customer) {
					array_push($customer_array, $customer->customer_id);
				}
			}
			$selected_customer_array 	= array();
			$selected_user_array 		= array();
			if ($selected_user_id==0) {
				//all customers
				$selected_customer_array 	= $customer_array;
				//all users
				$selected_user_array 		= $user_array;
			}
			else {
				if ($customer_id==0) {
					//all customers of selected user
					$selected_customers 	= DB::table('mkb_customer')
								->where('mkb_customer.customer_assigned_to_id',$selected_user_id)
								->where('mkb_customer.delete_status','=','0')
								//->where('mkb_customer.customer_status','=','1')
								->get();
					if ($selected_customers) {
						foreach ($selected_customers as $customer) {
							array_push($selected_customer_array, $customer->customer_id);
						}
					}
				}
				else if($customer_id==-1) {
					//cash
					array_push($selected_customer_array, null);
				}
				else {
					//single customer
					array_push($selected_customer_array, $customer_id);
				}
				//single user
				array_push($selected_user_array, $selected_user_id);
			}
			$visits = DB::table('mkb_schedule')
						/*->LeftJoin('mkb_customer', function ($join) {
				            $join->on('mkb_schedule.customer_id', '=', 'mkb_customer.customer_id')
				                 ->where('mkb_customer.customer_status','=',1);
				        })*/
						->LeftJoin('mkb_customer','mkb_schedule.customer_id', '=', 'mkb_customer.customer_id')
						->join('mkb_users','mkb_users.user_id','=','mkb_schedule.schedule_attender_id')
						->select('mkb_schedule.*',DB::raw("CONCAT(mkb_users.user_firstname,' ',mkb_users.user_lastname) as assigned_to_user_name"),DB::raw("DATE_FORMAT(mkb_schedule.schedule_reported_on, '%d %b %Y') as reported_date"),'mkb_customer.customer_name')
						->where(function($query) use($selected_customer_array,$selected_user_array,$customer_id) {
							if ($customer_id!=-1) {
								$query->whereIn('mkb_schedule.customer_id',$selected_customer_array)
								->orWhere(function($query) use($selected_user_array) {
									$query->where('mkb_schedule.customer_id','=',NULL)
									->whereIn('mkb_schedule.schedule_attender_id',$selected_user_array);
								});
							}
							else {
								$query->where(function($query) use($selected_user_array) {
									$query->where('mkb_schedule.customer_id','=',NULL)
									->whereIn('mkb_schedule.schedule_attender_id',$selected_user_array);
								});
							}

						})
						->whereIn('mkb_schedule.schedule_status',[1,3])
						->where(function($query) use($from_date,$to_date) {
							if ($from_date) {
								$query->where('schedule_reported_on','>=',date('Y-m-d',strtotime($from_date)));
							}
							if ($to_date) {
								$query->where('schedule_reported_on','<=',date('Y-m-d',strtotime($to_date)));
							}
						})
						->where('mkb_schedule.delete_status','=','0')
						//->where('mkb_users.user_status','=','1')
						->orderBy('mkb_schedule.schedule_id', 'desc')
						->get();
			$total_visits 		= 0;
			$total_sale_value	= 0;
			$total_collection	= 0;
			if ($visits) {
				foreach ($visits as $visit) {
					if (!$visit->customer_name) {
						$visit->customer_name = 'Cash';
					}
					$total_visits++;
					$total_sale_value 		= $total_sale_value+$visit->schedule_report_sale_value;
					$total_collection 		= $total_collection+$visit->schedule_report_collection;
					$visit->visit_photos 	= explode(",",$visit->visit_photos);
				}
			}
			return Response::json(array('status'=>'1','total_visits'=>$total_visits,'total_sale_value'=>$total_sale_value,'total_collection'=>$total_collection,'selected_user_id'=>$selected_user_id,'customer_id'=>$customer_id,'from_date'=>$from_date,'to_date'=>$to_date,'users'=>$users,'customers'=>$customers,'visits'=>$visits));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}

	}
}
