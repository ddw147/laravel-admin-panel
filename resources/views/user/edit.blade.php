@extends('layout.sidenav')

@section('title','Edit User')


@section('header')
 <h1>
   Edit User
     
  </h1>
	<ol class="breadcrumb">
	<li>Home</li>
	<li>Users</li>
	<li>Edit User</li>
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
			 {!! Form::model($user, ['route' => ['users.update', $user->id] , 'class'=>'form-horizontal' , 'method'=>'PATCH' ]) !!}
			  {{ Form::hidden('redirects_to', URL::previous()) }}
			<h3>
			Edit {{$user->name}}		 
			</h3>		 
				 
				 

			<div class="form-group">
								 
				 {!! Form::label('is_verified', 'Is Verified' ,['class'=>'control-label col-sm-2']); !!}
				 
				<div class="col-sm-10">
				 <div class="checkbox icheck">
				 {!! Form::checkbox('is_verified',1,$user->is_verified ,['class'=>'form-control' , 'placeholder'=>'Confim Password '] ); !!} Yes
				 </div>
				 </div>	 
			</div>

			<div class="form-group">
								 
				 {!! Form::label('roles', 'Roles' ,['class'=>'control-label col-sm-2']); !!}
				 
				<div class="col-sm-10">
				

				 @foreach($roles as $role)
				  <div class="checkbox icheck">

				 {!! Form::checkbox('roles[]',$role->id, $user->hasRole($role->name)?true:false ,['class'=>'form-control' , 'placeholder'=>'Confim Password '] ); !!}  {{$role->name}}
				  </div>
				 @endforeach
				
				 </div>	 
			</div>

			<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">	
			 
				{!!Form::submit('SAVE',['class'=>'btn btn-info']);!!}
			</div>
			</div>

			{!! Form::close() !!}
			 
		 
			</div>
			<div class="box-footer">
					 
			</div>
		</div>
		 
@endsection


@section('scripts')
@endsection