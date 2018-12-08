@include('layouts.store')
@section('title')
    <title>Bootlegged - Oppotunities</title>
@section('content')


<style>

    .list-group {
        color: white;
        display: inline-flex;

    }

    .list-group-item {
        flex: 1;
        color: white;
        background-color: #333
    }

    .list-group-item:hover {
        background: rgba(211, 188, 63);
    }

    .button {
        display: inline-block;
        background-color: #333;
        color: white;
        border: 2px solid;
        cursor: pointer;
        opacity: 0.9;
    }

    .button#coronaButton:focus, .button#coronaButton:active {
        background: rgba(211, 188, 63);
        border: 0px solid;

    }

    .button#tooheysButton:focus, .button#tooheysButton:active {
        background: rgba(211, 188, 63);
        border: 0px solid;
        display: inline-block;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        cursor: pointer;
        opacity: 0.9;
    }

    .button#viewButton {
        background-color: #ffffff;
        border: 0px solid;
        display: inline-block;
        color: black;
        padding: 0px 0px;
        margin: 0px 0;
        cursor: pointer;
        opacity: 0.9;
    }

    #salesTable {
        margin-top: 10px
        margin-left: 300px
    }

    #pagination {
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

    .modal-content, .modal-header {
        background-color: rgb(33, 35, 39);
    }


    .product {
        min-height: 430px;
    }

</style>

<body>
@include('sideNavBar')

<header class="bp-header cf">
    <h1>Your Opportunities</h1>
</header>

<section class="grid" style="padding-left: 150px">
    @if(count($page) > 0)
        <div class="container-flud" style="margin-top:20px; margin-left: 3%;">
            <div class="row">
                <div class="col-md-2">
                    <div class="list-group" style="background-color:#333">
                        @foreach($page as $key => $name)
                            <form action="" method="GET">
                                <input type="hidden" name="currentPID" value="{{$key}}">
                                <button type="submit" class="list-group-item list-group-item-action">{{$name}}</button>
                            </form>
                        @endforeach
                    </div>
                </div>

                <div class="opportunity-table">
                    <div class="table-responsive mx-3">
                        <table class="table table-striped table-sm"
                               style="border-collapse: separate; border-spacing: 20px 0">
                            <thead>
                            <tr>

                                @foreach($titles as $title)
                                    <th>{{$title}}</th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody>
                            @if(count($tableData) > 0)
                                @foreach($tableData as $product)
                                    <tr>
                                        @foreach ($currentColumn as $c)
                                            @if($product->product_id == $currentPID)
                                                @if($c=="listing_unitPrice")
                                                    <td>${{$product->$c}}</td>
                                                @elseif($c=="product_itemName")
                                                    <td>{{$product->$c}}</td>
                                                    <?php $itemName = $product->$c ?>
                                                @elseif(isset($product->$c)&& $c!="id")
                                                    <td>{{$product->$c}}</td>
                                                @elseif($c=="id")

                                                            <?php $listID = (int)$product->id; ?>
                                                    <?php $listing = \Illuminate\Support\Facades\DB::table('listings')->where('id', $listID)->first(); ?>

                                                @elseif($c=="View")
                                                    <td>
                                                        <button type="button" id="modal"
                                                                class="openListing btn btn-info" data-toggle="modal"
                                                                data-target="#prod_details"
                                                                data-id="{{$listID}}"
                                                                data-prodname="{{$itemName}}"
                                                                data-type="{{$listing->Listing_type}}"
                                                                data-total_qty="{{ $listing->Listing_qty }} "
                                                                data-unit="{{ $listing->Listing_unitPrice }}"
                                                                data-total="{{ $listing->Listing_totalPrice }}"
                                                                data-expiry="{{ $listing->Listing_expiry }}"
                                                                data-vintage="{{ $listing->Listing_vintage }}"
                                                                data-condition="{{ $listing->Listing_condition }}"
                                                                style="background-color:#333">View
                                                        </button>
                                                    </td>
                                                @endif
                                            @endif
                                        @endforeach
                                     </tr>
                                @endforeach
                            @else
                                <?php $colspan = count($currentColumn); ?>
                                <td colspan={{$colspan}}>No products found!</td>
                            @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

    @else
        <h2 style="margin:30px;">No products found!</h2>
    @endif

    {{-- paginate links --}}
    <div class="paginate">
        {{$page->links()}}
    </div>
</section>


<div class="modal fade" id="prod_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;" readonly>Modal Title</h5>
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
                        style="background-color: #D3BC3F; border-color: #D3BC3F;"><i class="fa fa-shopping-cart"></i>Add
                    to Cart
                </button>
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
        var id = button.data('id')

        var modal = $(this)

        modal.find('.modal-title').text(name)
        modal.find('.modal-body #type').val(type);
        modal.find('.modal-body #tqty').val(tqty);
        modal.find('.modal-body #unitPrice').val(unitPrice);
        modal.find('.modal-body #totalPrice').val(totalPrice);
        modal.find('.modal-body #expiry').val(expiry);
        modal.find('.modal-body #vintage').val(vintage);
        modal.find('.modal-body #condition').val(condition);
        modal.find('.modal-footer #id').val(id);
    })
</script>

</body>
