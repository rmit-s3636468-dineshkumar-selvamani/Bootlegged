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
           
             $prod_name = array('','');

           $products = DB::table('listings')
            ->where('Listing_active', '=', 1)
            ->where(function ($query) {
                $query->where('lstore_id', '!=', Auth::user()->store_id )
                      ->orWhereNull('lstore_id');
            })
             ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
           ->paginate(9);
           

             return view('Dashboard')-> with(['products'=>$products, 'prod_name' => $prod_name]);
        
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
    }
 

    public function filter($id)
    {   
        if(Auth::user()->type == "StoreOwner")
        {   
            
          
           
             $products = DB::table('listings')
            ->where('Listing_active', '=', 1)
            ->where('Listing_type', '=', $id)
            ->where(function ($query) {
                $query->where('lstore_id', '!=', Auth::user()->store_id )
                      ->orWhereNull('lstore_id');
            })
             ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
           ->paginate(9);

             $prod_name = DB::table('listings')->where('Listing_type', '=', $id)->pluck('Listing_type');
           
           if (DB::table('listings')->where('Listing_type', '=', $id)->select('Listing_type')->count() > 0) 
           {
                 $prod_name = DB::table('listings')->where('Listing_type', '=', $id)->pluck('Listing_type');
            }   

           else
            {
                $prod_name = array('','');
            }

          
        return view('dashboard')->with(['products'=>$products, 'prod_name' => $prod_name]);

          
        
        }    
    }

    public function filterName($id)
    {   
        if(Auth::user()->type == "StoreOwner")
        {   


             $prod_name = DB::table('products')->where('product_id', '=', $id)->pluck('product_itemName');

           $products = DB::table('listings')
            ->where('Listing_active', '=', 1)
           ->where('lproduct_id', '=', $id)
            ->where(function ($query) {
                $query->where('lstore_id', '!=', Auth::user()->store_id )
                      ->orWhereNull('lstore_id');
            })
             ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
           ->paginate(9);
          

        return view('dashboard')->with(['products'=>$products, 'prod_name' => $prod_name]);

            // return \App::make('redirect')->back()->with(['name'=>$name,'products'=>$products]);
        
        }    
    }

     public function filterEnter(Request $request)
    {   

         $this->validate($request,[
          'search' => 'exists:products,product_itemName',
          
        ],[
 
          'search.exists' => ' Please check the product name'
         
        ]);

        if(Auth::user()->type == "StoreOwner")
        {   

           
             $products = DB::table('listings')
            ->where('Listing_active', '=', 1)
           ->where('product_itemName', '=', $request->get('search'))
            ->where(function ($query) {
                $query->where('lstore_id', '!=', Auth::user()->store_id )
                      ->orWhereNull('lstore_id');
            })
             ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
           ->paginate(9);

           
          $prod_name = DB::table('products')->where('product_itemName', '=', $request->get('search'))->pluck('product_itemName');

        return view('dashboard')->with(['products'=>$products, 'prod_name' => $prod_name]);

            // return \App::make('redirect')->back()->with(['name'=>$name,'products'=>$products]);
        
        }    
    }
}

