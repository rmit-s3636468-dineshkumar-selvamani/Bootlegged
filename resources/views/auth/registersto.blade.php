@extends('layouts.master')

@section('contents')
    <body id="register-body">
    <div class="py-5 text-white opaque-overlay" id="register-page">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1 class="text-gray-dark">Register form: Liquor Store</h1>
                    <p class="lead mb-4">Complete all the fields below</p>
                    <form action="{{ route('register_sto') }}" method="POST" id="register_form_sto"
                          aria-label="{{ __('Register') }}  ">
                        @csrf
                        <label>Email address</label>
                        <input class="form_box form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               type="email" name="store_email" placeholder="Email" id="store_email" required><br>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <label>Name</label>
                        <input class="form_box form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                               name="store_name" placeholder="Store Name" id="store_name" required><br>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                        <label>Password</label>
                        <input class="form_box form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               type="Password" name="password" placeholder="Password" id="password" required><br>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <label>Re-type password</label>
                        <input class="form-control" type="Password" name="password_confirmation"
                               placeholder="Confirm Password" id="password-confirm" required><br><br>
                        <label>Address Line</label>
                        <input class="form-control" type="text" name="store_address" placeholder="Address Line "
                               id="store_address" required><br><br>
                        <label>Suburb</label>
                        <input class="form-control" type="text" name="store_suburb" placeholder="Suburb"
                               id="store_suburb"
                               required><br><br>
                        <label>State</label>
                        <input class="form-control" type="text" name="store_state"
                               placeholder="State(VIC,NSW,WA,QLD,SA,TAS)"
                               id="store_state" required><br><br>
                        <label>Postcode</label>
                        <input class="form-control" type="number" name="store_postcode" placeholder="Post Code"
                               id="store_postcode" required><br><br>
                        <label>Contact Number</label>
                        <input class="form-control" type="number" name="store_phone" placeholder="Contact Number"
                               id="store_phone" required><br><br>
                        <label>ABN Number</label>
                        <input class="form-control" type="text" name="store_abn" placeholder="ABN Number" id="store_abn"
                               required><br><br>
                        <label>Business License</label>
                        <input class="form-control" type="text" name="store_license"
                               placeholder="Business License Number" id="store_license" required><br><br>
                        <label>Stripe ID</label>
                        <input class="form-control" type="text" name="store_Stripeid" placeholder="Stripe ID"
                               id="store_Stripeid" required><br><br>

                        <br><br>


                        <a href="">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <span>REGISTER </span></button>
                        </a>


                    </form>
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

    </body>
    </html>

