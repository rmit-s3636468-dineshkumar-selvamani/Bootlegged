<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manuTransactions extends Model
{
    protected $table = 'manu_transactions';

    protected $fillable = [
        'id','manuSeller_id','mTran_stripeId','mTran_buyerId','mTran_sellerId', 'mListingId','mTran_date','mTran_qty','mTran_unitPrice','mTran_totalPrice','mTran_comission','mTran_stripeFee'
    ];
}
