@extends('admin.layouts.master')
@section('content')
<?php 
  $idUser = auth() -> user() -> id;
  $idKelUser = 0;
  $nama = 0;
  foreach($data_kel -> where('id_users', $idUser) as $datas) {
    $nama = $datas -> nama;
    $idKelUser = $datas -> id;
  }
?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    
  </div>
</div>
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 text-center text-lg-left">
              <h2 class="mb-0">Data Keluarga</h2>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-3 mt-md-0 text-center text-md-right">
              <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 mt-3 mt-lg-0 text-center text-lg-right">
                  <button class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah">
                    <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                    <span class="btn-inner--text ">Tambah Keluarga</span>
                  </button>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 mt-3 mt-lg-0 text-center text-lg-right">
                  <button class="btn btn-icon btn-3 btn-success" data-toggle="modal" data-target="#gantiketua">
                    <span class="btn-inner--icon"><i class="fas fa-user mr-2"></i></span>
                    <span class="btn-inner--text ">Tunjuk Ketua</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Nama Keluarga</th>
                  <th scope="col">Nomor</th>
                  <th scope="col">Detail</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_kel2 as $data)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        {{$data -> nama}}
                      </div>
                    </th>
                    <td>
                      {{$data -> nomor}}
                    </td>
                    <td>
                      <a href="/admin/keluarga/{{$data -> id}}/detail" class="btn btn-sm btn-block btn-info">Info Detail</a>
                    </td>
                    <td>
                      @if($data -> id != $idKelUser)
                        <a href="#" class="btn btn-sm btn-block btn-danger hapus" nama="{{$data -> nama}}" kel-id="{{$data -> id}}">Hapus</a>
                      @else 
                        <button class="btn btn-sm btn-block btn-danger" disabled>Hapus</button>
                      @endif
                    </td>
                  </tr>
                @endforeach                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_kel2 -> links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  @include('admin.layouts.footer')
</div>


<div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Tambah Keluarga</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/keluarga/tambah' method='post' enctype='multipart/form-data'>
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-4">
              <h6 class="heading-small text-muted mb-4">Informasi Akun</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-username">Username</label>
                      <input type="text" 
                             name="username"
                             class="form-control form-control-alternative"
                             placeholder="Username" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-username">Password</label>
                      <input type="password" 
                             name="password"
                             class="form-control form-control-alternative"
                             placeholder="Password" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
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
                             placeholder="Nama Keluarga" required>
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
                             placeholder="Nomor" required>
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
                             placeholder="Pekerjaan" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Foto</label>
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
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" id='reset' class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Input</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="gantiketua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Tunjuk Sebagai Ketua</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Sekarang Anda, <span class='text-primary'>{{$nama}}</span> ketuanya, Anda akan menunjuk Ketua baru, setelah Anda memilih maka akun anda akan otomatis logout!</label> 
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Ketua Baru</label> 
              <div class="form-group">
                <select class="form-control form-control-alternative" id="gantiketua" name='tempat' required>
                  <option disabled selected>Nama</option>
                  @foreach($data_kel as $data)
                    <option value="{{$data -> id}}">{{$data -> nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" id='reset' class="btn btn-secondary">Reset</button>
        <a href='#' class="btn btn-danger ganti">Ganti Ketua</a>
      </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('.hapus').click(function() {
    var nama = $(this).attr('nama');
    var kelid = $(this).attr('kel-id');
    swal({
      title: "Yakin?",
      text: "Hapus data dari keluarga "+nama+"? Data yang dihapus tidak dapat dikembalikan!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/admin/keluarga/"+kelid+"/hapus";
      } else {
        swal("Data tidak dihapus!");
      }
    });
  });

  $('.ganti').click(function() {
    var namaketua = $("#gantiketua :selected").text(); // The text content of the selected option
    var idketua = $("#gantiketua :selected").val(); // The value of the selected option
    swal({
      title: "Yakin?",
      text: "Tujuk "+namaketua+" sebagai Ketua? Anda akan otomatis logout dari akun Anda!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((gantiketua) => {
      if (gantiketua) {
        window.location = "/admin/keluarga/"+idketua+"/gantiketua";
      } else {
        swal("Batal Ganti Ketua!");
      }
    });
  });
</script>
@endsection