<?php

if (isset($_POST['tambahCF'])) {
    if (tambahCF($_POST) > 0) {
        flash('cf', 'Data Berhasil ditambahkan.');
        header("Location: http://localhost/mint/cf");
    } else {
        flash('cf', 'Data Gagal ditambahkan.', 'alert-danger');
        header("Location: http://localhost/mint/cf");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4 mb-1">
        <div class="col">
            <?php flash('tambahCF'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Nilai CF</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-2">
                            <label for="cf" class="col-sm-2 col-form-label">Nilai CF</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="cf" name="cf" required>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="ket" class="col-sm-2 col-form-label">Uncertain Term</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="ket" name="ket" required>
                            </div>
                        </div>
                        <button type="submit" name="tambahCF" class="btn btn-primary">Tambah Nilai</button>
                        <a href="<?= BASEURL; ?>/cf" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>