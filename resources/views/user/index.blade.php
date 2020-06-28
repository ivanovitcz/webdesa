@extends('user.layouts.master')
@section('content')
<main>
  <div class="position-relative">
    <!-- shape Hero -->
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
              <?php 
                $id = auth() -> user() -> id;
                $nama;
                $id_kel;
                foreach($data_kel -> where('id_users', $id) as $datas) {
                  $nama = $datas -> nama;
                  $id_kel = $datas -> id;
                }
              ?>
              <h1 class="display-3  text-white">Selamat Datang {{$nama}}<span>Selalu Semangat Selalu Ramah</span></h1>
              <p class="lead  text-white">Ini adalah website dari {{$data_desa -> namadesa}}, website ini membantu warga untuk melihat Jadwal Ronda, Jadwal Arisan, Pengumuman, ataupun menyampaikan keluhan.</p>
            
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- 1st Hero Variation -->
  </div>

  <section class="section section-lg pt-lg-0 mt--200">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="row row-grid">
            <div class="col-lg-4">
              <div class="card card-lift--hover shadow border-0">
                <div class="card-body py-5">
                  <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                    <i class="fas fa-shield-alt"></i>
                  </div>
                  <h6 class="text-primary text-uppercase">Jadwal Ronda</h6>
                  <?php 
                    $ronda = [];
                    foreach($data_ronda -> where('id_kel', $id_kel) as $datas) {
                      array_push($ronda, $datas -> hari);
                    }
                  ?>
                  @if(count($ronda) == 1)
                    <p class="description mt-3">{{$nama}} mendapat jadwal setiap hari {{$ronda[0]}}</p>
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
                    <p class="description mt-3">{{$nama}} mendapat jadwal setiap hari {{$hari}}</p>
                  @endif
                  <div>
                    <span class="badge badge-pill badge-primary">Harap Lapor Jika Berhalangan</span>
                  </div>
                  <a href="/user/ronda" class="btn btn-primary mt-4 btn-block">Lihat Jadwal</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-lift--hover shadow border-0">
                <div class="card-body py-5">
                  <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                    <i class="fas fa-venus"></i>
                  </div>
                  <?php 
                    $bulan = date('n');
                    $tempat = "A";
                    $tanggal = "A-A-A A:A:A";
                    foreach($data_aribu as $datas) {
                      $a = date('n',strtotime($datas -> tanggal));
                      if($a == $bulan) {
                        $tanggal = $datas -> tanggal;
                        $tempat = $datas -> tempat;
                      }
                    }

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

                    $tglArisan = $hari.", ".$tgl2.", Pukul ".$tgl[1];

                    $nama = "A A";
                    foreach($data_kel -> where('id', $tempat) as $datas) {
                      $nama = $datas -> nama;
                    }
                    $nama = explode(" ",$nama);
                    $nama = "Bu ".$nama[1];

                    
                  ?>
                  <h6 class="text-success text-uppercase">Jadwal Arisan Ibu-ibu</h6>
                  @if($tanggal == "A-A-A A:A:A" )
                    <p class="description mt-3">Jadwal Bulan Ini Belum Diatur</p>
                  @else
                    <p class="description mt-3">Jadwal bulan {{$bulan}} ini di Rumah {{$nama}}, Hari {{$tglArisan}}</p>
                  @endif
                  <div>
                    <span class="badge badge-pill badge-success">Jangan Lupa Uang Arisan</span>
                  </div>
                  <a href="/user/arisanibu" class="btn btn-success mt-4 btn-block">Lihat Jadwal</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-lift--hover shadow border-0">
                <div class="card-body py-5">
                  <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                    <i class="fas fa-mars"></i>
                  </div>
                  <?php 
                    $bulan = date('n');
                    $tempat = "A";
                    $tanggal = "A-A-A A:A:A";
                    foreach($data_ariba as $datas) {
                      $a = date('n',strtotime($datas -> tanggal));
                      if($a == $bulan) {
                        $tanggal = $datas -> tanggal;
                        $tempat = $datas -> tempat;
                      }
                    }
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

                    $tglArisan = $hari.", ".$tgl2.", Pukul ".$tgl[1];

                    $nama = 0;
                    foreach($data_kel -> where('id', $tempat) as $datas) {
                      $nama = $datas -> nama;
                    }
                  ?>
                  <h6 class="text-warning text-uppercase">Jadwal Arisan Bapak-bapak</h6>
                  @if($tanggal == "A-A-A A:A:A" )
                    <p class="description mt-3">Jadwal Bulan Ini Belum Diatur</p>
                  @else
                    <p class="description mt-3">Jadwal bulan {{$bulan}} ini di Rumah {{$nama}}, Hari {{$tglArisan}}</p>
                  @endif
                  <div>
                    <span class="badge badge-pill badge-warning">Jangan Lupa Uang Arisan</span>
                  </div>
                  <a href="/user/arisanbapak" class="btn btn-warning mt-4 btn-block">Lihat Jadwal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-lg bg-gradient-info">
    <div class="container">
      <div class="row row-grid align-items-center">
        <div class="col-md-12 order-md-1">
          <div class="pr-md-5">
            <h3 class="text-white mb-4">Jadwal Kegiatan Lain</h3>
            <div class="card shadow">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal</th>
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
      </div>
    </div>
  </section>

  <section class="section section-lg">
    <div class="container">
      <div class="row row-grid align-items-center">
        <div class="col-md-6 order-md-2">
          <img src="{{asset('assetsuser/img/theme/promo-1.png')}}" class="img-fluid floating" alt="image">
        </div>
        <div class="col-md-6 order-md-1">
          <div class="pr-md-5">
            <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mb-5">
              <i class="fas fa-grin-beam"></i>
            </div>
            <h3>Moto {{$data_desa -> namadesa}}</h3>
            <p>Berikut adalah moto dari {{$data_desa -> nama_desa}}, diharapkan kehidupan warganya sama dengan moto {{$data_desa -> namadesa}}</p>
            <ul class="list-unstyled mt-5">
              @foreach($data_moto as $datas)
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="fas fa-grin-beam"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">{{$datas -> isi}}</h6>
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-shaped">
    <div class="shape shape-style-1 shape-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container py-md">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-5 mb-5 mb-lg-0">
          <h1 class="text-white font-weight-light">Foto-Foto Kegiatan</h1>
          <p class="lead text-white mt-4">Foto-foto kegiatan dari {{$data_desa -> namadesa}}, dari kegiatan Arisan, Ronda, dan lain-lain.</p>
          <a href="/user/foto" class="btn btn-neutral btn-block mt-4">Lihat Semua Foto</a>
        </div>
        <div class="col-lg-6 mb-lg-auto">
          <div class="rounded shadow-lg overflow-hidden transform-perspective-right">
            <div id="carousel_example" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php $foto = 0; ?>
                @foreach($data_foto as $datas)
                  <li data-target="#carousel_example" data-slide-to="{{$foto}}" class="@if($foto == 0) active @endif"></li>
                  <?php $foto++; ?>
                @endforeach
              </ol>
              <?php $foto = 0; ?>
              <div class="carousel-inner">
                @foreach($data_foto as $datas)
                  <div class="carousel-item @if($foto == 0) active @endif">
                    <img class="img-fluid" src="{{$datas -> getFoto()}}" alt="First slide">
                  </div>
                  <?php $foto++; ?>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carousel_example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel_example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section pb-0 bg-gradient-warning">
    <div class="container">
      <div class="row row-grid align-items-center">
        <div class="col-md-6 order-lg-2 ml-lg-auto">
          <div class="position-relative pl-md-5">
            <img src="{{asset('assetsuser/img/ill/ill-2.svg')}}" class="img-center img-fluid" alt="image">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="d-flex px-3">
            <div>
              <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                <i class="ni ni-building text-primary"></i>
              </div>
            </div>
            <div class="px-4">
              <h4 class="display-3 text-white">Papan Pengumuman</h4>
              <p class="text-white">Dimohon membaca pengumuman yang ada, agar warga {{$data_desa -> namadesa}} dapat selalu update informasi yang ada</p>
            </div>
          </div>
          @foreach($data_peng as $datas)
            <div class="card shadow shadow-lg--hover mt-3">
              <div class="card-body">
                <div class="d-flex px-3">
                  <div>
                    @if($datas -> kategori == 'Himbauan')
                      <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                        <i class="fas fa-hand-paper"></i>
                      </div>
                    @elseif($datas -> kategori == 'Revisi')
                      <div class="icon icon-shape bg-gradient-info rounded-circle text-white">
                        <i class="fas fa-edit"></i>
                      </div>
                    @elseif($datas -> kategori == 'Peringatan')
                      <div class="icon icon-shape bg-gradient-danger rounded-circle text-white">
                        <i class="fas fa-times-circle"></i>
                      </div>
                    @elseif($datas -> kategori == 'Hilang')
                      <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                        <i class="fas fa-search"></i>
                      </div>
                    @endif
                  </div>
                  <div class="pl-4">
                    @if($datas -> kategori == 'Himbauan')
                      <h5 class="title text-success">{{$datas -> judul}}</h5>
                    @elseif($datas -> kategori == 'Revisi')
                      <h5 class="title text-info">{{$datas -> judul}}</h5>
                    @elseif($datas -> kategori == 'Peringatan')
                      <h5 class="title text-danger">{{$datas -> judul}}</h5>
                    @elseif($datas -> kategori == 'Hilang')
                      <h5 class="title text-warning">{{$datas -> judul}}</h5>
                    @endif
                    <p>{{$datas -> isi}}.</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          <a href="/user/pengumuman" class="btn btn-neutral mt-4 btn-block text-warning mb-4">Lihat Pengumuman</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-lg">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <h2 class="display-3">Profil {{$data_desa -> namadesa}}</h2>
          <p class="lead text-muted">{{$data_desa -> namadesa}} terletak di {{$data_desa -> alamat}}, sekarang ini diketuai oleh {{$data_desa -> ketua}}</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-lg pt-0">
    <div class="container">
      <div class="card bg-gradient-warning shadow-lg border-0">
        <div class="p-5">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-md-3">
                    <img src="{{$data_desa -> getFoto()}}" class="rounded-circle img-center shadow shadow-lg--hover mb-3" style='display: inline-block;
                    width: 150px;
                    height: 150px;
                    object-fit: cover;' alt="image">
                </div>
                <div class="col-md-9">
                  <h3 class="text-white">{{$data_desa -> ketua}}</h3>
                  <p class="lead text-white mt-3">{{$data_desa -> kataketua}}</p>    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-lg bg-gradient-default">
    <div class="container pt-lg pb-300">
      <div class="row text-center justify-content-center">
        <div class="col-lg-10">
          <h2 class="display-3 text-white">Saran dan Keluhan Warga</h2>
          <p class="lead text-white">Warga dapat menyampaikan aduan ataupun keluhan jika terdapat masalah, bisa juga menyampaikan kritik ataupun saran</p>
        </div>
      </div>
      <div class="row row-grid mt-5">
        <?php 
          $i = 0;
        ?>
        @foreach($data_aduan as $datas)
          <div class="col-lg-4 text-center">
            <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
              @if($datas -> kategori == 'Saran')
                <i class="fas fa-file-alt text-success"></i>
              @elseif($datas -> kategori == 'Keluhan')
                <i class="fas fa-frown text-info"></i>
              @elseif($datas -> kategori == 'Kritik')
                <i class="fas fa-comment text-danger"></i>
              @elseif($datas -> kategori == 'Hilang')
                <i class="fas fa-search text-warning"></i> 
              @endif
            </div>
            <h5 class="text-white mt-3">{{$datas -> judul}}</h5>
            <p class="text-white mt-3 {{'isi'.$i}}">{{$datas -> isi}}</p>
            <script>
              var myDiv = $('.isi'+{{$i}});
              myDiv.text(myDiv.text().substring(0,50)+'...');
            </script>
            <?php $i++; ?>
          </div>
        @endforeach
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5 col-sm-12">
          <a href="/user/aduan" class="btn btn-neutral mt-4 btn-block">Lihat Semua</a>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-lg pt-lg-0 section-contact-us">
    <div class="container">
      <div class="row justify-content-center mt--300">
        <div class="col-lg-8">
          <div class="card bg-gradient-secondary shadow">
            <div class="card-body p-lg-5">
              <h4 class="mb-1">Ada Saran atau Keluhan?</h4>
              <p class="mt-0">Jangan malu-malu menyampaikan suara Anda!</p>
              <form action='/user/buataduan' method='post' >
                {{ csrf_field() }}
                <label class="form-control-label" for="input-username">Kategori</label> 
                <div class="form-group">
                  <select class="form-control form-control-alternative" name='kategori' required>
                    <option disabled selected>Kategori</option>
                      <option value="Saran">Saran</option>
                      <option value="Keluhan">Keluhan</option>
                      <option value="Kritik">Kritik</option>
                      <option value="Hilang">Barang Hilang</option>
                  </select>
                </div>
                <div class="form-group focused">
                  <label class="form-control-label" for="input-username">Judul</label>
                  <input type="text" 
                        name="judul"
                        class="form-control form-control-alternative"
                        placeholder="Judul" required>
                </div>
                <div class="form-group mb-4">
                  <label class="form-control-label" for="input-username">Isi</label>
                  <textarea class="form-control form-control-alternative" name="isi" rows="4" cols="80" placeholder="Isi..." required></textarea>
                </div>
                <div>
                  <button type="submit" class="btn btn-default btn-round btn-block btn-lg">Kirim</button></form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection