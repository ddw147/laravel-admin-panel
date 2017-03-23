<!DOCTYPE html>
<html>
<head>
   @include('include.meta')

   <title> @yield('title')</title>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
   @include('include.header')
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      

      <section class="content-header">
          @yield('header')

  <!-- <h1>
    Dash Board
    <small>Example 2.0</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Layout</a></li>
    <li class="active">Top Navigation</li>
  </ol> -->
      </section>

      <!-- Main content -->
      <section class="content">
         @yield('content')
       </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
    @include('include.footer')
    @include('include.control-sidebar')
</div>
<!-- ./wrapper -->

  @include('include.scripts')
</body>
</html>
