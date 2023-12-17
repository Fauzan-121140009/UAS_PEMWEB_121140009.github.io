<?php

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>Halaman Utama</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <div class="container ">
            <a class="navbar-brand" href="#">Pendaftaran Anggota Organisasi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="card">
                <img src="./img/Ikmlogo.png" class="card-img-top" alt="logo_ikm">
                <div class="card-body">
                    <p class="card-text">UKM Ikatan Keluarga Minangkabau merupakan wadah untuk berserikat, mengembangkan budaya, dan wadah untuk menyalurkan kreativitas, inspirasi dan aspirasi mahasiswa Minangkabau. Tujuan didirikannya UKM IKM adalah Mengaktifkan dan memajukan budaya yang ada di UKM Ikatan Keluarga Minangkabau dan meningkatkan kemajuan UKM Ikatan Keluarga Minangkabau Menjaga hubungan yang harmonis dengan seluruh anggota atau keluarga UKM Ikatan Keluarga Minang dan melaksanakan kegiatan di bidang kebudayaan, pendidikan dan keagamaan. Melaksanakan rencana yang ada dan memperbaiki rencana yang telah disusun sesuai rencana.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body" id="container">
        <h4 class="judul-tabel">Data Yang Telah terdaftar</h4>
        <div class="table-responsive">
            <table border="1" class="table table-warning table-striped" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                        <td><?= $row["nim"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["jurusan"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>