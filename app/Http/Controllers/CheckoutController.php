<?php


namespace App\Http\Controllers;

use App\Listings;
use App\Cart;
use App\manuTransactions;
use App\storeTransactions;
use App\Manufacturer;
use App\Store;
use App\User;
use DateTime;

use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Error\Card;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    private $StripeFee;

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {
        try {
            if (!Session::has('cart')) {
                return redirect()->route('/cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            $this->StripeCheckOut($cart, $request);

            $today = new DateTime();

            foreach ($cart->items as $item) {

                //----------------------------------------------
                // Update Listing Individually
                //----------------------------------------------
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

                //----------------------------------------------
                // Update Sales Database
                //----------------------------------------------
                // Get Manufacturer ID from cart
                $manu_ID = $item['item']['lmanu_id'];

                $totalPrice = $cart_buying_qty * $item['item']['Listing_unitPrice'];

                $unitPrice = $item['item']['Listing_unitPrice'];

                $itemID = $item['item']['id'];

                // If the item sold is not from Manufacturer
                if ($manu_ID == null) {
                    // Get Store ID from cart
                    $store_ID = $item['item']['lstore_id'];

                    $store_selling_id = Store::where('store_id', $store_ID)
                        ->first();

                    // store into S_transaction
                    storeTransactions::create([

                        'storeSeller_id' => $store_selling_id->store_id,
                        'sTran_stripeId' => $store_selling_id->store_Stripeid,
                        'sTran_buyerId' => Auth::id(),
                        'sListingId' => $itemID,
                        'sTran_date' => $today->format('Y-m-d h:i:s'),
                        'sTran_qty' => $cart_buying_qty,
                        'sTran_unitPrice' => $unitPrice,
                        'sTran_totalPrice' => $totalPrice,
                        'sTran_comission' => 0,
                        'sTran_stripeFee' => $this->StripeFee
                    ]);


                } else {
                    // Manufacturer as seller
                    $manufacturer = Manufacturer::where('manu_id', $manu_ID)
                        ->first();

                    $manu_ur_id = User::where('manu_id', $manu_ID)->value('id');

                    // store into M_transaction
                    manuTransactions::create([

                        'manuSeller_id' => $manufacturer->manu_id,
                        'stripeId' => $manufacturer->manu_Stripeid,
                        'mTran_buyerId' => Auth::id(),
                        'mTran_sellerId' => $manu_ur_id,
                        'mListingId' => $itemID,
                        'mTran_date' => $today->format('Y-m-d h:i:s'),
                        'mTran_qty' => $cart_buying_qty,
                        'mTran_unitPrice' => $unitPrice,
                        'mTran_totalPrice' => $totalPrice,
                        'mTran_comission' => 0,
                        'mTran_stripeFee' => $this->StripeFee
                    ]);

                }

            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Please contact us with this error message: " . $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->back()->with('success', 'Successfully purchased products! Check your sales history!');
    }

    /**
     * @param Cart $cart
     * @return \Illuminate\Http\RedirectResponse
     */
    private function StripeCheckOut(Cart $cart, Request $request)
    {

        try {
            //dd($request);
           // dd(env('STRIPE_SECRET'),env('STRIPE_KEY'));
            Stripe::setApiVersion('2018-11-08');
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $_token= $request['_token'];
            $token = $request['stripeToken'];
            $email = $request['stripeEmail'];
            $cartAmount = $cart->totalPrice * 100;
            $description = "Bootlegged_Trx: " . $_token;

            // Stripe fee is flat 2.9% on the total transaction
            $stripeFee = ($cartAmount * 0.029);
            $this->StripeFee = $stripeFee;

            $totalAmount = $cartAmount+$stripeFee;

            Customer::create(array("email" => $email));

            Charge::create(array(
                "amount" => $totalAmount,
                "currency" => "AUD",
                "source" => $token,
                "description" => $description,
                // Send receipt from Stripe: Test mode wont be sending any receipt to buyer
                "receipt_email" => $email

            ));

        } catch (Card  $err) {
            $errBody = $err->getJsonBody();
            $message['error'] = [
                "Status" => 'Status is: ' . $err->getHttpStatus() . '<br>',
                "Param" => 'Param is: ' . $errBody['error']['param'] . '<br>',
                "Message" => 'Message is: ' . $errBody['error']['message'] . '<br>'
            ];
            return redirect()->back()->with('error', $message['error']);
        }
    }
}