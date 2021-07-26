<?php
$show = ['', ''];
$menu = ['', '', '', '', '', '', '', '', '', '', ''];

if ($title == 'Dashboard') {
    $menu[0] = 'active';
} else if ($title == 'Mahasiswa') {
    $menu[1] = 'active';
    $show[0] = 'show';
} else if ($title == 'Semester') {
    $menu[2] = 'active';
    $show[0] = 'show';
} else if ($title == 'Kelas') {
    $menu[3] = 'active';
    $show[0] = 'show';
} else if ($title == 'Sesi') {
    $menu[4] = 'active';
    $show[0] = 'show';
} else if ($title == 'Data Soal') {
    $menu[5] = 'active';
} else if ($title == 'Laboratorium') {
    $menu[6] = 'active';
} else if ($title == 'Jawaban') {
    $menu[7] = 'active';
} else if ($title == 'Token') {
    $menu[8] = 'active';
} else if ($title == 'Mata Kuliah') {
    $menu[9] = 'active';
} else if ($title == 'Data Folder') {
    $menu[10] = 'active';
}


?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-footer">
                <div class="row">
                    <img class="img-profile rounded-circle mx-auto" src="<?= base_url(); ?>assets/img/<?= $user['foto']; ?>" style="width: 50px;height:50px">
                    <div class="small mr-auto">
                        <h5><?= $user['name']; ?></h5><i class="fas fa-circle text-success"></i> Online
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link <?= $menu[0]; ?>" href="<?= base_url('dashboard') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading <?= $menu[1] . $menu[2] . $menu[3] . $menu[4]; ?>">Mahasiswa</div>
                    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseMahasiswa" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Data Mahasiswa
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $show[0]; ?>" id="collapseMahasiswa" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $menu[1]; ?>" href="<?= base_url('mhs/showdata_mahasiswa') ?>">Mahasiswa</a>
                            <a class="nav-link <?= $menu[2]; ?>" href="<?= base_url('smt/showdata_semester') ?>">Semester</a>
                            <a class="nav-link <?= $menu[3]; ?>" href="<?= base_url('kls/showdata_kelas') ?>">Kelas</a>
                            <a class="nav-link <?= $menu[4]; ?>" href="<?= base_url('sesi/showdata_sesi') ?>">Sesi</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Bank Soal</div>
                    <a class="nav-link <?= $menu[5]; ?>" href="<?= base_url('soal/showdata_soal') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        Data Soal
                    </a>
                    <div class="sb-sidenav-menu-heading">Ujian Praktikum</div>
                    <a class="nav-link <?= $menu[6]; ?>" href="<?= base_url('lab/showdata_lab') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        Data Laboratorium
                    </a>
                    <a class="nav-link <?= $menu[7]; ?>" href="<?= base_url('hasil/showdata_hasil') ?>">
                        <div class="sb-nav-link-icon"><i class="far fa-paper-plane"></i></div>
                        Data Jawaban
                    </a>
                    <a class="nav-link <?= $menu[8]; ?>" href="<?= base_url('token/showdata_token') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                        Data Token
                    </a>
                    <a class="nav-link <?= $menu[9]; ?>" href="<?= base_url('matkul/showdata_matkul') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-sticky-note"></i></div>
                        Data Mata Kuliah
                    </a>
                    <a class="nav-link <?= $menu[10]; ?>" href="<?= base_url('folder/showdata_folder') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                        Data Folder
                    </a>
                    <a class="nav-link" href="<?= base_url('login/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>