<!DOCTYPE html>
<html>
<head>
	 <title>@yield('title')</title>
	@include('include.meta')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
	<a href="../../index2.html"><b>Admin LTE</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
		
		@yield('content')

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
@include('include.scripts') 

<!-- iCheck -->

</body>
</html>
