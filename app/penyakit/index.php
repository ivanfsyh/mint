<?php

$query = query("SELECT * FROM penyakit ORDER BY kode_penyakit");
?>

<div id="content" class="container">
    <div class="row mt-4">
        <div class="col-sm">
            <h2>Daftar Penyakit</h2>
        </div>
    </div>
    <hr>
    <div class="row mt-4 mb-1">
        <div class="col-sm">
            <?php flash('penyakit'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    Daftar Penyakit Tanaman Mint
                    <a href="<?= BASEURL; ?>/tambah-penyakit" class="float-end btn btn-sm btn-primary <?= pakar(); ?>"><i class="far fa-file-alt"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-sm table-bordered table-hover shadow-sm text-center">
                            <thead class="bg-light">
                                <tr>
                                    <th scope=" col">No</th>
                                    <th scope=" col">Kode</th>
                                    <th scope="col">Nama Penyakit</th>
                                    <th scope="col">Informasi</th>
                                    <th scope="col">Saran</th>
                                    <th scope="col" class="<?= pakar(); ?>">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($query as $row) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['kode_penyakit']; ?></td>
                                        <td><?= $row['nama_penyakit']; ?></td>
                                        <td><?= $row['info_penyakit']; ?></td>
                                        <td><?= $row['saran_penyakit']; ?></td>
                                        <td class="<?= pakar(); ?>">
                                            <a href="<?= BASEURL; ?>/ubah-penyakit/<?= $row['id_penyakit']; ?>" class="badge bg-success" title="Ubah"><i class="fas fa-edit"></i></a>
                                            <a href="<?= BASEURL; ?>/hapus-penyakit/<?= $row['id_penyakit']; ?>" class="badge bg-danger" onclick="return confirm('Yakin hapus data?');"><i class="fas fa-trash"></i></a>
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
    </div>
</div>