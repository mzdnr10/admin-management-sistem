<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">(Name)</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Program
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dataprogram') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Program</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('tabeldosen') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Dosen</span></a>
            </li>
            <div class="sidebar-heading">
                Management Surat
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dokumen') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dokumen</span></a>
            </li>

            <?php if (session()->get('role_id') == 0): ?>
                <div class="sidebar-heading">
                    User Account
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('administrator') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Administrator</span>
                    </a>
                </li>
            <?php endif; ?>





            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>




        </ul>