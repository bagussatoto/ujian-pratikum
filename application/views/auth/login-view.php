<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link rel="icon" href="<?= base_url('assets/img/logo.png'); ?>">
    <link href="<?= base_url('assets/'); ?>css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body class="bg">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <img class="rounded mx-auto d-block text-center" src="<?= base_url('assets/img/logo.png'); ?>" alt="" width="auto" height="200px">
                        </div>
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-body">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                    <?= $this->session->flashdata('pesan'); ?>

                                    <form class="user" method="post" action="<?= base_url('Login'); ?>">
                                        <div class="form-group">
                                            <label class="small mb-1" for="username">Username</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                            </div>
                                                <input class="form-control py-4" name="username" id="username" type="text" placeholder="Enter Username" />
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <?php if (form_error('username')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('username'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Password</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                            </div>
                                                <input class="form-control py-4" name="password" id="password" type="password" placeholder="Enter password" />
                                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                                            </div>
                                            <?php if (form_error('password')) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                    <?= form_error('password'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
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
</body>

</html>