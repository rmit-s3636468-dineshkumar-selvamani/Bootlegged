<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubBrand extends Model
{
	
    protected $fillable = [
        'subBrand_id', 'subBrand_Name'
    ];

    protected $table = 'product_sub_brands';
      
}


