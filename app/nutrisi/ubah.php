<?php

$id = $geturl[1];

$row = query("SELECT * FROM nutrisi WHERE id_nutrisi = '$id'")[0];

if (isset($_POST['ubahNutrisi'])) {
    if (ubahNutrisi($_POST) > 0) {
        flash('nutrisi', 'Data Berhasil di ubah.');
        header("Location: http://localhost/mint/nutrisi");
    } else {
        flash('nutrisi', 'Data Gagal di ubah.', 'alert-danger');
        header("Location: http://localhost/mint/nutrisi");
    }
}


?>
<div id="content" class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Pertanyaan Nutrisi</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $row['id_nutrisi']; ?>">
                        <div class="row mb-2">
                            <label for="kode" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="<?= $row['pertanyaan']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="kondisi" required>
                                    <option><?= $row['kondisi']; ?></option>
                                    <option>YA</option>
                                    <option>TIDAK</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-2 col-form-label">Minggu ke</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="minggu" required>
                                    <option><?= $row['minggu']; ?></option>
                                    <option>2</option>
                                    <option>4</option>
                                    <option>8</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="saran" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required><?= $row['keterangan']; ?></textarea>
                            </div>
                        </div>
                        <button type="submit" name="ubahNutrisi" class="btn btn-primary">Ubah</button>
                        <a href="<?= BASEURL; ?>/nutrisi" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>