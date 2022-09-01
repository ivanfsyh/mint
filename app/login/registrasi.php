<?php
if (isset($_SESSION['login'])) {
    header("Location: http://localhost/mint/home");
}

if (isset($_POST['submitRegis'])) {
    if (registrasi($_POST) > 0) {
        echo "
            <script>
                    alert('Registrasi Berhasil');
                    window.location.href = 'http://localhost/mint/login';
            </script>
            ";
    } else {
        echo "
            <script>
                    alert('Registrasi gagal');
                    window.location.href = 'http://localhost/mint/registrasi';
            </script>
            ";
    }
}
?>

<div id="registrasi">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card shadow">
                    <h5 class="card-header">Form Registrasi</h5>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="password2">Ulangi Password</label>
                                <input type="password" class="form-control" name="password2" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="<?= BASEURL; ?>/login">Login</a>
                        <button type="submit" name="submitRegis" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>