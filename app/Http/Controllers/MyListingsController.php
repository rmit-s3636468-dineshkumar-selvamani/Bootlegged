<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Listings;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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
     
        // $cat = Listings::findOrFail($req -> get ('prodId'));

        // $cat->update($req->all());

        // if($req->get('pimage'))
        // {   
        //     echo 'BlahBlah';
        //     // $file = addslashes(file_get_contents($_FILES[$req->file('image')]["tmp_name"]));  

        //     $req->file('pimage');

        //     Storage::putFile('public',$req->get('pimage'));
        // }

        // Storage::putFile($req->pimage, new File('public/css/'));


         // echo $req->file('pimage');

        Listings::where('id',$req->get('prodId'))
        ->update(['Listing_totalPrice' => $req->get('totalPrice'), 'Listing_unitPrice' => $req->get('unitPrice'),'Listing_type' => $req->get('type'),'Listing_qty' => $req->get('tqty'),'Listing_expiry' => $req->get('expiry'),'Listing_vintage' => $req->get('vintage'),'Listing_condition' => $req->get('condition'),'image' => $req->pimage, 'Listing_active' => $req -> get('status')]);

        return back();

      
    }
}
