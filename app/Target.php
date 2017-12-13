<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
	protected $table = 'mkb_target';

	protected $fillable = ['user_id','target_creater_id','target_modifier_id','target_amount'];
}
