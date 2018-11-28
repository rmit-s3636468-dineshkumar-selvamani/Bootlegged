<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    
    protected $fillable = [
        'brand_id', 'brand_Name'
    ];

    protected $table = 'product_brands';
   
}
