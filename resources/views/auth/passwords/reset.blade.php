@extends('layout.auth')

@section('title','Reset Password')

@section('content')
 <p class="login-box-msg">Reset your password</p>
<p></p>  
             
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="EmailID" required autofocus>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="has-feedback form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          

                            
                                <input id="password" type="password" class="form-control" name="password" required placeholder="New Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                             
                        </div>

                        <div class="has-feedback form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm New Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>


                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                             
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
