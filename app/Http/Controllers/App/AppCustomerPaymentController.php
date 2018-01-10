<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\PaymentTerms;

class AppCustomerPaymentController extends Controller {

	public static function fetchPaymentTerms() {
		$pay_terms 	= PaymentTerms::get();
		return $pay_terms;
	}

}
