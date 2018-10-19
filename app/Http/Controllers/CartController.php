<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listings;
use App\Cart;
use App\manuTransactions;
use App\storeTransactions;
use App\Manufacturer;
use App\Store;
use App\User;
use DateTime;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    // Return Shopping Cart Page
    public function index()
    {
        if (!Session::has('cart')) {
            session()->flash('info', 'No item in cart!');
            //dd($request);
            return view('/cart')->with(['products' => null, 'totalQuantity' => 0, 'totalPrice' => 0]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //session()->flash('success','Cart Loaded Succesfully!');
        //dd($cart);
        return view('/cart')->with(['products' => $cart->items, 'totalQuantity' => $cart->totalQuantity, 'totalPrice' => $cart->totalPrice]);
    }

    public function addToCart(Request $request, $id)
    {

        $product = Listings::where('id', $id)
            ->join('products', 'products.product_id', '=', 'listings.lproduct_id')
            ->first();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart ($oldCart);

        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        // To check whether the cart is storing the correct data
        //dd($request->session()->get('cart'));
        session()->flash('success', 'Item has been added successfully');

        return back();
    }


    public function updateItem(Request $request)
    {


        $id = $request->input('cart-id');
        $updateQty = $request->input('cart-item-qty');

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateItem($id, $updateQty);


        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        session()->flash('info', 'Item has been updated successfully');
        return back();


    }

    public function removeItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        session()->flash('warning', 'Item has been remove successfully');

        return back();
    }

    public function clearCart()
    {
        Session::forget('cart');
        session()->flash('warning', 'Cart has been clear successfully');
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {
        //dd($request->all());
        try {
            if (!Session::has('cart')) {
                return redirect()->route('/cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            //dd($cart);
            //dd($request);
            $today = new DateTime();

            // Loop each item in the cart
            for ($x = 1; $x <= count($cart->items); $x++) {

                // Get Item ID
                $item_ID = $cart->items[$x]["item"]["id"];


                // Cart item Listing Quantity
                $cart_item_qty = $cart->items[$x]["item"]["Listing_qty"];

                // Cart item Buying Quantity
                $cart_buying_qty = $cart->items[$x]["Listing_qty"];

                // Cart Item[x] Listing_qty
                $update_qty = $cart_item_qty - $cart_buying_qty;

                // Update total Price after update ListingQty
                $update_total_price = $update_qty * $cart->items[$x]["item"]["Listing_unitPrice"];

                // Update Listings table in the database
                Listings::where('id', $item_ID)
                    ->update(['Listing_qty' => $update_qty,
                        'Listing_totalPrice' => $update_total_price
                    ]);

                // Get Manufacturer ID from cart
                $manu_ID = $cart->items[$x]["item"]["lmanu_id"];

                if ($manu_ID == null) {
                    // Get Store ID from cart
                    $store_ID = $cart->items[$x]["item"]["lstore_id"];

                    $store_selling_id = Store::where('store_id', $store_ID)
                        ->first();

                    $user_id = User::where('store_id', $store_ID)->pluck('id');

                    // store into S_transaction from Store(Buyer)
                    $store_transaction_buyer = storeTransactions::create([

                        'storeSeller_id' => $store_selling_id->store_id,
                        'sTran_stripeId' => $store_selling_id->store_Stripeid,
                        'sTran_buyerId' => Auth::id(),
                        'sListingId' => $cart->items[$x]["item"]["id"],
                        'sTran_date' => $today->format('Y-m-d h:i:s'),
                        'sTran_qty' => $cart_buying_qty,
                        'sTran_unitPrice' => $cart->items[$x]["item"]["Listing_unitPrice"],
                        'sTran_totalPrice' => $cart_buying_qty * $cart->items[$x]["item"]["Listing_unitPrice"],
                        'sTran_comission' => 0,
                        'sTran_stripeFee' => 0
                    ]);

                    // store into S_transaction from Store(Seller)
                    $store_transaction_seller = storeTransactions::create([

                        'storeSeller_id' => Auth::id(),
                        'sTran_stripeId' => $user_id->store_Stripeid,
                        'sTran_buyerId' => $store_selling_id->store_id,
                        'sListingId' => $cart->items[$x]["item"]["id"],
                        'sTran_date' => $today->format('Y-m-d h:i:s'),
                        'sTran_qty' => $cart_buying_qty,
                        'sTran_unitPrice' => $cart->items[$x]["item"]["Listing_unitPrice"],
                        'sTran_totalPrice' => $cart_buying_qty * $cart->items[$x]["item"]["Listing_unitPrice"],
                        'sTran_comission' => 0,
                        'sTran_stripeFee' => 0
                    ]);
                    dd($store_transaction_buyer, $store_transaction_seller);

                } else {
                    // Manufacturer as seller
                    $manufacturer = Manufacturer::where('manu_id', $manu_ID)
                        ->first();

                    $manu_ur_id = User::where('manu_id', $manu_ID)->value('id');
                    //dd($user_id);

                    // store into M_transaction
                    $manu_transaction = manuTransactions::create([

                        'manuSeller_id' => $manufacturer->manu_id,
                        'mTran_stripeId' => $manufacturer->manu_Stripeid,
                        'mTran_buyerId' => Auth::id(),
                        'mTran_sellerId' => $manu_ur_id,
                        'mListingId' => $cart->items[$x]["item"]["id"],
                        'mTran_date' => $today->format('Y-m-d h:i:s'),
                        'mTran_qty' => $cart_buying_qty,
                        'mTran_unitPrice' => $cart->items[$x]["item"]["Listing_unitPrice"],
                        'mTran_totalPrice' => $cart_buying_qty * $cart->items[$x]["item"]["Listing_unitPrice"],
                        'mTran_comission' => 0,
                        'mTran_stripeFee' => 0
                    ]);
                    //dd($manu_transaction);

                    // store into S_transaction (Store as buyer)
                    $store_transaction = storeTransactions::create([

                        'storeSeller_id' => 0,
                        'sTran_stripeId' => $manufacturer->manu_Stripeid,
                        'sTran_buyerId' => Auth::id(),
                        'sListingId' => $cart->items[$x]["item"]["id"],
                        'sTran_date' => $today->format('Y-m-d h:i:s'),
                        'sTran_qty' => $cart_buying_qty,
                        'sTran_unitPrice' => $cart->items[$x]["item"]["Listing_unitPrice"],
                        'sTran_totalPrice' => $cart_buying_qty * $cart->items[$x]["item"]["Listing_unitPrice"],
                        'sTran_comission' => 0,
                        'sTran_stripeFee' => 0
                    ]);

                    dd($manu_transaction, $store_transaction);
                }

            }

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }





        Session::forget('cart');
        return redirect()->back()->with('success', 'Successfully purchased products!');
    }
}