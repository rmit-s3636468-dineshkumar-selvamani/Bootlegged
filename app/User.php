<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
         'id','store_id','manu_id','business_name','email', 'password','verifiedStatus','type','permissions'
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
