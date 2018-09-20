<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AddListings;

class AddListingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $redirectTo = '/addlistings';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         
        //$products = AddListings::paginate(4);
        //  // $products = DB::table('store_listings');


        return view('AddListings');
    }

    public function insert(Request $request)
    {

      $products = $request -> all();
      $storeid = '20';
      $product_id = '1';

      $user = AddListings::create([
            'manu_id' => $storeid,
            'product_id' => $product_id,
            'mListing_type' => $products['producttype'],
            'mListing_qty' => $products['product_quantity'],
            'mListing_unitPrice' => $products['unitprice'],
            'mListing_totalPrice' => $products['totalprice'],
            'mListing_expiry' => $products['expiry'],
            'mListing_vintage' => $products['vintage'],
            'mListing_condition' => $products['condition'],
            'mListing_active' => '1'
        ]);
      echo $storeid;
      echo "Record inserted successfully.<br/>";
      // echo "<a href = ''/addlistings">Click Here</a> to go back."; 
   
}
}
