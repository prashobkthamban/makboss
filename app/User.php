<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'mkb_users';

    protected $fillable = [
       'company_id','country_id','state_id','zipcode_id','role_id','user_creater_id','user_assigner_id','user_assign_to_id', 'user_firstname', 'user_email', 'user_mobile', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
