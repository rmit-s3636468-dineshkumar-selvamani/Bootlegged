<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newproduct extends Model
{
    protected $table = 'newproducts';

    protected $fillable = [
        'id','pstore_id','pmanu_id','Product_vintage','Product_name','Product_type','Product_brand','Product_subbrand','Product_packagename','Product_qty','Product_unitPrice', 'Product_totalPrice', 'Product_expiry','Product_condition','Product_barcode'
    ];
}
