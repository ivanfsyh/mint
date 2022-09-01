<?php
session_start();
$tgl = date('d F Y');
require_once 'app/init.php';

if (!isset($_SESSION['login'])) {
    if (isset($_GET['url'])) {
        $geturl = $_GET['url'];
        $geturl = explode('/', $geturl);
        $url = $geturl[0];
    } else {
        $url = 'login';
    }

    switch ($url) {
        case 'registrasi':
            $title = 'Halaman Registrasi';
            require "app/layout/header.php";
            require "app/login/registrasi.php";
            require "app/layout/footer.php";
            break;
            break;

        default:
            $title = 'Halaman Login';
            require "app/layout/header.php";
            require "app/login/index.php";
            require "app/layout/footer.php";
            break;
    }
} else {
    if (isset($_GET['url'])) {
        $geturl = $_GET['url'];
        $geturl = explode('/', $geturl);
        $url = $geturl[0];
    } else {
        $url = 'home';
    }

    switch ($url) {
        case 'home':
            $title = 'Dashboard';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/home/index.php";
            require "app/layout/footer.php";
            break;

        case 'login':
            $title = 'Halaman Login';
            require "app/layout/header.php";
            require "app/login/index.php";
            require "app/layout/footer.php";
            break;
        case 'registrasi':
            $title = 'Halaman Registrasi';
            require "app/layout/header.php";
            require "app/login/registrasi.php";
            require "app/layout/footer.php";
            break;
        case 'logout';
            include "app/login/logout.php";
            break;

        case 'penyakit':
            $title = 'Daftar Penyakit';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/penyakit/index.php";
            require "app/layout/footer.php";
            break;
        case 'tambah-penyakit':
            $title = 'Tambah Data Penyakit';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/penyakit/tambah.php";
            require "app/layout/footer.php";
            break;
        case 'ubah-penyakit':
            $title = 'Ubah Data Penyakit';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/penyakit/ubah.php";
            require "app/layout/footer.php";
            break;
        case 'hapus-penyakit':
            require "app/penyakit/hapus.php";
            break;

        case 'gejala':
            $title = 'Daftar Gejala';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/gejala/index.php";
            require "app/layout/footer.php";
            break;
        case 'tambah-gejala':
            $title = 'Tambah Data Gejala';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/gejala/tambah.php";
            require "app/layout/footer.php";
            break;
        case 'ubah-gejala':
            $title = 'Ubah Data Gejala';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/gejala/ubah.php";
            require "app/layout/footer.php";
            break;
        case 'hapus-gejala':
            require "app/gejala/hapus.php";
            break;

        case 'nutrisi':
            $title = 'Daftar Pertanyaan Nutrisi';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/nutrisi/index.php";
            require "app/layout/footer.php";
            break;
        case 'tambah-nutrisi':
            $title = 'Tambah Pertanyaan Nutrisi';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/nutrisi/tambah.php";
            require "app/layout/footer.php";
            break;
        case 'ubah-nutrisi':
            $title = 'Ubah Pertanyaan Nutrisi';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/nutrisi/ubah.php";
            require "app/layout/footer.php";
            break;
        case 'hapus-nutrisi':
            require "app/nutrisi/hapus.php";
            break;

        case 'cf':
            $title = 'Nilai CF';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/cf/index.php";
            require "app/layout/footer.php";
            break;
        case 'tambah-cf':
            $title = 'Tambah Data Gejala';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/cf/tambah.php";
            require "app/layout/footer.php";
            break;
        case 'ubah-cf':
            $title = 'Ubah Data Gejala';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/cf/ubah.php";
            require "app/layout/footer.php";
            break;
        case 'hapus-cf':
            require "app/cf/hapus.php";
            break;

        case 'basis':
            $title = 'Basis Pengetahuan';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/basis/index.php";
            require "app/layout/footer.php";
            break;
        case 'tambah-basis':
            $title = 'Basis Pengetahuan';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/basis/tambah.php";
            require "app/layout/footer.php";
            break;
        case 'ubah-basis':
            $title = 'Ubah Basis Pengetahuan';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/basis/ubah.php";
            require "app/layout/footer.php";
            break;
        case 'hapus-basis':
            require "app/basis/hapus.php";
            break;

        case 'jadwal':
            $title = 'Jadwal Konsultasi ';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/jadwal/index.php";
            require "app/layout/footer.php";
            break;
        case 'tambah-jadwal':
            require "app/jadwal/tambah.php";
            break;
        case 'hapus-jadwal':
            require "app/jadwal/hapus.php";
            break;
        case 'detail-jadwal':
            $title = 'Detail Konsultasi ';
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/jadwal/detail.php";
            require "app/layout/footer.php";
            break;

        case 'konsultasi':
            $title = 'Konsultasi Ke-' . $geturl[1];
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/member/konsultasi.php";
            require "app/layout/footer.php";
            break;
        case 'konsultasi-hasil':
            $title = 'Hasil Konsultasi Ke-' . $geturl[1];
            require "app/layout/header.php";
            require "app/layout/navbar.php";
            require "app/member/hasil.php";
            require "app/layout/footer.php";
            break;
    }
}
