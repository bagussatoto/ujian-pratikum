<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active text-primary">Dashboard</li>
            </ol>
            <?php if ($this->session->flashdata()) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Data User <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow my-4">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?= base_url(); ?>assets/img/<?= $user['foto']; ?>" class="img-fluid" alt="responsive image" style="width: 160px;height:160px">
                                    </div>
                                    <form enctype="multipart/form-data" class="form-group" action="<?= base_url('myprofile'); ?>" method="POST">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input readonly id="username" name="username" type="text" class="form-control" value="<?= $user['username']; ?>"></input>
                                                <?php if (form_error('username')) : ?>
                                                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                        <?= form_error('username'); ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="password" name="password" type="text" class="form-control" value="<?= $user['password']; ?>"></input>
                                                <?php if (form_error('password')) : ?>
                                                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" style="height: 50px;">
                                                        <?= form_error('password'); ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <label>Foto Profil</label>
                                                <input type="file" class="form-control-file" id="foto" name="foto" />
                                            </div>
                                        </div>
                                        <input hidden type="text" id="role" name="role" value="<?= $user['role']; ?>">
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>