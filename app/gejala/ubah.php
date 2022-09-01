<?php

$id = $geturl[1];

$row = query("SELECT * FROM gejala WHERE id_gejala = '$id'")[0];

if (isset($_POST['ubahGejala'])) {
    if (ubahGejala($_POST) > 0) {
        flash('gejala', 'Data Berhasil di ubah.');
        header("Location: http://localhost/mint/gejala");
    } else {
        flash('gejala', 'Data Gagal di ubah.', 'alert-danger');
        header("Location: http://localhost/mint/gejala");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Data Gejala</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $row['id_gejala']; ?>">
                        <div class="row mb-2">
                            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $row['kode_gejala']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Gejala</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama_gejala']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="saran" class="col-sm-2 col-form-label">Saran</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="saran" name="saran" rows="4" required><?= $row['saran_gejala']; ?></textarea>
                            </div>
                        </div>
                        <button type="submit" name="ubahGejala" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= BASEURL; ?>/gejala" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>