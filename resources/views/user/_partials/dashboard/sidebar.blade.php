<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #0B2F8A !important">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.dashboard') }}">
      <div class="sidebar-brand-icon">
          <img src="{{ asset('logo/white-logo.png') }}" alt="Logo" class="w-100 p-2">
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
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-power-off"></i>
        <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


</ul>
<!-- End of Sidebar -->
