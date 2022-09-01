<?php

$tanaman = $geturl[2];
$idJadwal = $geturl[3];
$user = $_SESSION['username'];

//get tanggal 
$qTgl = query("SELECT tgl FROM jadwal WHERE id_jadwal = '$idJadwal' AND nama_tanaman = '$tanaman'")[0];
$tanggal = $qTgl['tgl'];

// Cek Tanggal konsultasi
$mingguKe2 = date('d F Y', strtotime('+7 days', strtotime($tanggal)));
$mingguKe4 = date('d F Y', strtotime('+14 days', strtotime($mingguKe2)));
$mingguKe6 = date('d F Y', strtotime('+14 days', strtotime($mingguKe4)));
$mingguKeEnd = date('d F Y', strtotime('+14 days', strtotime($mingguKe6)));






?>
<div id="content" class="container">
    <div class="row mt-4">
        <div class="col-sm">
            <div class="col-sm">
                <h3>Tanaman <?= $geturl[2]; ?> :</h3>
            </div>
        </div>
    </div>
    <div class="row mb-3 text-white">
        <div class="col-sm">
            <div class="card shadow-sm bg-success" style="height: 11rem;">
                <div class="card-body jadwal">
                    <div class="card-body-icon"><i class="fas fa-calendar-check"></i></div>
                    <h5 class="card-title">Minggu ke-</h5>
                    <h1 class="display-4">1</h1>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#minggu1">
                        Detail <i class="fas fa-angle-double-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2 text-white <?= strtotime($tgl) >= strtotime($mingguKe2) ? '' : 'd-none'; ?>">
        <div class="col-sm">
            <div class="card shadow-sm bg-primary" style="height: 11rem;">
                <div class="card-body jadwal">
                    <div class="card-body-icon"><i class="fas fa-calendar-check"></i></div>
                    <h5 class="card-title">Minggu ke-</h5>
                    <h1 class="display-4">2</h1>
                    <div class="row  align-items-start">
                        <div class="col-lg-1">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Detail
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php foreach (getKonsulKe($idJadwal, 2) as $ke) : ?>
                                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/konsultasi-hasil/2/<?= $geturl[2]; ?>/<?= $geturl[3]; ?>/<?= $ke['ke']; ?>">Konsultasi Ke-<?= $ke['ke']; ?> </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <a href="<?= BASEURL; ?>/konsultasi/2/<?= $geturl[2]; ?>/<?= $idJadwal; ?>" class="btn btn-sm btn-light <?= strtotime($tgl) >= strtotime($mingguKe4)  ? 'd-none' : '';  ?>">
                                Konsultasi <i class="fab fa-telegram-plane"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- hidden minggu ke 2 -->
    <div class="row mb-2">
        <div class="col-sm">
            <div class="card shadow-sm bg-light <?= strtotime($tgl) >= strtotime($mingguKe2) ? 'd-none' : ''; ?>" style="height: 11rem;">
                <div class="card-body jadwal">
                    <p> Minggu ke-2 tersedia pada <?= $mingguKe2; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- hidden -->
    <div class="row mb-2 text-white <?= strtotime($tgl) >= strtotime($mingguKe4) ? '' : 'd-none'; ?>">
        <div class="col-sm">
            <div class="card shadow-sm bg-danger" style="height: 11rem;">
                <div class="card-body jadwal">
                    <div class="card-body-icon"><i class="fas fa-calendar-check"></i></div>
                    <h5 class="card-title">Minggu ke-</h5>
                    <h1 class="display-4">4</h1>
                    <div class="row align-items-start">
                        <div class="col-lg-1">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Detail
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php foreach (getKonsulKe($idJadwal, 4) as $ke) : ?>
                                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/konsultasi-hasil/4/<?= $geturl[2]; ?>/<?= $geturl[3]; ?>/<?= $ke['ke']; ?>">Konsultasi Ke-<?= $ke['ke']; ?> </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <a href="<?= BASEURL; ?>/konsultasi/4/<?= $geturl[2]; ?>/<?= $idJadwal; ?>" class="btn btn-sm btn-light <?= strtotime($tgl) >= strtotime($mingguKe6)  ? 'd-none' : '';  ?>">
                                Konsultasi <i class="fab fa-telegram-plane"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hidden minggu ke 4 -->
    <div class="row mb-2">
        <div class="col-sm">
            <div class="card shadow-sm bg-light <?= strtotime($tgl) >= strtotime($mingguKe4) ? 'd-none' : ''; ?>" style="height: 11rem;">
                <div class="card-body jadwal">
                    <p> Minggu ke-4 tersedia pada <?= $mingguKe4; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- hidden -->
    <div class="row mb-2 text-white <?= strtotime($tgl) >= strtotime($mingguKe6) ? '' : 'd-none'; ?>">
        <div class="col-sm">
            <div class="card shadow-sm bg-warning" style="height: 11rem;">
                <div class="card-body jadwal">
                    <div class="card-body-icon"><i class="fas fa-calendar-check"></i></div>
                    <h5 class="card-title">Minggu ke-</h5>
                    <h1 class="display-4">6</h1>
                    <div class="row align-items-start">
                        <div class="col-lg-1">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Detail
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php foreach (getKonsulKe($idJadwal, 6) as $ke) : ?>
                                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/konsultasi-hasil/6/<?= $geturl[2]; ?>/<?= $geturl[3]; ?>/<?= $ke['ke']; ?>">Konsultasi Ke-<?= $ke['ke']; ?> </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <a href="<?= BASEURL; ?>/konsultasi/6/<?= $geturl[2]; ?>/<?= $idJadwal; ?>" class="btn btn-sm btn-light <?= strtotime($tgl) >= strtotime($mingguKeEnd)  ? 'd-none' : '';  ?>">
                                Konsultasi <i class="fab fa-telegram-plane"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hidden minggu ke 6 -->
    <div class="row mb-2">
        <div class="col-sm">
            <div class="card shadow-sm bg-light <?= strtotime($tgl) >= strtotime($mingguKe6) ? 'd-none' : ''; ?>" style="height: 11rem;">
                <div class="card-body jadwal">
                    <p> Minggu ke-6 tersedia pada <?= $mingguKe6; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- hidden -->
