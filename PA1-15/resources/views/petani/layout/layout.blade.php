<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('petani/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('petani/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('petani/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('petani/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{url('petani/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('petani/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('petani/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('petani/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('petani.layout.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('petani.layout.sidebar')
      <!-- partial -->
        @yield('content');
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{url('petani/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('petani/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('petani/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{url('petani/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{url('petani/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('petani/js/off-canvas.js')}}"></script>
  <script src="{{url('petani/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('petani/js/template.js')}}"></script>
  <script src="{{url('petani/js/settings.js')}}"></script>
  <script src="{{url('petani/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('petani/js/dashboard.js')}}"></script>
  <script src="{{url('petani/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
  <script src="{{url('petani/js/custom.js')}}"></script>
</body>

</html>
