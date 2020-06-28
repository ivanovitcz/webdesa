<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fas fa-align-left"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="/admin">
      <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
    </a>
    <!-- User -->
    @include('admin.layouts.navbarmobile')
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="/admin">
              <img src="{{asset('assets/img/brand/blue.png')}}">
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <!-- Navigation -->
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class=" nav-link @if($_SERVER['REQUEST_URI'] == '/admin') active @endif" href="/admin"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/keluarga') !== false) active @endif" href="/admin/keluarga">
            <i class="fas fa-id-card text-blue"></i> Daftar Keluarga
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/ronda') !== false) active @endif" href="/admin/ronda">
            <i class="fas fa-exclamation-triangle text-danger"></i> Jadwal Ronda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/arisanIbu') !== false) active @endif" href="/admin/arisanIbu">
            <i class="fas fa-users text-yellow"></i> Jadwal Arisan Ibu-Ibu
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/arisanBapak') !== false) active @endif" href="/admin/arisanBapak">
            <i class="fas fa-users text-green"></i> Jadwal Arisan Bapak-Bapak
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/kegiatan') !== false) active @endif" href="/admin/kegiatan ">
            <i class="fas fa-calendar-alt text-warning"></i> Jadwal Kegiatan Lain
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/pengumuman') !== false) active @endif" href="/admin/pengumuman">
            <i class="fas fa-bullhorn text-info"></i> Pengumuman
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/aduan') !== false) active @endif" href="/admin/aduan">
            <i class="fas fa-comments text-danger"></i> Aduan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/moto') !== false) active @endif" href="/admin/moto">
            <i class="fas fa-comment-dots text-success"></i> Moto
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/foto') !== false) active @endif" href="/admin/foto">
            <i class="fas fa-folder-open text-danger"></i> Foto Kegiatan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(strpos($_SERVER['REQUEST_URI'], '/profil') !== false) active @endif" href="/admin/profil">
            <i class="fas fa-hotel text-yellow"></i> Profil Desa
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>