<?php

$penyakit = query("SELECT nama_penyakit FROM penyakit ORDER BY kode_penyakit");
$gejala = query("SELECT nama_gejala FROM gejala ORDER BY kode_gejala");
$cf = query("SELECT nilai FROM nilai_cf ORDER BY nilai");

if (isset($_POST['submit'])) {
    if (tambahBasis($_POST) > 0) {
        flash('basis', 'Data Berhasil ditambahkan.');
        header("Location: http://localhost/mint/basis");
    } else {
        flash('basis', 'Data Gagal ditambahkan.', 'alert-danger');
        header("Location: http://localhost/mint/basis");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4 mb-1">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Basis Pengetahuan</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-2">
                            <label for="penyakit" class="col-sm-2 col-form-label">Penyakit</label>
                            <div class="col-sm-4">
                                <select class="form-select" name="penyakit" id="penyakit" aria-label="Default select example" required>
                                    <option value="" disabled selected>-pilih-</option>
                                    <?php foreach ($penyakit as $p) : ?>
                                        <option><?= $p['nama_penyakit']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
                            <div class="col-sm-4">
                                <select class="form-select" name="gejala" id="gejala" aria-label="Default select example" required>
                                    <option value="" disabled selected>-pilih-</option>
                                    <?php foreach ($gejala as $g) : ?>
                                        <option><?= $g['nama_gejala']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="cf" class="col-sm-2 col-form-label">CF</label>
                            <div class="col-sm-2">
                                <select class="form-select" name="cf" id="cf" aria-label="Default select example" required>
                                    <option value="" disabled selected>-pilih-</option>
                                    <?php foreach ($cf as $c) : ?>
                                        <option><?= $c['nilai']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= BASEURL; ?>/basis" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>