<?php
$id = $geturl[1];

if (hapuspenyakit($id) > 0) {
    flash('penyakit', 'Data Berhasil di hapus.');
    header("Location: http://localhost/mint/penyakit");
} else {
    flash('penyakit', 'Data Gagal di ubah.', 'alert-danger');
    header("Location: http://localhost/mint/penyakit");
}
