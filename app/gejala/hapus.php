<?php
$id = $geturl[1];

if (hapusGejala($id) > 0) {
    flash('gejala', 'Data Berhasil di hapus.');
    header("Location: http://localhost/mint/gejala");
} else {
    flash('gejala', 'Data Gagal di ubah.', 'alert-danger');
    header("Location: http://localhost/mint/gejala");
}
