<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\Target;
use App\Http\Controllers\App\AppUserController;

class AppTargetController extends Controller {

	public function viewCreateTarget($user_id) {
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
			return Response::json(array('status'=>'1','users'=>$users));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function createTarget(Request $request) {
		$target_check 	= DB::table('mkb_target')
							->where('user_id','=',$request->target_user_id)
							->where('target_from_on','=',date('Y-m-d',strtotime($request->target_from_on)))
							->where('target_to_on','=',date('Y-m-d',strtotime($request->target_to_on)))
							->where('delete_status','=','0')
							->first();
		if ($target_check) {
			return Response::json(array('status'=>'0','message'=>'Target already created for the user.'));
		}
		else {
			$target 					= new Target();
			$target->user_id 			= $request->target_user_id;
			$target->target_creater_id 	= $request->user_id;
			$target->target_modifier_id = $request->user_id;
			$target->target_amount 		= $request->target_amount;
			$target->target_from_on 	= date('Y-m-d',strtotime($request->target_from_on));
			$target->target_to_on 		= date('Y-m-d',strtotime($request->target_to_on));
			$target->target_status 		= 0;
			$target->delete_status 		= 0;
			$target->save();
			if ($target) {
				return Response::json(array('status'=>'1','message'=>'Target created successfully.'));
			}
			else {
				return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
			}
		}
	}

	//target shown as individual target, not as the sum of the targets of the team
	/*public function viewTarget($user_id,$selected_user_id,$target_view_count) {
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
			if ($selected_user_id!=0) {
				$user_array	= array();
				array_push($user_array,$selected_user_id);
			}
			$target_array 	= array();
			for ($i=0; $i < count($user_array); $i++) { 
				if ($target_view_count==0) {
					$tgs 	= DB::table('mkb_target')
							->join('mkb_users','mkb_users.user_id','=','mkb_target.user_id')
							->where('mkb_users.user_id','=',$user_array[$i])
							->where('mkb_users.delete_status','=','0')
							//->where('mkb_users.user_status','=','1')
							->where('mkb_target.delete_status','=','0')
							->orderBy('mkb_target.target_from_on', 'desc')
							->get();
				}
				else {
					$tgs 	= DB::table('mkb_target')
							->join('mkb_users','mkb_users.user_id','=','mkb_target.user_id')
							->where('mkb_users.user_id','=',$user_array[$i])
							->where('mkb_users.delete_status','=','0')
							//->where('mkb_users.user_status','=','1')
							->where('mkb_target.delete_status','=','0')
							->orderBy('mkb_target.target_from_on', 'desc')
							->take($target_view_count)
							->get();
				}
				if ($tgs) {
					foreach ($tgs as $tg) {
						array_push($target_array, $tg->target_id);
					}
				}
			}
			$targets 	= DB::table('mkb_target')
							->select('mkb_target.*',DB::raw("CONCAT(DATE_FORMAT(mkb_target.target_from_on, '%d %b %Y'),' to ',DATE_FORMAT(mkb_target.target_to_on, '%d %b %Y')) as target_date"))
							->whereIn('mkb_target.target_id',$target_array)
							->orderBy('mkb_target.target_from_on', 'desc')
							->get();
			$total_target_amount 	= 0;
			$total_sale_amount		= 0;
			if ($targets) {
				foreach ($targets as $target) {
					$target->remove_target = 0;
					if (date('Y-m-d',strtotime($target->target_from_on))==date('Y-m-01')) {
						$target->remove_target = 1;
					}
					$customers 	= DB::table('mkb_customer')
									->where('mkb_customer.customer_assigned_to_id','=',$target->user_id)
									->where('mkb_customer.delete_status','=','0')
									//->where('mkb_customer.customer_status','=','1')
									->get();
					$customer_array 	= array();
					if ($customers) {
						foreach ($customers as $customer) {
							array_push($customer_array, $customer->customer_id);
						}
					}
					$target->total_sale	= DB::table('mkb_schedule')
											->where(function($query) use($customer_array,$target) {
												$query->whereIn('mkb_schedule.customer_id',$customer_array)
												->orWhere(function($query) use($target) {
													$query->where('mkb_schedule.customer_id','=',NULL)
													->where('mkb_schedule.schedule_attender_id','=',$target->user_id);
												});
											})
											->where('schedule_reported_on','>=',date('Y-m-d',strtotime($target->target_from_on)))
											->where('schedule_reported_on','<=',date('Y-m-d',strtotime($target->target_to_on)))
											->whereIn('mkb_schedule.schedule_status',[1,3])
											->sum('mkb_schedule.schedule_report_sale_value');
					$target->achievement= 0;
					if ($target->target_amount!=0) {
						$target->achievement= ($target->total_sale/$target->target_amount)*100;
					}
					$total_target_amount 	= $total_target_amount+$target->target_amount;
					$total_sale_amount		= $total_sale_amount+$target->total_sale;
				}
			}
			$total_target_achievement	= 0;
			if ($total_target_amount!=0) {
				$total_target_achievement = ($total_sale_amount/$total_target_amount)*100;
			}
			return Response::json(array('status'=>'1','selected_user_id'=>$selected_user_id,'target_view_count'=>$target_view_count,'total_sale_amount'=>$total_sale_amount,'total_target_amount'=>$total_target_amount,'total_target_achievement'=>$total_target_achievement,'users'=>$users,'targets'=>$targets));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}*/

	public function viewTarget($user_id,$selected_user_id,$target_view_count) {
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
			if ($selected_user_id!=0) {
				$user_array	= array();
				array_push($user_array,$selected_user_id);
			}
			$target_array 	= array();
			for ($i=0; $i < count($user_array); $i++) { 
				if ($target_view_count==0) {
					$tgs 	= DB::table('mkb_target')
							->join('mkb_users','mkb_users.user_id','=','mkb_target.user_id')
							->where('mkb_users.user_id','=',$user_array[$i])
							->where('mkb_users.delete_status','=','0')
							//->where('mkb_users.user_status','=','1')
							->where('mkb_target.delete_status','=','0')
							->orderBy('mkb_target.target_from_on', 'desc')
							->get();
				}
				else {
					$tgs 	= DB::table('mkb_target')
							->join('mkb_users','mkb_users.user_id','=','mkb_target.user_id')
							->where('mkb_users.user_id','=',$user_array[$i])
							->where('mkb_users.delete_status','=','0')
							//->where('mkb_users.user_status','=','1')
							->where('mkb_target.delete_status','=','0')
							->orderBy('mkb_target.target_from_on', 'desc')
							->take($target_view_count)
							->get();
				}
				if ($tgs) {
					foreach ($tgs as $tg) {
						array_push($target_array, $tg->target_id);
					}
				}
			}
			$targets 	= DB::table('mkb_target')
							->select('mkb_target.*',DB::raw("CONCAT(DATE_FORMAT(mkb_target.target_from_on, '%d %b %Y'),' to ',DATE_FORMAT(mkb_target.target_to_on, '%d %b %Y')) as target_date"))
							->whereIn('mkb_target.target_id',$target_array)
							->orderBy('mkb_target.target_from_on', 'desc')
							->get();
			$total_target_amount 	= DB::table('mkb_target')
										->whereIn('mkb_target.target_id',$target_array)
										->sum('mkb_target.target_amount');
			$total_sale_amount		= 0;
			if ($targets) {
				foreach ($targets as $target) {
					$target->remove_target = 0;
					if (date('Y-m-d',strtotime($target->target_from_on))==date('Y-m-01')) {
						$target->remove_target = 1;
					}
					$team_user_array	= array();
					if($user->user_role!=1) {
						array_push($team_user_array,$target->user_id);
					}
					$team_user_array	= AppUserController::hierarchicalUsers($target->user_id,$team_user_array);
					$customers 	= DB::table('mkb_customer')
									->whereIn('mkb_customer.customer_assigned_to_id',$team_user_array)
									->where('mkb_customer.delete_status','=','0')
									//->where('mkb_customer.customer_status','=','1')
									->get();
					$customer_array 	= array();
					if ($customers) {
						foreach ($customers as $customer) {
							array_push($customer_array, $customer->customer_id);
						}
					}
					$total_sale_amount	= $total_sale_amount+DB::table('mkb_schedule')
											->where(function($query) use($customer_array,$target) {
												$query->whereIn('mkb_schedule.customer_id',$customer_array)
												->orWhere(function($query) use($target) {
													$query->where('mkb_schedule.customer_id','=',NULL)
													->where('mkb_schedule.schedule_attender_id','=',$target->user_id);
												});
											})
											->where('schedule_reported_on','>=',date('Y-m-d',strtotime($target->target_from_on)))
											->where('schedule_reported_on','<=',date('Y-m-d',strtotime($target->target_to_on)))
											->whereIn('mkb_schedule.schedule_status',[1,3])
											->sum('mkb_schedule.schedule_report_sale_value');
					$target->total_sale	= DB::table('mkb_schedule')
											->join('mkb_users','mkb_users.user_id','=','mkb_schedule.schedule_creater_id')
											->where(function($query) use($customer_array,$team_user_array) {
												$query->whereIn('mkb_schedule.customer_id',$customer_array)
												->orWhere(function($query) use($team_user_array) {
													$query->where('mkb_schedule.customer_id','=',NULL)
													->whereIn('mkb_schedule.schedule_attender_id',$team_user_array);
												});
											})
											->where('schedule_reported_on','>=',date('Y-m-d',strtotime($target->target_from_on)))
											->where('schedule_reported_on','<=',date('Y-m-d',strtotime($target->target_to_on)))
											->whereIn('mkb_schedule.schedule_status',[1,3])
											->where('mkb_users.delete_status','=','0')
											//->where('mkb_users.user_status','=','1')
											->sum('mkb_schedule.schedule_report_sale_value');
					$target->target_amount 	= DB::table('mkb_target')
											->join('mkb_users','mkb_users.user_id','=','mkb_target.user_id')
											->whereIn('mkb_users.user_id',$team_user_array)
											->where('target_from_on','>=',date('Y-m-d',strtotime($target->target_from_on)))
											->where('target_to_on','<=',date('Y-m-d',strtotime($target->target_to_on)))
											->where('mkb_users.delete_status','=','0')
											//->where('mkb_users.user_status','=','1')
											->where('mkb_target.delete_status','=','0')
											->sum('mkb_target.target_amount');
					$target->achievement= 0;
					if ($target->target_amount!=0) {
						$target->achievement= sprintf("%.2f", ($target->total_sale/$target->target_amount)*100);
					}
					if ($target->user_id==$user_array['0']) {
						$total_target_amount 	= $target->target_amount;
						$total_sale_amount		= $target->total_sale;
					}
				}
			}
			$total_target_achievement	= 0;
			if ($total_target_amount!=0) {
				$total_target_achievement=sprintf("%.2f", ($total_sale_amount/$total_target_amount)*100);
			}
			return Response::json(array('status'=>'1','selected_user_id'=>$selected_user_id,'target_view_count'=>$target_view_count,'total_sale_amount'=>$total_sale_amount,'total_target_amount'=>$total_target_amount,'total_target_achievement'=>$total_target_achievement,'users'=>$users,'targets'=>$targets));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function removeTarget(Request $request) {
		$checkTarget 	= DB::table('mkb_target')
							->where('target_id','=',$request->target_id)
							->first();
		if($checkTarget) {
			DB::table('mkb_target')
				->where('target_id','=',$request->target_id)
				->update([
					'delete_status'	=>'1',
					'deleted_at'	=>date('Y-m-d H:i:s')
				]);
			return Response::json(array('status'=>'1','message'=>'Target removed successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}
}