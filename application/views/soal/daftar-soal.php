<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Soal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item text-primary active"><?= $bc . " / " . $title ?></li>
            </ol>
            <?php if ($this->session->flashdata()) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Data soal <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-soalel="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card mb-12">
                <div class="card-header">
                    <div class="row">
                        <div class="ml-auto">
                            <h4>Data Soal</h4>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-primary" href="<?= base_url('soal/store_soal'); ?>">
                                <i class="fas fa-plus-square text-white"></i> Tambah
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Folder Soal</th>
                                    <th>Nama Soal</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <tbody>
                                <?php foreach ($soal as $r) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $r['tanggal']; ?></td>
                                        <td><?= $r['folder_soal']; ?></td>
                                        <td><?= $r['nama_soal']; ?></td>
                                        <td><?= $r['status']; ?></td>
                                        <td class="row">
                                            <div class="mx-auto">
                                                <a href="<?= base_url('soal/update_soal/') . encrypt_url($r['id_soal']); ?>"><i class="far fa-edit"></i></a>
                                                <a href="<?= base_url('soal/hapus_soal/') . encrypt_url($r['id_soal']); ?>"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>