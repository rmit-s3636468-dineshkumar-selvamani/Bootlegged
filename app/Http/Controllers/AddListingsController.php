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
      $name = $request->input('productname');
      $storeid = '1';
      $productid = '6';
      DB::insert('insert into store_listings (store_id,product_id,sListing_type) values(?,?,?)',[$storeid],
        [$productid],[$name]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/insert">Click Here</a> to go back.';
   }
}
