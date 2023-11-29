<!-- Sidebar -->
<ul class="navbar-nav sidebar bg-gradient-primary sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.dashboard') }}">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3" style="text-align: left">Jelajah Nusantara</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Route::is('user.dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('user.dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>
  <li class="nav-item {{ Route::is('user.profile') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('user.profile') }}">
          <i class="fas fa-user"></i>
          <span>Profil Saya</span></a>
  </li>

  <li class="nav-item {{ Route::is('user.wisata.*') && !Route::is('user.wisata.saved') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('user.wisata.index') }}">
        <i class="fas fa-fw fa fa-map"></i>
          <span>Wisataku</span></a>
  </li>

  <li class="nav-item {{ Route::is('user.wisata.saved') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('user.wisata.saved') }}">
          <i class="far fa-bookmark"></i>
          <span>Disimpan</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/">
      <i class="fas fa-long-arrow-alt-left"></i>
        <span>Kembali</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


</ul>
<!-- End of Sidebar -->
