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
              <h2 class="mb-0">Arisan Ibu-Ibu</h2>
            </div>
            <div class="col-md-6 col-sm-12 mt-3 mt-md-0 text-center text-md-right">
              <button class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah">
                <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                <span class="btn-inner--text">Tambah Jadwal</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Tempat</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_aribu as $data)
                  <tr>
                    <th scope="row">
                      <?php 
                        $idKel = $data -> tempat;
                        $nama = "Data Data_Dihapus";
                        foreach($data_kel -> where('id', $idKel) as $datas) {
                          $nama = $datas -> nama;
                        }
                        $nama = explode(" ",$nama);
                        $nama = "Bu ".$nama[1];
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
                    <td>
                      <a href="?ubah={{$data -> id}}" class="btn btn-sm btn-block btn-warning">Edit</a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-sm btn-block btn-danger hapus" arid="{{$data -> id}}" tanggal="{{$tglArisan}}">Hapus</a>
                    </td>
                  </tr>
                @endforeach              
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer py-4">
          <div class="pagination justify-content-end mb-0">
            {{$data_aribu -> links()}}
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
        <h3 class="modal-title">Tambah Jadwal Arisan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/arisanIbu/tambah' method='post' >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Tempat</label> 
              <div class="form-group">
                <select class="form-control form-control-alternative" name='tempat' required>
                  <option disabled selected>Nama</option>
                  @foreach($data_kel as $data)
                    <?php 
                      $namaIbu = explode(" ",$data -> nama);
                      $namaIbu = "Ibu ".$namaIbu[1];
                    ?>
                    <option value="{{$data -> id}}">{{$namaIbu}}</option>
                  @endforeach
                </select>
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
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Jam</label> 
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <select class="form-control form-control-alternative" name='jam' required>
                      <option disabled selected>Jam</option>
                      @php
                        $jam = 0;
                        while ($jam <= 23) {
                          @endphp
                            @if($jam <= 9)
                              <option value="{{"0".$jam}}">{{"0".$jam}}</option>
                            @else
                              <option value="{{$jam}}">{{$jam}}</option>
                            @endif
                          @php
                          $jam++;
                        }
                      @endphp
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <select class="form-control form-control-alternative" name='menit'>
                      <option disabled selected>Menit</option>
                      <option value="00">00</option>
                      <option value="15">15</option>
                      <option value="30">30</option>
                      <option value="45">45</option>
                    </select>
                  </div>
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
        <h3 class="modal-title">Ubah Jadwal Arisan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          $idAri = 0; 
          $id = 0;
          $nama = "a a";
          $tanggal = "A-A-A A:A:A"; 

          if(isset($_GET['ubah'])) {
            $idAri = $_GET['ubah'];
          }
          
          foreach($data_aribu -> where('id', $idAri) as $data) {
            foreach($data_kel -> where('id', $data -> tempat) as $datas) {
              $nama = $datas -> nama;
              $id = $datas -> id;
            }
            $tanggal = $data -> tanggal;
          }

          $nama = explode(" ", $nama);
          $nama = "Bu ".$nama[1];
        ?>
        <form action='/admin/arisanIbu/{{$idAri}}/ubah' method='post' >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Ubah jadwal arisan tempat <span class='text-muted'>{{$nama}}</span> menjadi</label> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Tempat</label> 
              <div class="form-group">
                <select class="form-control form-control-alternative" name='tempat' required>
                  <option disabled selected>Nama</option>
                  @foreach($data_kel as $data)
                    <?php 
                      $namaIbu = explode(" ",$data -> nama);
                      $namaIbu = "Ibu ".$namaIbu[1];
                    ?>
                    <option value = "{{$data -> id}}"  @if($data -> id == $id) selected @endif>{{$namaIbu}}</option>
                  @endforeach
                </select>
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
            $tglAri = $tgl2;
          ?>
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Tanggal</label> 
              <div class="form-group focused">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                  </div>
                  <input class="form-control datepicker" placeholder="Select date" type="text" name="tanggal" value="{{$tglAri}}" required>
                </div>
              </div>
            </div>
          </div>
          @php
            $tgl = explode(" ",$tanggal);
            $waktu = explode(":",$tgl[1]);
          @endphp
          <div class="row">
            <div class="col-md-12">
              <label class="form-control-label" for="input-username">Jam</label> 
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <select class="form-control form-control-alternative" name='jam' required>
                      <option disabled selected>Jam</option>
                      @php
                        $jam = 0;
                        while ($jam <= 23) {
                          @endphp
                            @if($jam <= 9)
                              <option value="{{"0".$jam}}" @if($jam==$waktu[0]) selected @endif>{{"0".$jam}}</option>
                            @else
                              <option value="{{$jam}}" @if($jam==$waktu[0]) selected @endif>{{$jam}}</option>
                            @endif
                          @php
                          $jam++;
                        }
                      @endphp
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <select class="form-control form-control-alternative" name='menit' required>
                      <option disabled selected>Menit</option>
                      <option value="00" @if($waktu[1]=="00") selected @endif>00</option>
                      <option value="15" @if($waktu[1]=="15") selected @endif>15</option>
                      <option value="30" @if($waktu[1]=="30") selected @endif>30</option>
                      <option value="45" @if($waktu[1]=="45") selected @endif>45</option>
                    </select>
                  </div>
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
    var arid = $(this).attr('arid');
    var tanggal = $(this).attr('tanggal');
    swal({
      title: "Yakin?",
      text: "Hapus data arisan tanggal "+tanggal+"? Data yang dihapus tidak dapat dikembalikan!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/admin/arisanIbu/"+arid+"/hapus";
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