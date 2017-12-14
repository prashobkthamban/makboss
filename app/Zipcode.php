<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
	protected $table = 'mkb_zipcodes';

	protected $fillable = ['state_id','zipcode_name'];
}
