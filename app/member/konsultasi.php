<?php
$idJadwal = $geturl[3];
$tanaman = $geturl[2];
$minggu = $geturl[1];
$user = $_SESSION['username'];

//get konsultasi ke
$sql = query("SELECT MAX(ke) as ke_baru FROM konsultasi_penyakit WHERE id_jadwal = '$idJadwal'")[0];

$keBaru = $sql['ke_baru'];

$keBaru++;

if (isset($_POST['submit'])) {
    if (konsultasi($_POST) > 0) {
        flash('konsultasi', 'Konsultasi Berhasil ditambahkan.');
        header('Location: ' . BASEURL . '/konsultasi-hasil/' . $minggu . '/' . $tanaman . '/' . $idJadwal . '/' . $keBaru);
    } else {
        echo "
            <script>
                    alert('Konsultasi Gagal');
                    window.location.href = 'http://localhost/mint/jadwal';
            </script>
        ";
    }
}

$gejala = query("SELECT * FROM gejala ORDER BY kode_gejala");
$cf = query("SELECT * FROM nilai_cf ORDER BY nilai");

$nutrisi = query("SELECT * FROM nutrisi WHERE minggu = '$geturl[1]' AND kondisi = 'TIDAK'");
$pilihKondisi = query("SELECT * FROM nutrisi WHERE minggu = '$geturl[1]' GROUP BY kondisi ORDER BY kondisi DESC");


?>
<div id="content" class="container">
    <div class="row mt-5 mb-5">
        <div class="col-sm">
            <form action="" method="POST">
                <input type="hidden" name="user" value="<?= $_SESSION['username']; ?>">
                <input type="hidden" name="tanaman" value="<?= $geturl[2]; ?>">
                <input type="hidden" name="minggu" value="<?= $geturl[1]; ?>">
                <div class="card">
                    <div class="card-header">
                        Nama tanaman : <?= $geturl[2]; ?>
                    </div>
                    <div class="card-body">
                        <span class="fst-italic">*silahkan pilih kondisi yang sesuai</span>
                        <div class="table-responsive ">
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Gejala</th>
                                            <th scope="col">Pilih Kondisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($gejala as $g) : ?>
                                            <tr>
                                                <th><?= $no; ?></th>
                                                <td><?= $g['kode_gejala']; ?></td>
                                                <td><?= $g['nama_gejala']; ?></td>
                                                <td>
                                                    <select name="gejala[]" class="form-select" aria-label="Default select example">
                                                        <option value="no/0" selected>Tidak</option>
                                                        <?php foreach ($cf as $c) : ?>
                                                            <option value="<?php echo $g['nama_gejala'] . '/' . $c['nilai']; ?>"><?= $c['keterangan']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php $no++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="fst-italic">*silahkan pilih YA atau TIDAK</span>
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Pilih Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($nutrisi as $row) : ?>
                                        <tr>
                                            <th><?= $no; ?></th>
                                            <td><?= $row['pertanyaan']; ?></td>
                                            <td>
                                                <select name="kondisi[]" class="form-select" aria-label="Default select example" required>
                                                    <option value="" disabled selected>-pilih-</option>
                                                    <?php foreach ($pilihKondisi as $pk) : ?>
                                                        <option value="<?php echo $row['pertanyaan'] . '@' . $pk['kondisi']; ?>"><?= $pk['kondisi']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php $no++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan & lanjutkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>