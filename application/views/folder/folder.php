<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Folder</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item text-primary active"><?= $bc . " / " . $title ?></li>
            </ol>
            <?php if ($this->session->flashdata()) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Data folder <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card mb-12">
                <div class="card-header">
                    <div class="row">
                        <div class="ml-auto">
                            <h4>Data Folder</h4>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-primary" href="<?= base_url('folder/store_folder'); ?>">
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
                                    <th>Mata Kuliah</th>
                                    <th>Kelas</th>
                                    <th>Sesi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <tbody>
                                <?php foreach ($folder as $r) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $r['nama_folder']; ?></td>
                                        <td><?= $r['kelas']; ?></td>
                                        <td><?= $r['sesi']; ?></td>
                                        <td class="row">
                                            <div class="mx-auto">
                                                <a href="<?= base_url('folder/update_folder/') . encrypt_url($r['id_folder']); ?>"><i class="far fa-edit"></i></a>
                                                <a href="<?= base_url('folder/hapus_folder/') . encrypt_url($r['id_folder']); ?>"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>