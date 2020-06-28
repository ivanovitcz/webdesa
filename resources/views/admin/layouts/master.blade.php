<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Admin Panel {{$data_desa -> namadesa}}
  </title>
  <!-- Favicon -->
  
  <link href="{{asset('assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="{{asset('assets/fonts/font.css')}}" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  
  <link href="{{asset('assets/css/argon-dashboard.css?v=1.1.0')}}" rel="stylesheet" />

  <script src="{{asset('assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet"/>
  <script src="{{asset('assets/js/toastr.min.js')}}"></script>
  <script src="{{asset('assets/js/swal.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>



 
  


</head>

<body class="">
  @include('admin.layouts.sidebar')
  <div class="main-content">
    <!-- Navbar -->
    @include('admin.layouts.navbar')
    <!-- End Navbar -->
    <!-- Header -->
    @yield('content')
  </div>
  <!--   Core   -->
  <script src="{{asset('assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  <script src="{{asset('assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
  <!--   Argon JS   -->
  <script src="{{asset('assets/js/argon-dashboard.min.js?v=1.1.0')}}"></script>
  <script src="{{asset('assets/js/trackjs.js')}}"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  <script>
    @if(Session::has('sukses')) 
      toastr.success("{{Session::get('sukses')}}", 'Sukses')
    @endif
    @if(Session::has('error')) 
      toastr.error("{{Session::get('error')}}", 'Gagal')
    @endif
  </script>
</body>

</html>