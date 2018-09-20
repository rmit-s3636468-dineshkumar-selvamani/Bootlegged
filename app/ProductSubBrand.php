<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubBrand extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subBrand_id', 'subBrand_Name'
    ];

    protected $table = 'product_sub_brands';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */    
}


