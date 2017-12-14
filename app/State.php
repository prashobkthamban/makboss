<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $table = 'mkb_states';

	protected $fillable = ['country_id','state_name'];
}
