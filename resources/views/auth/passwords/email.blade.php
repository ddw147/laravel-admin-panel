@extends('layout.auth')

@section('title','Reset Password')

@section('content')
 
      <p class="login-box-msg">Enter your email to reset password</p>
<p></p>  
            
              
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        

                           
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email ID" required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                               
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                              
                             
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                
           
        
   
@endsection
