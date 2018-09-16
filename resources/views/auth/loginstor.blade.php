@extends('footer')
 
 


 <!doctype html>
        <html lang="{{ app()->getLocale() }}">
        <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <title>Bootlegged</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Yrsa" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/app.css">
        
  

        <!-- Styles -->
        <style>
        p{margin: 0px;}

          html, body {
              background-color: #fff;
              color: #636b6f;
              font-family: 'Yrsa', serif;
              /*font-weight: 500;*/
              height: 500px;
              margin: 0;
              background-image: url(Images/back.jpg);
              background-repeat: no-repeat; 
              /*background-size: 1440px 700px;*/
              background-size: 100% 120%;
              /*-webkit-background-size: cover;*/
              /*-moz-background-size: cover;*/
              /*-o-background-size: cover;*/
              /*background-size: cover;*/

          }
          
          .form_box{
            width: 50%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
          }

            /* Dropdown Button */
.dropbtn {
   /* background-color: #3498DB;*/
   background: rgba(230, 194, 0); 
    color: white;
    
    font-size: 16px;
    border: none;
    cursor: pointer;
    width: 80px;
    text-align: center;
    display: inline;
    font-size: 19px;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    /*background-color: #2980B9;*/
    background: rgba(211, 188, 63);

}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
          
        </style>
        </head>
        <body> 

        <!-- <div>
               <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">

                 <div class="dropdown" style="float: right; margin-right: 80px; margin-top: 20px;">
  <button onclick="myFunction()" class="dropbtn" >Login</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="{{URL::to('loginmanu')}}">As Manufacturer</a>
    <a href="{{URL::to('loginstor')}}">As Store Owner</a>
    
  </div>
</div>   --> <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">

             <a href="{{URL::to('loginstor')}}" style="float: right;margin-right: 100px; font-size: 19px; text-decoration: none; vertical-align:middle; " id="log" class="button">Login</a>
             
              <a href="/" style="float: right;margin-right: 60px; font-size: 19px; text-decoration: none; " id="log">Contact</a>
              <a href="/"  id="log" style=" font-size: 19px; float: right; text-decoration: none; margin-right: 50px; ">FAQ</a>
              <a href="/"  id="log" style=" font-size: 19px; float: right; text-decoration: none; margin-right: 50px; ">About</a>


              <a href="/" id="log" style="float: right;  margin-right:50px ; font-size: 19px; text-decoration: none;">Home
                   </a>

         
          </div>    

          <div class="para" id="home">
              <ul>
            <p style="font-size: 40px; ">WELCOME TO BOOTLEGGED</p>
            <p style="color: white; font-size: 20px;" >Bootlegged is a peer to peer marketplace where buyers and sellers of alcoholic <br> bevergaes meet.We find potiential buyers for your excess inventory and uncover <br>buying opportunities for you in real time</p>
            </ul>
        </div>

     <!-- Login Div -->

        <div class="moving_size" style="height: 475px;">
            <img src="Images/About.png" name="about_pic" class="about_pic">
          
         <div class="about" id="about" style="margin-top: -450px;">

                <div class="card-header">{{ __('Login') }}</div><br><br>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' :'' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                 <a class="btn btn-link" href="{{ URL::to('choose') }}">
                                    {{ __('Register Here ') }}
                                </a>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
  /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>
 @yield('footer')

        </body>
        </html>
