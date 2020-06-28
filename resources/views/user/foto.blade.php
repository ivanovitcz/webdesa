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
            <h1 class="display-3  text-white">Foto-Foto Kegiatan<span>Desa Suka Jaya</span></h1>
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
                  <h4 class="display-3 text-primary">Foto-Foto Kegiatan</h4>
                  <p class="text-primary">Foto-foto kegiatan dari Desa Maju Mundur, dari kegiatan Arisan, Ronda, dan lain-lain.</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="card-body">
          <div class="col-lg-12 order-lg-1">
            @foreach($data_foto as $datas)
              <div class="card shadow shadow-lg--hover mt-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="{{$datas -> getFoto()}}" alt="Foto" class="img-fluid rounded shadow" >
                    </div>
                    <div class="col-md-8 mt-2">
                      <p>{{$datas -> keterangan}}.</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_foto -> links()}}
          </div>
        </div>
      </div>
      
    </div>
  </section>
</main>
@endsection