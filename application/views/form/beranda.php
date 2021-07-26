<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" href="<?= base_url('assets/img/logo.png'); ?>">
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/bootstrap.css" rel="stylesheet">

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
                        <div class="col-xl-4 text-center mt-4">
                            <img src="<?= base_url('assets/img/logo.png') ?>" alt="" style="weigth:auto;height:200px"><br>
                            <?php if ($this->session->flashdata()) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    Submit <strong>Jawaban Gagal </strong>Kesalahan : <?= $this->session->flashdata('submit'); ?>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <a href="<?= base_url('soal/soal') ?>" role="button" class="btn btn-primary btn-lg btn-block mt-4">Soal Ujian Praktikum</a>
                            <a href="<?= base_url('mahasiswa/form') ?>" role="button" class="btn btn-primary btn-lg btn-block mt-4">Kumpulkan Jawaban</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-0 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Team Aslab 2021</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
</body>

</html>