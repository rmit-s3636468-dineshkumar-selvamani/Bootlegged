@include('layouts.store')
@section('title')
    <title>Bootlegged - Slow Stock</title>

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




    @include('sideNavBar')
@section('content')
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
            <input type="radio" style="padding-right: 10px; margin: 0 10px 0 10px" name="tab" onclick="show30()"
                   checked="checked"/>
            Last 30 Days
            <input type="radio" style="padding-right: 10px; margin: 0 10px 0 10px" name="tab" onclick="show60()"/>
            Last 60 Days
            <input type="radio" style="padding-right: 10px; margin: 0 10px 0 10px" name="tab" onclick="show90()"/>
            Last 90 Days
        </div>

        <div class="div30" id="div30">
            <section class="grid">
                @if(count($tableData30) > 0)

                    <div class="table-responsive mx-3" style="margin-left:200px">
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
                                            <input type="submit" value="Add" class="btn btn-info"
                                                   style="background-color:#333">

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
                <div class="paginate">
                    {{$tableData30->links()}}
                </div>

            </section>
        </div>

        <div class="div60" id="div60" style="display:none">
            <section class="grid">
                @if(count($tableData60) > 0)

                    <div class="table-responsive mx-3" style="margin-left:200px">
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
                                            <input type="submit" value="Add" class="btn btn-info"
                                                   style="background-color:#333">

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
                <div class="paginate">
                    {{$tableData60->links()}}
                </div>

            </section>
        </div>


        <div class="div60" id="div90" style="display:none">
            <section class="grid">
                @if(count($tableData90) > 0)

                    <div class="table-responsive mx-3" style="margin-left:200px">
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
                                            <input type="submit" value="Add" class="btn btn-info"
                                                   style="background-color:#333">

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
                <div class="paginate">
                    {{$tableData90->links()}}
                </div>

            </section>
        </div>
    </div>

    <script>
        function show30() {
            document.getElementById('div30').style.display = 'block';
            document.getElementById('div60').style.display = 'none';
            document.getElementById('div90').style.display = 'none';
        }

        function show60() {
            document.getElementById('div30').style.display = 'none';
            document.getElementById('div60').style.display = 'block';
            document.getElementById('div90').style.display = 'none';
        }

        function show90() {
            document.getElementById('div30').style.display = 'none';
            document.getElementById('div60').style.display = 'none';
            document.getElementById('div90').style.display = 'block';
        }
    </script>