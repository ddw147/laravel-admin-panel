<!DOCTYPE html>
<html>
<head>
	<title> @yield('title')</title>
	@include('include.meta')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	@include('include.sidenav-header')
	<!-- Left side column. contains the logo and sidebar -->
	@include('include.sidebar')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			@yield('header')
		</section>
		<!-- Main content -->
		<section class="content">
			@yield('content')
		 </section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 2.3.7
		</div>
		<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
		reserved.
	</footer>
	@include('include.control-sidebar')
</div>
@include('include.scripts')
<!-- ./wrapper -->
</body>
</html>
@yield('script')