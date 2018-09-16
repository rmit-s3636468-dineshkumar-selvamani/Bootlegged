<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddListings extends Model
{
    

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'manu_id','product_id','mListing_type','mListing_qty','mListing_unitPrice','mListing_totalPrice','mListing_Expiry','mListing_Vintage','mListing_condition','mListing_active'
    ];

     protected $table = 'manufacturer_listings';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   


}