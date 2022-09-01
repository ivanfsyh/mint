<?php
if (isset($_SESSION['login'])) {
    echo "
            <script>
                    document.location.href = 'http://localhost/mint/home';
            </script>";
    exit;
}

if (isset($_POST["submitLogin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $row['level'];

            echo "
            <script>
                    alert('berhasil login');
                    document.location.href = 'http://localhost/mint/home';
            </script>";
            exit;
        }
    }

    $error = true;
}
?>
<div id="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mt-5 tengah">
                <div class="card shadow mt-5">
                    <div class="card-header">
                        <h3 class="text-center text-white">Please Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                username/password salah!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text text-white" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control text-white" name="username" placeholder="username" autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-white" id="basic-addon1"><i class="fas fa-key"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                            <button class="w-100 btn btn-success" name="submitLogin" type="submit">Login</button>
                            <a href="<?= BASEURL; ?>/registrasi">registrasi</a>
                        </form>
                    </div>
                    <p class="mt-5 text-center text-white">&copy; Aplikasi MiNT</p>
                </div>
            </div>
        </div>
    </div>
</div>