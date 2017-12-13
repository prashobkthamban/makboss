<?php namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;
use App\User;
use App\Country;
use App\State;
use App\Zipcode;
use App\Role;
use App\PaymentTerms;

class AppDefaultController extends Controller {
	
	public function getCountry() {
		$country 	= $this->fetchCountry();
		return Response::json(array('status'=>'1','country'=>$country));
	}

	public static function fetchCountry() {
		$country 	= Country::where('delete_status','=','0')
						->get();
		return $country;
	}

	public function getState($country_id) {
		$state 		= $this->fetchState($country_id);
		return Response::json(array('status'=>'1','state'=>$state));
	}

	public static function fetchState($country_id) {
		$state 		= State::where('country_id','=',$country_id)
						->where('delete_status','=','0')
						->get();
		return $state;
	}

	public function getZipcode($state_id) {
		$zipcode 	= $this->fetchZipcode($state_id);
		return Response::json(array('status'=>'1','zipcode'=>$zipcode));
	}

	public static function fetchZipcode($state_id) {
		$zipcode 	= Zipcode::where('state_id','=',$state_id)
						->where('delete_status','=','0')
						->get();
		return $zipcode;
	}

	public function getRole() {
		$role 		= $this->fetchRole();
		return Response::json(array('status'=>'1','role'=>$role));
	}

	public static function fetchRole() {
		$role 		= Role::where('delete_status','=','0')
						->get();
		return $role;
	}

	public function getPaymentTerms() {
		$payment_terms 	= $this->fetchPaymentTerms();
		return Response::json(array('status'=>'1','payment_terms'=>$payment_terms));
	}

	public static function fetchPaymentTerms() {
		$payment_terms 	= PaymentTerms::where('delete_status','=','0')
						->get();
		return $payment_terms;
	}

}
