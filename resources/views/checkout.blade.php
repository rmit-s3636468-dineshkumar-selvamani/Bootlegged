@extends('layouts.store')
@section('content')

    <style>

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

<div class="sidebar">
  <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">
  <a  href="#home" style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>
   
  @if( Auth::user()->type == 'StoreOwner')
  <a  href="/home" style="color: white;">Market Place</a>
   @endif
  <a href="/mylistings" style="color: white;">My Listing</a>
  <a href="/uploadchoose">Add Listing</a>
  <a href="/history" style="color: white;">History</a>
        @if( Auth::user()->type == 'StoreOwner')
            <a href="slowstock" style="color: white;">Slow Movers</a>
            <a href="opportunities" style="color: white;">Opportunities</a>
        @endif

  <hr style="border-style: groove;
    border-width: 1px;"> 
  <a href="/editProfile" style="color: white;">Edit Profile</a>
  @if( Auth::user()->type == 'StoreOwner')
  <a href="/cart" style="color: white;" class="active">My Cart <span class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span></a>
  @endif
  <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
</div>

    <!-- Main view -->
    <div class="view" style="margin-left: 14%;">
        <header class="bp-header cf" style="position: -ms-device-fixed; position: center; margin-bottom: -8%">

            <h1>Checkout Page</h1>


        </header>
    </div>


    <!-- Product grid -->
    <section class="grid" style="margin-left: 14%;">
        <div class="container-fluid">

            <div class="starter-template" style="text-align: center; margin-left: 10%; margin-right: 10%;">


                    <button class="action action--button action--buy " disabled><span
                                class="product__price highlight ">Total Item : X</span></button>


                    <button class="action action--button action--buy "><span
                                class="product__price highlight">Total Price : $ X</span></button>

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


            <div class="col-md-6 col-md-offset-3">
                <h1>Payment Form</h1>
                <div class="spacer"></div>

                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('/checkout') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                    </div>



                    <div class="form-group">
                        <label for="card-element">Credit Card</label>
                        <div id="card-element">
                            <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <div class="spacer"></div>

                    <button type="submit" class="btn btn-success">Submit Payment</button>
                </form>
            </div>
        </section>


        </section>


        <script>
            (function(){
                // Create a Stripe client
                var stripe = Stripe('{{config('services.stripe.key')}}');
                (
                // Create an instance of Elements
                var elements = stripe.elements();

                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                    base: {
                        color: '#32325d',
                        lineHeight: '18px',
                        fontFamily: '"Raleway", Helvetica, sans-serif',
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

                // Create an instance of the card Element
                var card = elements.create('card', {
                    style: style,
                    hidePostalCode: true
                });

                // Add an instance of the card Element into the `card-element` <div>
                card.mount('#card-element');

                // Handle real-time validation errors from the card Element.
                card.addEventListener('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });

                // Handle form submission
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    var options = {
                        name: document.getElementById('name_on_card').value,
                    }

                    stripe.createToken(card, options).then(function(result) {
                        if (result.error) {
                            // Inform the user if there was an error
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            // Send the token to your server
                            stripeTokenHandler(result.token);
                        }
                    });
                });

                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                }
            })();
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

