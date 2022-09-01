<?php

$query = query("SELECT * FROM nutrisi ORDER BY minggu");
?>

<div id="content" class="container">
    <div class="row mt-4">
        <div class="col">
            <h2>Daftar Pertanyaan Nutrisi</h2>
        </div>
    </div>
    <hr>
    <div class="row mt-4 mb-1">
        <div class="col">
            <?php flash('nutrisi'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Daftar Pertanyaan Nutrisi
                    <a href="<?= BASEURL; ?>/tambah-nutrisi" class="float-end btn btn-sm btn-primary"><i class="far fa-file-alt"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover shadow-sm text-center">
                        <thead class="bg-light">
                            <tr>
                                <th scope=" col">No</th>
                                <th scope=" col">Pertanyaan</th>
                                <th scope=" col">Minggu ke</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($query as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['pertanyaan']; ?></td>
                                    <td><?= $row['minggu']; ?></td>
                                    <td><?= $row['kondisi']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td>
                                        <a href="<?= BASEURL; ?>/ubah-nutrisi/<?= $row['id_nutrisi']; ?>" class="badge bg-success" title="Ubah"><i class="fas fa-edit"></i></a>
                                        <a href="<?= BASEURL; ?>/hapus-nutrisi/<?= $row['id_nutrisi']; ?>" class="badge bg-danger" onclick="return confirm('Yakin hapus data?');"><i class="fas fa-trash"></i></a>
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