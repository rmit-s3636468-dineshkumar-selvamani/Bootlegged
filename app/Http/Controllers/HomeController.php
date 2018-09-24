<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StoreListing;
use App\Listings;
use App\Product;
use App\User;
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


    public function index()
    {   
        if(Auth::user()->type == "StoreOwner")
        {   
            $products = DB::table('listings')
            ->where('Listing_active',1)
            ->where('lstore_id', '!=', Auth::user()->store_id )
            ->orWhereNull('lstore_id')
            ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
            ->paginate(3);

           

        return view('dashboard')-> with(['products'=>$products]);
        
        }

        else
        {
            $products = Listings::where('lmanu_id', '=', Auth::user()->manu_id ) 
            ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
            ->paginate(9);
         
           

            return view('MyListings')->with(['products'=>$products]);
        }
        
    }






 
    public function searchUsers(Request $request)
    {       
           
           return  DB::table('products')
            ->where('product_itemName', 'LIKE', '%'.$request->q.'%')
            ->get();
          // return Product::where('product_itemName', 'LIKE', '%'.$request->q.'%')->get();


            // return ProductListing::where('listing_type', 'LIKE', '%'.$request->q.'%')->distinct()->get(['listing_type']);
    }
 

    public function filter($id)
    {   
        if(Auth::user()->type == "StoreOwner")
        {   
            
            $products = DB::table('listings')
            // ->select('id','manu_id','product_id','mListing_type','mListing_qty','mListing_unitPrice','mListing_totalPrice','mListing_expiry','mListing_vintage','mListing_condition','mListing_active')
            ->where([
                        ['Listing_active', '=', '1'],
                        ['Listing_type', '=', $id],
                        //['lstore_id', '!=', Auth::user()->store_id]
                      ])
            // ->where('listing_active',1)
            // ->where('listing_type','=',$id)
            // ->where('lstore_id', '!=', 'Auth::user()->store_id' )
            // ->orWhereNull('lstore_id')
            
            ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
            ->paginate(3);

           
           
          

        return view('dashboard')->with(['products'=>$products]);

            // return \App::make('redirect')->back()->with(['name'=>$name,'products'=>$products]);
        
        }    
    }

    public function filterName($id)
    {   
        if(Auth::user()->type == "StoreOwner")
        {   


            
            $products = DB::table('listings')
            // ->select('id','manu_id','product_id','mListing_type','mListing_qty','mListing_unitPrice','mListing_totalPrice','mListing_expiry','mListing_vintage','mListing_condition','mListing_active')
            ->where([
                        ['Listing_active', '=', '1'],
                        ['lproduct_id', '=', $id],
                        // ['lstore_id', '!=', Auth::user()->store_id]
                      ])
            // ->where('listing_active',1)
            // ->where('listing_type','=',$id)
            // ->where('lstore_id', '!=', 'Auth::user()->store_id' )
            // ->orWhereNull('lstore_id')
            
            ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
            ->paginate(3);

           
           
          

        return view('dashboard')->with(['products'=>$products]);

            // return \App::make('redirect')->back()->with(['name'=>$name,'products'=>$products]);
        
        }    
    }
}

