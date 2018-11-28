<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cart')</title>
    <meta name="author" content="Codrops"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">


    <script src="https://js.stripe.com/v3/"></script>



    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->

    <!-- Import typeahead.js -->
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>



    <!-- TypeAhead -->


    <!-- Modal -->
    <script src="js/modernizr.custom.js"></script>
</head>
<style>
    body {
        margin: 0;
        /*background-color: rgb(26,27,31);*/
        /*background-image: url(Images/back.jpg);*/
    }

    ul.topnav {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    ul.topnav li {
        float: left;
    }

    ul.topnav li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    ul.topnav li a:hover:not(.active) {
        background-color: #111;
    }

    ul.topnav li a.active {
        background: rgba(211, 188, 63);
    }

    ul.topnav li.right {
        float: right;
    }

    @media screen and (max-width: 600px) {
        ul.topnav li.right,
        ul.topnav li {
            float: none;
        }
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

    body {
        margin: 0;
        font-family: "Lato", sans-serif;
    }

    .sidebar {
        margin: -64px;
        padding: 0;
        width: 200px;
        position: fixed;
        height: 100%;
        overflow: auto;
        background-color: #212327;
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

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover > .dropdown-menu {
        display: block;
    }

    .dropdown-submenu > a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover > a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left > .dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }

    .product .product__info {
        min-height: 00px;
    }

    .product__name {

        min-height: 40px;
        max-height: 50px;
        max-width: 210px;

    }

    .product {

        max-width: 210px;
    }

    /*.twitter-typeahead,
            .tt-hint,
            .tt-input,
            .tt-menu{
                width: auto ! important;
                font-weight: normal;

            }*/
    /*Big Box*/
    .twitter-typeahead {
        display: block;
        width: 100%;

    /
    /
    BS

    3
    needs this to inherit this for children
    .tt-query,
    .tt-hint {
        margin-bottom: 0;
    }

    .tt-dropdown-menu {
        z-index: @zindex-dropdown;
        min-width: 326px;
        padding: 5px 0;
        margin: 2px 0 0;
    / / override default ul font-size: @font-size-base;
        text-align: left;
    / / Ensures proper alignment if parent has it changed (e . g ., modal footer) background-color: @dropdown-bg;
        border: 1px solid @dropdown-fallback-border;
    / / IE8 fallback border: 1 px solid @dropdown-border;
        border-radius: @border-radius-base;
    . box-shadow(0 6 px 12 px rgba(0, 0, 0, .175));
        background-clip: padding-box;

    .tt-suggestions {

    .tt-suggestion {
        padding: 3px 12px;
        font-weight: normal;
        line-height: @line-height-base;
        color: @dropdown-link-color;
        white-space: nowrap;
    / / prevent links from randomly breaking onto new lines
    }

    .tt-suggestion.tt-cursor {
        color: @dropdown-link-hover-color;
        background-color: @dropdown-link-hover-bg;
    }

    .tt-suggestion p {
        margin: 0;
    }

    /*Small box*/
    /*span.twitter-typeahead
      width: 100%

    .tt-input
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075)

    .tt-menu
      @extend .list-group
      box-shadow: 0 5px 10px rgba(0,0,0,.2)
      width: 100%

    .tt-suggestion
      @extend .list-group-item

    .tt-selectable
      @extend .list-group-item-action*/
</style>

@yield('content')

@yield('script')
</html>