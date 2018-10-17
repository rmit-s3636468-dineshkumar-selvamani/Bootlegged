<!-- @extends('layouts.app')
@section('content')
    -->
    <!DOCTYPE html>
    <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootlegged</title>
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

        .button#coronaButton:focus, .button#coronaButton:active {
            background: rgba(211, 188, 63);
            border: 0px solid;

        }

        .button#tooheysButton:focus, .button#tooheysButton:active {
            background: rgba(211, 188, 63);
            border: 0px solid;
            display: inline-block;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            cursor: pointer;
            opacity: 0.9;
        }

        .button#viewButton {
            background-color: #ffffff;
            border: 0px solid;
            display: inline-block;
            color: black;
            padding: 0px 0px;
            margin: 0px 0;
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




    <div class="sidebar">
        <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">
        <a  href="/home" style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>

        @if( Auth::user()->type == 'StoreOwner')
            <a href="/home" style="color: white;">Market Place</a>
        @endif
        <a href="/mylistings" style="color: white;">My Listing</a>
        <a href="/uploadchoose" style="color: white;">Add Listing</a>
        <a href="history" style="color: white;">History</a>
        @if( Auth::user()->type == 'StoreOwner')
            <a class="active" href="slowstock" style="color: white;">Slow Movers</a>
            <a href="opportunities" style="color: white;">Opportunities</a>
        @endif
        <hr style="border-style: groove;
    border-width: 1px;">
        <a href="/editProfile" style="color: white;">Edit Profile</a>
