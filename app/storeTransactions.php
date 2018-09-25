<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class storeTransactions extends Model
{
    protected $table = 'store_transactions';

    protected $fillable = [
        'id','storeSeller_id','sTran_stripeId','sTran_buyerId','sListingId','sTran_date','sTran_qty','sTran_unitPrice','sTran_totalPrice','sTran_comission','sTran_stripeFee'
    ];
}
