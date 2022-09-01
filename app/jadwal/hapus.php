<?php
$id = $geturl[1];
if (hapusJadwal($id) > 0) {
    flash('jadwal', 'Data Berhasil di hapus.');
    header("Location: http://localhost/mint/jadwal");
} else {
    flash('jadwal', 'Data Gagal di ubah.', 'alert-danger');
    header("Location: http://localhost/mint/jadwal");
}
