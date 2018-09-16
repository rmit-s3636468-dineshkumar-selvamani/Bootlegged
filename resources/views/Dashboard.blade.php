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


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		
		<!-- Modernizr is used for flexbox fallback -->


		<!-- Modal -->
		
		<script src="js/modernizr.custom.js"></script>
	</head>

	<style>
body {margin: 0;}

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
</style>

	<body>

		<ul class="topnav">
			@if( Auth::user()->type == 'StoreOwner')
  <li><a class="active" href="/home">Market Place</a></li>
  @endif
  <li><a href="/mylistings">My Listing</a></li>
  <li><a href="#contact">Opportunities</a></li>
   <li><a href="#cart">My Cart</a></li>
  <li><a href="#profile">Edit Profile</a></li>
  
  <li class="right"><a href="{{URL::to('logout')}}">Logout</a></li>
  <li class="right"><a href="">Welcome, {{Auth::user()->business_name}}</a></li>
</ul>
		

		
		<!-- Compare basket -->
		<div class="compare-basket">
			<button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">Compare</span></button>
		</div>
		<!-- Main view -->
		<div class="view">
			<!-- Blueprint header -->
			<header class="bp-header cf">
				
				<h1>Market Place</h1>
				
			</header>

				
			<!-- Product grid -->
			<section class="grid" style="margin-top: -70px;">

				<section class="grid">
				<!-- Products -->

				<?php $count = 0; ?>
				@foreach($products as $item)
					@foreach($name as $itemname)
						@if($itemname->product_id == $item->product_id)
						
				<div class="product" >
					<div class="product__info" data-toggle="modal" 
					data-target="#prod_details" data-prodname="{{$itemname->product_itemName}}" data-type="{{$item->sListing_type}}" data-total_qty="{{ $item->sListing_qty }} " 
					data-unit="{{ $item->sListing_unitPrice }}" data-total="{{ $item->sListing_totalPrice }}" 
					data-expiry="{{ $item->sListing_expiry }}" data-vintage="{{ $item->sListing_vintage }}"
					data-condition="{{ $item->sListing_condition }}" onmouseover="" style="cursor: pointer;">
						


						@if($item->sListing_type == "Wine")
                        <img class="product__image" src="images/2.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Vodka")
                        <img class="product__image" src="images/6.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Rum")
                        <img class="product__image" src="images/4.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Brandy")
                        <img class="product__image" src="images/5.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Whiskey")
                        <img class="product__image" src="images/1.png" alt="Product 1" />
                        @elseif($item->sListing_type == "Beer")
                        <img class="product__image" src="images/7.png" alt="Product 1" />
                        @else
                         <img class="product__image" src="images/8.png" alt="Product 1" />
                        @endif						
						<h6 class="product__price highlight" style="color: white">{{$itemname->product_itemName}}</h6><br>
						<h6 class="product__price highlight" style="color: white">Quantity - {{$item->sListing_qty}}</h6>
						<span class="product__price extra highlight">Type - {{$item->sListing_type}} </span>
						<span class="product__price extra highlight">Unit Price - {{$item->sListing_unitPrice}} </span>
						<span class="product__price extra highlight">Expiry - {{$item->sListing_expiry}} </span>
						<span class="product__price extra highlight">Vintage - {{$item->sListing_vintage}} </span>
						<span class="product__price extra highlight">Condition - {{$item->sListing_condition}} </span>
						<span class="product__price highlight"> Price : $ {{$item->sListing_totalPrice}}</span>
						
						<a href="/mylistings"><button class="action action--button action--buy" ><i class="fa fa-shopping-cart"></i><span class="action__text">Add to cart</span></button></a>

						
						
					</div>
					<label class="action action--compare-add"><input class="check-hidden" type="checkbox" /><i class="fa fa-plus"></i><i class="fa fa-check"></i><span class="action__text action__text--invisible">Add to compare</span></label>

				</div>
					<?php $count++; ?>
					@endif
					@endforeach
				@endforeach
				

				<?php if($count==0) { ?>
				<h3> No products to display </h3>
			<?php } ?>
			


							</section>
		</div><!-- /view -->

				
		<!-- product compare wrapper -->

		<section class="compare">
			<button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">Close comparison overlay</span></button>
		</section>
		<script src="js/classie.js"></script>
		<script src="js/main.js"></script>
		

		
		<div style="margin-left: 45%; margin-top: -70px; ">
			
				<?php


				echo $pagelinks; ?>
						
						</div>
	

		<!-- Trigger the modal with a button -->
				<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="prod_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">

        		
        		<table class="table table-dark">
        			
        			<tr>
        		<td><label>Product Type: </label></td>
        		<td><input type="text" id="type" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;" readonly ></td>
        			</tr>
        			
        			<tr>
        		
        		<td><label>Total Quantity: </label></td>
        		<td><input type="text" id="tqty" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"readonly></td>
        			</tr>
        			
        			<tr>
        		<td><label>Unit Price: </label></td>
        		<td><input type="text" id="unitPrice" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;" readonly></td>
        			</tr>

        			<tr>
        		<td><label>Total Price: </label></td>
        		<td><input type="text" id="totalPrice" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"readonly></td>
        			</tr>

        			<tr>
        		<td><label>Expiry: </label></td>
        		<td><input type="text" id="expiry" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;" readonly></td>
        			</tr>

        			<tr>
        		<td><label>Vintage: </label></td>
        		<td><input type="text" id="vintage" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;" readonly></td>
        			</tr>

        			<tr>
        		<td><label>Condition: </label></td>
        		<td><input type="text" id="condition" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;" readonly></td>
        			</tr>
        	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button type="button" class="btn btn-primary" style="background-color: rgba(211, 188, 63); border-color: rgba(211, 188, 63);"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
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
	</body>

	
</html>
