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
              <h2 class="mb-0">Data Aduan Warga</h2>
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
                  <th scope="col">Oleh</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Lihat Isi</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_aduan as $data)
                  <tr>
                    <td>
                      @if($data -> kategori == "Saran")
                        <button class='btn btn-sm btn-success btn-block'><i class="fas fa-file-alt mr-2"></i> {{$data -> kategori}}</button> 
                      @elseif($data -> kategori == "Keluhan")
                        <button class='btn btn-sm btn-info btn-block'><i class="fas fa-frown mr-2"></i> {{$data -> kategori}}</button> 
                      @elseif($data -> kategori == "Kritik")
                        <button class='btn btn-sm btn-danger btn-block'><i class="fas fa-comment-dots mr-2"></i> {{$data -> kategori}}</button> 
                      @elseif($data -> kategori == "Hilang")
                        <button class='btn btn-sm btn-warning btn-block'><i class="fas fa-search mr-2"></i> {{$data -> kategori}}</button> 
                      @endif
                    </td>
                    <?php 
                      foreach($data_kel -> where('id', $data -> id_kel) as $dataKel) {
                        $nama = $dataKel -> nama;
                      }
                    ?>
                    <th scope="row">
                      {{$data -> judul}}
                    </th>
                    <td>
                      {{$nama}}
                    </td>
                    <?php 
                      $tgl = explode(" ",$data -> created_at);
                      $tgl2 = explode("-",$tgl[0]);
                      
                      $bulan = strtotime($data -> created_at);
                      $bulan = date('F', $bulan);
                      $bulaneng = ['January','February','March','April','May','June','July', 'August', 'September', 'October', 'November', 'December'];
                      $bulanidn = ['Januari','Februari','Maret','April','Mei','Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                      for($i=0;$i<count($bulanidn);$i++) {
                        if($bulan == $bulaneng[$i]) {
                          $bulan = $bulanidn[$i];
                        }
                      }
                      $tgl2 = $tgl2[2]." ".$bulan." ".$tgl2[0];

                      $hari = strtotime($data -> created_at);
                      $hari = date('l', $hari);

                      $harieng = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                      $hariidn = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

                      for($i=0;$i<count($hariidn);$i++) {
                        if($hari == $harieng[$i]) {
                          $hari = $hariidn[$i];
                        }
                      }  
                      $tglAduan = $hari.", ".$tgl2.", Pukul ".$tgl[1];
                    ?>
                    <td>
                      {{$tglAduan}}
                    </td>
                    <td>
                      <a href="?detail={{$data -> id}}" class="btn btn-sm btn-block btn-primary">Detail</a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-sm btn-block btn-danger hapus" aduid="{{$data -> id}}" judul="{{$data -> judul}}">Hapus</a>
                    </td>
                  </tr>
                @endforeach              
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_aduan -> links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  @include('admin.layouts.footer')
</div>


<div class="modal fade" id="detail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Detail Aduan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          $idAduan = 0; 
          $idKel = 0; 
          $nama = 0; 
          $kategori = 0; 
          $judul = 0; 
          $isi = 0; 
          $tanggal = "A-A-A A:A:A"; 
          if(isset($_GET['detail'])) {
            $idAduan = $_GET['detail'];
          }
          foreach($data_aduan -> where('id', $idAduan) as $datas) {
            foreach($data_kel -> where('id', $datas -> id_kel) as $dataKel) {
              $nama = $dataKel -> nama;
            }
            $kategori = $datas -> kategori;
            $judul = $datas -> judul;
            $isi = $datas -> isi;
            $tanggal = $datas -> created_at;
          }
        ?>
        <form >
          <div class="row">
            <div class="col-md-12">
              <div class="form-group focused">
                @if($kategori == "Saran")
                  <button class='btn btn-success btn-block'><i class="fas fa-file-alt mr-2"></i> {{$kategori}}</button> 
                @elseif($kategori == "Keluhan")
                  <button class='btn btn-info btn-block'><i class="fas fa-frown mr-2"></i> {{$kategori}}</button> 
                @elseif($kategori == "Kritik")
                  <button class='btn btn-danger btn-block'><i class="fas fa-comment-dots mr-2"></i> {{$kategori}}</button> 
                @elseif($kategori == "Hilang")
                  <button class='btn btn-warning btn-block'><i class="fas fa-search mr-2"></i> {{"Barang ".$kategori}}</button> 
                @endif
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
            $tgl2 = $tgl2[2]." ".$bulan." ".$tgl2[0];

            $hari = strtotime($tanggal);
            $hari = date('l', $hari);

            $harieng = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
            $hariidn = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

            for($i=0;$i<count($hariidn);$i++) {
              if($hari == $harieng[$i]) {
                $hari = $hariidn[$i];
              }
            }  
            $tglAduan = $hari.", ".$tgl2.", Pukul ".$tgl[1];
          ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label mr-2" for="input-username">Tanggal</label>
                <label class="form-control-label text-muted">{{$tglAduan}}</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label mr-2" for="input-username">Dari</label>
                <label class="form-control-label text-muted">{{$nama}}</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label mr-2" for="input-username">Tentang</label>
                <label class="form-control-label text-muted">{{$judul}}</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Isi</label>
                <textarea 
                        disabled
                        class="form-control form-control-alternative"
                        >{{$isi}}</textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
  if(isset($_GET['detail'])) {
    echo "
      <script>
        jQuery(document).ready(function () {
          jQuery('#detail').modal('show');   
        });
      </script>";
  }
?>
<script>
  $('.hapus').click(function() {
    var aduid = $(this).attr('aduid');
    var judul = $(this).attr('judul');
    swal({
      title: "Yakin?",
      text: "Hapus data aduan \""+judul+"\"? Data yang dihapus tidak dapat dikembalikan!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/admin/aduan/"+aduid+"/hapus";
      } else {
        swal("Data tidak dihapus!");
      }
    });
  });
</script>

@endsection