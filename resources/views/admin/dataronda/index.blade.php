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
              <h2 class="mb-0">Jadwal Ronda</h2>
            </div>
            <div class="col-md-6 col-sm-12 mt-3 mt-md-0 text-center text-md-right">
              <button class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah">
                <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                <span class="btn-inner--text">Tambah</span>
              </button>
            </div>
          </div>
        </div>
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
                        {{$data -> nama}} 
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="?ubah={{$hari[1]}}" class="dropdown-item">Ubah Hari</a>
                            <a href="#" class="dropdown-item hapus" nama="{{$data -> nama}}" kel-id="{{$hari[1]}}" hari="Senin">Hapus</a>
                          </div>
                        </div>
                      @endforeach
                    </td>
                    <td class='px-2'>
                      <?php 
                        $hari = explode(" ", $selasa[$i]);
                      ?>
                      @foreach($data_kel -> where('id',$hari[0]) as $data)
                        {{$data -> nama}}
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="?ubah={{$hari[1]}}" class="dropdown-item">Ubah Hari</a>
                            <a href="#" class="dropdown-item hapus" nama="{{$data -> nama}}" kel-id="{{$hari[1]}}" hari="Selasa">Hapus</a>
                          </div>
                        </div>
                      @endforeach
                    </td>
                    <td class='px-2'>
                      <?php 
                        $hari = explode(" ", $rabu[$i]);
                      ?>
                      @foreach($data_kel -> where('id',$hari[0]) as $data)
                        {{$data -> nama}}
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="?ubah={{$hari[1]}}" class="dropdown-item">Ubah Hari</a>
                            <a href="#" class="dropdown-item hapus" nama="{{$data -> nama}}" kel-id="{{$hari[1]}}" hari="Rabu">Hapus</a>
                          </div>
                        </div>
                      @endforeach
                    </td>
                    <td class='px-2'>
                      <?php 
                        $hari = explode(" ", $kamis[$i]);
                      ?>
                      @foreach($data_kel -> where('id',$hari[0]) as $data)
                        {{$data -> nama}}
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="?ubah={{$hari[1]}}" class="dropdown-item">Ubah Hari</a>
                            <a href="#" class="dropdown-item hapus" nama="{{$data -> nama}}" kel-id="{{$hari[1]}}" hari="Kamis">Hapus</a>
                          </div>
                        </div>
                      @endforeach
                    </td>
                    <td class='px-2'>
                      <?php 
                        $hari = explode(" ", $jumat[$i]);
                      ?>
                      @foreach($data_kel -> where('id',$hari[0]) as $data)
                        {{$data -> nama}}
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="?ubah={{$hari[1]}}" class="dropdown-item">Ubah Hari</a>
                            <a href="#" class="dropdown-item hapus" nama="{{$data -> nama}}" kel-id="{{$hari[1]}}" hari="Jumat">Hapus</a>
                          </div>
                        </div>
                      @endforeach
                    </td>
                    <td class='px-2'>
                      <?php 
                        $hari = explode(" ", $sabtu[$i]);
                      ?>
                      @foreach($data_kel -> where('id',$hari[0]) as $data)
                        {{$data -> nama}}
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="?ubah={{$hari[1]}}" class="dropdown-item">Ubah Hari</a>
                            <a href="#" class="dropdown-item hapus" nama="{{$data -> nama}}" kel-id="{{$hari[1]}}" hari="Sabtu">Hapus</a>
                          </div>
                        </div>
                      @endforeach
                    </td>
                    <td class='px-2'>
                      <?php 
                        $hari = explode(" ", $minggu[$i]);
                      ?>
                      @foreach($data_kel -> where('id',$hari[0]) as $data)
                        {{$data -> nama}}
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="?ubah={{$hari[1]}}" class="dropdown-item">Ubah Hari</a>
                            <a href="#" class="dropdown-item hapus" nama="{{$data -> nama}}" kel-id="{{$hari[1]}}" hari="Minggu">Hapus</a>
                          </div>
                        </div>
                      @endforeach
                    </td>
                  </tr>
                @endfor              
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            
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
        <h3 class="modal-title">Tambah Jadwal Ronda</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/ronda/tambah' method='post' >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Nama</label> 
              <div class="form-group">
                <select class="form-control form-control-alternative" name='id_kel' required>
                  <option disabled selected>Nama</option>
                  @foreach($data_kel as $data)
                  <option value="{{$data -> id}}">{{$data -> nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Hari</label> 
              <div class="form-group">
                <select class="form-control form-control-alternative" name='hari' required>
                  <option disabled selected>Hari</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
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
        <h3 class="modal-title">Ubah Jadwal Ronda</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          $idRonda = 0; 
          $nama = 0;
          if(isset($_GET['ubah'])) {
            $idRonda = $_GET['ubah'];
          }
          foreach($data_ronda -> where('id', $idRonda) as $data) {
            foreach($data_kel -> where('id', $data -> id_kel) as $datas) {
              $nama = $datas -> nama;
              echo "<script>console.log('$nama')</script>";
            }
          }
        ?>
        <form action='/admin/ronda/{{$idRonda}}/ubah' method='post' >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Ubah jadwal ronda <span class='text-muted'>{{$nama}}</span></label> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Hari</label> 
              <div class="form-group">
                <select class="form-control form-control-alternative" name='hari' required>
                  <option disabled selected>Hari</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
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
    var nama = $(this).attr('nama');
    var kelid = $(this).attr('kel-id');
    var hari = $(this).attr('hari');
    swal({
      title: "Yakin?",
      text: "Hapus jadwal "+nama+" pada hari "+hari+"?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/admin/ronda/"+kelid+"/hapus";
      } else {
        swal("Data tidak dihapus!");
      }
    });
  });
</script>
@endsection