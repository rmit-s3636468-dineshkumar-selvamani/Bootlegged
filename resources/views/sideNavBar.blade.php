<div class="sidebar">
  <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">
  <a  href="/home" style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>
   
  @if( Auth::user()->type == 'StoreOwner')
  <a class="active" href="/home">Market Place</a>
   @endif
  <a href="/mylistings" style="color: white;">My Listing</a>
  <a href="/uploadchoose" style="color: white;">Add Listing</a>
  <a href="/history" style="color: white;">History</a>
    @if( Auth::user()->type == 'StoreOwner')
        <a href="slowstock" style="color: white;">Slow Movers</a>
        <a href="opportunities" style="color: white;">Opportunities</a>
    @endif
  <hr style="border-style: groove;
    border-width: 1px;"> 
  <a href="/editProfile" style="color: white;">Edit Profile</a>

  <a href="/cart" style="color: white;">My Cart <span class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span></a>
  
  <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
</div>