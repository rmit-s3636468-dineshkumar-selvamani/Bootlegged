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
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}"/>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <!-- Styles -->
    <style>

        html, body {
            background-color: #fff;
            color: #636b6f;
            margin: 0;
            font-family: "Lato", sans-serif;
            /*font-weight: 500;*/
            height: 500px;
            margin: 0;
            background-repeat: no-repeat;
            /*background-size: 1440px 700px;*/
            background-size: 100% 120%;
            /*-webkit-background-size: cover;*/
            /*-moz-background-size: cover;*/
            /*-o-background-size: cover;*/
            /*background-size: cover;*/

        }

        .form_box {
            width: 50%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .moving_size {
            margin-left: 150px;
            width: 950px;
        }


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

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            position: fixed;
            height: 100%;
            overflow: auto;
            background-color: #212327;
        }

        .sidebar a {
            display: block;
            color: #212327;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #D3BC3F;
            color: #212327;
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


    </style>
</head>
<body>
<div class="sidebar">
    <img style=" position: absolute; display: inline;" class="logo" alt="logo" src="/Images/logo1.png">
    <a href="#home"
       style="margin-top: 90px; color: white; text-align: center;">Welcome,<br> {{Auth::user()->business_name}}</a>

    @if( Auth::user()->type == 'StoreOwner')
        <a href="/home" style="color: white;">Market Place</a>
    @endif
    <a href="/mylistings" style="color: white;">My Listing</a>
    <a href="/mylistings" style="color: white;">My Listing</a>
    <a class="dropdown-btn">Add Listing
        <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-container" style="color: white;">
        <a onclick="window.location.href = '/addlistings'"; style="color: white;">Single Product Upload</a>
        <a onclick="window.location.href = '/upload'"; style="color: white;">Bulk Upload</a>
    </div>
    <a href="/uploadchoose" class="active">Add Listing</a>
    <a href="history" style="color: white;">History</a>
    @if( Auth::user()->type == 'StoreOwner')
        <a href="slowstock" style="color: white;">Slow Movers</a>
        <a href="opportunities" style="color: white;">Opportunities</a>
    @endif
    <hr style="border-style: groove;
    border-width: 1px;">
    <a href="/editProfile" style="color: white;">Edit Profile</a>
    @if( Auth::user()->type == 'StoreOwner')
        <a href="/cart" style="color: white;">My Cart <span
                    class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span></a>
    @endif
    <a href="{{URL::to('logout')}}" style="color: white;">Logout</a>
</div>

<!-- Login Div -->

<div class="moving_size" style="height: 500px;">
    <img src="Images/reg_pic.jpg" name="about_pic" class="about_pic" style="height:600px; ">

    <div class="about" id="about" style="margin-top: -470px; margin-left: 40px;">


    <!-- <form  action="" method="POST" id="register_form" aria-label="{{ __('Register') }}" style="margin-top: 100px; margin-left: 130px;  "> -->

        <a href="{{URL::to('addlistings')}}">
            <button type="submit" class="button"
                    style="vertical-align:middle; width: 300px; font-family:'Yrsa', serif; font-size: 25px; margin-left: 0px; margin-top: 100px;">
                <span>Single Product Upload </span></button>
        </a><br><br><br><br><br>

        <p style="font-size: 35px; margin-left: 130px; font-family:'Yrsa', serif; margin-top: -40px;">OR </p><br><br>

    <!-- <form  action="" method="POST" id="register_form" aria-label="{{ __('Register') }}" style="margin-top: 10px; margin-left: 130px;  "> -->


        <a href="{{URL::to('upload')}}">
            <button type="submit" class="button"
                    style="vertical-align:middle; width: 300px; font-family:'Yrsa', serif; font-size: 25px; margin-left: 0px; ">
                <span>Bulk Upload </span></button>
        </a>


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
</html>

