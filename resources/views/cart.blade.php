@include('layouts.store')
@section('title', 'Cart')
@section('content')
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

                    <div class="row">
                        <div class="col-md-12">
                            <button class="action action--button action--buy " disabled><span
                                        class="product__price highlight ">Total Item : {{$totalQuantity}}</span>
                            </button>

                            <button class="action action--button action--buy "><span
                                        class="product__price highlight">Total Price : $ {{$totalPrice}}</span></button>

                            <a href="{{route('cart.clear')}}" class="action action--button action--buy"><span
                                        class="product__price highlight text-danger">Clear Cart</span></a>

                            <form action="{{route('checkout.final')}}" class="from stripe-form">
                                {{ csrf_field() }}
                                <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key={{env('STRIPE_KEY')}}
                                        data-currency="AUD"
                                        data-amount={{$totalPrice*100}}
                                                data-name="Bootlegged.com.au"
                                        data-description="Pay"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-zip-code="false">
                                </script>
                                <script>

                                    document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                                </script>
                                <button class="action action--button action--buy "><span
                                            class="product__price highlight text-white">Checkout</span></button>
                            </form>
                        </div>

                    </div>

                    <br><br>
                    @include('partials.flash-message')
            </div>

        </div>
        <section class="grid">
            <!-- Products -->
            @foreach($products as $product)

                <div class="product">
                    <div class="product__info">
                        @if($product['item']->image != '')
                            <img src="{{url('storage/'.$product['item']->image)}}" class="product__image"
                            />
                        @else
                            <img class="product__image" src="{{ asset('Images/1.png') }}" alt="Product 1"
                            />
                        @endif


                        <h6 class="product__name highlight"
                            style="color: white">{{$product['item']['product_itemName']}}</h6>
                        <br>
                        <h6 class="product__quantity highlight" style="color: green"> IN STOCK
                            : {{$product['item']['Listing_qty']}} bottles</h6>

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
                    <label class="action action--compare-add" data-toggle="modal"
                           data-target="#prod_details" data-prodname="{{$product['item']['product_itemName']}}"
                           data-type="{{$product['item']['Listing_type']}}"
                           data-total_qty="{{ $product['item']['Listing_qty'] }} "
                           data-unit=" ${{number_format($product['item']['Listing_unitPrice'], 2) }}"
                           data-total="${{number_format($product['item']['Listing_totalPrice'], 2)}}"
                           data-expiry="{{ $product['item']['Listing_expiry'] }}"
                           data-vintage="{{ $product['item']['Listing_vintage'] }}"
                           data-condition="{{ $product['item']['Listing_condition'] }}" onmouseover=""
                           style="cursor: pointer;">
                        <i class="fas fa-info-circle"></i>
                    </label>
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
