<?php

if (isset($_POST['tambahPenyakit'])) {
    if (tambahPenyakit($_POST) > 0) {
        flash('penyakit', 'Data Berhasil ditambahkan.');
        header("Location: http://localhost/mint/penyakit");
    } else {
        flash('penyakit', 'Data Gagal ditambahkan.', 'alert-danger');
        header("Location: http://localhost/mint/penyakit");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4 mb-1">
        <div class="col-sm">
            <?php flash('tambahPenyakit'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Data Penyakit</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-2">
                            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Penyakit</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="info" class="col-sm-2 col-form-label">Informasi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="info" name="info" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="saran" class="col-sm-2 col-form-label">Saran</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="saran" name="saran" rows="4" required></textarea>
                            </div>
                        </div>

                        <button type="submit" name="tambahPenyakit" class="btn btn-primary">Tambah Data</button>
                        <a href="<?= BASEURL; ?>/penyakit" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>