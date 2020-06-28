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
            <h1 class="display-3  text-white">Jadwal Ronda<span>Desa Suka Jaya</span></h1>
            <p class="lead  text-white">Harap Lapor Jika Berhalangan Hadir dan Jika Ingin Tukar Hari.
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
            <div class="col-md-12">
              <?php 
                $id = auth() -> user() -> id;
                $nama;
                $id_kel;
                foreach($data_kel -> where('id_users', $id) as $datas) {
                  $nama = $datas -> nama;
                  $id_kel = $datas -> id;
                }
                $ronda = [];
                foreach($data_ronda -> where('id_kel', $id_kel) as $datas) {
                  array_push($ronda, $datas -> hari);
                }
              ?>
              @if(count($ronda) == 1)
                <h5 class="mb-0">{{$nama}} mendapat jadwal setiap hari {{$ronda[0]}}</h5>
              @elseif(count($ronda) > 1)
                <?php 
                  $jumlah = count($ronda);
                  $i = 0;
                  $hari = "";
                  while($i < $jumlah) {
                    if($i == $jumlah - 1) {
                      if($jumlah > 2) {
                        $hari = $hari.", dan ".$ronda[$i];
                      } else {
                        $hari = $hari." dan ".$ronda[$i];
                      }
                    } elseif ($i == 0 ) {
                      $hari = $ronda[$i];
                    } else {
                      $hari = $hari.", ".$ronda[$i];
                    }
                    $i++;
                  }
                ?>
                <h5 class="mb-0">{{$nama}} mendapat jadwal setiap hari {{$hari}}</h5>
              @endif
            </div>
          </div>
          
        </div>
        <div class="p-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Senin</th>
                    <th scope="col">Selasa</th>
                    <th scope="col">Rabu</th>
                    <th scope="col">Kamis</th>
                    <th scope="col">Jumat</th>
                    <th scope="col">Sabtu</th>
                    <th scope="col">Minggu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $senin = [];  
                    $selasa = [];  
                    $rabu = [];  
                    $kamis = [];  
                    $jumat = [];  
                    $sabtu = [];  
                    $minggu = [];  
                    foreach($data_ronda as $data) {
                      if($data -> hari == 'Senin') {
                        array_push($senin, $data -> id_kel." ".$data -> id);
                      }
                      if($data -> hari == 'Selasa') {
                        array_push($selasa, $data -> id_kel." ".$data -> id);
                      }
                      if($data -> hari == 'Rabu') {
                        array_push($rabu, $data -> id_kel." ".$data -> id);
                      }
                      if($data -> hari == 'Kamis') {
                        array_push($kamis, $data -> id_kel." ".$data -> id);
                      }
                      if($data -> hari == 'Jumat') {
                        array_push($jumat, $data -> id_kel." ".$data -> id);
                      }
                      if($data -> hari == 'Sabtu') {
                        array_push($sabtu, $data -> id_kel." ".$data -> id);
                      }
                      if($data -> hari == 'Minggu') {
                        array_push($minggu, $data -> id_kel." ".$data -> id);
                      }
                    }
                    $temp = 0;
                    if(count($senin) >= $temp) {
                      $temp = count($senin);
                    }
                    if(count($selasa) >= $temp) {
                      $temp = count($selasa);
                    }
                    if(count($rabu) >= $temp) {
                      $temp = count($rabu);
                    }
                    if(count($kamis) >= $temp) {
                      $temp = count($kamis);
                    }
                    if(count($jumat) >= $temp) {
                      $temp = count($jumat);
                    }
                    if(count($sabtu) >= $temp) {
                      $temp = count($sabtu);
                    }
                    if(count($minggu) >= $temp) {
                      $temp = count($minggu);
                    }

                    if(count($senin) < $temp) {
                      $selisih = $temp - count($senin);
                      for($i = 0; $i < $selisih; $i++) {
                        array_push($senin, '- -');
                      }
                    }
                    if(count($selasa) < $temp) {
                      $selisih = $temp - count($selasa);
                      for($i = 0; $i < $selisih; $i++) {
                        array_push($selasa, '- -');
                      }
                    }
                    if(count($rabu) < $temp) {
                      $selisih = $temp - count($rabu);
                      for($i = 0; $i < $selisih; $i++) {
                        array_push($rabu, '- -');
                      }
                    }
                    if(count($kamis) < $temp) {
                      $selisih = $temp - count($kamis);
                      for($i = 0; $i < $selisih; $i++) {
                        array_push($kamis, '- -');
                      };
                    }
                    if(count($jumat) < $temp) {
                      $selisih = $temp - count($jumat);
                      for($i = 0; $i < $selisih; $i++) {
                        array_push($jumat, '- -');
                      };
                    }
                    if(count($sabtu) < $temp) {
                      $selisih = $temp - count($sabtu);
                      for($i = 0; $i < $selisih; $i++) {
                        array_push($sabtu, '- -');
                      };
                    }
                    if(count($minggu) < $temp) {
                      $selisih = $temp - count($minggu);
                      for($i = 0; $i < $selisih; $i++) {
                        array_push($minggu, '- -');
                      };
                    }
                  ?>
                  @for($i = 0; $i < $temp; $i++)
                    <tr>
                      <td class='px-2'>
                        <?php 
                          $hari = explode(" ", $senin[$i]);
                        ?>
                        @foreach($data_kel -> where('id',$hari[0]) as $data)
                          @if($data -> id == $idKel)
                            <button class="btn btn-primary btn-block">{{$data -> nama}}</button>
                          @else
                            {{$data -> nama}}
                          @endif
                        @endforeach
                      </td>
                      <td class='px-2'>
                        <?php 
                          $hari = explode(" ", $selasa[$i]);
                        ?>
                        @foreach($data_kel -> where('id',$hari[0]) as $data)
                          @if($data -> id == $idKel)
                            <button class="btn btn-primary btn-block">{{$data -> nama}}</button>
                          @else
                            {{$data -> nama}}
                          @endif
                        @endforeach
                      </td>
                      <td class='px-2'>
                        <?php 
                          $hari = explode(" ", $rabu[$i]);
                        ?>
                        @foreach($data_kel -> where('id',$hari[0]) as $data)
                          @if($data -> id == $idKel)
                            <button class="btn btn-primary btn-block">{{$data -> nama}}</button>
                          @else
                            {{$data -> nama}}
                          @endif
                        @endforeach
                      </td>
                      <td class='px-2'>
                        <?php 
                          $hari = explode(" ", $kamis[$i]);
                        ?>
                        @foreach($data_kel -> where('id',$hari[0]) as $data)
                          @if($data -> id == $idKel)
                            <button class="btn btn-primary btn-block">{{$data -> nama}}</button>
                          @else
                            {{$data -> nama}}
                          @endif
                        @endforeach
                      </td>
                      <td class='px-2'>
                        <?php 
                          $hari = explode(" ", $jumat[$i]);
                        ?>
                        @foreach($data_kel -> where('id',$hari[0]) as $data)
                          @if($data -> id == $idKel)
                            <button class="btn btn-primary btn-block">{{$data -> nama}}</button>
                          @else
                            {{$data -> nama}}
                          @endif
                        @endforeach
                      </td>
                      <td class='px-2'>
                        <?php 
                          $hari = explode(" ", $sabtu[$i]);
                        ?>
                        @foreach($data_kel -> where('id',$hari[0]) as $data)
                          @if($data -> id == $idKel)
                            <button class="btn btn-primary btn-block">{{$data -> nama}}</button>
                          @else
                            {{$data -> nama}}
                          @endif
                        @endforeach
                      </td>
                      <td class='px-2'>
                        <?php 
                          $hari = explode(" ", $minggu[$i]);
                        ?>
                        @foreach($data_kel -> where('id',$hari[0]) as $data)
                          @if($data -> id == $idKel)
                            <button class="btn btn-primary btn-block">{{$data -> nama}}</button>
                          @else
                            {{$data -> nama}}
                          @endif
                        @endforeach
                      </td>
                    </tr>
                  @endfor              
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
</main>
@endsection