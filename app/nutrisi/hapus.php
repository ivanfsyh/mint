<?php
$id = $geturl[1];

if (hapusNutrisi($id) > 0) {
    flash('nutrisi', 'Data Berhasil di hapus.');
    header("Location: http://localhost/mint/nutrisi");
} else {
    flash('nutrisi', 'Data Gagal di ubah.', 'alert-danger');
    header("Location: http://localhost/mint/nutrisi");
}
