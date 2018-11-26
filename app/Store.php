<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Store extends Authenticatable
{
    

    
    protected $table = 'Store';

    protected $fillable = [
           'store_id','businessGroup_Id','store_email','store_name','store_address','store_suburb','store_state','store_postcode','store_phone','store_abn','store_license','store_Stripeid'
    ];

    
}
