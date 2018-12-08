<!-- @extends('layouts.app')
@section('content')
    -->
    <!DOCTYPE html>
    <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootlegged - My Listings</title>
        <meta name="description"
              content="Blueprint: A basic responsive product grid layout with comparison functionality"/>
        <meta name="keywords"
              content="blueprint, template, html, css, javascript, grid, layout, effect, product comparison"/>
        <meta name="author" content="Codrops"/>
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css"/>
        <link rel="stylesheet" type="text/css" href="css/component.css"/>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <!-- Modernizr is used for flexbox fallback -->
        <script src="js/modernizr.custom.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
    </head>
    <style>


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
    <body>
    @include('sideNavBar')


    <!-- Main view -->
    <div class="view">
        <!-- Blueprint header -->
        <div class="view" style="margin-left: 14%;">
            <!-- Blueprint header -->
            <header class="bp-header cf">

                <h1>My Listings</h1>

            </header>
            <!-- Product grid -->
            <section class="grid">
                <section class="grid">
                    <!-- Products -->

                    @foreach($products as $item)

                        <div class="product">
                            <div class="product__info">
                                @if($item->image != '')

                                    <img src="{{url('storage/'.$item->image)}}" class="product__image"/>

                                @else
                                    <img class="product__image" src="{{ asset('Images/1.png') }}" alt="Product 1"
                                         style="height: 160px; width: 160px;"/>

                                @endif
                                <h6 class="product__price highlight"
                                    style="color: white">{{$item->product_itemName}}</h6><br>
                                <h6 class="product__price highlight" style="color: white">Quantity
                                    - {{$item->Listing_qty}}</h6>
                                <span class="product__price extra highlight">Type - {{$item->Listing_type}} </span>
                                <span class="product__price extra highlight">Unit Price - {{$item->Listing_unitPrice}} </span>
                                <span class="product__price extra highlight">Expiry - {{$item->Listing_expiry}} </span>
                                <span class="product__price extra highlight">Vintage - {{$item->Listing_vintage}} </span>
                                <span class="product__price extra highlight">Condition - {{$item->Listing_condition}} </span>
                                <span class="product__price highlight"> Price : $ {{number_format($item->Listing_totalPrice, 2)}}</span>
                                <button class="action action--button action--buy" data-toggle="modal"
                                        data-target="#remove" data-listid="{{$item->id}}" data-prodId="{{$item->id}}"
                                        onmouseover="" style="cursor: pointer;" style="width:auto;"><i
                                            class="fa fa-check"></i><span class="action__text" style="width: 80px;">Remove</span>
                                </button>

                                <button class="action action--button action--buy" data-toggle="modal" id="updatebutton"
                                        data-target="#update" data-prodname="{{$item->product_itemName}}"
                                        data-type="{{$item->Listing_type}}" data-total_qty="{{ $item->Listing_qty }} "
                                        data-prodId="{{$item->id}}" data-listid="{{$item->id}}"
                                        data-unit="{{number_format($item->Listing_unitPrice, 2) }}"
                                        data-total="{{number_format($item->Listing_totalPrice, 2)}}"
                                        data-expiry="{{ $item->Listing_expiry }}"
                                        data-vintage="{{ $item->Listing_vintage }}"
                                        data-condition="{{ $item->Listing_condition }}"
                                        data-status="{{$item->Listing_active }}" onmouseover="" style="cursor: pointer;"
                                        style="width:auto;"><i class="fa fa-check"></i><span class="action__text">Edit Details</span>
                                </button>
                            </div>

                        </div>

                    @endforeach

                </section>
        </div><!-- /view -->


        <!-- product compare wrapper -->

        <!-- Modal View for Edit -->
        <div class="modal fade{{ $errors->has('update') ? ' is-invalid' : '' }}" id="update" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Modal title</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body table-responsive">
                        <form action="{{URL::to('update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @include('modalTable')
                            <input type="hidden" id="prodId" name="prodId" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="submit" id="submit" onclick="submitfun()" class="btn btn-primary"
                                style="background-color: rgba(211, 188, 63); border-color: rgba(211, 188, 63);"><i
                                    class="fa fa-check"></i>Save
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal View for Remove-->
    <div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Delete Product</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <form action="{{URL::to('removeproduct')}}" method="post">

                        {{csrf_field()}}
                        <p class="text-center" style="color: white;">
                            Are you sure you want to delete this?</p>
                        <input type="hidden" id="prodId" name="prodId" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>

                    <button type="submit" class="btn btn-primary"
                            style="background-color: rgba(211, 188, 63); border-color: rgba(211, 188, 63);"><i
                                class="fa fa-check"></i>Yes, Delete
                    </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>


    <script type="text/javascript">
        $('#update').on('show.bs.modal', function (event) {


            var button = $(event.relatedTarget) // Button that triggered the modal
            var name = button.data('prodname') // Extract info from data-* attributes
            var type = button.data('type')
            var tqty = button.data('total_qty')
            var unitPrice = button.data('unit')
            var totalPrice = button.data('total')
            var expiry = button.data('expiry')
            var vintage = button.data('vintage')
            var condition = button.data('condition')
            var status = button.data('status')
            var id = button.data('listid')

            var modal = $(this)

            modal.find('.modal-title').text(name);
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #tqty').val(tqty);
            modal.find('.modal-body #unitPrice').val(unitPrice);
            modal.find('.modal-body #totalPrice').val(totalPrice);
            modal.find('.modal-body #expiry').val(expiry);
            modal.find('.modal-body #vintage').val(vintage);
            modal.find('.modal-body #condition').val(condition);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #prodId').val(id);
        })


    </script>

    <script>
        //Unit Price Validation
        document.getElementById("unitPrice").onblur = function () {
            var unit = document.getElementById("unitPrice").value;
            var str = unit.toString();
            if (!unit.match(/^-?[0-9]*[.][0-9]+$/)) {

                document.getElementById("up").innerHTML = "Invalid Unit Price";
                document.getElementById("up").style.color = "Red";
                document.getElementById("submit").disabled = true;
            } else {
                document.getElementById("up").innerHTML = null;
                document.getElementById("submit").disabled = false;
            }
            myFunction()
        };


        //Total Quantity Validation
        document.getElementById("tqty").onblur = function () {
            var quan = document.getElementById("tqty").value;
            var str = quan.toString();
            if (!str.match(/^[0-9]*$/)) {

                document.getElementById("tq").innerHTML = "Invalid Total Quantity";
                document.getElementById("tq").style.color = "Red";
                document.getElementById("submit").disabled = true;
            } else {
                document.getElementById("tq").innerHTML = null;
                document.getElementById("submit").disabled = false;
            }

            myFunction()
        };

        //To Validate Expiry Date
        document.getElementById("expiry").onblur = function () {
            var selectedText = document.getElementById('expiry').value;
            var str = selectedText.toString();
            var selectedDate = new Date(selectedText);
            var now = new Date();
            if (selectedDate < now) {
                document.getElementById("ex").innerHTML = "Expiry Date cant be in past";
                document.getElementById("ex").style.color = "Red";
                document.getElementById("submit").disabled = true;
            } else {
                document.getElementById("ex").innerHTML = null;
                document.getElementById("submit").disabled = false;
            }

        }

        //Calculate Total Price
        function myFunction() {
            var unit = document.getElementById("unitPrice").value;
            var quan = document.getElementById("tqty").value;
            var unit1 = Number(unit);

            var totalprice = Math.round((unit1 * quan) * 100) / 100;

            document.getElementById("totalPrice").value = totalprice;
        }

        //Validating onSubmit.
        function submitfun() {
            var unit = document.getElementById("unitPrice").value;
            var str = unit.toString();
            if (!unit.match(/^-?[0-9]*[.][0-9]+$/)) {
                document.getElementById("up").innerHTML = "Invalid Unit Price";
                document.getElementById("up").style.color = "Red";

            } else {
                document.getElementById("up").innerHTML = null;

            }


            var quan = document.getElementById("tqty").value;
        }


    </script>
    <script type="text/javascript">
        $('#remove').on('show.bs.modal', function (event) {


            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('listid') // Extract info from data-* attributes

            var modal = $(this)

            modal.find('.modal-body #prodId').val(id);

        })
    </script>

    <div class="pagination">
        {{ $products->links() }}
    </div>
    </body>
    </html>
