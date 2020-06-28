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
              <h2 class="mb-0">Data Kegiatan</h2>
            </div>
            <div class="col-md-6 col-sm-12 mt-3 mt-md-0 text-center text-md-right">
              <button class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah">
                <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                <span class="btn-inner--text">Tambah Kegiatan</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Nama</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_kegiatan as $data)
                  <tr>
                    <th scope="row">
                      {{$data -> nama}}
                    </th>
                    <td>
                      {{$data -> keterangan}}
                    </td>
                    <td>
                      <?php 
                        $tgl = explode(" ",$data -> tanggal);
                        $tgl2 = explode("-",$tgl[0]);
                        
                        $bulan = strtotime($data -> tanggal);
                        $bulan = date('F', $bulan);
                        $bulaneng = ['January','February','March','April','May','June','July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanidn = ['Januari','Februari','Maret','April','Mei','Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        for($i=0;$i<count($bulanidn);$i++) {
                          if($bulan == $bulaneng[$i]) {
                            $bulan = $bulanidn[$i];
                          }
                        }
                        $tgl2 = $tgl2[2]." ".$bulan." ".$tgl2[0];

                        $hari = strtotime($data -> tanggal);
                        $hari = date('l', $hari);

                        $harieng = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                        $hariidn = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

                        for($i=0;$i<count($hariidn);$i++) {
                          if($hari == $harieng[$i]) {
                            $hari = $hariidn[$i];
                          }
                        }  
                        $tglKeg = $hari.", ".$tgl2;
                      ?>
                      {{$tglKeg}}
                    </td>
                    <td>
                      <a href="?ubah={{$data -> id}}" class="btn btn-sm btn-block btn-warning">Edit</a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-sm btn-block btn-danger hapus" pengid="{{$data -> id}}" judul="{{$data -> nama}}">Hapus</a>
                    </td>
                  </tr>
                @endforeach              
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_kegiatan -> links()}}
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
        <h3 class="modal-title">Tambah Kegiatan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/kegiatan/tambah' method='post' >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Nama Kegiatan</label>
                <input type="text" 
                       name="nama"
                       class="form-control form-control-alternative"
                       placeholder="Nama Kegiatan" required>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-username">Keterangan</label>
                  <textarea 
                         name="keterangan"
                         rows="6"
                         class="form-control form-control-alternative"
                         placeholder="Keterangan" required></textarea>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Tanggal</label> 
              <div class="form-group focused">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                  </div>
                  <input class="form-control datepicker" placeholder="Select date" type="text" name="tanggal" required>
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

<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Ubah Kegiatan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          $idKegiatan = 0; 
          $nama = 0; 
          $keterangan = 0; 
          $tanggal = "A-A-A A:A:A"; 
          if(isset($_GET['ubah'])) {
            $idKegiatan = $_GET['ubah'];
          }
          foreach($data_kegiatan -> where('id', $idKegiatan) as $datas) {
            $nama = $datas -> nama;
            $keterangan = $datas -> keterangan;
            $tanggal = $datas -> tanggal;
          }
        ?>
        <form action='/admin/kegiatan/{{$idKegiatan}}/ubah' method='post' >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Nama Kegiatan</label>
                <input type="text" 
                       name="nama"
                       class="form-control form-control-alternative"
                       placeholder="Nama Kegiatan"
                       value="{{$nama}}" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Keterangan</label>
                <textarea 
                        name="keterangan"
                        rows="6"
                        class="form-control form-control-alternative"
                        placeholder="Keterangan" required>{{$keterangan}}</textarea>
              </div>
            </div>
          </div>
          <?php 
            $tgl = explode(" ",$tanggal);
            $tgl2 = explode("-",$tgl[0]);
            
            $bulan = strtotime($tanggal);
            $bulan = date('F', $bulan);
            $bulaneng = ['January','February','March','April','May','June','July', 'August', 'September', 'October', 'November', 'December'];
            $bulanidn = ['Januari','Februari','Maret','April','Mei','Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            for($i=0;$i<count($bulanidn);$i++) {
              if($bulan == $bulaneng[$i]) {
                $bulan = $bulanidn[$i];
              }
            }
            $tgl2 = $tgl2[2]."/".$tgl2[1]."/".$tgl2[0];

            $hari = strtotime($tanggal);
            $hari = date('l', $hari);

            $harieng = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
            $hariidn = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

            for($i=0;$i<count($hariidn);$i++) {
              if($hari == $harieng[$i]) {
                $hari = $hariidn[$i];
              }
            }  
            $tglKeg = $tgl2;
          ?>
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Tanggal</label> 
              <div class="form-group focused">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                  </div>
                  <input class="form-control datepicker" placeholder="Select date" type="text" name="tanggal" value="{{$tglKeg}}" required>
                </div>
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
      text: "Hapus data kegiatan \""+judul+"\"? Data yang dihapus tidak dapat dikembalikan!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/admin/kegiatan/"+pengid+"/hapus";
      } else {
        swal("Data tidak dihapus!");
      }
    });
  });

  $('.datepicker')[0] && $('.datepicker').each(function() {
        $('.datepicker').datepicker({
            minDate: new Date(2020, 6-1, 18), 
            disableTouchKeyboard: true,
            autoclose: false
        });
    });
</script>

@endsection