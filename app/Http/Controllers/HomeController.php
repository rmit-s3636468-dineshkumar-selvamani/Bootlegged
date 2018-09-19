<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StoreListing;
use App\ManuListing;
use App\Product;
use Auth;
use App\Services\LengthPager;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
    






class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {   
        if(Auth::user()->type == "StoreOwner")
        {   
            
            // $products = StoreListing::where('store_id', '!=', Auth::user()->store_id )
            //             ->where('sListing_active',1)
            //             // ->join('products','store_listings.product_id','=','products.product_id')
            //             ->paginate(4);

            //  $manuprods =   ManuListing::where('mListing_active',1)->paginate(2);

            //Union

            $name= DB::table('products')
                    ->select('products.product_id','products.product_itemName')
                    ->get();


            If (!empty($request->input('page'))) {
            $page = $request->input('page');
        } else {
            $page = "1";
        }
            $perpage = "9";
            $offset = ($page - 1) * $perpage;

            $strprods = DB::table('manu_listings')
            ->select('id','manu_id','product_id','mListing_type','mListing_qty','mListing_unitPrice','mListing_totalPrice','mListing_expiry','mListing_vintage','mListing_condition','mListing_active')
            ->where('mListing_active',1);

            $products = DB::table('store_listings')
            ->select('id','store_id','product_id','sListing_type','sListing_qty','sListing_unitPrice','sListing_totalPrice','sListing_expiry','sListing_vintage','sListing_condition','sListing_active')
            ->where('store_id', '!=', Auth::user()->store_id )
            ->where('sListing_active',1)
            ->unionall($strprods)

            ->skip($offset)
            ->take($perpage)
            ->get();

             $numrows = StoreListing::where('store_id', '!=', Auth::user()->store_id)->where('sListing_active','1')->get()->count();
             $t1 = "b"; 

             $pagelinks = LengthPager::makeLengthAware($products, $numrows, $perpage, ['t1' => $t1]);



             //Join

             // $products = DB::table('manu_listings')
             //             ->join('store_listings','store_listings.product_id','=','manu_listings.product_id')
             //             ->select('manu_listings.id','manu_listings.manu_id','manu_listings.product_id','manu_listings.mListing_type','manu_listings.mListing_qty','manu_listings.mListing_unitPrice','manu_listings.mListing_totalPrice','manu_listings.mListing_expiry','manu_listings.mListing_vintage','manu_listings.mListing_condition','manu_listings.mListing_active','store_listings.id','store_listings.store_id','store_listings.product_id','store_listings.sListing_type','store_listings.sListing_qty','store_listings.sListing_unitPrice','store_listings.sListing_totalPrice','store_listings.sListing_expiry','store_listings.sListing_vintage','store_listings.sListing_condition','store_listings.sListing_active')
             //             ->where('store_listings.store_id', '!=', Auth::user()->store_id )
             //             ->where('store_listings.sListing_active',1)
             //             ->where('mListing_active',1)
             //             ->paginate(9);
                 
           
            
           
          

        return view('dashboard')-> with(['name'=>$name,'pagelinks'=>$pagelinks,'products'=>$products]);
        
        }

        else
        {
            $products = ManuListing::where('manu_id', '!=', Auth::user()->store_id )->paginate(9);;
         // $products = DB::table('store_listings');


        return view('MyListings')->with('products',$products);
        }
        
    }

    public function filter(Request $request,$id)
    {   
        if(Auth::user()->type == "StoreOwner")
        {   
            
            $name= DB::table('products')
                    ->select('products.product_id','products.product_itemName')
                    ->get();

                    
            If (!empty($request->input('page'))) {
            $page = $request->input('page');
        } else {
            $page = "1";
        }
            $perpage = "9";
            $offset = ($page - 1) * $perpage;

            $strprods = DB::table('manu_listings')
            ->select('id','manu_id','product_id','mListing_type','mListing_qty','mListing_unitPrice','mListing_totalPrice','mListing_expiry','mListing_vintage','mListing_condition','mListing_active')
            ->where('mListing_active',1)
            ->where('mListing_type', $id);

            $products = DB::table('store_listings')
            ->select('id','store_id','product_id','sListing_type','sListing_qty','sListing_unitPrice','sListing_totalPrice','sListing_expiry','sListing_vintage','sListing_condition','sListing_active')
            ->where('store_id', '!=', Auth::user()->store_id )
            ->where('sListing_active',1)
            ->where('sListing_type', $id)
            ->unionall($strprods)

            ->skip($offset)
            ->take($perpage)
            ->get();

             $numrows = StoreListing::where('store_id', '!=', Auth::user()->store_id)->where('sListing_active','1')->get()->count();
             $t1 = "b"; 

             $pagelinks = LengthPager::makeLengthAware($products, $numrows, $perpage, ['t1' => $t1]);
            
           
          

        return view('dashboard')-> with(['name'=>$name,'pagelinks'=>$pagelinks,'products'=>$products]);
        
        }

       
        
    }
}
