<?php

if (isset($_POST['tambahGejala'])) {
    if (tambahGejala($_POST) > 0) {
        flash('gejala', 'Data Berhasil ditambahkan.');
        header("Location: http://localhost/mint/gejala");
    } else {
        flash('gejala', 'Data Gagal ditambahkan.', 'alert-danger');
        header("Location: http://localhost/mint/gejala");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4 mb-1">
        <div class="col">
            <?php flash('tambahGejala'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Data Gejala</h5>
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
                            <label for="nama" class="col-sm-2 col-form-label">Nama Gejala</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="saran" class="col-sm-2 col-form-label">Saran</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="saran" name="saran" rows="4" required></textarea>
                            </div>
                        </div>
                        <button type="submit" name="tambahGejala" class="btn btn-primary">Tambah Data</button>
                        <a href="<?= BASEURL; ?>/gejala" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>