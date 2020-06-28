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
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Website {{$data_desa -> namadesa}}</title>
  <!-- Favicon -->
  <link href="{{asset('assetsuser/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="{{asset('assets/fonts/font.css')}}" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('assetsuser/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('assetsuser/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('assetsuser/css/argon.css?v=1.1.0')}}" rel="stylesheet">
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="#">
          <img src="{{asset('assetsuser/img/brand/white.png')}}" alt="brand">
        </a>
      </div>
    </nav>
  </header>
  <main>
    <!-- Web Content by Syrenne. Template Powered by Creative Tim -->
      <!--

        =========================================================
        * Argon Design System - v1.1.0
        =========================================================

        * Product Page: https://www.creative-tim.com/product/argon-design-system
        * Copyright 2019 Creative Tim (https://www.creative-tim.com)
        * Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

        * Coded by Creative Tim

        =========================================================

        * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. 
      -->
   
  <div class="position-relative">
      <!-- Hero for FREE version -->
      <section class="section section-lg section-hero section-shaped">
        <!-- Background circles -->
        <div class="shape shape-style-1 shape-primary">
          <span class="span-150"></span>
          <span class="span-50"></span>
          <span class="span-50"></span>
          <span class="span-75"></span>
          <span class="span-100"></span>
          <span class="span-75"></span>
          <span class="span-50"></span>
          <span class="span-100"></span>
          <span class="span-50"></span>
          <span class="span-100"></span>
        </div>
        <div class="row">
          <div class="col-md-6 order-md-2">
            <div class="container shape-container d-flex align-items-left py-lg">
              <div class="col pl-4">
                <div class="row align-items-left justify-content-left">
                  <div class="col-lg-10 text-left">
                    <img alt="image" src="{{asset('assetsuser/img/brand/white.png')}}" style="width: 200px;" class="img-fluid">
                    <p class="lead text-white">Makmur Warganya. Ramah Warganya. Rukun Warganya.</p>
                    <div class="btn-wrapper mt-5">
                      <a href="/login" class="btn btn-lg btn-white btn-icon btn-block mb-3 mb-sm-0">
                        <span class="btn-inner--icon"><i class="fa fa-sign-in"></i></span>
                        <span class="btn-inner--text">Masuk ke Akun</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 order-md-1">
            <div class="position-relative p-4 p-md-5">
              <img src="{{asset('assetsuser/img/ill/landing.svg')}}" class="img-center img-fluid" alt="image">
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <footer class="footer has-cards">
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-12">
          <h3 class="text-primary font-weight-light mb-2">Selalu Semangat Warga Suka Jaya!</h3>
          <h4 class="mb-0 font-weight-light">Desa Suka Jaya RT4 RW4 Kode Pos 50713, Kelurahan SKJY, Kecamatan SKJY, Kota ABCDEF</h4>
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
  <script src="{{asset('assetsuser/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assetsuser/vendor/popper/popper.min.js')}}"></script>
  <script src="{{asset('assetsuser/vendor/bootstrap/bootstrap.min.js')}}"></script>
  <script src="{{asset('assetsuser/vendor/headroom/headroom.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assetsuser/vendor/onscreen/onscreen.min.js')}}"></script>
  <script src="{{asset('assetsuser/vendor/nouislider/js/nouislider.min.js')}}"></script>
  <script src="{{asset('assetsuser/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assetsuser/js/argon.js?v=1.1.0')}}"></script>
</body>

</html>
