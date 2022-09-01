<?php

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "mint2");

// ambil data dari tabel kulong / query data kulong
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function flash($name = '', $message = '', $class = 'alert-success')
{
    //We can only do something if the name isn't empty
    if (!empty($name)) {
        //No message, create it
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        }
        //Message exists, display it
        elseif (!empty($_SESSION[$name]) && empty($message)) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] :
                'alert-success';
            echo '<div role="alert" class="alert alert-dismissible fade show ' . $class . '">' . $_SESSION[$name] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

// Function Registrasi --------------------------------------------------------------------
function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
                alert('username sudah terdaftar');
        </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "
            <script>
                    alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    //enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    $sql = "INSERT INTO users VALUES(
            '', '$username', '$email', '$password', 'user')";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}
// Function Registrasi --------------------------------------------------------------------

// Function Penyakit --------------------------------------------------
function tambahPenyakit($data)
{
    global $conn;

    $kode = strtoupper($data['kode']);
    $nama = $data['nama'];
    $info = $data['info'];
    $saran = $data['saran'];

    // cek kode sudah atau belum
    $result = mysqli_query($conn, "SELECT kode_penyakit FROM penyakit WHERE kode_penyakit = '$kode'");

    if (mysqli_fetch_assoc($result)) {
        flash('tambahPenyakit', 'Kode sudah terdaftar. Masukan kode yang berbeda.', 'alert-danger');
        header("Location: http://localhost/mint/tambah-penyakit");
        exit;
    }

    // query insert data
    $query = "INSERT INTO penyakit VALUES 
    	(NULL, '$kode', '$nama', '$info', '$saran')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahPenyakit($data)
{
    global $conn;
    $id = $data['id'];
    $kode = strtoupper($data['kode']);
    $nama = $data['nama'];
    $info = $data['info'];
    $saran = $data['saran'];

    // query insert data
    $query = "UPDATE penyakit SET 
                kode_penyakit = '$kode',
                nama_penyakit = '$nama',
                info_penyakit = '$info',
                saran_penyakit = '$saran' WHERE id_penyakit = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);;
}

function hapuspenyakit($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM penyakit WHERE id_penyakit = '$id' ");

    return mysqli_affected_rows($conn);
}

// Function Penyakit --------------------------------------------------

// Function Gejala ----------------------------------------------------
function tambahGejala($data)
{
    global $conn;

    $kode = strtoupper($data['kode']);
    $nama = $data['nama'];
    $saran = $data['saran'];

    // cek kode sudah atau belum
    $result = mysqli_query($conn, "SELECT kode_gejala FROM gejala WHERE kode_gejala = '$kode'");

    if (mysqli_fetch_assoc($result)) {
        flash('tambahGejala', 'Kode sudah terdaftar. Masukan kode yang berbeda.', 'alert-danger');
        header("Location: http://localhost/mint/tambah-gejala");
        exit;
    }

    // query insert data
    $query = "INSERT INTO gejala VALUES 
    	(NULL, '$kode', '$nama', '$saran')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);;
}

function ubahGejala($data)
{
    global $conn;
    $id = $data['id'];
    $kode = strtoupper($data['kode']);
    $nama = $data['nama'];
    $saran = $data['saran'];

    // query insert data
    $query = "UPDATE gejala SET 
                kode_gejala = '$kode',
                nama_gejala = '$nama',
                saran_gejala = '$saran' WHERE id_gejala = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);;
}

function hapusGejala($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM gejala WHERE id_gejala = '$id' ");

    return mysqli_affected_rows($conn);
}
// Function Gejala ----------------------------------------------------

