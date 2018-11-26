<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Manufacturer extends Authenticatable
{
   
    
    protected $table = 'Manufacturers';
    protected $fillable = [
         'id','manu_id','manu_email','manu_name','manu_address','manu_suburb','manu_state','manu_postcode','manu_phone','manu_abn','manu_license','manu_Stripeid'
    ];

   
    
    
}
