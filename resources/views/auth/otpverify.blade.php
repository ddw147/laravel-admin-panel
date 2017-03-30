@extends('layout.auth')

@section('title','Verification ')

 @section('content')

     <p class="login-box-msg">Verify Mobile Number </p>
      <p class="login-box-msg"> verification otp has been sent your mobile XXXXXXX{{substr(Auth::user()->mobile,7,3)}}</p>

     <form action="" method="post">
     	{{ csrf_field() }}
     	<div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Enter OTP" name="otp" id="otp" value="{{old('otp')}}" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
         @if ($errors->has('otp'))
            <span class="help-block">
                <strong>{{ $errors->first('otp') }}</strong>
            </span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Verify</button>
        </div>
       </div>
     </form>
     <a href="/resend-otp" class="btnpost" class="text-center">Resend OTP</a>
  @endsection