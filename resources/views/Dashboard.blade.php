@include('layouts.store')
@section('title', 'Dashboard')
@include('sideNavBar')

@section('content')
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
                        <input type="text" class="typeahead form-control" style="margin-left: 10% !important;" name="search" id="search"
                               placeholder="Search by product Name" autocomplete="on">
                    @else
                        <input type="text"
                               class="typeahead form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" style="margin-left: 10% !important;"
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
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown"
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
                        <div class="product__info" >

                            @if($item->image != '')

                                <img src="{{url('storage/'.$item->image)}}" class="product__image"/>

                            @else
                                <img class="product__image" src="{{ asset('Images/1.png') }}" alt="Product 1"
                                     style="height: 160px; width: 160px;"/>

                            @endif

                            <h6 class="product__name highlight" style="color: white">{{$item->product_itemName}}</h6>
                            <br>
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
                        <label class="action action--compare-add" data-toggle="modal"
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
                            <i class="fas fa-info-circle"></i>
                        </label>
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
        <button class="action action--close"><i class="fa fa-remove"></i><span
                    class="action__text action__text--invisible">Close comparison overlay</span>
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
                    <button type="submit" class="btn btn-primary" id="id"
                            onclick="window.location.href = '/addToCart/'+document.getElementById('id').value;"
                            style="background-color: #D3BC3F; border-color: #D3BC3F;"><i
                                class="fa fa-shopping-cart"></i>Add
                        to Cart
                    </button>
                    </form>

                </div>
                </form>
            </div>
        </div>
    </div>

@section('script')
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


