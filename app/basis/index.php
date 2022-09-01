<?php

$query = query("SELECT * FROM basis_pengetahuan, penyakit, gejala, nilai_cf WHERE basis_pengetahuan.id_penyakit = penyakit.id_penyakit AND basis_pengetahuan.id_gejala = gejala.id_gejala AND basis_pengetahuan.id_nilai_cf = nilai_cf.id_nilai_cf ORDER BY kode_penyakit, kode_gejala");
?>

<div id="content" class="container">
    <div class="row mt-4">
        <div class="col">
            <h2>Basis Pengetahuan</h2>
        </div>
    </div>
    <hr>
    <div class="row mt-4 mb-1">
        <div class="col">
            <?php flash('basis'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Daftar Basis Pengetahuan
                    <a href="<?= BASEURL; ?>/tambah-basis" class="float-end btn btn-sm btn-primary <?= pakar(); ?>"><i class="far fa-file-alt"></i> Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover shadow-sm text-center">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Penyakit</th>
                                <th scope="col">Gejala</th>
                                <th scope="col">CF</th>
                                <th scope="col" class="<?= pakar(); ?>">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($query as $row) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['nama_penyakit']; ?></td>
                                    <td><?= $row['nama_gejala']; ?></td>
                                    <td><?= $row['nilai']; ?></td>
                                    <td class="<?= pakar(); ?>">
                                        <a href="<?= BASEURL; ?>/ubah-basis/<?= $row['id_basis_pengetahuan']; ?>" class="badge bg-success" title="Ubah"><i class="fas fa-edit"></i></a>
                                        <a href="<?= BASEURL; ?>/hapus-basis/<?= $row['id_basis_pengetahuan']; ?>" class="badge bg-danger" onclick="return confirm('Yakin hapus data?');" title="Hapus"><i class="fas fa-trash"></i></a>
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