</div>



<!-- Modal keterangan -->
<div class="modal fade" id="minggu1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Minggu ke- 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Show a second modal and hide this one with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#minggu1" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 1</button>
                <button class="btn btn-success" data-bs-target="#minggu2" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 2</button>
                <button class="btn btn-danger" data-bs-target="#minggu4" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 4</button>
                <button class="btn btn-warning" data-bs-target="#minggu6" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 6</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="minggu2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Minggu ke- 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Show a second modal and hide this one with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#minggu1" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 1</button>
                <button class="btn btn-success" data-bs-target="#minggu2" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 2</button>
                <button class="btn btn-danger" data-bs-target="#minggu4" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 4</button>
                <button class="btn btn-warning" data-bs-target="#minggu6" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 6</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="minggu4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Minggu ke- 4</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Show a second modal and hide this one with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#minggu1" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 1</button>
                <button class="btn btn-success" data-bs-target="#minggu2" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 2</button>
                <button class="btn btn-danger" data-bs-target="#minggu4" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 4</button>
                <button class="btn btn-warning" data-bs-target="#minggu6" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 6</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="minggu6" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Minggu ke- 6</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-bs-target="#minggu1" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 1</button>
                <button class="btn btn-primary" data-bs-target="#minggu2" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 2</button>
                <button class="btn btn-danger" data-bs-target="#minggu4" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 4</button>
                <button class="btn btn-warning" data-bs-target="#minggu6" data-bs-toggle="modal" data-bs-dismiss="modal">Minggu 6</button>
            </div>
        </div>
    </div>
</div>