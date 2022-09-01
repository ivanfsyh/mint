<?php

$id = $geturl[1];

$row = query("SELECT * FROM penyakit WHERE id_penyakit = '$id'")[0];

if (isset($_POST['ubahPenyakit'])) {
    if (ubahPenyakit($_POST) > 0) {
        flash('penyakit', 'Data Berhasil di ubah.');
        header("Location: http://localhost/mint/penyakit");
    } else {
        flash('penyakit', 'Data Gagal di ubah.', 'alert-danger');
        header("Location: http://localhost/mint/penyakit");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Data Penyakit</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $row['id_penyakit']; ?>">
                        <div class="row mb-2">
                            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $row['kode_penyakit']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Penyakit</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama_penyakit']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="info" class="col-sm-2 col-form-label">Informasi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="info" name="info" rows="3" required><?= $row['info_penyakit']; ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saran" class="col-sm-2 col-form-label">Informasi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="saran" name="saran" rows="4" required><?= $row['saran_penyakit']; ?></textarea>
                            </div>
                        </div>
                        <button type="submit" name="ubahPenyakit" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= BASEURL; ?>/penyakit" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>