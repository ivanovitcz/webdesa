@extends('admin.layouts.master')
@section('content')
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
            <div class="col-md-6">
              <h2 class="mb-0">Profil Desa</h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action='/admin/profil/edit' method='post' enctype='multipart/form-data'>
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-username">Ketua RT</label>
                  <input type="text"
                         class="form-control form-control-alternative"
                         name='ketua'
                         value="{{$data_desa -> ketua}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-username">Kata-kata</label>
                  <textarea 
                         name="kataketua"
                         rows="3"
                         class="form-control form-control-alternative" required>{{$data_desa -> kataketua}}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group focused">
                  <label class = "form-control-label" for = "input-username">Nama Desa</label>
                  <input type  = "text"
                         class = "form-control form-control-alternative"
                         name  = 'namadesa'
                         value = "{{$data_desa -> namadesa}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-username">Alamat</label>
                  <textarea 
                         name  = "alamat"
                         rows  = "3"
                         class = "form-control form-control-alternative" required>{{$data_desa -> alamat}}</textarea>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <img src="{{$data_desa -> getFoto()}}" alt="Foto" class="img-fluid rounded shadow" >
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Ganti Foto</label>
                  <div class="custom-file">
                    <input type="file" name='foto' class="form-control form-control-alternative" id="inputGroupFile01">
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
        <div class="card-footer py-4">
          <div class="col-12 text-right">
            <button type="reset" id='reset' class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  @include('admin.layouts.footer')
</div>

@endsection