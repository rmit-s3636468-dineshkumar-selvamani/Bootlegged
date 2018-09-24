<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'product_itemName','product_baseItemName','product_packCode','product_packCodeName','product_packageId','product_packageName','product_brandId','product_subBrandId','product_netqty','product_innersPerOuters'
    ];

     protected $table = 'products';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     **/
}
