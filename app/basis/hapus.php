<?php
$id = $geturl[1];

if (hapusBasis($id) > 0) {
    flash('basis', 'Data Berhasil di hapus.');
    header("Location: http://localhost/mint/basis");
} else {
    flash('basis', 'Data Gagal di ubah.', 'alert-danger');
    header("Location: http://localhost/mint/basis");
}
