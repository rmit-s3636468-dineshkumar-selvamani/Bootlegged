<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storelisting extends Model
{
    

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id','store_id','sproduct_id','sListing_type','sListing_qty','sListing_unitPrice','sListing_totalPrice','sListing_expiry','sListing_vintage','sListing_condition','sListing_active'
    ];

     protected $table = 'store_listings';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   


}