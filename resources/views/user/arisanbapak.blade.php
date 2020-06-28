@extends('user.layouts.master')
@section('content')
<?php 
  $id = auth() -> user() -> id;
  $idKel;
  foreach($data_kel -> where('id_users', $id) as $datas) {
    $idKel = $datas -> id;
  }
?>

<main class="profile-page">
  <section class="section section-lg section-shaped pb-250">
    <div class="shape shape-style-1 shape-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container py-lg-md d-flex">
      <div class="col px-0">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="display-3  text-white">Jadwal Arisan Bapak-Bapak<span>Desa Suka Jaya</span></h1>
            <p class="lead  text-white">Harap Lapor Jika Berhalangan Menjadi Tempat Arisan.
              Hubungi {{$data_RT -> nama.", Nomor ".$data_RT -> nomor}}
            </p>
            <a href="https://wa.me/{{$data_RT -> nomor}}?text=Saya ingin lapor soal ronda" target="_blank" class="btn btn-block btn-neutral text-success"><i class="fab fa-whatsapp mr-4"></i> WhatsApp</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="card card-profile shadow mt--300">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-md-12"></div>
          </div>
          
        </div>
        <div class="p-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Tempat</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data_ariba as $data)
                    <tr>
                      <th scope="row">
                        <?php 
                          $idKel = $data -> tempat;
                          $nama;
                          foreach($data_kel -> where('id', $idKel) as $datas) {
                            $nama = $datas -> nama;
                          }
                        ?>
                        {{$nama}}
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
                  @endforeach              
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_ariba -> links()}}
          </div>
        </div>
      </div>
      
    </div>
  </section>
</main>
@endsection