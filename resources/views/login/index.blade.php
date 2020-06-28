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
    Website {{$data_desa -> namadesa}}
  </title>
  <!-- Favicon -->
  <link href="{{asset('assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="{{asset('assets/fonts/font.css')}}'" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('assets/css/argon-dashboard.css?v=1.1.0')}}" rel="stylesheet" />
  <script src="{{asset('assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>

  <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet"/>
  <script src="{{asset('assets/js/toastr.min.js')}}"></script>
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="#">
          <img src="{{asset('assets/img/brand/white.png')}}" />
        </a>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Selamat Datang!</h1>
              <p class="text-lead text-light">Silakan Masukkan Username dan Password Anda untuk Masuk Ke Website {{$data_desa -> namadesa}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent">
              <h1 class="text-primary text-center">Masuk ke Akun</h1>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form action="/postlogin" method="post">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" name='username' required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name='password' required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-2 text-white">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="copyright text-center">
              &copy; 2020 Syrenne | Template Powered by <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="{{asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
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