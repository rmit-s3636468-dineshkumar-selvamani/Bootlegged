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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->

    <!-- Import typeahead.js -->
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
 

		<!-- Modernizr is used for flexbox fallback -->
		<script src="js/modernizr.custom.js"></script>
	</head>

	<style>
body {margin: 0;
background-color: white;
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

form{
  padding-top: 80px;
  padding-left: 300px;
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
span.twitter-typeahead
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
  @extend .list-group-item-action



</style>	

	<body>

		
    <div class="sidebar">
  <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">
  <a  href="#home" style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>
   
  @if( Auth::user()->type == 'StoreOwner')
  <a  href="/home" style="color: white;">Market Place</a>
   @endif
  <a href="/mylistings" style="color: white;">My Listing</a>
  <a href="/uploadchoose" class="active">Add Listing</a>
  <a href="/history" style="color: white;">History</a>
  <a href="slowstock" style="color: white;">Slow Movers</a>
  <a href="#contact" style="color: white;">Opportunities</a>
  <hr style="border-style: groove;
    border-width: 1px;"> 
  <a href="/editProfile" style="color: white;">Edit Profile</a>
  
  <a href="#contact" style="color: white;">My Cart</a>
  
  <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
</div>
<div>
  <div class="view" style="margin-left: 14%;">
      <!-- Blueprint header -->
      <header class="bp-header cf">
        
        <h1 style = "color:black">Enter New Product Details</h1>
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
  <form action = "/createnewprod" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
  <div class="form-group row">
    <label for="producttype" style = "color:black" class="col-4 col-form-label">Product Name</label> 
    <div class="col-3"> 
        <input type="text"  name="productname" class="typeahead form-control {{ $errors->has('productname') ? ' is-invalid' : '' }}" id="search" placeholder="eg.name ml nos" required="required" value="{{old('productname')}}" >  

    </div>
     @if ($errors->has('productname'))
                                     <div class="alert alert-danger">
                                        <strong>{{ $errors->first('productname') }}</strong>
                                    </div>
                                @endif
  </div>
  <div class="form-group row">
    <label for="producttype"  style = "color:black" class="col-4 col-form-label">Product type</label> 
    <div class="col-3">
      <select id="producttype" style="width:287px;" name="producttype" value="{{old('producttype')}}" class="custom-select">
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
    <label for="product_brand" style = "color:black" class="col-4 col-form-label">Product Brand</label> 
    <div class="col-3">
      <input id="product_brand" required="required" value="{{old('product_brand')}}" name="product_brand" type="text" class="form-control here" required>
    </div>
  </div>
   <div class="form-group row">
    <label for="product_subbrand" style = "color:black" class="col-4 col-form-label">Product Sub Brand</label> 
    <div class="col-3">
      <input id="product_subbrand" required="required" value="{{old('product_subbrand')}}" name="product_subbrand" type="text" class="form-control here" required>
    </div>
  </div>
<div class="form-group row">
    <label for="product_packname" style = "color:black" class="col-4 col-form-label">Product Package Name</label> 
    <div class="col-3">
      <input id="product_packname" required="required" value="{{old('product_packname')}}" name="product_packname" type="text" class="form-control here" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="product_quantity" style = "color:black" class="col-4 col-form-label">Product Quantity</label> 
    <div class="col-3">
      <input id="product_quantity" required="required" value="{{old('product_quantity')}}" name="product_quantity" type="number" class="form-control here {{ $errors->has('product_quantity') ? ' is-invalid' : '' }}" required>

    </div>
     @if ($errors->has('product_quantity'))
                                     <div class="alert alert-danger">
                                        <strong>{{ $errors->first('product_quantity') }}</strong>
                                    </div>
                                @endif
  </div>
  <div class="form-group row">
    <label for="unitprice" style = "color:black" class="col-4 col-form-label">Product Unit Price</label> 
    <div class="col-3">
      <input id="unitprice" required="required" value="{{old('unitprice')}}" name="unitprice" type="text" class="form-control here" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="totalprice" style = "color:black" class="col-4 col-form-label">Product Total Price</label> 
    <div class="col-3">
      <input id="totalprice" required="required"  value="{{old('totalprice')}}" name="totalprice" type="text" class="form-control here" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="expiry" style = "color:black" class="col-4 col-form-label">Product Expiry</label> 
    <div class="col-3">
      <input id="expiry" name="expiry" type="text" value="{{old('expiry')}}" class="form-control here {{ $errors->has('expiry') ? ' is-invalid' : '' }}">
      @if ($errors->has('expiry'))
                                     <div class="alert alert-danger">
                                        <strong>{{ $errors->first('expiry') }}</strong>
                                    </div>
                                @endif
    </div>
     
  </div>
  <div class="form-group row">
    <label for="vintage" style = "color:black" class="col-4 col-form-label">Vintage</label> 
    <div class="col-3">
      <input id="vintage" name="vintage" value="{{old('vintage')}}" type="text" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="condition" style = "color:black" class="col-4 col-form-label">Product Condition</label> 
    <div class="col-3">
      <input id="condition"  value="{{old('condition')}}" required="required" name="condition" type="text" class="form-control here" required>
    </div>
  </div>
   <div class="form-group row">
    <label for="condition" style = "color:black" class="col-4 col-form-label">Barcode ID</label> 
    <div class="col-3">
      <input id="barcodeid" value="{{old('barcodeid')}}" required="required" name="barcodeid" type="number" class="form-control here" required>
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


   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>
