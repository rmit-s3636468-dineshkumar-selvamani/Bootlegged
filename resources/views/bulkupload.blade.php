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


    html,body{
      height:100%;
    }
    body{
      margin:0;
      padding:0;
      width:100%;
      display: table;
      font-weight: 100;
      /*font-family: 'Lato';*/
      font-family: "Lato", sans-serif;
    }
    .container{
       text-align: center;
       display: table-cell;
       vertical-align: middle;
    }
    .content{
      text-align: center;
      display: inline-block;
    }
    .title{
      font-size: 96px;
    }
    .downloadfile{
       
      /* padding-top: 50px;
       padding-left: 0px;*/
       
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

  </style>
    <body>
     <div class="sidebar">
  <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">
  <a  href="#home" style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>
   
  @if( Auth::user()->type == 'StoreOwner')
  <a  href="/home" style="color: white;">Market Place</a>
   @endif
  <a href="/mylistings" style="color: white;" >My Listing</a>
  <a href="/uploadchoose" class="active" >Add Listing</a>
  <a href="/history" style="color: white;">History</a>
         @if( Auth::user()->type == 'StoreOwner')
             <a href="slowstock" style="color: white;">Slow Movers</a>
             <a href="opportunities" style="color: white;">Opportunities</a>
         @endif
  <hr style="border-style: groove;
    border-width: 1px;"> 
  <a href="/editProfile" style="color: white;">Edit Profile</a>
  @if( Auth::user()->type == 'StoreOwner')
  <a href="/cart" style="color: white;">My Cart <span class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span></a>
  @endif
  <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
</div>
      <div class="view" style="margin-left: 14%;">
      <!-- Blueprint header -->
      <header class="bp-header cf">
        
        <h1>Bulk Upload</h1><br><br><br>
         @if(session()->has('message'))
                 <div class="alert alert-info alert-dismissable">
             
            <i class="fa fa-coffee"></i>
            <strong>MESSAGE : </strong> {{ session()->get('message') }}
          </div>
   
@endif
         <div class="downloadfile">
          <p> Please download the template given in the link below</p><br>
        <a href="/downloads">  Download Template </a><br><br> 

        <p>Enter all the product details in the given template and upload it.</p>
      </div>

        <div class="container" style="color: black;">
        <div class = "content">
          <h1>File Upload</h1><br>
          <form action = "{{URL::to('upload')}}" method = "post" enctype="multipart/form-data">  
            <label style="color: black; margin-left: 100px;">Select file to upload:</label>
            <input style="color: black;" type="file"  name="file" id="file">
             @if ($errors->has('file'))
                                     <div class="alert alert-danger">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </div>
                                @endif
            <span id="error"></span>
            <div style=" margin-top: 30px;"> 
               <input type="submit" class="btn btn-info {{$errors->has('submit') ? 'has-error' : ''}}" value= "Upload" name="submit" id="submit"><span class="glyphicon glyphicon-arrow-up"></span>

              </div>
              
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </form>
        </div>
      </div>


        </header> 
     
     
      
      


    </body>
</html>