@include('layouts.store')
@section('title')
    <title>Bootlegged - New Product</title>

<style>


    form {
        padding-top: 80px;
        padding-left: 300px;
    }


</style>
@include('sideNavBar')

@section('content')
    <body>


    <div class="view" style="margin-left: 14%;">
        <!-- Blueprint header -->
        <header class="bp-header cf">

            <h1 style="color:black">Enter New Product Details</h1>
            @if(session()->has('message'))
                <div class="alert alert-info alert-dismissable">

                    <i class="fa fa-coffee"></i>
                    <strong>MESSAGE : </strong> {{ session()->get('message') }}
                </div>

            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </header>
        <div style="margin-top: -50px;">
            <form action="/createnewprod" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group row">
                    <label for="producttype" style="color:black" class="col-4 col-form-label">Product Name</label>
                    <div class="col-3">
                        <input type="text" name="productname"
                               class="typeahead form-control {{ $errors->has('productname') ? ' is-invalid' : '' }}"
                               id="search" placeholder="eg.name ml nos" required="required"
                               value="{{old('productname')}}">

                    </div>
                    @if ($errors->has('productname'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('productname') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="producttype" style="color:black" class="col-4 col-form-label">Product type</label>
                    <div class="col-3">
                        <select id="producttype" style="width:287px;" name="producttype" value="{{old('producttype')}}"
                                class="custom-select">
                            <option value="Red Wine">Red Wine</option>
                            <option value="White Wine">White Wine</option>
                            <option value="Cider">Cider</option>
                            <option value="Beer">Beer</option>
                            <option value="Spirits">Spirits</option>
                            <option value="Sparkling">Sparkling</option>
                            <option value="Pre-Mixed">Pre-Mixed</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_brand" style="color:black" class="col-4 col-form-label">Product Brand</label>
                    <div class="col-3">
                        <input id="product_brand" required="required" value="{{old('product_brand')}}"
                               name="product_brand" type="text" class="form-control here" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_subbrand" style="color:black" class="col-4 col-form-label">Product Sub
                        Brand</label>
                    <div class="col-3">
                        <input id="product_subbrand" required="required" value="{{old('product_subbrand')}}"
                               name="product_subbrand" type="text" class="form-control here" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_packname" style="color:black" class="col-4 col-form-label">Product Package
                        Name</label>
                    <div class="col-3">
                        <input id="product_packname" required="required" value="{{old('product_packname')}}"
                               name="product_packname" type="text" class="form-control here" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_quantity" style="color:black" class="col-4 col-form-label">Product
                        Quantity</label>
                    <div class="col-3">
                        <input id="product_quantity" required="required" value="{{old('product_quantity')}}"
                               name="product_quantity" type="number"
                               class="form-control here {{ $errors->has('product_quantity') ? ' is-invalid' : '' }}"
                               required>

                    </div>
                    @if ($errors->has('product_quantity'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('product_quantity') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="unitprice" style="color:black" class="col-4 col-form-label">Product Unit Price</label>
                    <div class="col-3">
                        <input id="unitprice" required="required" value="{{old('unitprice')}}" name="unitprice"
                               type="text" class="form-control here" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="totalprice" style="color:black" class="col-4 col-form-label">Product Total Price</label>
                    <div class="col-3">
                        <input id="totalprice" required="required" value="{{old('totalprice')}}" name="totalprice"
                               type="text" class="form-control here" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expiry" style="color:black" class="col-4 col-form-label">Product Expiry</label>
                    <div class="col-3">
                        <input id="expiry" name="expiry" type="text" value="{{old('expiry')}}"
                               class="form-control here {{ $errors->has('expiry') ? ' is-invalid' : '' }}">
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
                        <input id="vintage" name="vintage" value="{{old('vintage')}}" type="text"
                               class="form-control here">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="condition" style="color:black" class="col-4 col-form-label">Product Condition</label>
                    <div class="col-3">
                        <input id="condition" value="{{old('condition')}}" required="required" name="condition"
                               type="text" class="form-control here" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="condition" style="color:black" class="col-4 col-form-label">Barcode ID</label>
                    <div class="col-3">
                        <input id="barcodeid" value="{{old('barcodeid')}}" required="required" name="barcodeid"
                               type="number" class="form-control here" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="offset-4 col-3">
                        <button name="submit" type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>
    </body>
    </html>
