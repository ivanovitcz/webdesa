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
            <div class="col-md-6 col-sm-12 text-center text-md-left">
              <h2 class="mb-0">Data Pengumuman</h2>
            </div>
            <div class="col-md-6 col-sm-12 mt-3 mt-md-0 text-center text-md-right">
              <button class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah">
                <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                <span class="btn-inner--text">Tambah Pengumuman</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Kategori</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_peng as $data)
                  <tr>
                    <td>
                      @if($data -> kategori == "Himbauan")
                        <button class='btn btn-sm btn-success btn-block'><i class="fas fa-hand-paper mr-2"></i> {{$data -> kategori}}</button> 
                      @elseif($data -> kategori == "Revisi")
                        <button class='btn btn-sm btn-info btn-block'><i class="fas fa-edit mr-2"></i> {{$data -> kategori}}</button> 
                      @elseif($data -> kategori == "Peringatan")
                        <button class='btn btn-sm btn-danger btn-block'><i class="fas fa-times-circle mr-2"></i> {{$data -> kategori}}</button> 
                      @elseif($data -> kategori == "Hilang")
                        <button class='btn btn-sm btn-warning btn-block'><i class="fas fa-search mr-2"></i> {{$data -> kategori}}</button> 
                      @endif
                    </td>
                    <th scope="row">
                      {{$data -> judul}}
                    </td>
                    <th>
                      <a href="?ubah={{$data -> id}}" class="btn btn-sm btn-block btn-warning">Edit</a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-sm btn-block btn-danger hapus" pengid="{{$data -> id}}" judul="{{$data -> judul}}">Hapus</a>
                    </td>
                  </tr>
                @endforeach              
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_peng -> links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  @include('admin.layouts.footer')
</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Tambah Pengumuman</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/pengumuman/tambah' method='post' >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Kategori</label> 
              <div class="form-group">
                <select class="form-control form-control-alternative" name='kategori' required>
                  <option disabled selected>Kategori</option>
                    <option value="Himbauan">Himbauan</option>
                    <option value="Revisi">Revisi</option>
                    <option value="Peringatan">Peringatan</option>
                    <option value="Hilang">Barang Hilang</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Judul</label>
                <input type="text" 
                       name="judul"
                       class="form-control form-control-alternative"
                       placeholder="Judul" required>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-username">Isi</label>
                  <textarea 
                         name="isi"
                         rows="6"
                         class="form-control form-control-alternative"
                         placeholder="Isi" required></textarea>
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

<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Ubah Pengumuman</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          $idPengumuman = 0; 
          $kategori = 0; 
          $judul = 0; 
          $isi = 0; 
          if(isset($_GET['ubah'])) {
            $idPengumuman = $_GET['ubah'];
          }
          foreach($data_peng -> where('id', $idPengumuman) as $datas) {
            $kategori = $datas -> kategori;
            $judul = $datas -> judul;
            $isi = $datas -> isi;
          }
        ?>
        <form action='/admin/pengumuman/{{$idPengumuman}}/ubah' method='post' >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Kategori</label> 
              <div class="form-group">
                <select class="form-control form-control-alternative" name='kategori' required>
                  <option disabled>Kategori</option>
                    <option value="Himbauan" @if($kategori == 'Himbauan') selected @endif>Himbauan</option>
                    <option value="Revisi" @if($kategori == 'Revisi') selected @endif>Revisi</option>
                    <option value="Peringatan" @if($kategori == 'Peringatan') selected @endif>Peringatan</option>
                    <option value="Hilang" @if($kategori == 'Hilang') selected @endif>Barang Hilang</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Judul</label>
                <input type="text" 
                       name="judul"
                       class="form-control form-control-alternative"
                       placeholder="Judul"
                       value="{{$judul}}" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Isi</label>
                <textarea 
                        name="isi"
                        rows="6"
                        class="form-control form-control-alternative"
                        placeholder="Isi" required>{{$isi}}</textarea>
              </div>
            </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="reset" id='reset' class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
      </div>
    </div>
  </div>
</div>

<?php 
  if(isset($_GET['ubah'])) {
      echo "
        <script>
          jQuery(document).ready(function () {
            jQuery('#ubah').modal('show');   
          });
        </script>";
    }
?>
<script>
  $('.hapus').click(function() {
    var pengid = $(this).attr('pengid');
    var judul = $(this).attr('judul');
    swal({
      title: "Yakin?",
      text: "Hapus data pengumuman \""+judul+"\"? Data yang dihapus tidak dapat dikembalikan!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/admin/pengumuman/"+pengid+"/hapus";
      } else {
        swal("Data tidak dihapus!");
      }
    });
  });
</script>

@endsection