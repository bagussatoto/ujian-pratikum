<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terkirim</title>
    <link rel="icon" href="<?= base_url('assets/img/logo.png'); ?>">
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
    <script src="<?= base_url('assets/js/all.min.js') ?>" rossorigin="anonymous"></script>
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
    <div class="col-xl-12 text-success">
        <div class="col-md-8  text-center mx-auto mt-4">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-check-circle img-fluid" style="height: 300px;width:auto"></i>
                    <b><?php if ($this->session->flashdata()) : ?>
                            <div class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert">
                                JAWABAN UJIAN ANDA <stron>BERHASIL </stron></strong> <?= $this->session->flashdata('submit'); ?>.
                            </div>
                        <?php endif; ?>
                        <h1 class="text-success">TERIMA KASIH</h1>
                    </b>
                </div>
            </div>
        </div>
    </div>
</body>

</html>