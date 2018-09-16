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
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <!-- Modernizr is used for flexbox fallback -->
        <script src="js/modernizr.custom.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <style>
body {margin: 0;
background-image: url(images/beer.jpg);
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
#pagination{
    display: inline-block;
}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    height: 80%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}
/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
button:hover {
    opacity:1;
}
/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}
/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
/* Add padding to container elements */
.container {
    padding: 16px;
}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
}
/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}
/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}
.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}
/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
    <body>
        <ul class="topnav">
@if( Auth::user()->type == 'StoreOwner')
  <li><a  href="home">Product Listing</a></li>
  @endif
    <li><a class="active" href="/mylistings">My Listing</a></li>
  <li><a href="#contact">Opportunities</a></li>
   <li><a href="#cart">My Cart</a></li>
  <li><a href="#profile">Edit Profile</a></li>
  <li class="right"><a href="{{URL::to('logout')}}">Logout</a></li>
</ul>
        <!-- Compare basket -->
        <div class="compare-basket">
            <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">Compare</span></button>
        </div>
        <!-- Main view -->
        <div class="view">
            <!-- Blueprint header -->
            <header class="bp-header cf">
                <!-- <span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span> -->
                <h1>My Listing</h1>
                <!-- <nav>
                    <a href="http://tympanus.net/Blueprints/GridGallery/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a> -->
                    <!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
                    <!-- <a href="http://tympanus.net/codrops/?p=24096" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
                    <a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
                </nav> -->
            </header>
            <!-- Product grid -->
            <section class="grid">
                <section class="grid">
                <!-- Products -->
                @if( Auth::user()->type == 'StoreOwner')       
                         @foreach($products as $item)
                <div class="product">
                    <div class="product__info">
                        @if($item->sListing_type == "Wine")
                        <img class="product__image" src="images/2.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Vodka")
                        <img class="product__image" src="images/6.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Rum")
                        <img class="product__image" src="images/4.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Gin")
                        <img class="product__image" src="images/5.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Whiskey")
                        <img class="product__image" src="images/1.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Beer")
                        <img class="product__image" src="images/7.png" alt="Product 1" />
                        @else
                         <img class="product__image" src="images/8.png" alt="Product 1" />
                        @endif
                        <h3 class="product__title">{{$item->sListing_type}}</h3>
                        <span class="product__year extra highlight">{{$item->sListing_type}}</span>
                        <span class="product__region extra highlight">{{$item->sListing_qty}}</span>
                        <span class="product__varietal extra highlight">{{$item->sListing_condition}} </span>
                        <span class="product__alcohol extra highlight">{{$item->sListing_expiry}}</span>
                        <span class="product__price highlight">${{$item->sListing_totalPrice}}</span>
                        <button class="action action--button action--buy" onclick="document.getElementById({{$item->id}}).style.display='block'" style="width:auto;"><i class="fa fa-check"></i><span class="action__text" >Edit Details</span></button>
                    </div>
                    <label class="action action--compare-add"><input class="check-hidden" type="checkbox" /><i class="fa fa-plus"></i><i class="fa fa-check"></i><span class="action__text action__text--invisible">Add to compare</span></label>
                </div>
                
                @endforeach
                @else
                  @foreach($products as $item)
                <div class="product">
                    <div class="product__info">
                        @if($item->mListing_type == "Wine")
                        <img class="product__image" src="images/2.png" alt="Product 1" />
                        @elseif($item->mListing_type == "Vodka")
                        <img class="product__image" src="images/6.png" alt="Product 1" />
                        @elseif($item->mListing_type == "Rum")
                        <img class="product__image" src="images/4.png" alt="Product 1" />
                        @elseif($item->mListing_type == "Gin")
                        <img class="product__image" src="images/5.png" alt="Product 1" />
                        @elseif($item->mListing_type == "Whiskey")
                        <img class="product__image" src="images/1.png" alt="Product 1" />
                        @elseif($item->mListing_type == "Beer")
                        <img class="product__image" src="images/7.png" alt="Product 1" />
                        @else
                         <img class="product__image" src="images/8.png" alt="Product 1" />
                        @endif
                        <h3 class="product__title">{{$item->mListing_type}}</h3>
                        <span class="product__year extra highlight">{{$item->mListing_type}}</span>
                        <span class="product__region extra highlight">{{$item->mListing_qty}}</span>
                        <span class="product__varietal extra highlight">{{$item->mListing_condition}} </span>
                        <span class="product__alcohol extra highlight">{{$item->mListing_expiry}}</span>
                        <span class="product__price highlight">${{$item->mListing_totalPrice}}</span>
                        <button class="action action--button action--buy" onclick="document.getElementById({{$item->id}}).style.display='block'" style="width:auto;"><i class="fa fa-check"></i><span class="action__text" >Edit Details</span></button>
                    </div>
                    <label class="action action--compare-add"><input class="check-hidden" type="checkbox" /><i class="fa fa-plus"></i><i class="fa fa-check"></i><span class="action__text action__text--invisible">Add to compare</span></label>
                </div>
                
                @endforeach
                @endif
                            </section>
        </div><!-- /view -->
    
        <section class="compare">
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">Close comparison overlay</span></button>
        </section>
    <!-- product compare wrapper -->
    @foreach($products as $item)
        <div id="1" class="modal">
        <span onclick="document.getElementById('1').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="/action_page.php">
        <div class="container">
        <h1>Product Details</h1>
        <hr>
        <label for="product__title"><b>Product Type</b></label>
        <input type="text" placeholder="Enter Product Type" name="product__title" value = "{{$item->mListing_type}}" required>
        <label for="quantity"><b>Quantity</b></label>
        <input type="text" placeholder="Enter Quantity" name="quantity" value = "{{$item->mListing_qty}}" required>
        <label for="total_price"><b>Product Price</b></label>
        <input type="text" placeholder="Product Price" name="total_price" value = "{{$item->mListing_totalPrice}}" required>
        <div class="clearfix">
        <button type="button" onclick="document.getElementById('1').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Save</button>
        @endforeach
      </div>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('1');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
        <script src="js/classie.js"></script>
        <script src="js/main.js"></script>
        <div class="pagination">
        {{ $products->links() }}
    </div>
    </body>
</html>