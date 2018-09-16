<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Store extends Authenticatable
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'Store';

    protected $fillable = [
           'store_id','businessGroup_Id','store_email','store_name','store_address','store_suburb','store_state','store_postcode','store_phone','store_abn','store_license','store_Stripeid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    
    ];
    */
}
