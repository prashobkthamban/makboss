<?php namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use URL;
use App\Schedule;
use App\AutoSchedule;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\CustomerController;

class ScheduleController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public static function createAutoSchedule($auto_schedule_id,$customer_id,$schedule_attender_id,$repeat_days) {
		$checkSchedule 		= AutoSchedule::where('mkb_auto_schedule.auto_schedule_id','=',$auto_schedule_id)
								->where('mkb_auto_schedule.delete_status','=','0')
								->first();
		if($checkSchedule) {
			$checkSchedule->repeat_days = $repeat_days;
			$checkSchedule->save();
		}
		else {
			$schedule 						= new AutoSchedule();
			$schedule->customer_id			= $customer_id;
			$schedule->schedule_attender_id	= $schedule_attender_id;
			$schedule->repeat_days 			= $repeat_days;
			$schedule->delete_status		= 0;
			$schedule->save();
		}

		if($schedule) {
			return 1;
		}
		else {
			return 0;
		}
	}

	public static function updateAutoSchedule(Request) {
		$status 	= $this->createAutoSchedule($request->auto_schedule_id,$request->customer_id,$request->schedule_attender_id,$request->repeat_days);
		if($status==1) {
			return redirect(URL::previous())->with('message','Schedule added successfully.');
		}
		else {
			return redirect(URL::previous())->withErrors('Sorry! An error occurred.');
		}
	}

	public function viewCreateSchedule($user_id) {
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
			$users 	= DB::table('mkb_users')
						->whereIn('mkb_users.user_id',$user_array)
						->where('mkb_users.role_id','=',$role->role_id)
						->where('mkb_users.delete_status','=','0')
						->get();		
			if($users) {
				foreach ($users as $user) {
					if ($user->user_id==$user_id) {
						$user->user_firstname 	= 'Myself';
						$user->user_lastname	= '';
					}
				}
			}
			return view('schedule',compact('users'));
		}
		else {
			return redirect(URL::previous())->withErrors('Sorry! An error occurred.');
		}
	}
	
	public function createSchedule(Request $request) {
		$schedule 						= new Schedule();
		$schedule->customer_id 			= $request->customer_id;
		$schedule->schedule_attender_id = $request->schedule_attender_id;
		$schedule->schedule_creater_id 	= Auth::user()->user_id;
		$schedule->schedule_description = $request->schedule_description;
		$schedule->schedule_from_on 	= $request->schedule_from_on;
		$schedule->schedule_to_on 		= $request->schedule_to_on;
		$schedule->schedule_status 		= 0;
		$schedule->delete_status 		= 0;
		$schedule->save();
	}
}
