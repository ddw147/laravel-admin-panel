@extends('layout.sidenav')

@section('title','Add New User')


@section('header')
 <h1>
    Add New User
     
  </h1>
	<ol class="breadcrumb">
	<li>Home</li>
	<li>Users</li>
	<li>Add New User</li>
	</ol>
@endsection

@section('content')
	 
		<div class="box">
		<div class="box-header">
		  {{-- <h3 class="box-title">User List</h3> --}}
		</div>
		<!-- /.box-header -->
		<ul>
		@foreach ($errors->all() as $message) 
			<li>{{$message}}</li>
		@endforeach
		</ul>

		<div class="box-body ">
			{!! Form::open(['url' => '/users' ,'class'=>'form-horizontal']) !!}
			
				@include('user.form')

			{!! Form::close() !!}
			 
		 
			</div>
			<div class="box-footer">
					 
			</div>
		</div>
		 
@endsection


@section('scripts')
@endsection