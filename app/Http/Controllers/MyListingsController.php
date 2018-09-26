<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Listings;
use Auth;

use DateTime;
use Illuminate\Support\Facades\Storage;

class MyListingsController extends Controller
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

    protected $redirectTo = '/mylistings';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
            if(Auth::user()->type == "StoreOwner")
            {
            $products = Listings::where('lstore_id',Auth::user()->store_id )
             ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
             ->paginate(9);
            
        //  // $products = DB::table('store_listings');



        return view('MyListings')->with(['products'=>$products]);

            }
            else
            {
                 $products = Listings::where('lmanu_id', '=', Auth::user()->manu_id ) 
            ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
            ->paginate(9);
         
           

            return view('MyListings')->with(['products'=>$products]);
            }


    }

    public function remove(Request $req)
    {
       
        echo $req -> get ('prodId');

        $cat = Listings::findOrFail($req -> get ('prodId'));

        $cat->delete();

        return back()->with('message', 'Product Deleted Successfully');

      
    }

    public function saveprod(Request $req)
    {
     
        
       

      
            $file = $req->file('pimage');
         
        $fileName = date("Ymdhisa").'.'.$file->getCLientOriginalExtension();
        $req->file('pimage')->storeAs('public',$fileName);
        

       Listings::where('id',$req->get('prodId'))
        ->update(['Listing_totalPrice' => $req->get('totalPrice'), 'Listing_unitPrice' => $req->get('unitPrice'),'Listing_type' => $req->get('type'),'Listing_qty' => $req->get('tqty'),'Listing_expiry' => $req->get('expiry'),'Listing_vintage' => $req->get('vintage'),'Listing_condition' => $req->get('condition'),'image' => $fileName, 'Listing_active' => $req -> get('status')]);

       return back()->with('message','Product Updated Successfully');


      
    }
}
