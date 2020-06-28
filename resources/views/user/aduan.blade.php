@extends('user.layouts.master')
@section('content')

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
            <h1 class="display-3  text-white">Aduan dan Keluhan<span>Desa Suka Jaya</span></h1>
            <p class="lead  text-white">Jika Ada yang Ingin Ditanyakan Bisa
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
        <div class="card-header pt-4">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="px-2">
                <h4 class="display-3 text-primary">Aduan dan Keluhan</h4>
                <p class="text-primary">Warga dapat menyampaikan aduan ataupun keluhan jika terdapat masalah, bisa juga menyampaikan kritik ataupun saran.</p>
                <button class='btn btn-primary' data-toggle="modal" data-target="#tambah"><i class="fas fa-plus mr-2"></i> Aduan dan Keluhan</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="col-lg-12 order-lg-1">
            @foreach($data_aduan as $datas)
              <div class="card shadow shadow-lg--hover mt-3">
                <div class="card-body">
                  <div class="d-flex">
                    <div>
                      @if($datas -> kategori == 'Saran')
                        <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                          <i class="fas fa-file-alt"></i>
                        </div>
                      @elseif($datas -> kategori == 'Keluhan')
                        <div class="icon icon-shape bg-gradient-info rounded-circle text-white">
                          <i class="fas fa-frown"></i>
                        </div>
                      @elseif($datas -> kategori == 'Kritik')
                        <div class="icon icon-shape bg-gradient-danger rounded-circle text-white">
                          <i class="fas fa-comment"></i>
                        </div>
                      @elseif($datas -> kategori == 'Hilang')
                        <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                          <i class="fas fa-search"></i>
                        </div>
                      @endif
                    </div>
                    <div class="pl-4">
                      <?php 
                        foreach($data_kel -> where('id', $datas -> id_kel) as $dataKel) {
                          $nama = $dataKel -> nama;
                        }

                        $tgl = explode(" ",$datas -> created_at);
                        $tgl2 = explode("-",$tgl[0]);
                        
                        $bulan = strtotime($datas -> created_at);
                        $bulan = date('F', $bulan);
                        $bulaneng = ['January','February','March','April','May','June','July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanidn = ['Januari','Februari','Maret','April','Mei','Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        for($i=0;$i<count($bulanidn);$i++) {
                          if($bulan == $bulaneng[$i]) {
                            $bulan = $bulanidn[$i];
                          }
                        }
                        $tgl2 = $tgl2[2]." ".$bulan." ".$tgl2[0];

                        $hari = strtotime($datas -> created_at);
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
                      @if($datas -> kategori == 'Saran')
                        <h5 class="title text-success">{{$datas -> judul}}</h5>
                      @elseif($datas -> kategori == 'Keluhan')
                        <h5 class="title text-info">{{$datas -> judul}}</h5>
                      @elseif($datas -> kategori == 'Kritik')
                        <h5 class="title text-danger">{{$datas -> judul}}</h5>
                      @elseif($datas -> kategori == 'Hilang')
                        <h5 class="title text-warning">{{$datas -> judul}}</h5>
                      @endif
                      <p>{{$datas -> isi}}.</p>
                      <p class='text-muted'>{{"Oleh : ".$nama." / ".$tglAduan}}</p>

                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_aduan -> links()}}
          </div>
        </div>
      </div>
      
    </div>
  </section>
</main>


<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-default">Aduan dan Keluhan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger  ml-auto">Reset</button>
        <button type="submit" class="btn btn-primary">Kirim</button></form>
      </div>
    </div>
  </div>
</div>
@endsection