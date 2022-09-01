<?php

$query = query("SELECT * FROM nilai_cf ORDER BY nilai");
?>

<div id="content" class="container">
    <div class="row mt-4">
        <div class="col">
            <h2>Keterangan Nilai CF</h2>
        </div>
    </div>
    <hr>
    <div class="row mt-4 mb-1">
        <div class="col">
            <?php flash('cf'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Daftar nilai CF
                    <a href="<?= BASEURL; ?>/tambah-cf" class="float-end btn btn-sm btn-primary <?= pakar(); ?>"><i class="far fa-file-alt"></i> Tambah Nilai</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover shadow-sm text-center">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Uncertain Term</th>
                                <th scope="col">CF</th>
                                <th scope="col" class="<?= pakar(); ?>">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($query as $row) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['nilai']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td class="<?= pakar(); ?>">
                                        <a href="<?= BASEURL; ?>/ubah-cf/<?= $row['id_nilai_cf']; ?>" class="badge bg-success" title="Ubah"><i class="fas fa-edit"></i></a>
                                        <a href="<?= BASEURL; ?>/hapus-cf/<?= $row['id_nilai_cf']; ?>" class="badge bg-danger" onclick="return confirm('Yakin hapus data?');"><i class="fas fa-trash"></i></a>
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