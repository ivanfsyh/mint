<?php

if (isset($_POST['tambahJadwal'])) {
    if (tambahTanaman($_POST) > 0) {
        flash('jadwal', 'Data Berhasil ditambahkan.');
        header("Location: http://localhost/mint/jadwal");
    } else {
        flash('jadwal', 'Data Gagal ditambahkan.', 'alert-danger');
        header("Location: http://localhost/mint/jadwal");
    }
}
