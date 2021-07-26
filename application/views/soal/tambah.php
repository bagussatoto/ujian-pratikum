<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Data Soal</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active text-primary"><?= $bc . " / " . $title ?> / Tambah</li>
      </ol>
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="ml-auto">
                <h4>Tambah Data Soal</h4>
              </div>
              <div class="ml-auto">
                <a class="btn btn-primary" href="<?= base_url('soal/showdata_soal'); ?>">
                  <i class="fas fa-chevron-left"></i> Kembali
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <?php
            if (isset($error)) {
              echo "ERROR UPLOAD : <br/>";
              print_r($error);
              echo "<hr/>";
            }
            ?>
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('soal/store_soal'); ?>">
              <div class="form-group">
                <label>Tanggal</label>
                <input class="form-control" type="date" name="tanggal" style="height: 50px;">
                <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
              </div>
              <div class="form-group">
                <label>Batch</label>
                <select class="form-control" name="batch" style="height: 50px;">
                  <option disabled selected value="#">Pilih Batch</option>
                  <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <option value="<?= $i; ?>"><?= $i; ?></option>
                  <?php endfor; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('batch'); ?></small>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" style="height: 50px;">
                  <option disabled selected value="#">Pilih Status</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Nonaktif">Nonaktif</option>
                </select>
                <small class="form-text text-danger"><?= form_error('batch'); ?></small>
              </div>
              <div class="form-group">
                <label>Soal 1</label>
                <input class="form-control" type="file" name="nama_soal[]" style="height: 50px;">
                <small class="form-text text-danger"><?= form_error('nama_soal[]'); ?></small>
              </div>
              <div class="form-group">
                <label>Soal 2</label>
                <input class="form-control" type="file" name="nama_soal[]" style="height: 50px;">
                <small class="form-text text-danger"><?= form_error('nama_soal[]'); ?></small>
              </div>
              <div class="form-group">
                <label>Soal 3</label>
                <input class="form-control" type="file" name="nama_soal[]" style="height: 50px;">
                <small class="form-text text-danger"><?= form_error('nama_soal[]'); ?></small>
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