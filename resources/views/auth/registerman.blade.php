@include('layouts.master')
@extends('partials.nav-auth')

@section('contents')
    <body class="registerman-body">
    <div class="py-5 text-white opaque-overlay">
        <div class="container-fluid register-container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 login-container login-form"><br>
                    <h1 class="text-dark text-md-center">Register form: Manufacturer</h1>
                    <p class="lead mb-4 text-danger text-md-center">Complete all the fields below</p>
                    <form action="{{ route('register_man') }}" method="POST" id="register_form"
                          aria-label="{{ __('Register') }}  ">
                        @csrf

                        <input class="form_box form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               type="email" name="manu_email" placeholder="Email" id="manu_email" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <br>

                        <input class="form_box form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                               name="manu_name" placeholder="Business Name" id="manu_name" required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                        <br>

                        <input class="form_box form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               type="Password" name="password" placeholder="Password" id="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <br>

                        <input class="form-control" type="Password" name="password_confirmation"
                               placeholder="Confirm Password" id="password-confirm" required><br>

                        <input class="form-control" type="text" name="manu_address" placeholder="Address Line "
                               id="manu_address" required>
                        @if ($errors->has('manu_address'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manu_address') }}</strong>
                                    </span>
                        @endif
                        <br>

                        <input class="form-control" type="text" name="manu_suburb" placeholder="Suburb" id="manu_suburb"
                               required>
                        @if ($errors->has('manu_suburb'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manu_suburb') }}</strong>
                                    </span>
                        @endif
                        <br>

                        <div class="col col-state">
                            <div class="ui-select">
                                <select name="manu_state" class="form-control" id="manu_state">
                                <option value="State" selected="selected">State</option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="WA">WA</option>
                                <option value="QLD">QLD</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>

                                </select>
                            </div>
                        </div>@if ($errors->has('manu_state'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manu_state') }}</strong>
                                    </span>
                        @endif
                        <br>


                        <input class="form-control" type="number" name="manu_postcode" placeholder="Post Code"
                               id="manu_postcode" required>
                        @if ($errors->has('manu_postcode'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manu_postcode') }}</strong>
                                    </span>
                        @endif
                        <br>

                        <input class="form-control" type="number" name="manu_phone" placeholder="Contact Number"
                               id="manu_phone" required>
                        @if ($errors->has('manu_phone'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manu_phone') }}</strong>
                                    </span>
                        @endif
                        <br>

                        <input class="form-control" type="text" name="manu_abn" placeholder="ABN Number" id="manu_abn"
                               required>
                        @if ($errors->has('manu_abn'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manu_abn') }}</strong>
                                    </span>
                        @endif
                        <br>

                        <input class="form-control" type="text" name="manu_license"
                               placeholder="Business License Number"
                               id="manu_license" required><br>

                        <input class="form-control" type="text" name="manu_Stripeid" placeholder="Stripe ID"
                               id="manu_Stripeid" required><br>

                        <br>


                        <a href="">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-dark text-lg-center">
                                <span>REGISTER </span></button>
                        </a>
                        <br>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>



@section('script')
    <script>
        /* When the user clicks on the button,
      toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
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



