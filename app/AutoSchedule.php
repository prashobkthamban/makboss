<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoSchedule extends Model
{
	protected $table = 'mkb_auto_schedule';

	protected $fillable = ['customer_id','schedule_attender_id','repeat_days'];
}
