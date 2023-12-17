<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Halaman Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="./style/data.css">


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/script.js"></script>
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
					<a class="nav-link" href="tambah.php">Tambah data mahasiswa</a>
					<a class="nav-link" href="registrasi.php">Registrasi admin baru</a>
					<a class="nav-link" href="logout.php">Logout</a>
				</div>
			</div>
		</div>
	</nav>


	<div>
		<h1>Data Pendaftar</h1>

		<form action="" method="post">

			<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
			<button type="submit" name="cari" id="tombol-cari">Cari!</button>

			<img src="img/loader.gif" class="loader">

		</form>

	</div>



	<div id="container">
		<table border="1" cellpadding="10" cellspacing="0">

			<tr>
				<th>No.</th>
				<th>Aksi</th>
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
					<td class="berubah">
						<a class="ubah" href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
						<a class="hapus" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
					</td>
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


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>