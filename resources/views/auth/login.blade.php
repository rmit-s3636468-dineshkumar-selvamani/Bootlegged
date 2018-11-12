@extends('layouts.master')
@extends('partials.nav-auth')

@section('content')
    <body class="frontpage-body">


    <div class="container-fluid login-container"></div>
    <div class="col-md-6 offset-md-3 login-form">
        <div class="img-fluid py-3"></div>

        @include('partials.flash-message')

        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="text-center mb-4">
                <img class="mb-4" src="{{ asset('images/logo1.png') }}" alt="" id="login-logo">
                <h1 class="h3 mb-3 font-weight-normal text-dark">Login</h1>
            </div>
            <div class="form-label-group text-white">
                <label for="email"></label>
                <input id="email" type="email" placeholder="E-mail"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                       value="{{ old('email') }}" required autofocus
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-label-group text-white">
                <label for="password"></label>
                <input id="password" type="password" placeholder="Password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                       required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="checkbox mb-3">
                <div class="checkbox text-dark">
                    <label>
                        <input type="checkbox"
                               name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>
            </div>


            <button type="submit" class="btn btn-lg btn-primary btn-block text-dark">
                {{ __('Login') }}
            </button>
            <div class="row">
                <a class="col-6 text-left"></a>
                <a class=" col-6 btn btn-link text-right pl-0 text-dark" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </form>
    </div>
    </body>
@endsection

@section('additional_scripts')
    @parent
    <script>
        $("form").on('submit', function () {
            window.displayLoader();
        });
    </script>
@endsection
