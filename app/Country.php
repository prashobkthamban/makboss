<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $table = 'mkb_country';

	protected $fillable = ['country_name','country_code'];
}
