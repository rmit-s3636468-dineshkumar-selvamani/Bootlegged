<?php

namespace App\Http\Controllers;

use App\manuTransactions;
use App\storeTransactions;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index() {
        
        if(Auth::user()->type == "StoreOwner") {
            $Sellertitles = array("Buyer","Product","Quantity","Unit Price","Sub Total","Date");
            $Buyertitles = array("Seller","Product","Quantity","Unit Price","Sub Total","Date");
            $currentColumn = array("id","storeSeller_id","sTran_buyerId","sTran_qty","sTran_unitPrice", "sTran_totalPrice", "sTran_date");
            $record = 10;
            $column_Displayed = "id,storeSeller_id,sTran_buyerId,sTran_qty,sTran_unitPrice,sTran_totalPrice,sTran_date";
            $tableData = $this->getTableData('store_transactions',$record,$column_Displayed);

            $salehistory = storeTransactions::where('storeSeller_id',Auth::user()->store_id)->paginate(10);
            $spurchasehistory = storeTransactions::where('sTran_buyerId', Auth::user()->id)->paginate(10);
            $mpurchasehistory = manuTransactions::where('mTran_buyerId', Auth::user()->id)->paginate(10);


            return view('history', compact('Sellertitles','Buyertitles' ,'currentColumn','tableData','record', 'salehistory', 'spurchasehistory'));


        }
        else {
            $Sellertitles = array("Buyer","Product","Quantity","Unit Price","Sub Total","Date");
            $Buyertitles = array("Product","Seller","Quantity","Unit Price","Sub Total","Date");
            $currentColumn = array("id","storeSeller_id","sTran_buyerId","sTran_qty","sTran_unitPrice", "sTran_totalPrice", "sTran_date");
            $record = 10;
            $column_Displayed = "id,storeSeller_id,sTran_buyerId,sTran_qty,sTran_unitPrice,sTran_totalPrice,sTran_date";
            $tableData = $this->getTableData('store_transactions',$record,$column_Displayed);

            $msalehistory = manuTransactions::where('manuSeller_id', Auth::user()->manu_id)->paginate(10);


            return view('history', compact('Sellertitles','Buyertitles' ,'currentColumn','tableData','record', 'msalehistory'));

        }

    }

    
    public function getTableData($tableName,$record,$sql){
        $posts = DB::table($tableName)
                     ->select(DB::raw($sql))
                     ->paginate($record);
        
        return $posts;
    }

}
