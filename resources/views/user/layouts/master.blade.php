<!--

=========================================================
* Argon Design System - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Website {{$data_desa -> namadesa}}</title>
  <!-- Favicon -->
  <link href="{{asset('assetsuser/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="{{asset('assetsuser/fonts/font.css')}}" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('assetsuser/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('assetsuser/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('assetsuser/css/argon.css?v=1.1.0')}}" rel="stylesheet">
  <script src="{{asset('assetsuser/vendor/jquery/jquery.min.js')}}"></script>
  <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet"/>
  <script src="{{asset('assets/js/toastr.min.js')}}"></script>
  <script src="{{asset('assets/js/swal.min.js')}}"></script>


</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="/user">
          <img src="{{asset('assetsuser/img/brand/white.png')}}" alt="brand">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-align-right"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="/user">
                  <img src="{{asset('assetsuser/img/brand/blue.png')}}" alt="brand">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            @if(auth() -> user() -> status == "RT")
              <li class="nav-item mr-md-5 mb-sm-0">
                <a class="nav-link nav-link-icon" href="/admin" data-toggle="tooltip" title="Masuk Halaman Admin">
                  <span class="nav-link-inner--text">Admin</span>
                </a>
              </li>
             @endif
            <li class="nav-item mr-md-5 mb-sm-0">
              <a class="nav-link nav-link-icon" href="/user/profil" data-toggle="tooltip" title="Lihat Profil">
                <span class="nav-link-inner--text">Profil</span>
              </a>
            </li>
            <li class="nav-item mr-md-5 mb-sm-0">
              <a class="nav-link nav-link-icon" href="/user/ronda" data-toggle="tooltip" title="Lihat Jadwal Ronda">
                <span class="nav-link-inner--text">Ronda</span>
              </a>
            </li>
            <li class="nav-item mr-md-5 mb-sm-0">
              <a class="nav-link nav-link-icon" href="/user/arisanibu" data-toggle="tooltip" title="Lihat Jadwal Arisan Ibu-Ibu">
                <span class="nav-link-inner--text">Arisan Ibu</span>
              </a>
            </li>
            <li class="nav-item mr-md-5 mb-sm-0">
              <a class="nav-link nav-link-icon" href="/user/arisanbapak" data-toggle="tooltip" title="Lihat Jadwal Bapak-Bapak">
                <span class="nav-link-inner--text">Arisan Bapak</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/logout" class="btn btn-neutral btn-icon btn-block">
                <span class="btn-inner--icon">
                  <i class="fas fa-sign-out-alt mr-3"></i>
                </span>
                <span class="nav-link-inner--text">Keluar</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  @yield('content')
  

  <footer class="footer has-cards">
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-12">
          <h3 class="text-primary font-weight-light mb-2">Selalu Semangat Warga {{$data_desa -> namadesa}}</h3>
          <h4 class="mb-0 font-weight-light">{{$data_desa -> alamat}}</h4>
        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-12 text-center">
          <div class="copyright">
            &copy; 2020 Syrenne | Template Powered by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Core -->
  <script src="{{asset('assetsuser/vendor/popper/popper.min.js')}}"></script>
  <script src="{{asset('assetsuser/vendor/bootstrap/bootstrap.min.js')}}"></script>
  <script src="{{asset('assetsuser/vendor/headroom/headroom.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assetsuser/js/argon.js?v=1.1.0')}}"></script>
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
