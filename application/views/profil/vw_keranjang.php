<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <img src="<?= base_url('assets/img/sepatu/') . $sepatu['gambar']; ?>" style="width:400px" class="img-thumbnail">
                        </div>
                        <div class="col mr-2">
                            <div class="card-body">
                                <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $sepatu['id']; ?>">
                                <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">
                                <input type="hidden" name="stok" value="<?= $sepatu['stok'] ?>">
                                <div class="form-group">
                                    <label for="nama">Nama sepatu</label>
                                    <input name="nama" type="text" value="<?= $sepatu['nama']; ?>" readonly class="form-control" id="nama">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input name="stok" value="<?= $sepatu['stok']; ?>" type="text" readonly class="form-control" id="stok">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input name="harga" value="<?= $sepatu['harga']; ?>" type="text" readonly class="form-control" id="harga">
                                </div>
                                <div class="form-group">
                                    <label for="ukuran">Ukuran</label>
                                    <input name="ukuran" value="<?= $sepatu['ukuran']; ?>" type="text" readonly class="form-control" id="harga">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input name="keterangan" value="<?= $sepatu['keterangan']; ?>" type="text" readonly

                                    class="form-control" id="harga">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control" min='1'>
                                    <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="total">Total Harga</label>
                                    <input type="text" name="total" id="total" readonly class="form-control">
                                </div>
                                <button type="submit" id="tambah" name="tambah" class="btn btn-primary float-right">Tambah Ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>