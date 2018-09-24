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


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <style>
body {margin: 0;
      /*background-color: rgb(26,27,31);*/
      /*background-image: url(Images/back.jpg);*/
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

 .modal-content, .modal-header{
  background-color: rgb(33,35,39);
}

body {
  margin: 0;
  font-family: "Lato", sans-serif;
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

             .filter{

              position: relative;
              margin-left: 250px;

             }

             

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

.product{
  min-height: 430px;
}

</style>
    <body>
       <div class="sidebar">
  <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">
  <a  href="#home" style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>
   
  @if( Auth::user()->type == 'StoreOwner')
  <a  href="/home" style="color: white;">Market Place</a>
   @endif
  <a href="/mylistings" class="active" >My Listing</a>
  <a href="/uploadchoose" style="color: white;">Add Listing</a>
  <a href="#contact" style="color: white;">Opportunities</a>
  <hr style="border-style: groove;
    border-width: 1px;"> 
  <a href="/editProfile" style="color: white;">Edit Profile</a>
  
  <a href="#contact" style="color: white;">My Cart</a>
  
  <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
</div>
        
        
        <!-- Main view -->
        <div class="view">
            <!-- Blueprint header -->
           <div class="view" style="margin-left: 14%;">
            <!-- Blueprint header -->
            <header class="bp-header cf" >
                
                <h1>My Listings</h1>
                
            </header>
            <!-- Product grid -->
            <section class="grid">
                <section class="grid">
                <!-- Products -->
              
                         @foreach($products as $item)
                            
                                    <div class="product">
                                        <div class="product__info">
                                            @if($item->listing_type == "Red Wine")
                                            <img class="product__image" src="images/2.png" alt="Product 1" />
                                            @elseif($item->listing_type == "Vodka")
                                            <img class="product__image" src="images/6.png" alt="Product 1" />
                                            @elseif($item->listing_type == "Rum")
                                            <img class="product__image" src="images/4.png" alt="Product 1" />
                                            @elseif($item->listing_type == "Gin")
                                            <img class="product__image" src="images/5.png" alt="Product 1" />
                                            @elseif($item->listing_type == "Whiskey")
                                            <img class="product__image" src="images/1.png" alt="Product 1" />
                                            @elseif($item->listing_type == "Beer")
                                            <img class="product__image" src="images/7.png" alt="Product 1" />
                                            @else
                                             <img class="product__image" src="images/8.png" alt="Product 1" />
                                            @endif
                                            <h6 class="product__price highlight" style="color: white">{{$item->product_itemName}}</h6><br>
                                            <h6 class="product__price highlight" style="color: white">Quantity - {{$item->listing_qty}}</h6>
                                            <span class="product__price extra highlight">Type - {{$item->listing_type}} </span>
                                            <span class="product__price extra highlight">Unit Price - {{$item->listing_unitPrice}} </span>
                                            <span class="product__price extra highlight">Expiry - {{$item->listing_expiry}} </span>
                                            <span class="product__price extra highlight">Vintage - {{$item->listing_vintage}} </span>
                                            <span class="product__price extra highlight">Condition - {{$item->listing_condition}} </span>
                                            <span class="product__price highlight"> Price : $ {{$item->listing_totalPrice}}</span>
                                            <button class="action action--button action--buy" data-toggle="modal" 
                                        data-target="#prod_details" data-prodname="{{$item->product_itemName}}" data-type="{{$item->sListing_type}}" data-total_qty="{{ $item->sListing_qty }} " 
                                        data-unit="{{ $item->sListing_unitPrice }}" data-total="{{ $item->sListing_totalPrice }}" 
                                        data-expiry="{{ $item->sListing_expiry }}" data-vintage="{{ $item->sListing_vintage }}"
                                        data-condition="{{ $item->sListing_condition }}" onmouseover="" style="cursor: pointer;" style="width:auto;"><i class="fa fa-check"></i><span class="action__text" style ="width: 80px;" >Remove</span></button>

                                            <button class="action action--button action--buy" data-toggle="modal" 
                                        data-target="#prod_details" data-prodname="{{$item->product_itemName}}" data-type="{{$item->listing_type}}" data-total_qty="{{ $item->listing_qty }} " 
                                        data-unit="{{ $item->listing_unitPrice }}" data-total="{{ $item->listing_totalPrice }}" 
                                        data-expiry="{{ $item->listing_expiry }}" data-vintage="{{ $item->listing_vintage }}"
                                        data-condition="{{ $item->listing_condition }}" onmouseover="" style="cursor: pointer;" style="width:auto;"><i class="fa fa-check"></i><span class="action__text" >Edit Details</span></button>
                                        </div>
                                       
                                   </div>
                                
                        @endforeach
              
                            </section>
        </div><!-- /view -->
    
        
    <!-- product compare wrapper -->

    <!-- Modal View -->
    <div class="modal fade" id="prod_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Modal title</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">

                @include('modalTable')
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button type="button" class="btn btn-primary" style="background-color: rgba(211, 188, 63); border-color: rgba(211, 188, 63);"><i class="fa fa-check"></i>Save</button>
      </div>
    </div>
  </div>
</div>
    </div>


    
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
        
        <div class="pagination">
        {{ $products->links() }}
    </div>
    </body>
</html>