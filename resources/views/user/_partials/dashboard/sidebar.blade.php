<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.provinsi.index') }}">
          <i class="fas fa-fw fa fa-map"></i>
          <span>Profile Saya</span></a>
  </li>

  <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.wisata.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Wisataku</span></a>
  </li>

  <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.wisata-approval.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Disimpan</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.wisata-approval.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
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
