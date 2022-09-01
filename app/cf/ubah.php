<?php

$id = $geturl[1];

$row = query("SELECT * FROM nilai_cf WHERE id_nilai_cf = '$id'")[0];

if (isset($_POST['ubahCF'])) {
    if (ubahCF($_POST) > 0) {
        flash('cf', 'Data Berhasil di ubah.');
        header("Location: http://localhost/mint/cf");
    } else {
        flash('cf', 'Data Gagal di ubah.', 'alert-danger');
        header("Location: http://localhost/mint/cf");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Nilai CF</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $row['id_nilai_cf']; ?>">
                        <div class="row mb-2">
                            <label for="cf" class="col-sm-2 col-form-label">Nilai CF</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="cf" name="cf" value="<?= $row['nilai']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="ket" class="col-sm-2 col-form-label">Uncertain Term</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="ket" name="ket" value="<?= $row['keterangan']; ?>" required>
                            </div>
                        </div>
                        <button type="submit" name="ubahCF" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= BASEURL; ?>/cf" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>