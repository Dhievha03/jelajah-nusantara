<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('logo/white-logo.png') }}" alt="Logo" class="w-100 p-2">
        </div>
        <div class="sidebar-brand-text mx-3" style="text-align: left">Jelajah Nusantara</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ Route::is('admin.admin.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.admin.index') }}">
            <i class="fas fa-fw fa fa-user"></i>
            <span>Admin</span></a>
    </li>

    <li class="nav-item {{ Route::is('admin.user.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
            <i class="fas fa-fw fa fa-users"></i>
            <span>User</span></a>
    </li>
    <li class="nav-item {{ Route::is('admin.provinsi.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.provinsi.index') }}">
            <i class="fas fa-fw fa fa-map"></i>
            <span>Provinsi</span></a>
    </li>

    <li class="nav-item {{ Route::is('admin.wisata.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.wisata.index') }}">
            <i class="fas fa-map-marked-alt"></i>
            <span>Wisata</span></a>
    </li>

    <li class="nav-item {{ Route::is('admin.wisata-approval.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.wisata-approval.index') }}">
            <i class="fas fa-check-square"></i>
            <span>Wisata Approval</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
