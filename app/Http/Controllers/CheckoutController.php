<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 29/9/18
 * Time: 11:17 PM
 */

namespace App\Http\Controllers;

use Stripe\{Charge, Stripe, Customer};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;


class CheckoutController
{
    public function index()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('/checkout')->with(['products'=> $cart->items, 'totalQuantity'=>$cart->totalQuantity, 'totalPrice'=>$cart->totalPrice]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {

        if (!Session::has('cart')) {
            return redirect()->route('/cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey(env('STRIPE_SECRET'));


        try {

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice,
                "currency" => "aud",
                "source" =>"{{env('STRIPE_KEY')}}", // obtained with Stripe.js
                "description" => "Test Charge",
                "name" => $request->input('name')
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            dd($order);

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->back()->with('success', 'Successfully purchased products!');
    }
}