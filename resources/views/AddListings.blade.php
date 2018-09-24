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



		<!-- Modernizr is used for flexbox fallback -->
		<script src="js/modernizr.custom.js"></script>
	</head>

	<style>
body {margin: 0;

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
            <a href="#contact" style="color: white;">Opportunities</a>
            <hr style="border-style: groove;
              border-width: 1px;"> 
            <a href="#about" style="color: white;">Edit Profile</a>
            
            <a href="#contact" style="color: white;">My Cart</a>
            
            <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
</div>
<div>
  <form action = "/create" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
  <div class="form-group row">
    <label for="producttype" class="col-4 col-form-label">Product Type</label> 
    <div class="col-3">
      <div class="input-group">
        <input id="producttype" name="producttype" placeholder="------- Select Product Type -------" type="text" required="required" class="form-control here"> 
        <div class="input-group-addon append">
          <i class="fa fa-angle-down"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="product_quantity" class="col-4 col-form-label">Product Quantity</label> 
    <div class="col-3">
      <input id="product_quantity" required="required" name="product_quantity" type="text" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="unitprice" class="col-4 col-form-label">Product Unit Price</label> 
    <div class="col-3">
      <input id="unitprice" required="required" name="unitprice" type="text" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="totalprice" class="col-4 col-form-label">Product Total Price</label> 
    <div class="col-3">
      <input id="totalprice" required="required" name="totalprice" type="text" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="expiry" class="col-4 col-form-label">Product Expiry</label> 
    <div class="col-3">
      <input id="expiry" name="expiry" type="text" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="vintage" class="col-4 col-form-label">Vintage</label> 
    <div class="col-3">
      <input id="vintage" name="vintage" type="text" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="condition" class="col-4 col-form-label">Product Condition</label> 
    <div class="col-3">
      <input id="condition"  required="required" name="condition" type="text" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Product active</label> 
    <div class="col-3">
      <select id="select" name="select" class="custom-select">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-3">
      <button name="submit" type="submit" class="btn btn-primary">Add Product</button>
    </div>
  </div>
  
</form>

</div>
	</body>
</html>
