<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Data Jawaban</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active text-primary"><?= $bc . " / " . $title ?> / Tambah</li>
      </ol>
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="ml-auto">
                <h4>Tambah Data Jawaban</h4>
              </div>
              <div class="ml-auto">
                <a class="btn btn-primary" href="<?= base_url('hasil/showdata_hasil'); ?>">
                  <i class="fas fa-chevron-left"></i> Kembali
                </a>
              </div>
            </div>
            <div class="card-body">
              <form action="<?= base_url('hasil/store_hasil') ?>" method="POST">
                <div class="form-group">
                  <hasilel for="nama_hasil">hasiloratorium</hasilel>
                  <input class="form-control" type="text" name="nama_hasil" id="nama_hasil">
                  <small class="form-text text-danger"><?= form_error('nama_hasil'); ?></small>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </main>
</div>
</div>