<div class="sidebar">
  <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">
  <a  href="/home" style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>
   
  @if( Auth::user()->type == 'StoreOwner')
  <a class="active" href="#home">Market Place</a>
   @endif
  <a href="/mylistings" style="color: white;">My Listing</a>
  <a href="/addlistings" style="color: white;">Add Listing</a>
  <a href="#contact" style="color: white;">Opportunities</a>
  <hr style="border-style: groove;
    border-width: 1px;"> 
  <a href="#about" style="color: white;">Edit Profile</a>
  
  <a href="#contact" style="color: white;">My Cart</a>
  
  <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
</div>