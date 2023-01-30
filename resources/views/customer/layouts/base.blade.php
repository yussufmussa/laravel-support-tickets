@include('customer.layouts.header_files')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/customerLTELogo.png" alt="customerLTELogo" height="60" width="60">
  </div>

  @include('customer.layouts.top_bar')

  @include('customer.layouts.side_menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  @yield('contents')
   

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('customer.layouts.footer_credit')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('customer.layouts.footer_files')
