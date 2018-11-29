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
            
            return view('/cart')->with(['products' => null, 'totalQuantity' => 0, 'totalPrice' => 0]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
       
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

   
    public function checkout(Request $request)
    {
        try {
            if (!Session::has('cart')) {
                return redirect()->route('/cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            $today = new DateTime();

            // Loop each item in the cart

            foreach ($cart->items as $item) {

                // Get Item ID
                $item_ID = $item['item']['id'];

                // Cart item Listing Quantity
                $cart_item_qty = $item['item']['Listing_qty'];

                // Cart item Buying Quantity
                $cart_buying_qty = $item['Listing_qty'];

                // Cart Item Listing_qty
                $update_qty = $cart_item_qty - $cart_buying_qty;

                // Update total Price after update ListingQty
                $update_total_price = $update_qty * $item['item']['Listing_unitPrice'];

                // Update Listings table in the database
                Listings::where('id', $item_ID)
                    ->update(['Listing_qty' => $update_qty,
                        'Listing_totalPrice' => $update_total_price
                    ]);

                // Get Manufacturer ID from cart
                $manu_ID = $item['item']['lmanu_id'];

                // If the item sold is not from Manufacturer
                if ($manu_ID == null) {
                    // Get Store ID from cart
                    $store_ID = $item['item']['lstore_id'];

                    $store_selling_id = Store::where('store_id', $store_ID)
                        ->first();

                    // store into S_transaction
                    $store_transaction_buyer = storeTransactions::create([

                        'storeSeller_id' => $store_selling_id->store_id,
                        'sTran_stripeId' => $store_selling_id->store_Stripeid,
                        'sTran_buyerId' => Auth::id(),
                        'sListingId' => $item['item']['id'],
                        'sTran_date' => $today->format('Y-m-d h:i:s'),
                        'sTran_qty' => $cart_buying_qty,
                        'sTran_unitPrice' => $item['item']['Listing_unitPrice'],
                        'sTran_totalPrice' => $cart_buying_qty * $item['item']['Listing_unitPrice'],
                        'sTran_comission' => 0,
                        'sTran_stripeFee' => 0
                    ]);


                } else {
                    // Manufacturer as seller
                    $manufacturer = Manufacturer::where('manu_id', $manu_ID)
                        ->first();

                    $manu_ur_id = User::where('manu_id', $manu_ID)->value('id');

                    // store into M_transaction
                    $manu_transaction = manuTransactions::create([

                        'manuSeller_id' => $manufacturer->manu_id,
                        'stripeId' => $manufacturer->manu_Stripeid,
                        'mTran_buyerId' => Auth::id(),
                        'mTran_sellerId' => $manu_ur_id,
                        'mListingId' => $item['item']['id'],
                        'mTran_date' => $today->format('Y-m-d h:i:s'),
                        'mTran_qty' => $cart_buying_qty,
                        'mTran_unitPrice' => $item['item']['Listing_unitPrice'],
                        'mTran_totalPrice' => $cart_buying_qty * $item['item']['Listing_unitPrice'],
                        'mTran_comission' => 0,
                        'mTran_stripeFee' => 0
                    ]);

                }

            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->back()->with('success', 'Successfully purchased products!');
    }
}
