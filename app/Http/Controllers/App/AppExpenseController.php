<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use File;
use App\Expense;
use App\Http\Controllers\App\AppUserController;

class AppExpenseController extends Controller {

	public function addExpense(Request $request) {
		$expense 					= new Expense();
		$expense->user_id 			= $request->user_id;
		$expense->expense_amount 	= $request->expense_amount;
		$expense->expense_date 		= date('Y-m-d',strtotime($request->expense_date));
		$expense->expense_note 		= $request->expense_note;
		$expense->delete_status 	= 0;
		$expense->save();
		if ($expense) {
			$status = $this->addExpensePhotos($expense->id,$request->expense_photos);
			return Response::json(array('status'=>'1','message'=>'Expense added successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public function editExpense(Request $request) {
		$checkExpense 	= DB::table('mkb_expense')
							->where('expense_id','=',$request->expense_id)
							->first();
		if ($checkExpense) {
			$expense 	= DB::table('mkb_expense')
							->where('expense_id','=',$request->expense_id)
							->update([
								'expense_amount'=> $request->expense_amount,
								'expense_date' => date('Y-m-d',strtotime($request->expense_date)),
								'expense_note' => $request->expense_note
							]);
			$status = $this->addExpensePhotos($request->expense_id,$request->expense_photos);
			return Response::json(array('status'=>'1','message'=>'Expense updated successfully.'));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}
	}

	public static function addExpensePhotos($expense_id,$photos) {
		$expense 	= DB::table('mkb_expense')
						->where('expense_id','=',$expense_id)
						->first();
		$expense_photos 	= '';
		if ($expense) {
			if ($expense->expense_photos) {
				$expense_photos = $expense->expense_photos.',';
			}
		}
		for ($i=0; $i < count($photos) ; $i++) { 
			$file = $photos[$i];
			if($file!=null)	{
				$extension = $file->getClientOriginalExtension();
				$bytes = File::size($file);
				if($extension=="jpg"||$extension=="png"||$extension=="jpeg") {
					$path = public_path('images/expense_photos').'/';
					$new_filename='expense'.$expense_id.date("YmdHisu").".".$extension;
					$file->move($path, $new_filename);
					if ($i==0) {
						$expense_photos 	= $expense_photos.$new_filename;
					}
					else {
						$expense_photos 	= $expense_photos.','.$new_filename;
					}
				}
			}
		}
		DB::table('mkb_expense')
			->where('expense_id','=',$expense_id)
			->update(['expense_photos'=>$expense_photos]);
		return 1;
	}

	public function viewExpense($user_id,$selected_user_id,$from_date=NULL,$to_date=NULL) {
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
				array_push($user_array, $selected_user_id);
			}
			$expenses 	= DB::table('mkb_expense')
							->join('mkb_users','mkb_users.user_id','=','mkb_expense.user_id')
							->select('mkb_expense.*',DB::raw("CONCAT(mkb_users.user_firstname,' ',mkb_users.user_lastname) as created_by"),DB::raw("DATE_FORMAT(mkb_expense.expense_date, '%d %b %Y') as expense_date"))
							->whereIn('mkb_users.user_id',$user_array)
							->where(function($query) use($from_date,$to_date) {
								if ($from_date) {
									$query->where('expense_date','>=',date('Y-m-d',strtotime($from_date)));
								}
								if ($to_date) {
									$query->where('expense_date','<=',date('Y-m-d',strtotime($to_date)));
								}
							})
							->where('mkb_expense.delete_status','=','0')
							//->where('mkb_users.user_status','=','1')
							->where('mkb_users.delete_status','=','0')
							->orderBy('mkb_expense.expense_id', 'desc')
							->get();
			$total_expense 	= 0;
			if ($expenses) {
				foreach ($expenses as $expense) {
					$expense->expense_photos= explode(",",$expense->expense_photos);
					$total_expense 			= $total_expense+$expense->expense_amount;
				}
			}
			return Response::json(array('status'=>'1','total_expense'=>$total_expense,'selected_user_id'=>$selected_user_id,'from_date'=>$from_date,'to_date'=>$to_date,'users'=>$users,'expenses'=>$expenses));
		}
		else {
			return Response::json(array('status'=>'0','message'=>'Sorry! An error occurred.'));
		}

	}
}
