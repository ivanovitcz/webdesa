<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Brand -->
    <span class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Selamat Datang! Di Admin Panel {{$data_desa -> namadesa}}</span>
    <!-- User -->
    <ul class="navbar-nav align-items-center d-none d-md-flex">
      <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <i class="fas fa-user mr-2"></i>
            <div class="media-body ml-2">
              <?php 
                $idUser = auth() -> user() -> id;
                $nama = 0;
                foreach($data_kel -> where('id_users', $idUser) as $datas) {
                  $nama = $datas -> nama;
                }
              ?>
              <span class="mb-0 text-sm  font-weight-bold">{{$nama}}</span>
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome!</h6>
          </div>
          <a href="/user" class="dropdown-item ">
            <i class="fas fa-user"></i>
            <span>Masuk Halaman User</span>
          </a>
          <button class="dropdown-item" data-toggle="modal" data-target="#ganti">
            <i class="fas fa-lock"></i>
            <span>Ganti Password</span>
          </button>
          <a href="/logout" class="dropdown-item ">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>


<div class="modal fade" id="ganti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Ganti Password</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/ganti' method='post' >
          {{ csrf_field() }}
          <div class="form-group focused">
            <label class="form-control-label" for="input-username">Password Lama</label>
            <input type="password" 
                  name="passwordlama"
                  class="form-control form-control-alternative"
                  placeholder="Password Lama" required>
          </div>
          <div class="form-group focused">
            <label class="form-control-label" for="input-username">Password Baru</label>
            <input type="password" 
                  name="passwordbaru"
                  class="form-control form-control-alternative"
                  placeholder="Password Baru" required>
          </div>
          <div class="form-group focused">
            <label class="form-control-label" for="input-username">Konfirmasi Password</label>
            <input type="password" 
                  name="passwordbaru2"
                  class="form-control form-control-alternative"
                  placeholder="Konfirmasi Password" required>
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