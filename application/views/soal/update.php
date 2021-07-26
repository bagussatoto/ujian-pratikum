<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Soal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active text-primary"><?= $bc . " / " . $title ?> / Ubah</li>
            </ol>
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="ml-auto">
                                <h4>Ubah Soal</h4>
                            </div>
                            <div class="ml-auto"><a class="btn btn-primary" href="<?= base_url('soal/showdata_soal'); ?>">
                                    <i class="fas fa-chevron-left"></i> Kembali </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input class="form-control" type="date" name="tanggal" style="height: 50px;" value="<?= $soal['tanggal'] ?>">
                                <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                            </div>
                            <div class="form-group">
                                <soalel for="status">Status</soalel>
                                <select class="form-control" type="text" name="status" id="status">
                                    <option selected disabled value="#"><?= $soal['status']; ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                                <small class="form-text text-danger"><?= form_error('status'); ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>