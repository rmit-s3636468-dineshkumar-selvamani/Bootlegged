<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductListing extends Model
{
    

	
    protected $fillable = [
        'id', 'lmanu_id','lstore_id','lproduct_id','listing_type','listing_qty','listing_unitPrice','listing_totalPrice','listing_expiry','listing_vintage','listing_condition','listing_active'
    ];

     protected $table = 'product_listings';
    
   


}

