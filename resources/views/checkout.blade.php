@include('layouts.master')

@section('content')
    <body>
    <nav>
        <div class="sidebar">
            <img style=" position: absolute; display: inline;" class="logo" alt="logo" src="/Images/logo1.png">
            <a href="#home"
               style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>

            @if( Auth::user()->type == 'StoreOwner')
                <a href="/home" style="color: white;">Market Place</a>
            @endif
            <a href="/mylistings" style="color: white;">My Listing</a>
            <a class="dropdown-btn" style="color: white;">Add Listing
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-container" style="color: white;">
                <a href="{{URL::to('addlistings')}}" style="color: white;">Single Product Upload</a>
                <a href=href="{{URL::to('upload')}}" style="color: white;">Bulk Upload</a>
            </div>
            <a href="/history" style="color: white;">History</a>
            @if( Auth::user()->type == 'StoreOwner')
                <a href="slowstock" style="color: white;">Slow Movers</a>
                <a href="opportunities" style="color: white;">Opportunities</a>
            @endif
            <hr style="border-style: groove;
    border-width: 1px;">
            <a href="/editProfile" style="color: white;">Edit Profile</a>
            @if( Auth::user()->type == 'StoreOwner')
                <a href="/cart" style="color: white;" class="active">My Cart <span
                            class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span></a>
            @endif
            <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
        </div>
    </nav>

    <div class="row">


    </div>
    <div class="container-fluid checkout-container">
        <div class="row">
            <div class="col-md-4">
                <img src="Images/reg_pic.jpg" name="about_pic" class="about_pic" style="height:10%; ">
            </div>
            <div class="col-md-4">
                <p>Test-Right</p>
            </div>

        </div>



    </div>
    @section('script')
        <script>
            $(function() {
                var dropdown = document.getElementsByClassName("dropdown-btn");
                var i;

                for (i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener("click", function () {
                        this.classList.toggle("active");
                        var dropdownContent = this.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                            dropdownContent.style.display = "none";
                        } else {
                            dropdownContent.style.display = "block";
                        }
                    });
                }
            });
        </script>

    </body>