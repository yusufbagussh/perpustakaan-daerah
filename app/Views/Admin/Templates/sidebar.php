<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Perpustakaan</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Profile
    </div>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/profil">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/kategori/index') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/buku/index') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Book</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/admin/index') ?>">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Admin</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/anggota/index') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Anggota</span></a>
    </li>







    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>