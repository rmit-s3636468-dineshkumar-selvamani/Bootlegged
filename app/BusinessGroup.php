<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessGroup extends Model
{
		/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'group_id','group_name','group_address','group_state','group_suburb','group_postcode','group_phone','group_email','group_abn'
    ];

     protected $table = 'BusinessGroups';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */    
}
