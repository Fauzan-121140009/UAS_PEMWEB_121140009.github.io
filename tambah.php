<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	// cek apakah data berhasil di tambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'data.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'data.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tambah data pendaftar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	
	<style>
		body {
			background: linear-gradient(to bottom, #173747, #235468);
		}

		.card {
			background: linear-gradient(to bottom, #173747, #235468);
		}

		.card-body {
			background: #235468;
			margin: 0 3rem;
			border-radius: 15px;
}
	</style>

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
					<a class="nav-link active" href="data.php">Data Pendaftar</a>
					<a class="nav-link" href="logout.php">Logout</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="card">
		<h1 class="fs-2 text-md-center pt-2 text-center mb-5 mt-3" style="color: #b8a77e; font-weight: 700;">Halaman Tambah Data</h1>

		<div id="container" class="container d-flex justify-content-center align-item-enter" style="color: #b8a77e; border-radius: 15px; max-width: 50%;">
			<div class="card-body" id="login-container">
				<form action="" method="post" class="row align-items-center" enctype="multipart/form-data">
					<p class="fs-2 text-md-center pt-2 text-center" style="color: #b8a77e; font-weight: 700;">Tambah Data Peserta</p>
					<div class="mb-3">
						<label for="nim" class="form-label text-white">NIM : </label>
						<input type="text" name="nim" id="nim" class="form-control rounded-4" placeholder="NIM" required>
					</div>
					<div>
						<label for="nama" class="form-label text-white">Nama : </label>
						<input type="text" name="nama" class="form-control rounded-4" placeholder="Nama" id="nama">
					</div>
					<div>
						<label for="email" class="form-label text-white">Email :</label>
						<input type="text" name="email" class="form-control rounded-4" placeholder="Email" id="email">
					</div>
					<div>
						<label for="jurusan" class="form-label text-white">Jurusan :</label>
						<input type="text" name="jurusan" class="form-control rounded-4" placeholder="jurusan" id="jurusan">
					</div>
					<div class="mb-3">
						<label for="gambar" class="form-label text-white">Gambar :</label>
						<input type="file" name="gambar"  class="form-control rounded-4" placeholder="Gambar" id="gambar">
					</div>
		
					<div class="d-grid z col-6 mx-auto mb-3">
					<button class="btn text-black" style="background: aquamarine" type="submit" name="submit">Tambah Data!</button>
					</div>
			</div>
		</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>