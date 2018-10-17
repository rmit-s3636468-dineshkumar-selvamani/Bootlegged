<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryOne extends Model
{
    protected $table = 'categoryone';

    protected $fillable = [
        'id','cat1_name'
    ];

}
