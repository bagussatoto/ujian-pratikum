<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" href="<?= base_url('assets/img/logo.png'); ?>">
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background-image: url("../assets/img/bg-wood.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-white">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <img class="rounded mx-auto d-block text-center" src="<?= base_url('assets/img/logo.png'); ?>" alt="" width="auto" height="200px">
                        </div>
                        <div class="col-md-6">
                            <?php if (form_error('nrp') || form_error('nama_mhs') || form_error('nama_smt') || form_error('nama_kelas') || form_error('nama_sesi') || form_error('nama_matkul') || form_error('nama_lab')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                    SUBMIT DATA <strong>GAGAL !!</strong>. Mohon ulangi pengisian formulir dengan benar
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-body">
                                    <form enctype="multipart/form-data" class="form-group" action="<?= base_url('mahasiswa/form'); ?>" method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="token">Token</label>
                                            <div class="col-md-12 row">
                                                <div class="input-group-append">
                                                    <input class="form-control" name="token" id="token" type="text" value="<?= set_value('token') ?>" aria-describedby="btn_token">
                                                </div>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="button" id="btn_token" data-url="<?= base_url(); ?>">Cek</button>
                                                </div>
                                                <div class="ml-auto">
                                                    <a class="button btn btn-primary" href="<?= base_url('mahasiswa') ?>"><i class="fas fa-home"></i> Beranda</a>
                                                </div>
                                            </div>
                                            <div class="mt-2" id="error_token">
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    Token <strong>Salah!</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mt-2" id="success_token">
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Token <strong>Benar!</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="nrp">
                                            <label class="small mb-1" for="nrp">NRP</label>
                                            <input class="form-control py-2" name="nrp" type="nrp" placeholder="Masukan NRP ..." />
                                            <?php if (form_error('nrp')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('nrp'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group" id="nama_mhs">
                                            <label class="small mb-1" for="nama_mhs">Nama Lengkap</label>
                                            <input class="form-control py-2" name="nama_mhs" type="nama_mhs" placeholder="Masukan Nama Lengkap ..." />
                                            <?php if (form_error('nama_mhs')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('nama_mhs'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group" id="nama_smt">
                                            <label class="small mb-1" for="nama_smt">Semester</label>
                                            <select name="nama_smt" class="custom-select">
                                                <option value="" disabled selected>Pilih Semester</option>
                                                <?php foreach ($semester as $s) : ?>
                                                    <option value="<?= $s['id_smt'] ?>"><?= $s['nama_smt'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (form_error('nama_smt')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('nama_smt'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group" id="nama_kls">
                                            <label class="small mb-1" for="nama_kls">Kelas</label>
                                            <select name="nama_kls" class="custom-select">
                                                <option value="" disabled selected>Pilih Kelas</option>
                                                <?php foreach ($kelas as $k) : ?>
                                                    <option value="<?= $k['id_kls'] ?>"><?= $k['nama_kls'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (form_error('nama_kls')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('nama_kls'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group" id="nama_sesi">
                                            <label class="small mb-1" for="nama_sesi">Sesi</label>
                                            <select name="nama_sesi" class="custom-select">
                                                <option value="" disabled selected>Pilih Sesi</option>
                                                <?php foreach ($sesi as $i) : ?>
                                                    <option value="<?= $i['id_sesi'] ?>"><?= $i['nama_sesi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (form_error('nama_sesi')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('nama_sesi'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group" id="nama_mtk">
                                            <label class="small mb-1" for="nama_matkul">Mata Kuliah</label>
                                            <select name="nama_matkul" class="custom-select">
                                                <option value="" disabled selected>Pilih Mata Kuliah</option>
                                                <?php foreach ($mtk as $l) : ?>
                                                    <option value="<?= $l['kode']; ?>"><?= $l['nama_matkul']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (form_error('nama_lab')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('nama_lab'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group" id="nama_lab">
                                            <label class="small mb-1" for="nama_lab">Laboratorium</label>
                                            <select name="nama_lab" class="custom-select">
                                                <option value="" disabled selected>Pilih Laboratorium</option>
                                                <?php foreach ($lab as $l) : ?>
                                                    <option value="<?= $l['id_lab'] ?>"><?= $l['nama_lab'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (form_error('nama_lab')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('nama_lab'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group" id="jawaban">
                                            <label class="small mb-1" for="jwb">File Jawaban </label><small><strong> (.RAR or .ZIP)</strong></small>
                                            <input type="file" class="form-control" name="jwb" id="jwb" style="height: 50px;">
                                            <?php if (form_error('jwb')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('jwb'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group row justify-content-end" id="simpan">
                                            <div class="col-xl-12 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="mt-4" id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Team Aslab 2021</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/'); ?>scripts.js"></script>

    <script>
        $('#error_token').hide();
        $('#success_token').hide();
        $('#nrp').hide();
        $('#nama_mhs').hide();
        $('#nama_smt').hide();
        $('#nama_kls').hide();
        $('#nama_sesi').hide();
        $('#nama_mtk').hide();
        $('#nama_lab').hide();
        $('#jawaban').hide();
        $('#simpan').hide();
        $('#btn_token').on('click', function() {
            const url = $(this).data('url');
            var token = $('#token').val();

            $.ajax({
                url: url + 'mahasiswa/getValToken',
                data: {
                    token: token
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data == null) {
                        $('#error_token').show();
                        $('#success_token').hide();
                        $('#nrp').hide();
                        $('#nama_mhs').hide();
                        $('#nama_smt').hide();
                        $('#nama_kls').hide();
                        $('#nama_sesi').hide();
                        $('#nama_mtk').hide();
                        $('#nama_lab').hide();
                        $('#jawaban').hide();
                        $('#simpan').hide();
                    } else {
                        $('#error_token').hide();
                        $('#success_token').show();
                        $('#nrp').show();
                        $('#nama_mhs').show();
                        $('#nama_smt').show();
                        $('#nama_kls').show();
                        $('#nama_sesi').show();
                        $('#nama_mtk').show();
                        $('#nama_lab').show();
                        $('#jawaban').show();
                        $('#simpan').show();
                        $('#token').val(data.token.lock);
                    }
                }
            });
        });
    </script>
</body>

</html>