<!DOCTYPE html>
<html>
<head>
	 <title>@yield('title')</title>
	@include('include.meta')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
  $(function () {
	$('input').iCheck({
	  checkboxClass: 'icheckbox_square-blue',
	  radioClass: 'iradio_square-blue',
	  increaseArea: '20%' // optional
	});
  });
</script>
</body>
</html>
