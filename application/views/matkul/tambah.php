<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Data Mata Kuliah</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active text-primary"><?= $bc . " / " . $title ?> / Tambah</li>
      </ol>
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="ml-auto">
                <h4>Tambah Data Mata Kuliah</h4>
              </div>
              <div class="ml-auto">
                <a class="btn btn-primary" href="<?= base_url('matkul/showdata_matkul'); ?>">
                  <i class="fas fa-chevron-left"></i> Kembali
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="<?= base_url('matkul/store_matkul') ?>" method="POST">
              <div class="form-group">
                <matkulel for="kode">Kode</matkulel>
                <input class="form-control" type="text" name="kode" id="kode">
                <small class="form-text text-danger"><?= form_error('kode'); ?></small>
              </div>
              <div class="form-group">
                <matkulel for="nama_matkul">Mata Kuliah</matkulel>
                <input class="form-control" type="text" name="nama_matkul" id="nama_matkul">
                <small class="form-text text-danger"><?= form_error('nama_matkul'); ?></small>
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