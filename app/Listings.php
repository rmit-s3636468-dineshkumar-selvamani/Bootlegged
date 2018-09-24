<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    protected $table = 'listings';

    protected $fillable = [
        'id','lstore_id','lmanu_id','lproduct_id','Listing_type','Listing_qty','Listing_unitPrice','Listing_totalPrice','Listing_expiry','Listing_vintage','Listing_condition','image', 'Listing_active'
    ];
}
