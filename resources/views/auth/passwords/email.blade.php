@include('layouts.master')

<div class="form-gap"></div>
<div class="container-fluid form-container">
   <div class="row">
       <div class="col-md-4 col-md-offset-4">
           <div class="panel panel-default">
             <div class="panel-body">
               <div class="text-center">
                 <h3><i class="fa fa-lock fa-4x"></i></h3>
                 <h2 class="text-center">Forgot Password?</h2>
                 <p>You can reset your password here.</p>
                 <div class="panel-body">



             

                   <form id="register-form" action="{{ route('password.email') }}" role="form" autocomplete="off" class="form" method="post">
                   @csrf
                     <div class="form-group">
                       <div class="input-group">
                         <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                         <input id="email" type="email" placeholder="Email address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                               @if ($errors->has('email'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                       </div>
                     </div>
                     <div class="form-group">
                       <button name="recover-submit" class="btn btn-lg btn-primary btn-block text-dark" value="Reset Password" type="submit">{{ __('Reset Password') }}</button>
                     </div>

                     <input type="hidden" class="hide" name="token" id="token" value="">

                     <a href="/" class="text-success"> Home </a>
                      <div class="panel-body">
                   @if (session('status'))
                       <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                       </div>
                   @endif
                   </form>

                 </div>
               </div>
             </div>
           </div>
         </div>
   </div>
</div>