<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Data Folder</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active text-primary"><?= $bc . " / " . $title ?> / Tambah</li>
      </ol>
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="ml-auto">
                <h4>Tambah Data Folder</h4>
              </div>
              <div class="ml-auto">
                <a class="btn btn-primary" href="<?= base_url('folder/showdata_folder'); ?>">
                  <i class="fas fa-chevron-left"></i> Kembali
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="<?= base_url('folder/store_folder') ?>" method="POST">
              <div class="form-group">
                <label for="nama_folder">Mata Kuliah</label>
                <select class="form-control" id="nama_folder" name="nama_folder">
                  <option value="" selected disabled>Pilih Mata Kuliah</option>
                  <?php foreach ($kd as $s) : ?>
                    <option value="<?= $s['kode']; ?>"><?= $s['nama_matkul']; ?></option>
                  <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('nama_folder'); ?></small>
              </div>
              <div class="form-group">
                <label for="nama_kls">Kelas</label>
                <select class="form-control" id="nama_kls" name="nama_kls">
                  <option value="" selected disabled>Pilih Kelas</option>
                  <?php foreach ($kls as $s) : ?>
                    <option value="<?= $s['nama_kls']; ?>"><?= $s['nama_kls']; ?></option>
                  <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('nama_kls'); ?></small>
              </div>
              <div class="form-group">
                <label for="nama_sesi">Sesi</label>
                <select class="form-control" id="nama_sesi" name="nama_sesi">
                  <option value="" selected disabled>Pilih Sesi</option>
                  <?php foreach ($sesi as $s) : ?>
                    <option value="<?= $s['nama_sesi']; ?>"><?= $s['nama_sesi']; ?></option>
                  <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('nama_sesi'); ?></small>
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