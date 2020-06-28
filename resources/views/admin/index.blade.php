@extends('admin.layouts.master')
@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Jumlah barang Hilang</h5>
                  <span class="h2 font-weight-bold mb-0">{{count($data_aduan -> where('kategori', 'Hilang'))}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Saran Masuk</h5>
                  <span class="h2 font-weight-bold mb-0">{{count($data_aduan -> where('kategori', 'Saran'))}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Keluhan Masuk</h5>
                  <span class="h2 font-weight-bold mb-0">{{count($data_aduan -> where('kategori', 'Keluhan'))}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kritik Masuk</h5>
                  <span class="h2 font-weight-bold mb-0">{{count($data_aduan -> where('kategori', 'Kritik'))}} </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <?php 
                $bulan = date('n');  
                $bulanidn = ['Januari','Februari','Maret','April','Mei','Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
              ?>
              <h2 class="mb-0">Jadwal Kegiatan Bulan {{$bulanidn[$bulan-1]}}</h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Nama Kegiatan</th>
                  <th scope="col">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_aribu as $data)
                  <?php 
                    $bulan = date('n');
                    $a = date('n',strtotime($data -> tanggal));
                  ?>
                  @if($a == $bulan)
                  <tr>
                    <th scope="row">
                      <?php 
                        $idKel = $data -> tempat;
                        $nama;
                        foreach($data_kel -> where('id', $idKel) as $datas) {
                          $nama = $datas -> nama;
                        }
                        $nama = explode(" ",$nama);
                        $nama = "Bu ".$nama[1];
                      ?>
                      {{"Arisan Ibu-Ibu di Rumah ".$nama}}
                    </th>
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
                        $tglArisan = $hari.", ".$tgl2.", Pukul ".$tgl[1];
                      ?>
                      {{$tglArisan}}
                    </td>
                  </tr>
                  @endif
                @endforeach     
                @foreach($data_ariba as $data)
                  <?php 
                    $bulan = date('n');
                    $a = date('n',strtotime($data -> tanggal));
                  ?>
                  @if($a == $bulan)
                  <tr>
                    <th scope="row">
                      <?php 
                        $idKel = $data -> tempat;
                        $nama;
                        foreach($data_kel -> where('id', $idKel) as $datas) {
                          $nama = $datas -> nama;
                        }
                      ?>
                      {{"Arisan Bapak-Bapak di Rumah ".$nama}}
                    </th>
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
                        $tglArisan = $hari.", ".$tgl2.", Pukul ".$tgl[1];
                      ?>
                      {{$tglArisan}}
                    </td>
                  </tr>
                  @endif
                @endforeach
                @foreach($data_kegiatan as $data)
                  <?php 
                    $bulan = date('n');
                    $a = date('n',strtotime($data -> tanggal));
                  ?>
                  @if($a == $bulan)
                  <tr>
                    <th scope="row">
                      {{$data -> nama}}
                    </th>
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
                        $tglArisan = $hari.", ".$tgl2.", Pukul ".$tgl[1];
                      ?>
                      {{$tglArisan}}
                    </td>
                  </tr>
                  @endif
                @endforeach            
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  @include('admin.layouts.footer')
</div>
@endsection