<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'mkb_company';

	protected $fillable = ['country_id','state_id','zipcode_id','company_name'];
}
