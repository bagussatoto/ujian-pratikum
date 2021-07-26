<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Data Mahasiswa</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item text-primary active"><?= $bc . " / " . $title ?></li>
			</ol>
			<?php if ($this->session->flashdata()) : ?>
				<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
					Data Mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
			<div class="card mb-4">
				<div class="card-header">
					<div class="row">
						<div class="ml-auto">
							<h4>Data Mahasiswa</h4>
						</div>
						<div class="ml-auto">
							<a class="btn btn-primary" href="<?= base_url('mhs/store_mahasiswa'); ?>">
								<i class="fas fa-plus-square text-white"></i> Tambah
							</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="dataTable" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>NRP</th>
									<th>Nama Lengkap</th>
									<th>Semester</th>
									<th>Kelas</th>
									<th>Sesi</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<?php $no = 1; ?>
							<tbody>
								<?php foreach ($mahasiswa as $b) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $b['nrp']; ?></td>
										<td><?= $b['nama_mhs']; ?></td>
										<td><?= $b['nama_smt']; ?></td>
										<td><?= $b['nama_kls']; ?></td>
										<td><?= $b["nama_sesi"]; ?></td>
										<td class="row">
											<div class="mx-auto">
												<a href="<?= base_url('mhs/update_mahasiswa/') . encrypt_url($b['id_mhs']); ?>"><i class="far fa-edit"></i></a>
												<a href="<?= base_url('mhs/hapus_mahasiswa/') . encrypt_url($b['id_mhs']); ?>"><i class="far fa-trash-alt"></i></a>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>