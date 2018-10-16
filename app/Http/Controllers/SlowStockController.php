<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SlowStockController extends Controller
{
    public function index(Request $request) {

        $searchName = $request->input('searchName');

        $titles = array('Product Name', 'SOH', 'Cost Price', "Sub Total", "Last Sale Date", "Add Listing");

        $currentColumn = array('product_id', 'SOH_qty', 'cost_price', 'sub_total', 'last_sale_date');

        $tableData30 = $this->thirtydays();
        $tableData60 = $this->sixtydays();
        $tableData90 = $this->ninetydays();


        return view('slowstock', compact('titles', 'currentColumn', 'tableData30', 'tableData60', 'tableData90'));
    }

    public function thirtydays() {
        if (Auth::user()->type == 'StoreOwner') {

            $slowStock = DB::table('product_sales as ps')->where('store_id', Auth::user()->store_id)
                ->join('products as p', function ($join) {
                    $join->on('ps.product_id','p.product_id')
                        ->whereRaw('(ps.sale30qty) = 0');
                })
                //->where('p.product_itemName', 'LIKE', '%' . $searchName . '%')

                ->select(
                    'p.product_id',
                    'p.product_itemName',
                    'ps.SOH_qty',
                    'ps.cost_price',
                    DB::raw('ps.SOH_qty*ps.cost_price as sub_total'),
                    'ps.last_sale_date'

                )->OrderBy("sub_total", "desc")->paginate(10);

            return $slowStock;

        }
        else {
            $slowStock = DB::table('product_sales as ps')->where('manuf_id', Auth::user()->manu_id)
                ->join('products as p', function ($join) {
                    $join->on('ps.product_id','p.product_id')
                        ->whereRaw('(ps.sale30qty) = 0');
                })
                //->where('p.product_itemName', 'LIKE', '%' . $searchName . '%')
                ->select(
                    'p.product_id',
                    'p.product_itemName',
                    'ps.SOH_qty',
                    'ps.cost_price',
                    DB::raw('ps.SOH_qty*ps.cost_price as sub_total'),
                    'ps.last_sale_date'

                )->OrderBy("sub_total", "desc")->paginate(10);

            return $slowStock;
        }


    }

    public function sixtydays() {
        if (Auth::user()->type == 'StoreOwner') {

            $slowStock = DB::table('product_sales as ps')->where('store_id', Auth::user()->store_id)
                ->join('products as p', function ($join) {
                    $join->on('ps.product_id','p.product_id')
                        ->whereRaw('(ps.sale60qty+ps.sale30qty) = 0');
                })
                //->where('p.product_itemName', 'LIKE', '%' . $searchName . '%')

                ->select(
                    'p.product_id',
                    'p.product_itemName',
                    'ps.SOH_qty',
                    'ps.cost_price',
                    DB::raw('ps.SOH_qty*ps.cost_price as sub_total'),
                    'ps.last_sale_date'

                )->OrderBy("sub_total", "desc")->paginate(10);

            return $slowStock;

        }
        else {
            $slowStock = DB::table('product_sales as ps')->where('manuf_id', Auth::user()->manu_id)
                ->join('products as p', function ($join) {
                    $join->on('ps.product_id','p.product_id')
                        ->whereRaw('(ps.sale60qty+ps.sale30qty) = 0');
                })
                //->where('p.product_itemName', 'LIKE', '%' . $searchName . '%')
                ->select(
                    'p.product_id',
                    'p.product_itemName',
                    'ps.SOH_qty',
                    'ps.cost_price',
                    DB::raw('ps.SOH_qty*ps.cost_price as sub_total'),
					
                    'ps.last_sale_date'

                )->OrderBy("sub_total", "desc")->paginate(10);

            

            return $slowStock;
        }


    }

    public function ninetydays() {
        if (Auth::user()->type == 'StoreOwner') {

            $slowStock = DB::table('product_sales as ps')->where('store_id', Auth::user()->store_id)
                ->join('products as p', function ($join) {
                    $join->on('ps.product_id','p.product_id')
                        ->whereRaw('(ps.sale60qty+ps.sale30qty+ps.sale90qty) = 0');
                })
                //->where('p.product_itemName', 'LIKE', '%' . $searchName . '%')

                ->select(
                    'p.product_id',
                    'p.product_itemName',
                    'ps.SOH_qty',
                    'ps.cost_price',
                    DB::raw('ps.SOH_qty*ps.cost_price as sub_total'),
                    'ps.last_sale_date'

                )->OrderBy("sub_total", "desc")->paginate(10);

            return $slowStock;

        }
        else {
            $slowStock = DB::table('product_sales as ps')->where('manuf_id', Auth::user()->manu_id)
                ->join('products as p', function ($join) {
                    $join->on('ps.product_id','p.product_id')
                        ->whereRaw('(ps.sale60qty+ps.sale30qty+ps.sale90qty) = 0');
                })
                //->where('p.product_itemName', 'LIKE', '%' . $searchName . '%')
                ->select(
                    'p.product_id',
                    'p.product_itemName',
                    'ps.SOH_qty',
                    'ps.cost_price',
                    DB::raw('ps.SOH_qty*ps.cost_price as sub_total'),
                    'ps.last_sale_date'

                )->OrderBy("sub_total", "desc")->paginate(10);

            return $slowStock;
        }


    }
}
