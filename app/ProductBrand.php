<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id', 'brand_Name'
    ];

    protected $table = 'product_brands';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
