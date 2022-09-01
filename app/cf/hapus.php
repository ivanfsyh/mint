<?php
$id = $geturl[1];

if (hapusCF($id) > 0) {
    flash('cf', 'Data Berhasil di hapus.');
    header("Location: http://localhost/mint/cf");
} else {
    flash('cf', 'Data Gagal di ubah.', 'alert-danger');
    header("Location: http://localhost/mint/cf");
}
