<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AddListings;
use App\Listings;
use App\Product;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

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

     $product_id = DB::table('products')->where('product_itemName',$request->get('productname'))->pluck('product_id');
      // $product_id = Product::
          // where('product_itemName',$request -> input('productname','Corona Single 300ml'))-> pluck('product_id')
          // ->first();

     if($request->hasFile('productimage'))
            {
            $file = $request->file('productimage');
         
        $fileName = date("Ymdhisa").'.'.$file->getCLientOriginalExtension();
        $request->file('productimage')->storeAs('public',$fileName);

        if( Auth::user()->type == "Manufacturer"){
        $manuid =Auth::user()->manu_id ;
       Listings::create([
           'lmanu_id' => $manuid,
           'lproduct_id' =>  $product_id[0],
           'Listing_type' => $request ->get ('producttype'),
           'Listing_qty' => $products['product_quantity'],
           'Listing_unitPrice' => $products['unitprice'],
           'Listing_totalPrice' => $products['totalprice'],
           'Listing_expiry' => $products['expiry'],
           'Listing_vintage' => $products['vintage'],
           'Listing_condition' => $products['condition'],
           'image'=>$fileName,
           'Listing_active' => '1'
       ]);
     }

   else{
     $storeid = Auth::user()->store_id;
           Listings::create([
           'lstore_id' => $storeid,
           'lproduct_id' => $product_id[0],
           'Listing_type' => $request ->get ('producttype'),
           'Listing_qty' => $products['product_quantity'],
           'Listing_unitPrice' => $products['unitprice'],
           'Listing_totalPrice' => $products['totalprice'],
           'Listing_expiry' => $products['expiry'],
           'Listing_vintage' => $products['vintage'],
           'Listing_condition' => $products['condition'],
           'image'=>$fileName,
           'Listing_active' => '1'
       ]);
}

    }
    else
    {
    	if( Auth::user()->type == "Manufacturer"){
        $manuid =Auth::user()->manu_id ;
       Listings::create([
           'lmanu_id' => $manuid,
           'lproduct_id' =>  $product_id[0],
           'Listing_type' => $request ->get ('producttype'),
           'Listing_qty' => $products['product_quantity'],
           'Listing_unitPrice' => $products['unitprice'],
           'Listing_totalPrice' => $products['totalprice'],
           'Listing_expiry' => $products['expiry'],
           'Listing_vintage' => $products['vintage'],
           'Listing_condition' => $products['condition'],
           'image'=>'',
           'Listing_active' => '1'
       ]);
     }

   else{
     $storeid = Auth::user()->store_id;
           Listings::create([
           'lstore_id' => $storeid,
           'lproduct_id' => $product_id[0],
           'Listing_type' => $request ->get ('producttype'),
           'Listing_qty' => $products['product_quantity'],
           'Listing_unitPrice' => $products['unitprice'],
           'Listing_totalPrice' => $products['totalprice'],
           'Listing_expiry' => $products['expiry'],
           'Listing_vintage' => $products['vintage'],
           'Listing_condition' => $products['condition'],
           'image'=>'',
           'Listing_active' => '1'
       ]);
}
    }

    return back()->with('message','Product Added Succesfully');

//      if( Auth::user()->type == "Manufacturer"){
//         $manuid =Auth::user()->manu_id ;
//        Listings::create([
//            'lmanu_id' => $manuid,
//            'lproduct_id' =>  $product_id[0],
//            'Listing_type' => $request ->get ('producttype'),
//            'Listing_qty' => $products['product_quantity'],
//            'Listing_unitPrice' => $products['unitprice'],
//            'Listing_totalPrice' => $products['totalprice'],
//            'Listing_expiry' => $products['expiry'],
//            'Listing_vintage' => $products['vintage'],
//            'Listing_condition' => $products['condition'],
//            'image'=>$products['productimage'],
//            'Listing_active' => '1'
//        ]);
//      }

//    else{
//      $storeid = Auth::user()->store_id;
//            Listings::create([
//            'lstore_id' => $storeid,
//            'lproduct_id' => $product_id[0],
//            'Listing_type' => $request ->get ('producttype'),
//            'Listing_qty' => $products['product_quantity'],
//            'Listing_unitPrice' => $products['unitprice'],
//            'Listing_totalPrice' => $products['totalprice'],
//            'Listing_expiry' => $products['expiry'],
//            'Listing_vintage' => $products['vintage'],
//            'Listing_condition' => $products['condition'],
//            'image'=>$products['productimage'],
//            'Listing_active' => '1'
//        ]);
// }



    
     


}
}