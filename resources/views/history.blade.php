<!-- @extends('layouts.app')
@section('content')
    -->
    <!DOCTYPE html>
    <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootlegged - History</title>
        <meta name="description" content="Blueprint: A basic responsive product grid layout with comparison functionality" />
        <meta name="keywords" content="blueprint, template, html, css, javascript, grid, layout, effect, product comparison" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <!-- Modernizr is used for flexbox fallback -->
        <script src="js/modernizr.custom.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <style>
        body {margin: 0;
            /*background-color: rgb(26,27,31);*/
            /*background-image: url(Images/back.jpg);*/
        }

        ul.topnav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        ul.topnav li {float: left;}

        ul.topnav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.topnav li a:hover:not(.active) {background-color: #111;}

        ul.topnav li a.active {background: rgba(211, 188, 63);}

        ul.topnav li.right {float: right;}

        @media screen and (max-width: 600px){
            ul.topnav li.right,
            ul.topnav li {float: none;}
        }

        .button {
            display: inline-block;
            background-color: #333;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: 2px solid ;
            cursor: pointer;
            opacity: 0.9;
        }

        .button#purchaseButton:focus, .button#purchaseButton:active {
            background: rgba(211, 188, 63);
            border: 0px solid;

        }

        .button#salesButton:focus, .button#salesButton:active {
            background: rgba(211, 188, 63);
            border: 0px solid;
            display: inline-block;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            cursor: pointer;
            opacity: 0.9;
        }

        #salesTable{
            margin-top:10px
            margin-left:300px
        }

        #pagination{
            display: inline-block;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: black;
            /*background-color: gold;*/
            background: rgba(211, 188, 63);
            border-color: gold;
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: black;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .modal-content, .modal-header{
            background-color: rgb(33,35,39);
        }

        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
            background-color: rgb(33,35,39);
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: rgba(211, 188, 63);
            color: black;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
            color: white;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {float: left;}
            div.content {margin-left: 0;}
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }

        .logo{

            visibility: visible;
            position: absolute;
            height: 125px;
            width: 175px;
            float: left;
            margin-top: -15px;
            margin-left: 10px;




        }

        .filter{

            position: relative;
            margin-left: 250px;

        }



        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }

        .product{
            min-height: 430px;
        }

    </style>

    <body>
    @include('sideNavBar')

    <div class="view" style="margin-left: 150px">
        <!-- Blueprint header -->
        @if( \Illuminate\Support\Facades\Auth::user()->type == 'StoreOwner')
            <header class="bp-header cf">
                <!-- <span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span> -->
                <h1>Transaction History</h1>
                <!-- <nav>
                    <a href="http://tympanus.net/Blueprints/GridGallery/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a> -->
                <!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
                <!-- <a href="http://tympanus.net/codrops/?p=24096" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
                <a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
            </nav> -->

                <p>
                    <a onclick="showSales()" class="button" tabindex="1" id="salesButton">Sales History</a>
                    <a onclick="showPurchases()" class="button" tabindex="1" id="purchaseButton">Purchase History</a>
                </p>


            </header>
            <!-- Product grid -->
            <section class="grid"  >

                <div class="table-responsive mx-2" id="salesTable" style="...">
                    <table class="table table-striped table-sm">
                        {{-- Header --}}
                        @if(count($salehistory) > 0)
                            <thead>
                            <tr>

                                @foreach($Sellertitles as $title)
                                    <th>{{$title}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            {{-- Body --}}
                            <tbody>
                            @foreach($salehistory as $item)
                                <tr>
                                    <?php $seller = \Illuminate\Support\Facades\DB::table('users')->where('id', $item->sTran_buyerId)->first(); ?>
                                    <td><?php print_r($seller->email)?></td>
                                    <?php
                                    $listing = \Illuminate\Support\Facades\DB::table('listings')->where('id', $item->sListingId)->first();
                                    $product = \Illuminate\Support\Facades\DB::table('products')->where('product_id', $listing->lproduct_id)->first()

                                    ?><td><?php print_r($product->product_itemName)?></td>
                                    <td>{{$item->sTran_qty}}</td>
                                    <td>${{$item->sTran_unitPrice}}</td>
                                    <td>${{$item->sTran_totalPrice}}</td>
                                    <td>{{$item->sTran_date}}</td>
                                </tr>

                            @endforeach
                            @else
                                <h1>No sales were found!</h1>
                            @endif
                            </tbody>

                    </table>
                </div>

                <div class="table-responsive mx-2" id="purchasesTable" style="display:none">
                    <table class="table table-striped table-sm">
                        {{-- Header --}}
                        @if(count($spurchasehistory) > 0)
                            <thead>
                            <tr>

                                @foreach($Buyertitles as $title)
                                    <th>{{$title}}</th>
                                @endforeach
                            </tr>
                            </thead>

                            {{-- Body --}}
                            <tbody>
                            @foreach($spurchasehistory as $item)
                                <tr>
                                    <?php
                                    $listing = \Illuminate\Support\Facades\DB::table('listings')->where('id', $item->sListingId)->first();
                                    $product = \Illuminate\Support\Facades\DB::table('products')->where('product_id', $listing->lproduct_id)->first();
                                    $seller = \Illuminate\Support\Facades\DB::table('store')->where('store_id', $item->storeSeller_id)->first();
                                    ?><td><?php print_r($seller->store_email)?></td>

                                    <td><?php print_r($product->product_itemName) ?></td>
                                    <td>{{$item->sTran_qty}}</td>
                                    <td>${{$item->sTran_unitPrice}}</td>
                                    <td>${{$item->sTran_totalPrice}}</td>
                                    <td>{{$item->sTran_date}}</td>
                                </tr>

                            @endforeach

                            @else
                                <h1>No purchases were found!</h1>
                            @endif
                            </tbody>

                    </table>
                </div>

                {{-- paginate links --}}
                <div class = "paginate">
                    {{$tableData->links()}}
                </div>

            </section>


        @elseif(\Illuminate\Support\Facades\Auth::user()->type == 'Manufacturer')
            <header class="bp-header cf">
                <!-- <span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span> -->
                <h1>Sales History</h1>
                <!-- <nav>
                    <a href="http://tympanus.net/Blueprints/GridGallery/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a> -->
                <!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
                <!-- <a href="http://tympanus.net/codrops/?p=24096" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
                <a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
            </nav> -->

            </header>
            <!-- Product grid -->
            <section class="grid">

                <div class="table-responsive mx-2" id="salesTable">
                    <table class="table table-striped table-sm">
                        {{-- Header --}}
                        @if(count($msalehistory) > 0)
                            <thead>
                            <tr>

                                @foreach($Sellertitles as $title)
                                    <th>{{$title}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            {{-- Body --}}
                            <tbody>
                            @foreach($msalehistory as $item)
                                <tr>
                                    <?php $seller = \Illuminate\Support\Facades\DB::table('users')->where('id', $item->mTran_buyerId)->first(); ?>
                                    <td><?php print_r($seller->email)?></td>
                                    <?php
                                    $listing = \Illuminate\Support\Facades\DB::table('listings')->where('id', $item->mListingId)->first();
                                    $product = \Illuminate\Support\Facades\DB::table('products')->where('product_id', $listing->lproduct_id)->first()

                                    ?><td><?php print_r($product->product_itemName)?></td>
                                    <td>{{$item->mTran_qty}}</td>
                                    <td>${{$item->mTran_unitPrice}}</td>
                                    <td>${{$item->mTran_totalPrice}}</td>
                                    <td>{{$item->mTran_date}}</td>
                                </tr>
                            @endforeach

                            @else
                                <h1>No sales were found!</h1>
                            @endif
                            </tbody>

                    </table>
                </div>
                {{-- paginate links --}}
                <div class = "paginate">
                    {{$tableData->links()}}
                </div>
            </section>

        @endif
    </div><!-- /view -->


    <script>
        var button = document.getElementById('salesButton'); // Assumes element with id='button'

        button.onclick = function() {

            var div = document.getElementById('purchasesTable');
            if (div.style.display !== 'none') {
                div.style.display = 'none';
            }
            var div2 = document.getElementById('salesTable');
            if (div2.style.display == 'none') {
                div2.style.display = 'block';
            }
        };
    </script>

    <script>
        var button = document.getElementById('purchaseButton'); // Assumes element with id='button'
        var button2 = document.getElementById('salesButton'); // Assumes element with id='button'
        var int = 0;

        button.onclick = function() {

            var div = document.getElementById('salesTable');
            if (div.style.display !== 'none') {
                div.style.display = 'none';
            }

            var div2 = document.getElementById('purchasesTable');
            if (div2.style.display == 'none') {
                div2.style.display = 'block';
            }

        };
    </script>

    <script>

        document.addEventListener("DOMContentLoaded", function() {
            function disableButton() {

                var button = document.getElementById('salesButton'); // Assumes element with id='button'

                button.active();

            };
        });
    </script>


    </body>
