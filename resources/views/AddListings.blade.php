@include('layouts.store')
@section('title')
    <title>Bootlegged - Add Listing</title>
@section('content')
    @include('sideNavBar')

    <div class="container" style="margin-left: 35%;">
        <div class="view">
            <!-- Blueprint header -->
            <header class="bp-header cf" style="margin-left: -20%;">

                <h1 style="color:black">Add Product</h1>
                @if(session()->has('message'))
                    <div class="alert alert-info alert-dismissable">

                        <i class="fa fa-coffee"></i>
                        <strong>MESSAGE : </strong> {{ session()->get('message') }}
                    </div>

                @endif
            </header>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div style="color: black;">
                <form action="/create" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group row">
                        <label for="producttype" style="color:black" class="col-4 col-form-label">Product Name</label>
                        <div class="col-3">

                            <div class="starter-template" style="align-text:center">

                                @if($product_type[0] == '')
                                    <input type="text" style="width:227px;" name="productname"
                                           class="typeahead form-control" id="search"
                                           placeholder="Search by product Name" autocomplete="on" required="required">
                                @else
                                    <input type="text" style="width:227px;" name="productname"
                                           class="typeahead form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           id="search" placeholder="Search by product Name" autocomplete="on"
                                           required="required" value="{{$product_name[0]}}">
                                    @if ($errors->has('productname'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('productname') }}</strong>
                                        </div>
                                    @endif
                                @endif

                                <p style="color:black; font-size : 12px;">Cant find your product? Please <a
                                            style="color:blue;" href="/newprod">add</a> here.</p>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="producttype" style="color:black" class="col-4 col-form-label">Product type</label>
                        <div class="col-3">
                            @if($product_type[0] == '')
                                <input id="producttype" required="required" name="producttype" type="text"
                                       class="form-control here" readonly>
                            @else
                                <input id="producttype" required="required" name="producttype" type="text"
                                       class="form-control here" value="{{$product_type[0]}}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_quantity" style="color:black" class="col-4 col-form-label">Product
                            Quantity</label>
                        <div class="col-3">
                            @if($product_quantity[0] == '')
                                <input id="product_quantity" oninput='myFunction()' required="required"
                                       name="product_quantity" type="number" value="{{old('product_quantity')}}"
                                       class="form-control here" required>
                            @else
                                <input id="product_quantity" oninput='myFunction()' required="required"
                                       name="product_quantity" type="number" value="{{$product_quantity}}"
                                       class="form-control here" required>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unitprice" style="color:black" class="col-4 col-form-label">Product Unit
                            Price</label>
                        <div class="col-3">
                            @if($costprice[0] == '')
                                <input id="unitprice" oninput='myFunction()' required="required" name="unitprice"
                                       value="{{old('unitprice')}}" type="text" class="form-control here" required>
                            @else
                                <input id="unitprice" oninput='myFunction()' required="required" name="unitprice"
                                       value="{{$costprice}}" type="text" class="form-control here" required>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="totalprice" style="color:black" class="col-4 col-form-label">Product Total
                            Price</label>
                        <div class="col-3">
                            <input id="totalprice" required="required" name="totalprice" value="{{old('totalprice')}}"
                                   type="text" class="form-control here" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expiry" style="color:black" class="col-4 col-form-label">Product Expiry</label>
                        <div class="col-3">
                            <input id="expiry" name="expiry" type="text" value="{{old('expiry')}}"
                                   class="form-control here{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="YYYY-MM-DD">
                            @if ($errors->has('expiry'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('expiry') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vintage" style="color:black" class="col-4 col-form-label">Vintage</label>
                        <div class="col-3">
                            <input id="vintage" name="vintage" type="text" class="form-control here"
                                   value="{{old('vintage')}}" placeholder="eg. 20 Years">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="condition" style="color:black" class="col-4 col-form-label">Product
                            Condition</label>
                        <div class="col-3">
                            <input id="condition" required="required" value="{{old('condition')}}" name="condition"
                                   type="text" class="form-control here">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="productimage" style="color:black" class="col-4 col-form-label">Product Image</label>
                        <div class="col-3">
                            <input id="productimage" name="productimage" type="file"
                                   class="form-control here {{ $errors->has('email') ? ' is-invalid' : '' }}">
                            @if ($errors->has('productimage'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('productimage') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-3">
                            <button name="submit" type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '/user/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });

            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'product_itemName',
                source: bloodhound,
                display: function (data) {
                    return data.product_itemName  //Input value to be set when you select a suggestion. 
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        // return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.product_itemName + '</div></div>'

                        return '<a href="/autofill/' + data.product_id + '"><div style="font-weight:normal; margin-top:-10px ! important; color:black;" class="list-group-item">' + data.product_itemName + '</div></a></div>'
                    }
                }
            });
        });
    </script>
    <script>

        window.onload = function () {
            var unit = document.getElementById("unitprice").value;
            var quan = document.getElementById("product_quantity").value;
            var unit1 = Number(unit);

            var totalprice = Math.round((unit1 * quan) * 100) / 100;

            document.getElementById("totalprice").value = totalprice;
        };


        document.getElementById("unitprice").oninput = function () {
            myFunction();
        }

        document.getElementById("product_quantity").oninput = function () {
            myFunction();
        }

        function myFunction() {
            var unit = document.getElementById("unitprice").value;
            var quan = document.getElementById("product_quantity").value;
            var unit1 = Number(unit);

            var totalprice = Math.round((unit1 * quan) * 100) / 100;

            document.getElementById("totalprice").value = totalprice;
        }


    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>


