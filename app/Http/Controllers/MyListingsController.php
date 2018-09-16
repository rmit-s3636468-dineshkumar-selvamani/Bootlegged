<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StoreListing;
use Auth;
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
         
            $products = StoreListing::where('store_id', Auth::user()->store_id )->paginate(9);;
        //  // $products = DB::table('store_listings');


        return view('MyListings')->with('products',$products);
    }
}
