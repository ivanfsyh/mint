<?php

if (isset($_POST['ubahTanaman'])) {
    if (ubahTanaman($_POST) > 0) {
        echo "
            <script>
                    alert('Berhasil');
                    window.location.href = 'http://localhost/mint/jadwal';
            </script>
            ";
    } else {
        echo "
            <script>
                    alert('Gagal');
                    window.location.href = 'http://localhost/mint/jadwal';
            </script>
            ";
    }
}
?>

<!-- Modal Ubah Data -->
<div class="modal fade" id="ubahData<?= $row['id_jadwal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLabel">Ubah Nama Tanaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id_jadwal'] ?>">
                    <div class="row mb-2">
                        <label for="tanaman" class="col-sm-4 col-form-label">Nama Tanaman</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tanaman" name="tanaman" value="<?= $row['nama_tanaman'] ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="ubahTanaman" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>