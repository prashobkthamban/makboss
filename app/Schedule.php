<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
	protected $table = 'mkb_schedule';

	protected $fillable = ['customer_id','schedule_attender_id','schedule_creater_id'];
}
