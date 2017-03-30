@extends('layout.sidenav')

@section('title','User List')


@section('header')
 <h1>
    User List
     
  </h1>
	<ol class="breadcrumb">
	<li>Home</li>
	<li>Users List</li>
	</ol>
@endsection

@section('content')
	 
 		<div class="box">
            <div class="box-header">
              {{-- <h3 class="box-title">User List</h3> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
            <form>
            {{$searchable}}
            <div class="form-group col-sm-6">	
            <label for="name" >Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="enter name to search" value="{{Request::input('name')}}">
            </div>

            <div class="form-group col-sm-6">	
            <label for="mobile" >Mobile</label>
            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="enter mobile to search" value="{{Request::input('mobile')}}">
            </div>

            <div class="form-group col-sm-6">	
            <label for="email" >Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="enter email to search" value="{{Request::input('email')}}">
            </div>
			
			<div class="form-group col-sm-12">	
				<center>
            	<button name="search" id="search" class="btn btn-primary">Search</button>	
            	</center>
            </div>	

            </form>	

            <?php $i=0; ?>			
			<table class="table table-bordered">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Mobile	</th>
					<th>Email</th>
					<th colspan="3">Action</th>
				</tr>
				@foreach($users as $user)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->mobile}}	</td>
					<td>{{$user->email}}</td>
					<td  >
						<a href="/users/delete" class="btnpost"><i class="fa fa-trash-o" title="delete"></i> </a>&nbsp; 
						<a href="/users/{{$user->id}}"><i class="fa fa-pencil" title="edit"></i> </a> &nbsp;
						<a href="/users-block/{{$user->id}}"><i class="fa fa-ban" title="block"></i></a>
					</td>
				</tr>
				@endforeach	
			</table>
			</div>
			<div class="box-footer">
					{{$users->appends(Request::except('page'))->links()}}
			</div>
		</div>
		 
@endsection