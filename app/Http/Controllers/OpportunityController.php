<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Http\Requests;
use DB;
use Auth;

class OpportunityController extends Controller
{
    public function shortage() {
        $storeID = Auth::user()->store_id;

        $shortage = DB::select("SELECT p.product_itemName, b1.product_id
        FROM product_sales b1, products p 
        WHERE b1.product_id != 0 AND 
        b1.product_id = p.product_id AND 
        b1.store_id = $storeID AND 
        (b1.sale60qty-b1.sale30qty)>b1.SOH_qty 
        ORDER BY p.product_itemName");

        return $shortage;
    }

    public function getItemsFromListings(){
        $storeID = Auth::user()->store_id;

        //only consider quantity and price
        $listings = DB::select("SELECT products.product_id, products.product_itemName, A.lstore_id, A.listing_qty, A.listing_totalPrice, A.listing_expiry,
        sqrt(POWER((A.listing_qty - short)/short, 2) + 
             POWER((A.listing_totalPrice - B.cost_price)/B.cost_price, 2)) as rank
                FROM
                listings A, (
                select b1.product_id,(b1.sale60qty-b1.sale30qty)-b1.SOH_qty as short, b1.cost_price
                from product_sales b1
                where product_id != 0 and
                b1.store_id = $storeID and
                (b1.sale60qty-b1.sale30qty)>b1.SOH_qty 
                order by 
                short desc) B, products
                WHERE
                products.product_id = B.product_id AND
                A.lproduct_id = B.product_id AND
                A.lstore_id != $storeID AND
                A.listing_expiry != 0
                ORDER BY
                products.product_id, rank ASC");

        return $listings;
    }

    public function getGroupNameFromResult($results) {
        $id = 0;
        $name = null;
        foreach($results as $item) {
            if($item->product_id != $id) {
                $id = $item->product_id;
                $name[$id] = $item->product_itemName;
            }
        }

        return $name;
    }

    public function getItemsFromListingWithRanking(){
        $storeID = Auth::user()->store_id;

        //only consider quantity and price
        $opportunity = DB::select("SELECT products.product_id, products.product_itemName, A.id, A.listing_qty, A.listing_unitPrice, B.short, A.listing_expiry,
        sqrt(POWER((A.listing_qty - short)/short, 2) + 
             POWER((A.listing_unitPrice - B.cost_price)/B.cost_price, 2) -
             POWER((UNIX_TIMESTAMP(A.listing_expiry) - UNIX_TIMESTAMP(CURRENT_TIMESTAMP()))/UNIX_TIMESTAMP(CURRENT_TIMESTAMP()), 2)) as rank
                FROM
                listings A, (
                select b1.product_id,(b1.sale60qty-b1.sale30qty)-b1.SOH_qty as short, b1.cost_price
                from product_sales b1
                where product_id != 0 and
                b1.store_id = $storeID and
                (b1.sale60qty-b1.sale30qty)>b1.SOH_qty 
                order by 
                short desc) B, products
                WHERE
                products.product_id = B.product_id AND
                A.lproduct_id = B.product_id AND
                A.lstore_id != $storeID AND
                UNIX_TIMESTAMP(A.listing_expiry) != 0
                ORDER BY
                products.product_id, rank ASC");

        return $opportunity;
    }

    //manually create a array paginator
    public function opportunityWithRanking(Request $request)
    {
        $currentPID = $request->input('currentPID');

        //Hard coding array to display the headers of table
        $titles = array("Shortage Products","Quantity","Unit Price","Expiry Date", "View Listing");
        //An array put in the coloum name needed to display in order
        $currentColumn = array("id","product_itemName","listing_qty","listing_unitPrice","listing_expiry", "View");

        //Array data you want to paginate
        $tableData = $this->getItemsFromListingWithRanking(); //consider three factors qty, price & expiry date

        if(count($tableData) > 0) {
            //get group name
            $groupName = $this->getGroupNameFromResult($tableData);
        } else {
            $fastmover = $this->shortage();
            $groupName = $this->getGroupNameFromResult($fastmover);
            //dd($groupName);
        }

        //This would contain all data to be sent to the view
        $page = array();

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($groupName);

        //Define how many items we want to be visible in each page
        $per_page = 15;

        //Slice the collection to get the items to display in current page
        $currentPageResults = $collection->slice(($currentPage-1) * $per_page, $per_page)->all();

        //Create our paginator and add it to the data array
        $page = new LengthAwarePaginator($currentPageResults, count($collection), $per_page);

        //Set base url for pagination links to follow e.g custom/url?page=6
        $page->setPath($request->url());

        //dd($tableData);

        return view('opportunities', compact('titles','currentColumn','tableData','page','groupName','currentPID'));
    }
}
