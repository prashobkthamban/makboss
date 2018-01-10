<?php namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use URL;
use App\User;
use App\Company;

class CompanyController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function registerCompany(Request $request) {
	    $company 					= new Company();
	    $company->company_type 		= $request->company_type;
	    $company->country_id 		= $request->company_type;
	    $company->state_id 			= $request->company_type;
	    $company->zipcode_id 		= $request->company_type;
	    $company->company_name 		= $request->company_name;
	    $company->company_website 	= $request->company_website;
	    $company->company_status 	= '1';
	    $company->save();

	    $user 					= new User();
		$user->company_id		= $company->company_id;
		$user->country_id		= $request->country_id;
		$user->state_id			= $request->state_id;
		$user->zipcode_id		= $request->zipcode_id;
		$user->user_firstname	= $request->first_name;
		$user->user_lastname	= $request->last_name;
		$user->user_email		= $request->email;
		$user->user_mobile		= $request->mobile;
		$user->user_telephone	= $request->user_telephone;
		$user->user_address		= "";
		$user->user_latitude	= "";
		$user->user_longitude	= "";
		$user->username			= "";
		$user->password 		= bcrypt($request->password);
		$user->user_key			= str_random(128);
		$user->user_role 		= '1';
		$user->user_status 		= '1';
		$user->save();

		$user->username 		= 5381000+$user->id;
		$user->save();

		if($user) {

		}
		else {
			return redirect(URL::previous())->withErrors('Sorry! An error occurred.');
		}
	}
	
}
