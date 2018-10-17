@extends('layouts.store')
@section('content')

    <style>
        body {
            margin: 0;
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

        ul.topnav li {
            float: left;
        }

        ul.topnav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.topnav li a:hover:not(.active) {
            background-color: #111;
        }

        ul.topnav li a.active {
            background: rgba(211, 188, 63);
        }

        ul.topnav li.right {
            float: right;
        }

        @media screen and (max-width: 600px) {
            ul.topnav li.right,
            ul.topnav li {
                float: none;
            }
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

        .modal-content, .modal-header {
            background-color: rgb(33, 35, 39);
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
            background-color: rgb(33, 35, 39);
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

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }

        .logo {

            visibility: visible;
            position: absolute;
            height: 125px;
            width: 175px;
            float: left;
            margin-top: -15px;
            margin-left: 10px;

        }

        .filter {

            position: relative;
            margin-left: 250px;

        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu > .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }

        .dropdown-submenu > a:after {
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

        .dropdown-submenu:hover > a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left > .dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }

        .product .product__info {
            min-height: 00px;
        }

        .product__name {

            min-height: 40px;
            max-height: 50px;
            max-width: 210px;

        }

        .product {

            max-width: 210px;
        }

        /*.twitter-typeahead,
                .tt-hint,
                .tt-input,
                .tt-menu{
                    width: auto ! important;
                    font-weight: normal;

                }*/
        /*Big Box*/
        .twitter-typeahead {
            display: block;
            width: 100%;

        /
        /
        BS

        3
        needs this to inherit this for children
        .tt-query,
        .tt-hint {
            margin-bottom: 0;
        }

        .tt-dropdown-menu {
            z-index: @zindex-dropdown;
            min-width: 326px;
            padding: 5px 0;
            margin: 2px 0 0;
        / / override default ul font-size: @font-size-base;
            text-align: left;
        / / Ensures proper alignment if parent has it changed (e . g ., modal footer) background-color: @dropdown-bg;
            border: 1px solid @dropdown-fallback-border;
        / / IE8 fallback border: 1 px solid @dropdown-border;
            border-radius: @border-radius-base;
        . box-shadow(0 6 px 12 px rgba(0, 0, 0, .175));
            background-clip: padding-box;

        .tt-suggestions {

        .tt-suggestion {
            padding: 3px 12px;
            font-weight: normal;
            line-height: @line-height-base;
            color: @dropdown-link-color;
            white-space: nowrap;
        / / prevent links from randomly breaking onto new lines
        }

        .tt-suggestion.tt-cursor {
            color: @dropdown-link-hover-color;
            background-color: @dropdown-link-hover-bg;
        }

        .tt-suggestion p {
            margin: 0;
        }

        /*Small box*/
        /*span.twitter-typeahead
          width: 100%

        .tt-input
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075)

        .tt-menu
          @extend .list-group
          box-shadow: 0 5px 10px rgba(0,0,0,.2)
          width: 100%

        .tt-suggestion
          @extend .list-group-item

        .tt-selectable
          @extend .list-group-item-action*/

        .StripeElement {
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>

    <body>


    @include('sideNavBar')



    <!-- Main view -->
    <div class="view" style="margin-left: 14%;">
        <header class="bp-header cf" style="position: -ms-device-fixed; position: center; margin-bottom: -8%">

            <h1>Shopping Cart</h1>


        </header>
    </div>


    <!-- Product grid -->
    <section class="grid" style="margin-left: 14%;">
        <div class="container-fluid">

            <div class="starter-template" style="text-align: center; margin-left: 10%; margin-right: 10%;">
                @if(Session::has('cart'))


                    <button class="action action--button action--buy " disabled><span
                                class="product__price highlight ">Total Item : {{$totalQuantity}}</span></button>


                    <button class="action action--button action--buy "><span
                                class="product__price highlight">Total Price : $ {{$totalPrice}}</span></button>

                    <a href="{{route('cart.clear')}}" class="action action--button action--buy"><span
                                class="product__price highlight text-danger">Clear Cart</span>
                    </a>

                    <a href="{{route('checkout.index')}}">
                        <button class="action action--button action--buy "><span
                                    class="product__price highlight text-white">Checkout</span></button>
                    </a>
                    <br><br>
                    @include('partials.flash-message')
            </div>

        </div>
        <section class="grid">
            <!-- Products -->
            @foreach($products as $product)

                <div class="product">
                    <div class="product__info">


                        <img class="product__image" src="{{ asset('images/1.png') }}" alt="Product 1"
                             data-toggle="modal"
                             data-target="#prod_details" data-prodname="{{$product['item']['product_itemName']}}"
                             data-type="{{$product['item']['Listing_type']}}"
                             data-total_qty="{{ $product['item']['Listing_qty'] }} "
                             data-unit=" ${{number_format($product['item']['Listing_unitPrice'], 2) }}"
                             data-total="${{number_format($product['item']['Listing_totalPrice'], 2)}}"
                             data-expiry="{{ $product['item']['Listing_expiry'] }}"
                             data-vintage="{{ $product['item']['Listing_vintage'] }}"
                             data-condition="{{ $product['item']['Listing_condition'] }}" onmouseover=""
                             style="cursor: pointer;"/>


                        <h6 class="product__name highlight"
                            style="color: white">{{$product['item']['product_itemName']}}</h6>
                        <br>
                        <h6 class="product__quantity highlight" style="color: green"> IN STOCK
                            - {{$product['item']['Listing_qty']}} bottles</h6>

                        <span class="product__price extra highlight">Type - {{$product['item']['Listing_type']}} </span>
                        <span class="product__price extra highlight">Unit Price - {{$product['item']['Listing_unitPrice']}} </span>
                        <span class="product__price extra highlight">Expiry - {{$product['item']['Listing_expiry']}} </span>
                        <span class="product__price extra highlight">Vintage - {{$product['item']['Listing_vintage']}} </span>
                        <span class="product__price extra highlight">Condition - {{$product['item']['Listing_condition']}} </span>
                        <span class="product__price highlight"> Price : $ {{$product['item']['Listing_unitPrice']}}
                            each</span>
                        <form method="post" action="{{ URL::to('/updateItem')}}" id="cart-qty-form">
                            {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                        <span class="product__price highlight input-group-text"
                                        > Quantity</span>
                                </div>

                                <input type="hidden" name="cart-id" value="{{$product['item']['id']}}">
                                <input class="cart-item-qty product__price highlight input-group form-control text-center h-40"
                                       min="1" max="{{$product['item']['Listing_qty']}}" type="number"
                                       name="cart-item-qty"
                                       value="{{$product['Listing_qty']}}" id="cart-item-id"
                                       placeholder="{{$product['Listing_qty']}}" required></div>


                            <button class="action action--button action--buy" type="submit"><i
                                        class="fas fa-redo"></i><span
                                        class="action__text">Update Quantity</span></button>

                        </form>

                        <a href="{{route('cart.remove',['id' => $product['item']['id']])}}">
                            <button class="action action--button action--buy"><i
                                        class="fa fa-ban"></i><span
                                        class="action__text">Remove</span></button>
                        </a>


                    </div>

                </div>
            @endforeach

            @else
                @include('partials.flash-message')

            @endif


        </section>

        <div class="modal fade" id="prod_details" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Modal title</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                        <span aria-hidden="true">&times;</span>

                    </div>
                    <div class="modal-body table-responsive">


                        <table class="table table-dark">

                            <tr>
                                <td><label>Product Type: </label></td>
                                <td><input type="text" id="type"
                                           style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                           readonly></td>
                            </tr>

                            <tr>

                                <td><label>Total Quantity: </label></td>
                                <td><input type="text" id="tqty"
                                           style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                           readonly></td>
                            </tr>

                            <tr>
                                <td><label>Unit Price: </label></td>
                                <td><input type="text" id="unitPrice"
                                           style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                           readonly></td>
                            </tr>

                            <tr>
                                <td><label>Total Price: </label></td>
                                <td><input type="text" id="totalPrice"
                                           style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                           readonly></td>
                            </tr>

                            <tr>
                                <td><label>Expiry: </label></td>
                                <td><input type="text" id="expiry"
                                           style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                           readonly></td>
                            </tr>

                            <tr>
                                <td><label>Vintage: </label></td>
                                <td><input type="text" id="vintage"
                                           style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                           readonly></td>
                            </tr>

                            <tr>
                                <td><label>Condition: </label></td>
                                <td><input type="text" id="condition"
                                           style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                           readonly></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <form action="{{ route('cart.checkout') }}" method="post" id="pa-form">
                        {{ csrf_field() }}
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Payment
                                Form</h5>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="modal-body table-responsive">


                            <table class="table table-dark">

                                <tr>
                                    <div class="form-group">
                                        <td><label for="email">Email: </label></td>
                                        <td><input type="email" id="email" name="email" class="form-control"
                                                   required></td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="form-group">
                                        <td><label for="card-name">Card Holder Name: </label></td>
                                        <td><input type="text" id="card-name" name="card-name" class="form-control"
                                                   required></td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="form-group">
                                        <td><label for="address">Address: </label></td>
                                        <td><input type="text" id="address" class="form-control form-control-lg"
                                                   required
                                                   name="address"></td>
                                    </div>
                                </tr>


                                <tr>
                                    <div class="form-group">
                                        <td><label for="card-number">Credit Card Number: </label></td>
                                        <td><input type="text" id="card-number" name="card-number"
                                                   class="form-control" required></td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="form-group">
                                        <td><label for="card-expiry-month">Expiration Month: </label></td>
                                        <td><input type="text" id="card-expiry-month" name="card-expiry-month"
                                                   class="form-control" required>
                                        </td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="form-group">
                                        <td><label for="card-expiry-year">Expiration Year: </label></td>
                                        <td><input type="text" id="card-expiry-year" name="card-expiry-year"
                                                   class="form-control" required>
                                        </td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="form-group">
                                        <td><label for="card-ccv">CVC: </label></td>
                                        <td><input type="text" id="card-cvc" name="card-cvc" class="form-control"
                                                   required></td>
                                    </div>
                                </tr>

                                <tr>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>

                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-group-lg"
                                    style="background-color: rgba(211, 188, 63); border-color: rgba(211, 188, 63);">
                                Submit Payment
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </section>


    <script type="text/javascript">
        $('#prod_details').on('show.bs.modal', function (event) {


            var button = $(event.relatedTarget) // Button that triggered the modal
            var name = button.data('prodname') // Extract info from data-* attributes
            var type = button.data('type')
            var tqty = button.data('total_qty')
            var unitPrice = button.data('unit')
            var totalPrice = button.data('total')
            var expiry = button.data('expiry')
            var vintage = button.data('vintage')
            var condition = button.data('condition')

            var modal = $(this)

            modal.find('.modal-title').text(name)
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #tqty').val(tqty);
            modal.find('.modal-body #unitPrice').val(unitPrice);
            modal.find('.modal-body #totalPrice').val(totalPrice);
            modal.find('.modal-body #expiry').val(expiry);
            modal.find('.modal-body #vintage').val(vintage);
            modal.find('.modal-body #condition').val(condition);
        })
    </script>

    <script type="text/javascript">

        $('#checkout').on('show.bs.modal', function (event) {


            var button = $(event.relatedTarget) // Button that triggered the modal
            var totalQty = button.data('totalQty') // Extract info from data-* attributes
            var totalPrice = button.data('totalPrice')

            var modal = $(this)

            modal.find('.modal-title #totalQty').text(totalQty)
            modal.find('.modal-body #totalPrice').val(totalPrice);

        })
    </script>

    <script>
        $("#cart-qty-form").validate();
    </script>

    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_Ekz2ZwPAxCeRnHSoRTFTzBVp');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
    </script>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>

    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>

    </body>

