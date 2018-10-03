<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Newproduct;

class AddNewProductController extends Controller
{
    public function savenewprod(Request $req)
    {
    	if(Auth::user()->type == "Manufacturer")
    	{
    		 Newproduct::create([
    		'pmanu_id' => Auth::user()->manu_id,
           'Product_name' => $req->get('productname'),
           'Product_type' =>  $req->get('producttype'),
           'Product_brand' => $req->get('product_brand'),
           'Product_subbrand' => $req->get('product_subbrand'),
           'Product_packagename' => $req->get('product_packname'),
           'Product_qty' => $req->get('product_quantity'),
           'Product_unitPrice' => $req->get('unitprice'),
           'Product_totalPrice' => $req->get('totalprice'),
           'Product_expiry' => $req->get('expiry'),
           'Product_vintage' => $req->get('vintage'),
           'Product_condition'=>$req->get('condition'),
           'Product_barcode' => $req->get('barcodeid')
           
       ]);
    		 return back()->with('message','We will get back to you via mail once we verified the details you provided');
    	}
    	else
    	{
    		 Newproduct::create([
    		'pstore_id' => Auth::user()->store_id,
           'Product_name' => $req->get('productname'),
           'Product_type' =>  $req->get('producttype'),
           'Product_brand' => $req->get('product_brand'),
           'Product_subbrand' => $req->get('product_subbrand'),
           'Product_packagename' => $req->get('product_packname'),
           'Product_qty' => $req->get('product_quantity'),
           'Product_unitPrice' => $req->get('unitprice'),
           'Product_totalPrice' => $req->get('totalprice'),
           'Product_expiry' => $req->get('expiry'),
           'Product_vintage' => $req->get('vintage'),
           'Product_condition'=>$req->get('condition'),
           'Product_barcode' => $req->get('barcodeid')
           
       ]);
    		 return back()->with('message','We will get back to you via mail once we verified the details you provided');
    	}
    }
}
