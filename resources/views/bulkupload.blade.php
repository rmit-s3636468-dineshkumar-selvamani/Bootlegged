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
      font-family: 'Lato';
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
       text-align: center;
       padding-top: 100px;
       padding-left: 200px;
       vertical-align: middle;
    }
  </style>
    <body>
      <div class="downloadfile">
        <a href="/downloads" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Template </a>
      </div>
      <div class="container">
        <div class = "content">
          <h1>File Upload</h1><br>
          <form action = "{{URL::to('upload')}}" method = "post" enctype="multipart/form-data">  
            <label>Select file to upload:</label>
            <input type="file"  name="file" id="file"><br><br>
            <span id="error"></span>
            <div>
               <input type="submit" class="btn btn-info {{$errors->has('submit') ? 'has-error' : ''}}" value= "Upload" name="submit" id="submit"><span class="glyphicon glyphicon-arrow-up"></span>
              
              </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </form>
        </div>
      </div>


    </body>
</html>