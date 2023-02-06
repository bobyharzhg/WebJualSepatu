<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">
					Form Tambah Data Matakuliah
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $matakuliah['id']; ?>">
						<div class="form-group">
							<label for="nama">Nama Matakuliah</label>
							<input name="nama" value="<?= $matakuliah['nama']; ?>" type="text" class="form-control" id="nama" placeholder="Nama Matakuliah">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="semester">Semester</label>
							<input name="semester" value="<?= $matakuliah['semester']; ?>" type="text" class="form-control" id="semester" placeholder="Semester">
							<?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="bidang">Bidang</label>
							<input value="<?= $matakuliah['bidang']; ?>" name="bidang" type="text" class="form-control" id="bidang" placeholder="Bidang">
							<?= form_error('bidang', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<a href="<?= base_url('Matakuliah') ?>" class="btn btn-danger">Tutup</a>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Matakuliah</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
