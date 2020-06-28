@extends('user.layouts.master')
@section('content')
<main class="profile-page">
  <section class="section-profile-cover section-shaped my-0">
    <!-- Circles background -->
    <div class="shape shape-style-1 shape-primary alpha-4">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <!-- SVG separator -->
    <div class="separator separator-bottom separator-skew">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="card card-profile shadow mt--300">
        <div class="px-4">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="{{$data_profil -> getFoto()}}" class="rounded-circle" style='display: inline-block;
                  width: 150px;
                  height: 150px;
                  object-fit: cover;' alt="image">
                </a>
              </div>
            </div>
            <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
              <div class="card-profile-actions py-4 mt-lg-0 text-center">
                <a href="#" class="btn btn-block btn-danger btn-sm reset"><i class="fas fa-history mr-4"></i>Reset Password</a>
                <button class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#ganti"><i class="fas fa-lock mr-4"></i>Ganti Password</button>
              </div>
            </div>
            <div class="col-lg-4 order-lg-1">
              <div class="card-profile-stats d-flex justify-content-center">
                <div>
                  <span class="heading">Username Akun</span>
                  <span class="description">{{auth() -> user() -> username}}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center my-5">
            <h3>Keluarga {{$data_profil -> nama}}</h3>
            <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>Nomor Handphone {{$data_profil -> nomor}}</div>
            <div class="h6 mt-4"><i class="ni business_briefcase-24 mr-2"></i>{{$data_profil -> pekerjaan}}</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>


<div class="modal fade" id="ganti" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-default">Ganti Password</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/user/gantipassword' method='post' >
          {{ csrf_field() }}
          <div class="form-group focused">
            <label class="form-control-label" for="input-username">Password Lama</label>
            <input type="password" 
                  name="passwordlama"
                  class="form-control form-control-alternative"
                  placeholder="Password Lama" required>
          </div>
          <div class="form-group focused">
            <label class="form-control-label" for="input-username">Password Baru</label>
            <input type="password" 
                  name="passwordbaru"
                  class="form-control form-control-alternative"
                  placeholder="Password Baru" required>
          </div>
          <div class="form-group focused">
            <label class="form-control-label" for="input-username">Konfirmasi Password</label>
            <input type="password" 
                  name="passwordbaru2"
                  class="form-control form-control-alternative"
                  placeholder="Konfirmasi Password" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger  ml-auto">Reset</button>
        <button type="submit" class="btn btn-primary">Kirim</button></form>
      </div>
    </div>
  </div>
</div>

<script>
  $('.reset').click(function() {
    swal({
      title: "Yakin?",
      text: "Reset password menjadi \"default\"?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/user/reset";
      } else {
        swal("Tidak Reset Password!");
      }
    });
  });
</script>
@endsection