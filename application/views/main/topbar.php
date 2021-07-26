<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary" style="opacity:75%">
    <a class="navbar-brand" href="<?= base_url('dashboard'); ?>">
        <h3>Data Ujian</h3>
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto">
        <a class="nav-link" href="<?= base_url('mahasiswa'); ?>" target="_blank" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-eye"></i> Lihat </a>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('myprofile/index'); ?>">Atur Akun</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('login/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
</nav>