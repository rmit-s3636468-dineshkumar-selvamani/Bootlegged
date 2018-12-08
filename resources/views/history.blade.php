@include('layouts.store')

@section('title')
    <title>Bootlegged - History</title>

@section('style')
    <style>

        .button {
            display: inline-block;
            background-color: #333;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: 2px solid;
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

        #salesTable {
            margin-top: 10px
            margin-left: 300px
        }

        #pagination {
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

    </style>

@section('content')
    <body>
    @include('sideNavBar')

    <body>
    <div class="sidebar">
        <img style=" position: absolute; display: inline;" class="logo" alt="logo" src="/Images/logo1.png">
        <a href="#home"
           style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>

        @if( Auth::user()->type == 'StoreOwner')
            <a href="/home" style="color: white;">Market Place</a>
        @endif
        <a href="/mylistings" style="color: white;">My Listing</a>
        <a href="/uploadchoose" style="color: white;">Add Listing</a>
        <a href="history" class="active" style="color: white;">History</a>
        @if( Auth::user()->type == 'StoreOwner')
            <a href="slowstock" style="color: white;">Slow Movers</a>
            <a href="opportunities" style="color: white;">Opportunities</a>
        @endif
        <hr style="border-style: groove;
    border-width: 1px;">
        <a href="/editProfile" style="color: white;">Edit Profile</a>
        @if( Auth::user()->type == 'StoreOwner')
            <a href="/cart" style="color: white;">My Cart <span
                        class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span></a>
        @endif
        <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
    </div>

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
            <section class="grid">

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

                                    ?>
                                    <td><?php print_r($product->product_itemName)?></td>
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
                                    $seller = \Illuminate\Support\Facades\DB::table('Store')->where('store_id', $item->storeSeller_id)->first();
                                    ?>
                                    <td><?php print_r($seller->store_email)?></td>

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
                <div class="paginate">
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

                                    ?>
                                    <td><?php print_r($product->product_itemName)?></td>
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
                <div class="paginate">
                    {{$tableData->links()}}
                </div>
            </section>

        @endif
    </div><!-- /view -->


    <script>
        var button = document.getElementById('salesButton'); // Assumes element with id='button'

        button.onclick = function () {

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

        button.onclick = function () {

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

        document.addEventListener("DOMContentLoaded", function () {
            function disableButton() {

                var button = document.getElementById('salesButton'); // Assumes element with id='button'

                button.active();

            };
        });
    </script>


    </body>
