@extends('layout.auth')

@section('title','Login')

@section('content')
<p class="login-box-msg">Sign in to start your session</p>
<p></p>

	<form  class="form-horizontal"   method="post" action="{{ url('/login') }}">
    {{ csrf_field() }}
	  <div class="form-group has-feedback">
        <input type="text" id="login" name="login"  class="form-control" placeholder="Email or Mobile "  value="{{ old('email') }}"  autofocus>
      	<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      	 @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password"  id="password" name="password" class="form-control" placeholder="Password" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
	        <span class="help-block">
	            <strong>{{ $errors->first('password') }}</strong>
	        </span>
    	@endif

       
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
	</form>

	{{-- social logins for future  --}}
	{{-- <div class="social-auth-links text-center">
	  <p>- OR -</p>
	  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
		Facebook</a>
	  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
		Google+</a>
	</div> --}} 
	
	<!-- /.social-auth-links -->

	<a href="#">I forgot my password</a><br>
	<a href="/register" class="text-center">Register a new membership</a>

@endsection	