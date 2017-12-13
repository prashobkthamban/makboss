<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'mkb_role';

	protected $fillable = ['role_name'];
}
