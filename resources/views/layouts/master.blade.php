<!DOCTYPE html>
<?php
$httpRoot = 'http://' . $_SERVER['HTTP_HOST'] . '/';
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ro's torv | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ $httpRoot }}./bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ $httpRoot }}dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{ $httpRoot }}dist/css/skins/skin-blue.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php

?>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ROS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Ro's</b> Torv</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
<?php
if (Auth::check()) {
?>
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
<?php
}
?>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
<?php
if (Auth::check()) {
?>
			@include('layouts.notification')
<?php
}
?>
			@include('layouts.userMenu')
          
        </ul>
      </div>
    </nav>
  </header>
  <?php
if (Auth::check()) {
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">      
      @include('layouts.menu')
    </section>
    <!-- /.sidebar -->
  </aside>
<?php
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('layouts.contentHeader')


    <!-- Main content -->
    <section class="content">
	@yield('content')           
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{ $httpRoot }}plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ $httpRoot }}bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ $httpRoot }}./plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ $httpRoot }}dist/js/app.min.js"></script>
@yield('javaScripts')
</body>
</html>
