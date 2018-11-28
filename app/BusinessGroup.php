<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessGroup extends Model
{
		
    protected $fillable = [
         'group_id','group_name','group_address','group_state','group_suburb','group_postcode','group_phone','group_email','group_abn'
    ];

     protected $table = 'BusinessGroups';
   
}
