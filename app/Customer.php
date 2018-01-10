<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = 'mkb_customer';

	protected $fillable = ['company_id','country_id','state_id','payment_terms_id','customer_creator_id','customer_assigner_id','customer_assigned_to_id','customer_name','customer_contact_name','customer_email','customer_mobile'];
}
