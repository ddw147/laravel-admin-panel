@extends('layout.sidenav')

@section('title','Change Password')


@section('header')
 <h1>
    Change Password
     
  </h1>
	<ol class="breadcrumb">
	<li>Home</li>
	<li>Change Password</li>
	</ol>
@endsection


@section('content')
 		<div class="box">
            <div class="box-header">
              {{-- <h3 class="box-title">User List</h3> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
	       <ul>
			@foreach ($errors->all() as $message) 
				<li>{{$message}}</li>
			@endforeach
			</ul>

			 @if (session('status'))
		    
				@component('alerts.success')
				    	 {{session('status')}}
				@endcomponent
				   
			@endif

			{!! Form::open(['url' => '/change-password' ,'class'=>'form-horizontal']) !!}


			<div class="form-group">

				{!!Form::label('exiting-password', 'Exiting Password' , ['class'=>'form-label col-sm-2'])!!}
				<div class="col-sm-10">
					 {!! Form::password('exiting-password' ,['class'=>'form-control' , 'placeholder'=>'Enter Exiting Password'] ); !!}
				</div>	
			</div>	

			<div class="form-group">

				{!!Form::label('password', 'New Password' , ['class'=>'form-label col-sm-2'])!!}
				<div class="col-sm-10">
					 {!! Form::password('password' ,['class'=>'form-control' , 'placeholder'=>'Enter New Password'] ); !!}
				</div>	
			</div>	


			<div class="form-group">

				{!!Form::label('password_confirmation', 'New Password' , ['class'=>'form-label col-sm-2'])!!}
				<div class="col-sm-10">
					 {!! Form::password('password_confirmation' ,['class'=>'form-control' , 'placeholder'=>'Confirm Password'] ); !!}
				</div>	
			</div>	
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					{!!Form::submit('Change Password' ,['class'=>'btn btn-primary'])!!}	
				</div>
			</div>

			{!! Form::close()!!}

			</div>
		</div>

@endsection

