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

        <div>
               <img style=" position: absolute; display: inline;" class="logo"  alt ="logo" src="/Images/logo1.png">

                 <!-- <div class="dropdown" style="float: right; margin-right: 80px; margin-top: 20px;">
  <button onclick="myFunction()" class="dropbtn" >Login</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="{{URL::to('loginmanu')}}">As Manufacturer</a>
    <a href="{{URL::to('loginstor')}}">As Store Owner</a>
    
  </div>
</div>   -->

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

        <div class="moving_size" style="height: 1450px;">
            <img src="Images/reg_pic.jpg" name="about_pic" class="about_pic" style="height:100%; ">
          
         <div class="about" id="about" style="margin-top: -1390px;">
             <p style="font-size: 40px; margin-left: 120px; ">ENTER THE DETAILS</p>
         
          <form  action="{{ route('register_sto') }}" method="POST" id="register_form_sto" aria-label="{{ __('Register') }}" style="margin-top: 10px; margin-left: 130px;  ">
            @csrf
                    <input class="form_box form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="store_email" placeholder="Email" id="store_email" value="{{old('email')}}" required ><br>
                      @if ($errors->has('email'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                    <input class="form_box form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="store_name" placeholder="Store Name" id="store_name" value="{{old('name')}}" required><br>
                    @if ($errors->has('name'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                    <input class="form_box form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="Password" name="password" placeholder="Password" id="password" required><br>
                      @if ($errors->has('password'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                    <input class="form_box" type="Password" name="password_confirmation" placeholder="Confirm Password" id="password-confirm" required><br><br>
                    <input class="form_box {{ $errors->has('store_address') ? ' is-invalid' : '' }}" type="text" name="store_address" placeholder="Address Line " id="store_address" value="{{old('store_address')}}" required><br><br>
                     @if ($errors->has('store_address'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('store_address') }}</strong>
                                    </div>
                                @endif
                    <input class="form_box {{ $errors->has('store_suburb') ? ' is-invalid' : '' }}" type="text" name="store_suburb" placeholder="Suburb" id="store_suburb" value="{{old('store_suburb')}}" required><br><br>
                     @if ($errors->has('store_suburb'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('store_suburb') }}</strong>
                                    </div>
                                @endif
                   

                    <div class="col" style="margin-left: -14px; width: 345px; ">
                <div class="ui-select">
                  <select name="store_state" class="form-control" style="height: 45px; id="manu_state"">
                    <option value="State" selected="selected">State</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="WA">WA</option>
                    <option value="QLD">QLD</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                  
                  </select>
                </div>
              </div>
             <br>
             

                    <input class="form_box {{ $errors->has('store_postcode') ? ' is-invalid' : '' }}" type="number" name="store_postcode" placeholder="Post Code" id="store_postcode" value="{{old('store_postcode')}}" required><br><br>
                     @if ($errors->has('store_postcode'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('store_postcode') }}</strong>
                                    </div>
                                @endif
                    <input class="form_box  {{ $errors->has('store_phone') ? ' is-invalid' : '' }}" type="number" name="store_phone" placeholder="Contact Number" value="{{old('store_phone')}}" required><br><br>
                     @if ($errors->has('store_phone'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('store_phone') }}</strong>
                                    </div>
                                @endif
                    <input class="form_box {{ $errors->has('store_abn') ? ' is-invalid' : '' }}" type="number" name="store_abn" placeholder="ABN Number" id="store_abn" value="{{old('store_abn')}}" required><br><br>
                     @if ($errors->has('store_abn'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('store_abn') }}</strong>
                                    </div>
                                @endif
                    <input class="form_box  {{ $errors->has('store_license') ? ' is-invalid' : '' }}" type="text" name="store_license" placeholder="Business License Number" id="store_license" value="{{old('store_license')}}" required><br><br>
                     @if ($errors->has('store_license'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('store_license') }}</strong>
                                    </div>
                                @endif
                    <input class="form_box {{ $errors->has('store_Stripeid') ? ' is-invalid' : '' }}" type="text" name="store_Stripeid" placeholder="Stripe ID" id="store_Stripeid" value="{{old('store_Stripeid')}}" required><br><br>
                     @if ($errors->has('store_Stripeid'))
                                    <div class="alert alert-danger col-8">
                                        <strong>{{ $errors->first('store_Stripeid') }}</strong>
                                    </div>
                                @endif

                  <br><br> <br>
                      


      
         

           <a href= "" ><button type="submit" class="button" style="vertical-align:middle; width: 140px; font-family:'Yrsa', serif; font-size: 25px; margin-left: 70px; "><span>REGISTER </span></button></a>





  
</div>
         </div>


<!-- Footer -->

  @yield('footer')

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

        </body>
        </html>

