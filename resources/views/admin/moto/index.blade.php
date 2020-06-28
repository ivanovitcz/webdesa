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
              <h2 class="mb-0">Data Motto</h2>
            </div>
            <div class="col-md-6 col-sm-12 mt-3 mt-md-0 text-center text-md-right">
              <button class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah">
                <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                <span class="btn-inner--text">Tambah Motto</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Motto</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_motto as $data)
                    <th scope="row">
                      {{$data -> isi}}
                    </td>
                    <th>
                      <a href="?ubah={{$data -> id}}" class="btn btn-sm btn-block btn-warning">Edit</a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-sm btn-block btn-danger hapus" pengid="{{$data -> id}}" judul="{{$data -> isi}}">Hapus</a>
                    </td>
                  </tr>
                @endforeach              
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_motto -> links()}}
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
        <h3 class="modal-title">Tambah Moto</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/moto/tambah' method='post' >
          {{ csrf_field() }}
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
          $idMoto = 0; 
          $isi = 0; 
          if(isset($_GET['ubah'])) {
            $idMoto = $_GET['ubah'];
          }
          foreach($data_motto -> where('id', $idMoto) as $datas) {
            $isi = $datas -> isi;
          }
        ?>
        <form action='/admin/moto/{{$idMoto}}/ubah' method='post' >
          {{ csrf_field() }}
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
      text: "Hapus data moto \""+judul+"\"? Data yang dihapus tidak dapat dikembalikan!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/admin/moto/"+pengid+"/hapus";
      } else {
        swal("Data tidak dihapus!");
      }
    });
  });
</script>

@endsection