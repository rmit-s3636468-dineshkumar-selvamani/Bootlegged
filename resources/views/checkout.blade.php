@extends('layouts.store')
@section('content')
    <header>
        <script src="https://checkout.stripe.com/checkout.js"></script>
    </header>
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


    @include('sideNavBar')



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
                            class="product__price highlight ">Total Item : {{$totalQuantity}}</span></button>


                <button class="action action--button action--buy "><span
                            class="product__price highlight">Total Price : $ {{$totalPrice}}</span></button>


                <a href="{{route('cart.index')}}">
                    <button class="action action--button action--buy "><span
                                class="product__price highlight text-white">Back to Cart</span></button>
                </a>
                <br><br>
                @include('partials.flash-message')
            </div>

        </div>
        <section class="grid">
            <!-- Products -->

                <form action="/checkoutIndex" method="POST">
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
                            data-amount={{$totalPrice*100}}
                            data-name="Bootlegged.com.au"
                            data-description="Widget"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-zip-code="false">
                    </script>
                </form>
            </div>
        </section>


    </section>


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

