<?php
$user = $_SESSION['username'];

$qUser = query("SELECT * FROM users WHERE username = '$user'")[0];
$idUser = $qUser['id'];

$jadwal = query("SELECT * FROM jadwal,users WHERE  id_user = '$idUser' AND jadwal.id_user = users.id");

?>
<div id="content" class="container">
    <div class="row mt-4 ">
        <div class="col-sm">
            <h2>Jadwal Konsultasi</h2>
            <div class="card" style="width: 17rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">User : <?= $_SESSION['username']; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-4 mb-1">
        <div class="col">
            <?php flash('jadwal'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahData"><i class="far fa-file-alt"></i> Tambah Tanaman</button>
            <h5>Daftar Tanaman :</h5>
            <div class="card shadow-sm mt-2">
                <ul class="list-group list-group-flush">
                    <?php foreach ($jadwal as $row) : ?>
                        <li class="list-group-item">
                            <?= $row['nama_tanaman']; ?>

                            <a href="<?= BASEURL; ?>/hapus-jadwal/<?= $row['id_jadwal']; ?>" class="float-sm-end me-2 btn btn-sm btn-danger" title="hapus" onclick="return confirm('Yakin menghapus tanaman?');">
                                <i class="fas fa-trash"></i>
                            </a>

                            <button class="float-sm-end me-2 btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#ubahData<?= $row['id_jadwal'] ?>" title="ubah">
                                <i class="fas fa-edit"></i>
                            </button>
                            <?php require "ubah.php"; ?>

                            <a href="<?= BASEURL; ?>/detail-jadwal/<?= $row['username']; ?>/<?= $row['nama_tanaman']; ?>/<?= $row['id_jadwal']; ?>" class="float-sm-end me-2 btn btn-sm btn-success" title="detail">
                                <i class="fas fa-calendar-day"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLabel">Konsultasi Minggu ke-1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/tambah-jadwal" method="POST">
                    <div class="row mb-2">
                        <label for="tanaman" class="col-sm-4 col-form-label">Nama Tanaman</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tanaman" name="tanaman" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="tambahJadwal" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->