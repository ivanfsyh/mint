<?php

$query = query("SELECT * FROM gejala ORDER BY kode_gejala");
?>

<div id="content" class="container">
    <div class="row mt-4">
        <div class="col">
            <h2>Daftar Gejala</h2>
        </div>
    </div>
    <hr>
    <div class="row mt-4 mb-1">
        <div class="col">
            <?php flash('gejala'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Daftar Gejala Tanaman Mint
                    <a href="<?= BASEURL; ?>/tambah-gejala" class="float-end btn btn-sm btn-primary <?= pakar(); ?>"><i class="far fa-file-alt"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover shadow-sm text-center">
                        <thead class="bg-light">
                            <tr>
                                <th scope=" col">No</th>
                                <th scope=" col">Kode</th>
                                <th scope="col">Nama Gejala</th>
                                <th scope="col">Saran</th>
                                <th scope="col" class="<?= pakar(); ?>">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($query as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['kode_gejala']; ?></td>
                                    <td><?= $row['nama_gejala']; ?></td>
                                    <td><?= $row['saran_gejala']; ?></td>
                                    <td class="<?= pakar(); ?>">
                                        <a href="<?= BASEURL; ?>/ubah-gejala/<?= $row['id_gejala']; ?>" class="badge bg-success" title="Ubah"><i class="fas fa-edit"></i></a>
                                        <a href="<?= BASEURL; ?>/hapus-gejala/<?= $row['id_gejala']; ?>" class="badge bg-danger" onclick="return confirm('Yakin hapus data?');"><i class="fas fa-trash"></i></a>
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