<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        $storedItem = ['Listing_qty' => 0, 'Listing_unitPrice' => $item->Listing_unitPrice, 'item' => $item];

        // To check the cart with existing item
        if($this ->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        //dd($storedItem);

        $storedItem['Listing_qty']++;
        $storedItem['Listing_unitPrice'] = $item->Listing_unitPrice * $storedItem['Listing_qty'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item ->Listing_unitPrice;
    }

}