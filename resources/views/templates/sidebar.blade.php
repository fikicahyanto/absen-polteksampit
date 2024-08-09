<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('storage/logo.png') }}" style="margin-left: auto;margin-right: auto; margin-top: auto;margin-bottom: auto;width:75%;" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Absen Polisam</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('absen') }}">
            <i class="bi bi-person-workspace"></i>
            <span>Data Absensi</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('indexs') }}">
            <i class="bi bi-chat-left"></i>
            <span>Notifikasi Absensi</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('masteruser_index') }}">
            <i class="bi bi-people"></i>
            <span>Master Users</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('fingerprint_index') }}">
            <i class="bi bi-gear"></i>
            <span>Mesin Absensi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->