// Function CF -------------------------------------------------------
function tambahCF($data)
{
    global $conn;

    $nilai = $data['cf'];
    $keterangan = $data['ket'];

    // cek kode sudah atau belum
    $result = mysqli_query($conn, "SELECT nilai FROM nilai_cf WHERE nilai = '$nilai'");

    if (mysqli_fetch_assoc($result)) {
        flash('tambahCF', 'Nilai CF sudah terdaftar. Masukan kode yang berbeda.', 'alert-danger');
        header("Location: http://localhost/mint/tambah-cf");
        exit;
    }

    // query insert data
    $query = "INSERT INTO nilai_cf VALUES 
    	(NULL, '$nilai', '$keterangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahCF($data)
{
    global $conn;
    $id = $data['id'];
    $nilai = $data['cf'];
    $ket = $data['ket'];

    // query insert data
    $query = "UPDATE nilai_cf SET 
                nilai = '$nilai',
                keterangan = '$ket' WHERE id_nilai_cf = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);;
}

function hapusCF($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM nilai_cf WHERE id_nilai_cf = '$id' ");

    return mysqli_affected_rows($conn);
}
// Function CF -------------------------------------------------------

// Function Nutrisi ----------------------------------------------------
function tambahNutrisi($data)
{
    global $conn;

    $pertanyaan = $data['pertanyaan'];
    $minggu = $data['minggu'];
    $kondisi = $data['kondisi'];
    $keterangan = $data['keterangan'];

    // query insert data
    $query = "INSERT INTO nutrisi VALUES 
    	(NULL, '$pertanyaan', '$minggu', '$kondisi', '$keterangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);;
}

function ubahNutrisi($data)
{
    global $conn;

    $id = $data['id'];
    $pertanyaan = $data['pertanyaan'];
    $minggu = $data['minggu'];
    $kondisi = $data['kondisi'];
    $keterangan = $data['keterangan'];

    // query updatew data
    $query = "UPDATE nutrisi SET 
                pertanyaan = '$pertanyaan',
                minggu = '$minggu',
                kondisi = '$kondisi',
                keterangan = '$keterangan' WHERE id_nutrisi = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);;
}

function hapusNutrisi($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM nutrisi WHERE id = '$id' ");

    return mysqli_affected_rows($conn);
}

// Function Basis Pengetahuan ---------------------------------------------
function tambahBasis($data)
{
    global $conn;

    $penyakit = $data['penyakit'];
    $gejala = $data['gejala'];
    $cf = $data['cf'];

    $qPenyakit = query("SELECT * FROM penyakit WHERE nama_penyakit = '$penyakit'")[0];
    $qGejala = query("SELECT * FROM gejala WHERE nama_gejala = '$gejala'")[0];
    $qCF = query("SELECT * FROM nilai_cf WHERE nilai = '$cf'")[0];

    $idPenyakit = $qPenyakit['id_penyakit'];
    $idGejala = $qGejala['id_gejala'];
    $idCF = $qCF['id_nilai_cf'];

    //insert data
    $query = "INSERT INTO basis_pengetahuan VALUES
                    (NULL, '$idPenyakit', '$idGejala', '$idCF')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahBasis($data)
{
    global $conn;
    $id = $data['id'];
    $penyakit = $data['penyakit'];
    $gejala = $data['gejala'];
    $cf = $data['cf'];

    $qPenyakit = query("SELECT * FROM penyakit WHERE nama_penyakit = '$penyakit'")[0];
    $qGejala = query("SELECT * FROM gejala WHERE nama_gejala = '$gejala'")[0];
    $qCF = query("SELECT * FROM nilai_cf WHERE nilai = '$cf'")[0];

    $idPenyakit = $qPenyakit['id_penyakit'];
    $idGejala = $qGejala['id_gejala'];
    $idCF = $qCF['id_nilai_cf'];

    //insert data
    $query = "UPDATE basis_pengetahuan SET
                id_penyakit = '$idPenyakit',
                id_gejala = '$idGejala',
                id_nilai_cf = '$idCF' WHERE id_basis_pengetahuan = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusBasis($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM basis_pengetahuan WHERE id_basis_pengetahuan  = '$id' ");

    return mysqli_affected_rows($conn);
}
// Function Basis Pengetahuan ---------------------------------------------

// Function Konsultasi Minggu 1 -----------------------------------------------
function tambahTanaman($data)
{
    global $conn;
    $tgl = date('d F Y');
    $user = $_SESSION['username'];
    $tanaman = $data['tanaman'];

    $qUser = query("SELECT * FROM users WHERE username = '$user'")[0];
    $idUser = $qUser['id'];


    // cek nama tanaman sudah atau belum
    $result = mysqli_query($conn, "SELECT nama_tanaman FROM jadwal WHERE id_user = '$idUser' AND nama_tanaman = '$tanaman'");

    if (mysqli_fetch_assoc($result)) {
        flash('jadwal', 'Nama tanaman sudah terdaftar. Masukan nama yang berbeda.', 'alert-danger');
        header("Location: http://localhost/mint/jadwal");
        exit;
    }

    // query insert data
    $query = "INSERT INTO jadwal VALUES 
    	(NULL,'$idUser', '$tanaman', '$tgl')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahTanaman($data)
{
    global $conn;
    $id = $data['id'];
    $tanaman = $data['tanaman'];

    //update data
    $query = "UPDATE jadwal SET nama_tanaman = '$tanaman'  WHERE id_jadwal = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusJadwal($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal  = '$id' ");

    return mysqli_affected_rows($conn);
}
// Function Konsultasi Minggu 1 -----------------------------------------------

// Function Konsultasi Minggu 2 ------------------------------------------------
function konsultasi($data)
{
    global $conn;

    $user = $data['user'];
    $tanaman = $data['tanaman'];
    $minggu = $data['minggu'];
    $konsul = $data['gejala'];


    $qJadwal = query("SELECT id_jadwal FROM jadwal,users WHERE  username = '$user' AND nama_tanaman = '$tanaman' AND jadwal.id_user = users.id")[0];
    $idJadwal = $qJadwal['id_jadwal'];

    // get konsul ke berapa
    $sql = query("SELECT MAX(ke) AS ke_baru FROM konsultasi_penyakit WHERE id_jadwal = '$idJadwal' AND pekan = '$minggu'")[0];
    $keBaru = $sql['ke_baru'];
    $keBaru++;

    $qUser = query("SELECT id FROM users WHERE  username = '$user'")[0];
    $idUser = $qUser['id'];


    foreach ($konsul as $row) {
        $hasil = explode('/', $row);
        $gejala = $hasil[0];
        $cf = $hasil[1];


        if ($gejala !== 'no' & $cf !== 0) {
            $qGejala = query("SELECT * FROM gejala WHERE  nama_gejala = '$gejala'")[0];

            $idGejala = $qGejala['id_gejala'];

            $qCF = query("SELECT id_nilai_cf FROM nilai_cf WHERE  nilai = '$cf'")[0];
            $idCF = $qCF['id_nilai_cf'];

            $sql = query("SELECT * FROM basis_pengetahuan, penyakit, gejala, nilai_cf WHERE
                         basis_pengetahuan.id_penyakit = penyakit.id_penyakit AND 
                         basis_pengetahuan.id_gejala = gejala.id_gejala AND 
                         basis_pengetahuan.id_nilai_cf = nilai_cf.id_nilai_cf AND 
                            gejala.id_gejala = '$idGejala' ORDER BY penyakit.id_penyakit");

            foreach ($sql as $row) {
                $perkalian = $cf * $row['nilai'];
                $idPenyakit = $row['id_penyakit'];

                //insert data
                $query = "INSERT INTO konsultasi_penyakit VALUES 
                             (NULL, '$idJadwal', '$idPenyakit', '$idGejala', '$idCF', '$perkalian', '', '$minggu', '$keBaru')";
                mysqli_query($conn, $query);
            }
        }
    }
    // get all data
    $hasilKonsultasi = query("SELECT * FROM konsultasi_penyakit, jadwal, penyakit, gejala, nilai_cf
                        WHERE konsultasi_penyakit.id_jadwal = jadwal.id_jadwal AND  
                              konsultasi_penyakit.id_penyakit = penyakit.id_penyakit AND
                              konsultasi_penyakit.id_gejala = gejala.id_gejala AND
                              konsultasi_penyakit.id_nilai_cf = nilai_cf.id_nilai_cf AND 
                                id_user = '$idUser' AND 
                                nama_tanaman = '$tanaman' AND
                                pekan = '$minggu' GROUP BY nama_penyakit ORDER BY penyakit.id_penyakit");


    foreach ($hasilKonsultasi as $cf2) {
        $idPenyakit = $cf2['id_penyakit'];

        $sql = query("SELECT * FROM konsultasi_penyakit WHERE id_penyakit = '$idPenyakit' AND id_jadwal = '$idJadwal' AND pekan = '$minggu'");
        $cf1 = 0;
        foreach ($sql as $row) {
            $idGejala = $row['id_gejala'];
            $cf2 = $row['perkalian'];

            //rumus
            //CFc = CF1 + CF2 * (1 - Cf1)
            // dipecah
            $a = 1 - $cf1;
            $b = $cf2 * $a;
            $hasil = $cf1 + $b;
            $result =  round($hasil, 2);

            $cf1 = $result;
        }

        //update data kolom hasil
        $sql = "UPDATE konsultasi_penyakit SET hasil = '$result' WHERE
                id_jadwal = '$idJadwal' AND id_penyakit = '$idPenyakit'";
        mysqli_query($conn, $sql);
    }

    // Konsultasi Nutrisi -------------------------------------------------------
    $kondisiNutrisi = $data['kondisi'];

    foreach ($kondisiNutrisi as $row) {
        $hasil = explode('@', $row);
        $pertanyaan = $hasil[0];
        $pilihan = $hasil[1];

        // pilih berdasarkan id nutrisi
        $qNutrisi = query("SELECT * FROM nutrisi WHERE pertanyaan = '$pertanyaan' AND kondisi = '$pilihan'")[0];

        $idNutrisi = $qNutrisi['id_nutrisi'];

        // insert data
        $sql = "INSERT INTO konsultasi_nutrisi VALUES 
                    (NULL, '$idJadwal', '$idNutrisi' , '$minggu', '$keBaru')";
        mysqli_query($conn, $sql);
    }

    return mysqli_affected_rows($conn);
}
// Function Konsultasi Minggu 2 ------------------------------------------------

function pakar()
{
    $level = $_SESSION['level'];

    if ($level == 'pakar') {
        $result = '';
    } else {
        $result = 'visually-hidden';
    }

    return $result;
}

function user()
{
    $level = $_SESSION['level'];

    if ($level == 'user') {
        $result = '';
    } else {
        $result = 'visually-hidden';
    }

    return $result;
}

function pekan($user, $tanaman, $pekan)
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT DISTINCT pekan FROM konsultasi_nutrisi, jadwal, users WHERE
    konsultasi_nutrisi.id_jadwal = jadwal.id_jadwal AND
    jadwal.id_user = users.id AND 
    users.username = '$user' AND jadwal.nama_tanaman = '$tanaman' AND pekan = '$pekan' ");

    return mysqli_num_rows($sql);
}

function getKonsulKe($idJadwal, $pekan)
{
    global $conn;

    $sql = query("SELECT DISTINCT ke FROM konsultasi_penyakit WHERE id_jadwal = '$idJadwal' AND pekan = '$pekan'");


    return $sql;
}
