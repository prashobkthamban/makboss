<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
	protected $table = 'mkb_expense';

	protected $fillable = ['user_id','expense_amount','expense_date'];
}
