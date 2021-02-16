<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">

  <style>
    .invalid-feedback-custom{
      display: block;
      width: 100%;
      /* margin-top: .25rem; */
      font-size: 80%;
      color: #dc3545;
      font-weight: bold;
    }
  </style>
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

 

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" onclick="logout()" style="cursor: pointer;">
          <i class="fas fa-power-off text-danger" style="font-size:25px;"></i>
          
        </a>

      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="padding-top:5px;">
           
          <img src="{{ asset('admin/user.png') }}" width="30" height="30" class="img-circle elevation-2" alt="User Image">
          
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Actions</span>
          <div class="dropdown-divider"></div>
          <a href="{{url('/admin/change/password')}}" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Change Password
            {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <li class="nav-item" style="margin-right: 40px !important;">
        <p class="text-bold text-secondary" style="line-height:0 !important;margin-top:22px !important;">{{ Auth::guard('admin')->user()->name }}</p>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link" style="margin-top: 20px !important;">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
       <span class="brand-text font-weight-light text-bold">Dashboard</span>
     </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.home') }}" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ route('show.category') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('show.subcat') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Subcategory
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ route('show.brand') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Brands
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('show.product') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Products
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/pending/order') }}" class="nav-link">
                  
                  <p>New Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.accept.payment')}}" class="nav-link">
                 
                  <p>Accept Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.progress.payment')}}" class="nav-link">
                  
                  <p>Progress Delivery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.success.payment')}}" class="nav-link">
                  
                  <p>Delivery Success</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.cancel.order')}}" class="nav-link">
                  
                  <p>Cancel Order</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Site Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/slider') }}" class="nav-link">
                  
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/about') }}" class="nav-link">
                 
                  <p>About us</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ url('/admin/company/info') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Company Information
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}

    @yield('admin_content')
    <!-- Content Header (Page header) -->

    <!-- /.content -->
  {{-- </div> --}}
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
  </footer>

 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<script>
  function logout(){
    if(confirm("Do you want to leave ?")==true){
      window.location.href="/admin/logout";
      
    }
  }
</script>
<script>
  @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
             toastr.info("{{ Session::get('messege') }}");
             break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
           toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
  @endif
</script>  

<!-- DataTables -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
