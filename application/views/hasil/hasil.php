<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Jawaban</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item text-primary active"><?= $bc . " / " . $title ?></li>
            </ol>
            <?php if ($this->session->flashdata()) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Data jawaban <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="mx-auto">
                            <h4>Data Jawaban</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Token</th>
                                    <th>NRP</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Mata Kuliah</th>
                                    <th>Nama Lab</th>
                                    <th>Waktu Selesai</th>
                                    <th>Folder</th>
                                    <th>Jawaban</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <tbody>
                                <?php foreach ($hasil as $h) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $h['nama_token']; ?></td>
                                        <td><?= $h['nrp']; ?></td>
                                        <td><?= $h['nama_mhs']; ?></td>
                                        <td><?= $h['nama_matkul']; ?></td>
                                        <td><?= $h['nama_lab']; ?></td>
                                        <td><?= $h['TimeStamp']; ?></td>
                                        <td><?= $h['folder']; ?></td>
                                        <td><?= $h['jawaban']; ?></td>
                                        <td class="row">
                                            <div class="mx-auto">
                                                <a href="<?= base_url('hasil/hapus_hasil/') . encrypt_url($h['id_jwb']); ?>"><i class="far fa-trash-alt"></i></a>
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