<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <img class="rounded mx-auto d-block text-center" src="<?= base_url('assets/img/logo.png'); ?>" alt="" width="auto" height="200px">
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-body">
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
                                        <div class="input-group mt-2" id="error_token">
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                Token <strong>Salah!</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center" id="soal">
                                        <?php
                                        $folder = $folder; //Sesuaikan Folder nya
                                        if (!($buka_folder = opendir($folder))) die("Tidak bisa membuka Folder");

                                        foreach ($soal as $f) :
                                        ?>
                                            <div class="col-md-8 mt-4 mx-auto">
                                                <table class="table">
                                                    <tr>
                                                        <td class="mr-auto">
                                                            <a class="text-danger mr-auto" target="_blank" href="<?= base_url('soal/buka_soal/') . encrypt_url($f['id_soal']); ?>"><i class="fas fa-file-pdf fa-4x" style="width: 100px;height:auto">
                                                                </i><strong class="text-secondary"><?= $f['nama_soal']; ?></strong>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
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
    <script src="<?= base_url('assets/'); ?>js/scripts.js"></script>

    <script>
        $('#error_token').hide();
        $('#soal').hide();
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
                        $('#soal').hide();
                    } else {
                        $('#error_token').hide();
                        $('#soal').show();
                        $('#token').val(data.token.lock);
                    }
                }
            });
        });
    </script>
</body>

</html>