@section('content')


        <!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootlegged</title>
    <meta name="description" content="Blueprint: A basic responsive product grid layout with comparison functionality"/>
    <meta name="keywords"
          content="blueprint, template, html, css, javascript, grid, layout, effect, product comparison"/>
    <meta name="author" content="Codrops"/>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->

    <!-- Import typeahead.js -->
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <!-- TypeAhead -->


    <!-- Modal -->

    <script src="js/modernizr.custom.js"></script>
</head>

<style>
    body {
        margin: 0;
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

    ul.topnav li {
        float: left;
    }

    ul.topnav li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    ul.topnav li a:hover:not(.active) {
        background-color: #111;
    }

    ul.topnav li a.active {
        background: #D3BC3F;
    }

    ul.topnav li.right {
        float: right;
    }

    @media screen and (max-width: 600px) {
        ul.topnav li.right,
        ul.topnav li {
            float: none;
        }
    }

    #pagination {
        display: inline-block;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: black;
        /*background-color: gold;*/
        background: #D3BC3F;
        border-color: gold;
    }

    .form-control {
        margin-left: 7rem;
        width: 22cm;

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

    .modal-content, .modal-header {
        background-color: rgb(33, 35, 39);
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
        background-color: rgb(33, 35, 39);
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: #D3BC3F;
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

        .sidebar a {
            float: left;
        }

        div.content {
            margin-left: 0;
        }
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }

    .logo {

        visibility: visible;
        position: absolute;
        height: 125px;
        width: 175px;
        float: left;
        margin-top: -15px;
        margin-left: 10px;

    }

    .filter {

        position: relative;
        margin-left: 250px;

    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover > .dropdown-menu {
        display: block;
    }

    .dropdown-submenu > a:after {
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

    .dropdown-submenu:hover > a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left > .dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }

    .product__name {

        min-height: 60px;
        max-height: 80px;
        max-width: 210px;

    }

    .product__image {

        /*min-height: 260px;*/
        /*max-height: 260px;*/
        max-width: 200px;

        height: 200px;
        min-height: 200px;
    }

    .product__price {

        /*min-height: 30px;*/
        /*max-height: 30px;*/
        max-width: 210px;

        height: 60px;
    }

    /*.twitter-typeahead,
            .tt-hint,
            .tt-input,
            .tt-menu{
                width: auto ! important;
                font-weight: normal;

            }*/
    /*Big Box*/
    .twitter-typeahead {
        display: block;
        width: 100%;

    /
    /
    BS

    3
    needs this to inherit this for children
    .tt-query,
    .tt-hint {
        margin-bottom: 0;
    }

    .tt-dropdown-menu {
        z-index: @zindex-dropdown;
        min-width: 326px;
        padding: 5px 0;
        margin: 2px 0 0;
    / / override default ul font-size: @font-size-base;
        text-align: left;
    / / Ensures proper alignment if parent has it changed (e . g ., modal footer) background-color: @dropdown-bg;
        border: 1px solid @dropdown-fallback-border;
    / / IE8 fallback border: 1 px solid @dropdown-border;
        border-radius: @border-radius-base;
    . box-shadow(0 6 px 12 px rgba(0, 0, 0, .175));
        background-clip: padding-box;

    .tt-suggestions {

    .tt-suggestion {
        padding: 3px 12px;
        font-weight: normal;
        line-height: @line-height-base;
        color: @dropdown-link-color;
        white-space: nowrap;
    / / prevent links from randomly breaking onto new lines
    }

    .tt-suggestion.tt-cursor {
        color: @dropdown-link-hover-color;
        background-color: @dropdown-link-hover-bg;
    }

    .tt-suggestion p {
        margin: 0;
    }

    }
    }
    }

    /*Small box*/
    /*span.twitter-typeahead
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
      @extend .list-group-item-action*/
</style>

<body>


@include('sideNavBar')



<!-- Main view -->
<div class="view" style="margin-left: 14%;">
    <!-- Blueprint header -->
    <header class="bp-header cf">

        <h1>Market Place</h1>

    </header>

    <div class="container">

        <div class="starter-template" style="align-text:center">
            <form action="/filter" method="get">
                @if($prod_name[0] == '')
                    <input type="text" class="typeahead form-control" name="search" id="search"
                           placeholder="Search by product Name" autocomplete="on">
                @else
                    <input type="text" class="typeahead form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="search" id="search" placeholder="Search by product Name" autocomplete="on">
                    @if ($errors->has('search'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('search') }}</strong>
                        </div>
                    @endif
                @endif
                <input type="submit" value="Submit" style="display: none">
            </form>

        </div>

    </div>
    <br><br>

    <div class="dropdown" style="margin-left: 28rem; margin-top: 10px; display: inline; position: center">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Filter by Type
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/filter/Red Wine">Red Wine</a>
            <a class="dropdown-item" href="/filter/White Wine">White Wine</a>
            <a class="dropdown-item" href="/filter/Beer">Beer</a>
            <a class="dropdown-item" href="/filter/Cider">Cider</a>
            <a class="dropdown-item" href="/filter/Spirits">Spirits</a>
            <a class="dropdown-item" href="/filter/Sparkling">Sparkling</a>
            <a class="dropdown-item" href="/filter/Pre-Mixed">Pre-Mixed</a>
        </div>
    </div>


    <!-- Product grid -->
    <section class="grid" style="margin-top: -70px;">

        <section class="grid">
            <!-- Products -->
            <div>
                @if($prod_name[0] != '')
                    <h5>Showing results for : {{$prod_name[0]}}</h5><br><br>
                @endif
            </div>
            <?php $count = 0; ?>
            @foreach($products as $item)


                <div class="product">
                    <div class="product__info" data-toggle="modal"
                         data-target="#prod_details"
                         data-productid="{{$item->id}}"
                         data-prodname="{{$item->product_itemName}}"
                         data-type="{{$item->Listing_type}}" data-total_qty="{{ $item->Listing_qty }} "
                         data-unit=" ${{number_format($item->Listing_unitPrice, 2) }}"
                         data-total="${{number_format($item->Listing_totalPrice, 2)}}"
                         data-expiry="{{ $item->Listing_expiry }}" data-vintage="{{ $item->Listing_vintage }}"
                         data-condition="{{ $item->Listing_condition }}"
                          onmouseover=""
                         style="cursor: pointer;">

                        @if($item->image != '')

                            <img src="{{url('storage/'.$item->image)}}" class="product__image"/>

                        @else
                            <img class="product__image" src="{{ asset('Images/1.png') }}" alt="Product 1"
                                 style="height: 160px; width: 160px;"/>

                        @endif

                        <h6 class="product__name highlight" style="color: white">{{$item->product_itemName}}</h6><br>
                        <h6 class="product__quantity highlight" style="color: white">Quantity
                            - {{$item->Listing_qty}}</h6>
                        <span class="product__price extra highlight">Type - {{$item->Listing_type}} </span>
                        <span class="product__price extra highlight">Unit Price - {{$item->Listing_unitPrice}} </span>
                        <span class="product__price extra highlight">Expiry - {{$item->Listing_expiry}} </span>
                        <span class="product__price extra highlight">Vintage - {{$item->Listing_vintage}} </span>
                        <span class="product__price extra highlight">Condition - {{$item->Listing_condition}} </span>
                        <span class="product__price highlight"> Price : $ {{number_format($item->Listing_totalPrice, 2)}}</span>

                        <a href="{{route('cart.add-item',['id' => $item -> id])}}">
                            <button class="action action--button action--buy"><i
                                        class="fa fa-shopping-cart"></i><span
                                        class="action__text">Add to cart</span></button>
                        </a>


                    </div>
                    <!-- <label class="action action--compare-add"><input class="check-hidden" type="checkbox" /><i class="fa fa-plus"></i><i class="fa fa-check"></i><span class="action__text action__text--invisible">Add to compare</span></label> -->

                </div>
                <?php $count++; ?>


            @endforeach


        </section>
</div><!-- /view -->

<?php if($count == 0) { ?>
<div style="margin-left:180px;">
    <center><h3> No products to display </h3></center>
</div>
<?php } ?>




<!-- product compare wrapper -->

<section class="compare">
    <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">Close comparison overlay</span>
    </button>
</section>
<script src="js/classie.js"></script>
<script src="js/main.js"></script>


<div style="margin-left: 50%; margin-top: -70px; ">

    {{ $products->links() }}

</div>


<!-- Trigger the modal with a button -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="prod_details" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Modal title</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body table-responsive">


                    <table class="table table-dark">
                        <tr>
                            <td><label>Product Type: </label></td>
                            <td><input type="text" id="type"
                                       style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                       readonly></td>
                        </tr>

                        <tr>

                            <td><label>Total Quantity: </label></td>
                            <td><input type="text" id="tqty"
                                       style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                       readonly></td>
                        </tr>

                        <tr>
                            <td><label>Unit Price: </label></td>
                            <td><input type="text" id="unitPrice"
                                       style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                       readonly></td>
                        </tr>

                        <tr>
                            <td><label>Total Price: </label></td>
                            <td><input type="text" id="totalPrice"
                                       style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                       readonly></td>
                        </tr>

                        <tr>
                            <td><label>Expiry: </label></td>
                            <td><input type="text" id="expiry"
                                       style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                       readonly></td>
                        </tr>

                        <tr>
                            <td><label>Vintage: </label></td>
                            <td><input type="text" id="vintage"
                                       style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                       readonly></td>
                        </tr>

                        <tr>
                            <td><label>Condition: </label></td>
                            <td><input type="text" id="condition"
                                       style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); border: 0px;"
                                       readonly></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="id" onclick="window.location.href = '/addToCart/'+document.getElementById('id').value;"
                            style="background-color: #D3BC3F; border-color: #D3BC3F;" ><i class="fa fa-shopping-cart"></i>Add
                        to Cart
                    </button>
                    </form>

                </div>
            </form>
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
        var productid = button.data('productid')

        var modal = $(this)

        modal.find('.modal-title').text(name)
        modal.find('.modal-body #type').val(type);
        modal.find('.modal-body #tqty').val(tqty);
        modal.find('.modal-body #unitPrice').val(unitPrice);
        modal.find('.modal-body #totalPrice').val(totalPrice);
        modal.find('.modal-body #expiry').val(expiry);
        modal.find('.modal-body #vintage').val(vintage);
        modal.find('.modal-body #condition').val(condition);
        modal.find('.modal-footer #id').val(productid);
    })
</script>


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


                    return '<a href="/filterName/' + data.product_id + '"><div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.product_itemName + '</div></a></div>'

                }

            }

        });
    });


</script>


<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>


</body>


</html>