@if( Auth::user()->type == 'StoreOwner')
  <a href="/cart" style="color: white;">My Cart <span class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span></a>
  @endif
        <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
    </div>

    <div class="view" style="margin-left: 150px">

        <header class="bp-header cf">
            <!-- <span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span> -->
            <h1>Slow Moving Stock</h1>
            <!-- <nav>
                <a href="http://tympanus.net/Blueprints/GridGallery/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a> -->
            <!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
            <!-- <a href="http://tympanus.net/codrops/?p=24096" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
            <a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
        </nav> -->

        </header>

        <!--
    <div style="margin-top:30px">
        <form action="" method="GET">
            <div class="input-group col-md-4">
                <input class="form-control py-2" type="text" placeholder="Search Product Name" name="searchName">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                <button class="btn btn-outline-secondary" style="margin-left:10px;">SHOW ALL</button>
            </div>
        </form>
    </div> -->

        <div class="radiodiv" style="position: absolute; right: 0; padding-right: 10px">
            <input type="radio" style="padding-right: 10px; margin: 0 10px 0 10px" name="tab" onclick="show30()" checked="checked"/>
            Last 30 Days
            <input type="radio" style="padding-right: 10px; margin: 0 10px 0 10px" name="tab" onclick="show60()" />
            Last 60 Days
            <input type="radio" style="padding-right: 10px; margin: 0 10px 0 10px" name="tab" onclick="show90()" />
            Last 90 Days
        </div>

        <div class="div30" id="div30">
            <section class="grid" >
                @if(count($tableData30) > 0)

                    <div class="table-responsive mx-3"  style="margin-left:200px">
                        <table class="table table-striped table-sm">
                            {{-- Table Header --}}
                            <thead>
                            <tr>
                                @foreach($titles as $title)
                                    <th>{{$title}}</th>
                                @endforeach
                            </tr>
                            </thead>

                            {{-- Get access to session data --}}
                            <?php
                            $items = (Session::has('listing-cart')) ? Session::get('listing-cart')->items : null
                            ?>

                            {{-- Body --}}
                            <tbody>
                            @foreach($tableData30 as $product)
                                <!-- 0: pad, 1: product name, 2: soh, 3: cost price, 4: sub total, 5: date, 6: add -->
                                <tr>

                                    @foreach ($currentColumn as $c)
                                        @if(isset($product->$c))
                                            @if($c=='product_id')
                                                <?php $productname = \Illuminate\Support\Facades\DB::table('products')->where('product_id', $c)->first()
                                                ?>
                                                <td><?php print_r($product->product_itemName)?></td>
                                                <?php $itemname = $product->product_itemName ?>
                                            @elseif($c=='cost_price')
                                                <td>${{$product->$c}}</td>
                                                <?php $costprice = $product->$c ?>
                                            @elseif($c=='SOH_qty')
                                                <td>{{$product->$c}}</td>
                                                <?php $quantity = $product->$c ?>
                                            @elseif($c=='sub_total')
                                                <td>${{$product->$c}}</td>
                                            @elseif($c=='last_sale_date')
                                                <?php echo "<td>" . date('d-m-Y', strtotime($product->$c)) . "</td>"?>
                                            @else
                                                <td>{{$product->$c}}</td>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td>
                                        <form action="addlistingFromSlow" method="get">
                                            <input name="p_name" value="{{$itemname}}" type="hidden">
                                            <input name="quan" value="{{$quantity}}" type="hidden">
                                            <input name="costprice" value="{{$costprice}}" type="hidden">
                                            <input type="submit" value="Add" class="btn btn-info" style="background-color:#333">

                                        </form>
                                    </td>
                                    {{-- <td><input type="checkbox" class="filled-in form-check-input" id="checkbox101"></td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @else
                    <h2 style="margin:30px;">No products found!</h2>
                @endif

                {{-- Pagination Links --}}
                <div class = "paginate">
                    {{$tableData30->links()}}
                </div>

            </section>
        </div>

        <div class="div60" id="div60" style="display:none">
            <section class="grid" >
                @if(count($tableData60) > 0)

                    <div class="table-responsive mx-3"  style="margin-left:200px">
                        <table class="table table-striped table-sm">
                            {{-- Table Header --}}
                            <thead>
                            <tr>
                                @foreach($titles as $title)
                                    <th>{{$title}}</th>
                                @endforeach
                            </tr>
                            </thead>

                            {{-- Get access to session data --}}
                            <?php
                            $items = (Session::has('listing-cart')) ? Session::get('listing-cart')->items : null
                            ?>

                            {{-- Body --}}
                            <tbody>
                            @foreach($tableData60 as $product)
                                <!-- 0: pad, 1: product name, 2: soh, 3: cost price, 4: sub total, 5: date, 6: add -->
                                <tr>

                                    @foreach ($currentColumn as $c)
                                        @if(isset($product->$c))
                                            @if($c=='product_id')
                                                <?php $productname = \Illuminate\Support\Facades\DB::table('products')->where('product_id', $c)->first()
                                                ?>
                                                <td><?php print_r($product->product_itemName)?></td>
                                                <?php $itemname = $product->product_itemName ?>
                                            @elseif($c=='cost_price')
                                                <td>${{$product->$c}}</td>
                                                <?php $costprice = $product->$c ?>
                                            @elseif($c=='SOH_qty')
                                                <td>{{$product->$c}}</td>
                                                <?php $quantity = $product->$c ?>
                                            @elseif($c=='sub_total')
                                                <td>${{$product->$c}}</td>
                                            @elseif($c=='last_sale_date')
                                                <?php echo "<td>" . date('d-m-Y', strtotime($product->$c)) . "</td>"?>
                                            @else
                                                <td>{{$product->$c}}</td>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td>
                                        <form action="addlistingFromSlow" method="get">
                                            <input name="p_name" value="{{$itemname}}" type="hidden">
                                            <input name="quan" value="{{$quantity}}" type="hidden">
                                            <input name="costprice" value="{{$costprice}}" type="hidden">
                                            <input type="submit" value="Add" class="btn btn-info" style="background-color:#333">

                                        </form>
                                    </td>
                                    {{-- <td><input type="checkbox" class="filled-in form-check-input" id="checkbox101"></td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @else
                    <h2 style="margin:30px;">No products found!</h2>
                @endif

                {{-- Pagination Links --}}
                <div class = "paginate">
                    {{$tableData60->links()}}
                </div>

            </section>
        </div>


        <div class="div60" id="div90" style="display:none">
            <section class="grid" >
                @if(count($tableData90) > 0)

                    <div class="table-responsive mx-3"  style="margin-left:200px">
                        <table class="table table-striped table-sm">
                            {{-- Table Header --}}
                            <thead>
                            <tr>
                                @foreach($titles as $title)
                                    <th>{{$title}}</th>
                                @endforeach
                            </tr>
                            </thead>

                            {{-- Get access to session data --}}
                            <?php
                            $items = (Session::has('listing-cart')) ? Session::get('listing-cart')->items : null
                            ?>

                            {{-- Body --}}
                            <tbody>
                            @foreach($tableData90 as $product)
                                <!-- 0: pad, 1: product name, 2: soh, 3: cost price, 4: sub total, 5: date, 6: add -->
                                <tr>

                                    @foreach ($currentColumn as $c)
                                        @if(isset($product->$c))
                                            @if($c=='product_id')
                                                <?php $productname = \Illuminate\Support\Facades\DB::table('products')->where('product_id', $c)->first()
                                                ?>
                                                <td><?php print_r($product->product_itemName)?></td>
                                                <?php $itemname = $product->product_itemName ?>
                                            @elseif($c=='cost_price')
                                                <td>${{$product->$c}}</td>
                                                <?php $costprice = $product->$c ?>
                                            @elseif($c=='SOH_qty')
                                                <td>{{$product->$c}}</td>
                                                <?php $quantity = $product->$c ?>
                                            @elseif($c=='sub_total')
                                                <td>${{$product->$c}}</td>
                                            @elseif($c=='last_sale_date')
                                                <?php echo "<td>" . date('d-m-Y', strtotime($product->$c)) . "</td>"?>
                                            @else
                                                <td>{{$product->$c}}</td>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td>
                                        <form action="addlistingFromSlow" method="get">
                                            <input name="p_name" value="{{$itemname}}" type="hidden">
                                            <input name="quan" value="{{$quantity}}" type="hidden">
                                            <input name="costprice" value="{{$costprice}}" type="hidden">
                                            <input type="submit" value="Add" class="btn btn-info" style="background-color:#333">

                                        </form>
                                    </td>
                                    {{-- <td><input type="checkbox" class="filled-in form-check-input" id="checkbox101"></td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @else
                    <h2 style="margin:30px;">No products found!</h2>
                @endif

                {{-- Pagination Links --}}
                <div class = "paginate">
                    {{$tableData90->links()}}
                </div>

            </section>
        </div>
    </div>

    <script>
        function show30(){
            document.getElementById('div30').style.display = 'block';
            document.getElementById('div60').style.display = 'none';
            document.getElementById('div90').style.display = 'none';
        }
        function show60(){
            document.getElementById('div30').style.display = 'none';
            document.getElementById('div60').style.display = 'block';
            document.getElementById('div90').style.display = 'none';
        }
        function show90(){
            document.getElementById('div30').style.display = 'none';
            document.getElementById('div60').style.display = 'none';
            document.getElementById('div90').style.display = 'block';
        }
    </script>