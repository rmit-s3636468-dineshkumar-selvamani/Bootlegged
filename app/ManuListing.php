<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManuListing extends Model
{
    

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'manu_id','product_id','mListing_type','mListing_qty','mListing_unitPrice','mListing_totalPrice','mListing_expiry','mListing_vintage','mListing_condition','mListing_active'
    ];

     protected $table = 'manu_listings';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   


}

