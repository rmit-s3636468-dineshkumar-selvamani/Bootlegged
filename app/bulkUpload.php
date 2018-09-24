<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bulkUpload extends Model
{
    protected $table = 'bulkUpload';

    protected $fillable = [
        'id','file','bu_user_id','bu_store_id','bu_manu_id'
    ];
}
