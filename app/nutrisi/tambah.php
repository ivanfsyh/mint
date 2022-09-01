<?php

if (isset($_POST['tambahNutrisi'])) {
    if (tambahNutrisi($_POST) > 0) {
        flash('nutrisi', 'Data Berhasil ditambahkan.');
        header("Location: http://localhost/mint/nutrisi");
    } else {
        flash('nutrisi', 'Data Gagal ditambahkan.', 'alert-danger');
        header("Location: http://localhost/mint/nutrisi");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Pertanyaan Nutrisi</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-2">
                            <label for="kode" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="kondisi" required>
                                    <option value="" disabled selected>-pilih-</option>
                                    <option>YA</option>
                                    <option>TIDAK</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-2 col-form-label">Minggu ke</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="minggu" required>
                                    <option value="" disabled selected>-pilih-</option>
                                    <option>2</option>
                                    <option>4</option>
                                    <option>8</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="saran" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required></textarea>
                            </div>
                        </div>
                        <button type="submit" name="tambahNutrisi" class="btn btn-primary">Tambah</button>
                        <a href="<?= BASEURL; ?>/nutrisi" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>