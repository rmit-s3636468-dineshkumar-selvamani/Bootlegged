<nav>
    <div class="sidebar">
        <img style=" position: absolute; display: inline;" class="logo" alt="logo" src="/Images/logo1.png">
        <a href="/home"
           style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>

        @if( Auth::user()->type == 'StoreOwner')
            <a class="{{ request()->is('home') ? 'active' : '' }}" style="color:white" href="/home">Market Place</a>
        @endif
        <a href="/mylistings" class="{{ request()->is('mylistings') ? 'active' : '' }}" style="color: white;">My
            Listing</a>
        <a class="dropdown-btn {{ request()->is('addlistings') ? 'active' : '' }} {{ request()->is('upload') ? 'active' : '' }}"
           style="color: white;">Add Listing
            <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-container">
            <a href="{{URL::to('addlistings')}}" class="{{ request()->is('addlistings') ? 'active' : '' }}"
               style="color: white;">Single Product Upload</a>
            <a href="{{URL::to('upload')}}" class="{{ request()->is('upload') ? 'active' : '' }}"
               style="color: white;">Bulk Upload</a>
        </div>
        <a href="/history" class="{{ request()->is('history') ? 'active' : '' }}" style="color: white;">History</a>
        @if( Auth::user()->type == 'StoreOwner')
            <a href="slowstock" class="{{ request()->is('slowstock') ? 'active' : '' }}" style="color: white;">Slow
                Movers</a>
            <a href="opportunities" class="{{ request()->is('opportunities') ? 'active' : '' }}" style="color: white;">Opportunities</a>
        @endif
        <hr style="border-style: groove;
    border-width: 1px;">
        <a href="/editProfile" class="{{ request()->is('editProfile') ? 'active' : '' }}" style="color: white;">Edit
            Profile</a>

        <a href="/cart" class="{{ request()->is('cart') ? 'active' : '' }}" style="color: white;">My Cart <span
                    class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span></a>

        <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
    </div>
</nav>

@section('script')
    <script>
        $(function () {
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

