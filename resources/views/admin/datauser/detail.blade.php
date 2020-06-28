  @extends('admin.layouts.master')
  @section('content')
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      
    </div>
  </div>
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="{{$data_kel2 -> getFoto()}}" class="rounded-circle" style='display: inline-block;
                  width: 150px;
                  height: 150px;
                  object-fit: cover;'>
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
            </div>
          </div>
          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  
                </div>
              </div>
            </div>
            <div class="text-center">
              <h3>
                {{$data_kel2 -> nama}}
              </h3>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{$data_kel2 -> nomor}}
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Pekerjaan
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>{{$data_kel2 -> pekerjaan}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-md-6 col-sm-12 text-center text-md-left">
                <h3 class="mb-0">Akun Keluarga</h3>
              </div>
              <div class="col-md-6 col-sm-12 mt-3 mt-md-0 text-center text-md-right">
                <a href="#" class="btn btn-sm btn-danger reset" nama="{{$data_kel2 -> nama}}" kel-id="{{$data_kel2 -> id}}" uname="{{$data_user -> username}}"><i class="fas fa-history mr-2"></i> Reset Password</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action='/admin/keluarga/{{$data_kel2 -> id}}/edit' method='post' enctype='multipart/form-data'>
              {{ csrf_field() }}
              <h6 class="heading-small text-muted mb-4">Informasi Akun</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-username">Username</label>
                      <input type="text"
                            class="form-control form-control-alternative"
                            placeholder="Username"
                            name='username'
                            value="{{$data_user -> username}}" required>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Informasi Keluarga</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-address">Nama Keluarga</label>
                      <input type="text"
                              class="form-control form-control-alternative"
                              name="nama"
                              placeholder="Nama Keluarga"
                              value="{{$data_kel2 -> nama}}" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-address">Nomor yang Bisa Dihubungi</label>
                      <input type="text"
                              class="form-control form-control-alternative"
                              name="nomor"
                              placeholder="Nomor"
                              value="{{$data_kel2 -> nomor}}" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-address">Pekerjaan</label>
                      <input type="text"
                              class="form-control form-control-alternative"
                              name="pekerjaan"
                              placeholder="Pekerjaan"
                              value="{{$data_kel2 -> pekerjaan}}" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Ganti Foto</label>
                      <div class="custom-file">
                        <input type="file" name='foto' class="form-control form-control-alternative" id="inputGroupFile01" required>
                        <label class="custom-file-label" for="inputGroupFile01" id='namefile'>Pilih Foto</label>
                      </div>
                      <script>
                        $(document).ready(function(){
                          $('input[type="file"]').change(function(e){
                              var fileName = e.target.files[0].name;
                              document.getElementById('namefile').innerHTML = fileName;
                          });
                        });
                      </script>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row text-right">
                <div class="col-12 text-right">
                  <button type="reset" id='reset' class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Edit</button></form>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    @include('admin.layouts.footer')
  </div>


  <script>
    $('.reset').click(function() {
      var nama = $(this).attr('nama');
      var kelid = $(this).attr('kel-id');
      var uname = $(this).attr('uname');
      swal({
        title: "Yakin?",
        text: "Hapus reset password "+uname+" dari keluarga "+nama+"? Password akan direset menjadi default!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/admin/keluarga/"+kelid+"/reset";
        } else {
          swal("Password Tidak Direset");
        }
      });
    });
  </script>
  @endsection