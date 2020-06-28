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
            <h1 class="display-3  text-white">Papan Pengumuman<span>Desa Suka Jaya</span></h1>
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
              <div class="d-flex px-3">
                <div class="pl-4">
                  <h4 class="display-3 text-primary">Papan Pengumuman</h4>
                  <p class="text-primary">Dimohon membaca pengumuman yang ada, agar warga Desa Maju Mundur dapat selalu update informasi yang ada.</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="card-body">
          <div class="col-lg-12 order-lg-1">
            @foreach($data_peng as $datas)
              <div class="card shadow shadow-lg--hover mt-3">
                <div class="card-body">
                  <div class="d-flex">
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
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_peng -> links()}}
          </div>
        </div>
      </div>
      
    </div>
  </section>
</main>
@endsection