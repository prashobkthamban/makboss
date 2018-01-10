<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\Company;

class AppCompanyController extends Controller {

	public static function updateQuota($company_id,$number) {
		DB::table('mkb_company')
			->where('mkb_company.company_id',$company_id)
			->where(function($query) use($number) {
				if($number==1) {
					$query->increment('mkb_company.used_quota','1');
				}
				else {
					$query->decrement('mkb_company.used_quota','1');
				}
			});
		return 1;
	}

}
