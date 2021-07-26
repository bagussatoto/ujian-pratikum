<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Semester Pasien</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active text-primary"><?= $bc . " / " . $title ?> / Ubah</li>
            </ol>
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="ml-auto">
                                <h4>Ubah Data Semester</h4>
                            </div>
                            <div class="ml-auto"><a class="btn btn-primary" href="<?= base_url('smt/showdata_semester'); ?>">
                                    <i class="fas fa-chevron-left"></i> Kembali </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="nama_smt">Semester</label>
                                <input class="form-control" type="text" name="nama_smt" id="nama_smt" value="<?= $smt['nama_smt']; ?>">
                                <small class="form-text text-danger"><?= form_error('nama_smt'); ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary cl">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>