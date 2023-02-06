<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url() ?>Sepatu/tambah" class="btn btn-info mb-2">Tambah Sepatu</a></div>
            </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacinf="0">
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>Gambar</td>
                        <td>Nama Sepatu</td>
                        <td>Stok</td>
                        <td>Harga</td>
                        <td>Ukuran</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sepatu as $us) : ?>
                        <tr>
                            <td><?= $i;?></td>
                            <td><img src="<?= base_url('assets/img/sepatu/') . $us['gambar']; ?>" style="width: 100px;" class="img-thumbnail"></td>
                            <td><?= $us['nama'];?></td>
                            <td><?= $us['stok'];?></td>
                            <td><?= $us['harga'];?></td>
                            <td><?= $us['ukuran'];?></td>
                            <td>
                                <a href="<?= base_url('Sepatu/hapus/') . $us['id'];?>" class="badge badge-danger">Hapus</a>
                                <a href="<?= base_url('Sepatu/edit/') . $us['id'];?>" class="badge badge-warning">Edit</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
