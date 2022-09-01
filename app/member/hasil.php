<?php
$keBaru = $geturl[4];
$idJadwal = $geturl[3];
$tanaman = $geturl[2];
$minggu = $geturl[1];
$user = $_SESSION['username'];

// get data user
$qUser = query("SELECT * FROM users WHERE username = '$user'")[0];
$idUser = $qUser['id'];



// get gejala
$gejala = query("SELECT * FROM konsultasi_penyakit, jadwal, penyakit, gejala, nilai_cf
                WHERE konsultasi_penyakit.id_jadwal = jadwal.id_jadwal AND  
                        konsultasi_penyakit.id_penyakit = penyakit.id_penyakit AND
                        konsultasi_penyakit.id_gejala = gejala.id_gejala AND
                        konsultasi_penyakit.id_nilai_cf = nilai_cf.id_nilai_cf AND 
                        konsultasi_penyakit.id_jadwal = '$idJadwal' AND
                        konsultasi_penyakit.pekan = '$minggu' AND
                        konsultasi_penyakit.ke = '$keBaru' GROUP BY gejala.nama_gejala ORDER BY gejala.kode_gejala");

// get penyakit
$penyakit = query("SELECT * FROM konsultasi_penyakit, jadwal, penyakit, gejala, nilai_cf
                WHERE konsultasi_penyakit.id_jadwal = jadwal.id_jadwal AND  
                        konsultasi_penyakit.id_penyakit = penyakit.id_penyakit AND
                        konsultasi_penyakit.id_gejala = gejala.id_gejala AND
                        konsultasi_penyakit.id_nilai_cf = nilai_cf.id_nilai_cf AND 
                        konsultasi_penyakit.id_jadwal = '$idJadwal' AND
                        konsultasi_penyakit.pekan = '$minggu' AND
                        konsultasi_penyakit.ke = '$keBaru' GROUP BY nama_penyakit ORDER BY hasil DESC");

// query hasil diagnosa
$maks = query("SELECT MAX(hasil) AS maks FROM konsultasi_penyakit WHERE id_jadwal  = '$idJadwal' AND pekan = '$minggu' AND ke = '$keBaru'")[0];
$maksimal = $maks['maks'];


$diagnosa = query("SELECT * FROM konsultasi_penyakit, jadwal, penyakit, gejala, nilai_cf
                WHERE konsultasi_penyakit.id_jadwal = jadwal.id_jadwal AND  
                        konsultasi_penyakit.id_penyakit = penyakit.id_penyakit AND
                        konsultasi_penyakit.id_gejala = gejala.id_gejala AND
                        konsultasi_penyakit.id_nilai_cf = nilai_cf.id_nilai_cf AND 
                        konsultasi_penyakit.id_jadwal = '$idJadwal' AND
                         pekan = '$minggu' AND ke = '$keBaru' AND
                         hasil = '$maksimal' GROUP BY nama_penyakit ORDER BY kode_penyakit");

$nutrisi = query("SELECT * FROM konsultasi_nutrisi, jadwal, nutrisi WHERE
                    konsultasi_nutrisi.id_jadwal = jadwal.id_jadwal AND
                    konsultasi_nutrisi.id_nutrisi = nutrisi.id_nutrisi AND
                    jadwal.id_user = '$idUser' AND
                    konsultasi_nutrisi.id_jadwal = '$idJadwal' AND ke = '$keBaru' AND
                    konsultasi_nutrisi.pekan = '$minggu'  ORDER BY pertanyaan");

?>
<div id="content" class="container">
    <div class="row mt-4 mb-1">
        <div class="col">
            <?php flash('konsultasi'); ?>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm">
            <h3 class="text-success"><i class="fas fa-chart-line"></i> Konsultasi <?= $tanaman; ?> minggu ke-<?= $minggu; ?></h3>
            <p>Berikut hasil konsultasi <strong><?= $user; ?></strong></p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    Data gejala yang dipilih
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover shadow-sm">
                        <thead class="bg-success text-light">
                            <tr>
                                <th scope=" col">No</th>
                                <th scope=" col">Kode</th>
                                <th scope="col">Gejala</th>
                                <th scope="col">[CF] Pilihan Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($gejala as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['kode_gejala']; ?></td>
                                    <td><?= $row['nama_gejala']; ?></td>
                                    <td class="badge bg-primary">
                                        <?php
                                        echo '[' . $row['nilai'] . '] ' . $row['keterangan'];
                                        ?>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    Data hasil konsultasi
                </div>
                <div class="card-body">
                    <table class="table table-sm  table-hover shadow-sm text-center">
                        <thead class="bg-success text-light">
                            <tr>
                                <th scope=" col">Rank</th>
                                <th scope=" col">Kode</th>
                                <th scope="col">Penyakit</th>
                                <th scope="col">Nilai CF</th>
                                <th scope="col">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rank = 1; ?>
                            <?php foreach ($penyakit as $row) : ?>
                                <tr>
                                    <td><?= $rank; ?></td>
                                    <td><?= $row['kode_penyakit']; ?></td>
                                    <td><?= $row['nama_penyakit']; ?></td>
                                    <td><?= $row['hasil']; ?></td>
                                    <td>
                                        <?php
                                        echo $row['hasil'] * 100 . '%';
                                        ?>
                                    </td>
                                </tr>
                                <?php $rank++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-4 mb-5">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    DIAGNOSA
                </div>
                <div class="card-body">
                    <span class="fw-bold">Hasil dari diagnosa penyakit yang paling mungkin adalah :</span>
                    <?php foreach ($diagnosa as $d) : ?>
                        <h2 class="text-danger mt-2 mb-2"><?= strtoupper($d['nama_penyakit']); ?></h2>
                        <span class="fw-bold">Saran :</span>
                        <p class="text-success"><?= $d['saran_penyakit']; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    NUTRISI
                </div>
                <div class="card-body">
                    <div class="card">
                        <?php foreach ($nutrisi as $row) : ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['pertanyaan']; ?> <span class="text-danger"><?= $row['kondisi']; ?></span></h5>
                                <p class="card-text text-success"><?= $row['keterangan']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>