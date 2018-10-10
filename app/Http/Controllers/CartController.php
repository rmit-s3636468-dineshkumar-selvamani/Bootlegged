<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listings;
use App\Cart;
use App\Product;
use Session;
use App\Http\Requests;

class CartController extends Controller
{
    // Return Shopping Cart Page
    public function index()
    {
        if (!Session::has('cart')) {
            return view('/cart')->with(['products'=> null, 'totalQuantity'=>0, 'totalPrice'=>0]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);
        return view('/cart')->with(['products'=> $cart->items, 'totalQuantity'=>$cart->totalQuantity, 'totalPrice'=>$cart->totalPrice]);
    }

    public function addToCart(Request $request, $id)
    {

        $product = Listings::where('id', $id )
            ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
            ->first();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart ($oldCart);

        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        // To check whether the cart is storing the correct data
        //dd($request->session()->get('cart'));


        return redirect()->back();
    }


    public function updateItem(Request $request) {


        $id = $request ->input('cart-id');
        $updateQty = $request->input('cart-item-qty');

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateItem($id,$updateQty);


        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return back();


    }

    public function removeItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function clearCart(){
        Session::forget('cart');
        return redirect() -> back();
    }

}