<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-dark me-4">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#">MiNT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-sm btn-dark"><i class=" fas fa-user"></i> <?= $_SESSION['username']; ?></button>
                        <a href="<?= BASEURL; ?>/logout" class="btn btn-sm btn-outline-light btn-dark" title="Logout" onclick="return confirm('Yakin logout?');">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="off">
        <div id="sidebar" class="sidebar bg-dark">
            <nav class="nav flex-column mt-4">
                <p class="nav-link">CORE</p>
                <a class="nav-link <?= $url == 'home' || $url == '' ? 'on' : '' ?>" href="<?= BASEURL; ?>/home"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <p class="nav-link">DATA</p>
                <a class="nav-link <?= $url == 'penyakit' ? 'on' : '' ?>" href="<?= BASEURL; ?>/penyakit"><i class="fas fa-th-list"></i> Daftar Penyakit</a>
                <a class="nav-link <?= $url == 'gejala' ? 'on' : '' ?>" href="<?= BASEURL; ?>/gejala"><i class="fas fa-th-list"></i> Daftar Gejala</a>
                <a class="nav-link <?= $url == 'nutrisi' ? 'on' : '' ?> <?= pakar(); ?>" href="<?= BASEURL; ?>/nutrisi"><i class="fas fa-th-list"></i> Nutrisi</a>
                <p class="nav-link">ANALISIS</p>
                <a class="nav-link <?= $url == 'cf' ? 'on' : '' ?>" href="<?= BASEURL; ?>/cf"><i class="fas fa-paperclip"></i> Nilai CF</a>
                <a class="nav-link <?= $url == 'basis' ? 'on' : '' ?>" href="<?= BASEURL; ?>/basis"><i class="fas fa-paperclip"></i> Basis Pengetahuan</a>
                <p class="nav-link ">KONSULTASI</p>
                <a class="nav-link <?= $url == 'jadwal' ? 'on' : '' ?> <?= user(); ?>" href=" <?= BASEURL; ?>/jadwal"><i class="far fa-calendar-alt"></i> Jadwal</a>
            </nav>
        </div>
    </div>