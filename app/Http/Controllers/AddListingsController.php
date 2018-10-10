<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AddListings;
use App\Listings;
use App\Product;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Response;

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

      
    // $product_type = DB::table('categoryone')->where('id',0)->pluck('cat1_name');
       $product_type = array('','');
       $product_name = array('','');
      // echo $product_type;
       return view('AddListings',['product_type' => $product_type,'product_name' => $product_name]);
   }

   public function insert(Request $request)
   {
    if($request->get('expiry') != '')
    {
    $this->validate($request,[
          'productname' => 'required|min:5|exists:products,product_itemName',
          'product_quantity' => 'required|integer',
          'unitprice' => 'required|between:0,99.99',
          'totalprice' => 'required|between:0,99.99',
          'expiry' => 'date_format:Y-m-d|after:tomorrow',
          'productimage' => 'image',
        ],[
          'productname.exists' => ' The product name doesnt match with our record.',
          'expiry.after' => 'Expiry date cant be in past',

 
          'productimage.image' => ' Please upload a image file.'
         
        ]);

    }
    else
    {
      $this->validate($request,[
          'productname' => 'required|min:5|exists:products,product_itemName',
          'product_quantity' => 'required|integer',
           'unitprice' => 'required|between:0,99.99',
          'totalprice' => 'required|between:0,99.99',
          'productimage' => 'image',
        ],[
          'productname.exists' => ' The product name doesnt match with our record.',
         

 
          'productimage.image' => ' Please upload a image file.'
         
        ]);



    }

     $products = $request -> all();

     $product_id = DB::table('products')->where('product_itemName',$request->get('productname'))->pluck('product_id');
    

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

          public function autofillType($id)
          {

               $product_cat1 = DB::table('products')->where('product_id',$id)->pluck('catone');

              

               $product_type = DB::table('categoryone')->where('id',$product_cat1)->pluck('cat1_name');
               $product_name = DB::table('products')->where('product_id',$id)->pluck('product_itemName');

              
             
                return view('AddListings',['product_type' => $product_type,'product_name' => $product_name]);
            


          }
}