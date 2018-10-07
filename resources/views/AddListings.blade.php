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
		<link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}" />



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
        
        <h1 style = "color:black">Add Product</h1>
         @if(session()->has('message'))
                 <div class="alert alert-info alert-dismissable">
             
            <i class="fa fa-coffee"></i>
            <strong>MESSAGE : </strong> {{ session()->get('message') }}
          </div>
   
@endif
      </header>

     
      <div style="margin-top: -50px; color: black;">
  <form action = "/create" method = "post" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
  <div class="form-group row">
    <label for="producttype" style = "color:black" class="col-4 col-form-label">Product Name</label> 
    <div class="col-3">
      
        <div class="starter-template" style="align-text:center">
       @if($product_type[0] == '')
        <input type="text" style="width:227px;" name="productname"  class="typeahead form-control" id="search" placeholder="Search by product Name" autocomplete="on" required="required">
        @else
         <input type="text" style="width:227px;" name="productname"  class="typeahead form-control" id="search" placeholder="Search by product Name" autocomplete="on" required="required" value="{{$product_name[0]}}">
         @endif
        <p style = "color:black; font-size : 12px;">Cant find your product? Please <a style = "color:blue;" href="/newprod" >add</a> here.</p>
        
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="producttype"  style = "color:black" class="col-4 col-form-label">Product type</label> 
    <div class="col-3">
     <!--  <select id="producttype" style="width:287px;" name="producttype" class="custom-select">
        <option value="Red Wine">Red Wine</option>
        <option value="White Wine">White Wine</option>
        <option value="Cider">Cider</option>
        <option value="Beer">Beer</option>
        <option value="Spirits">Spirits</option>
        <option value="Sparkling">Sparkling</option>
        <option value="Pre-Mixed">Pre-Mixed</option>
      </select> -->
      @if($product_type[0] == '')
           <input id="producttype" required="required" name="producttype" type="text" class="form-control here" readonly>
      @else
        <input id="producttype" required="required" name="producttype" type="text" class="form-control here" value="{{$product_type[0]}}" readonly>
      @endif
    </div>
  </div> 
  <div class="form-group row">
    <label for="product_quantity" style = "color:black" class="col-4 col-form-label">Product Quantity</label> 
    <div class="col-3">
      <input id="product_quantity" required="required" name="product_quantity" type="number" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="unitprice" style = "color:black" class="col-4 col-form-label">Product Unit Price</label> 
    <div class="col-3">
      <input id="unitprice" required="required" name="unitprice" type="number" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="totalprice" style = "color:black" class="col-4 col-form-label">Product Total Price</label> 
    <div class="col-3">
      <input id="totalprice" required="required" name="totalprice" type="number" class="form-control here">
    </div>
  </div>
  <div class="form-group row">
    <label for="expiry" style = "color:black" class="col-4 col-form-label">Product Expiry</label> 
    <div class="col-3">
      <input id="expiry" name="expiry" type="text" class="form-control here" placeholder="YYYY-MM-DD">
    </div>
  </div>
  <div class="form-group row">
    <label for="vintage" style = "color:black" class="col-4 col-form-label">Vintage</label> 
    <div class="col-3">
      <input id="vintage" name="vintage" type="text" class="form-control here" placeholder="eg. 20 Years">
    </div>
  </div>
  <div class="form-group row">
    <label for="condition" style = "color:black" class="col-4 col-form-label">Product Condition</label> 
    <div class="col-3">
      <input id="condition"  required="required" name="condition" type="text" class="form-control here">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="productimage" style = "color:black" class="col-4 col-form-label">Product Image</label> 
    <div class="col-3">
      <input id="productimage"  name="productimage" type="file" class="form-control here">
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
        $(document).ready(function() {
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
                display: function(data) {
                    return data.product_itemName  //Input value to be set when you select a suggestion. 
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                    // return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.product_itemName + '</div></div>'

                     return '<a href="/autofill/'+ data.product_id + '"><div style="font-weight:normal; margin-top:-10px ! important; color:black;" class="list-group-item">' + data.product_itemName + '</div></a></div>'
                    }
                }
            });
        });
    </script>

   

   <!--  <script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var image_name = $('#productimage').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>   -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>
