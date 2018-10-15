<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 29/9/18
 * Time: 11:17 PM
 */
namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Http\Requests;



class CheckoutController
{
    public function checkout(Request $request)
    {

        if (!Session::has('cart')) {
            return redirect()->route('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice,
                "currency" => "aud",
                "source" => "{{!! env('STRIPE_PUB_KEY'!! )}}", // obtained with Stripe.js
                "description" => "Test Charge",
                "name"=>$request->input('name')
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