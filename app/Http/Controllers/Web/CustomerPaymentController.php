<?php namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\PaymentTerms;

class CustomerPaymentController extends Controller {

	public static function fetchPaymentTerms() {
		$pay_terms 	= PaymentTerms::get();
		return $pay_terms;
	}

}
