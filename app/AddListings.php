<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddListings extends Model
{
    

	
    protected $fillable = [
         'manu_id','mproduct_id','mListing_type','mListing_qty','mListing_unitPrice','mListing_totalPrice','mListing_expiry','mListing_vintage','mListing_condition','mListing_active'
    ];

     protected $table = 'manu_listings';
    
   


}