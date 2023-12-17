<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'data.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'data.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Ubah Data Pendaftar</title>
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
		<div id="container" class="container d-flex justify-content-center align-item-enter mt-5" style="background: #235468; border-radius: 15px; max-width: 50%">
			<div class="login-container">
				<form action="" method="post" enctype="multipart/form-data" class="row align-items-center mt-3">
					<p class="fs-2 text-md-center pt-2 text-center" style="color: #b8a77e; font-weight: 700">Ubah Data Pendafar</p>

					<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
					<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
					<div class="mb-3">
						<label for="nim" class="form-label text-white">NIM : </label>
						<input type="text" name="nim" class="form-control rounded-4" id="nim" required value="<?= $mhs["nim"]; ?>">
					</div>
					<div class="mb-3">
						<label for="nama" class="form-label text-white">Nama : </label>
						<input type="text" name="nama" class="form-control rounded-4" id="nama" value="<?= $mhs["nama"]; ?>">
					</div>
					<div class="mb-3">
						<label for="email" class="form-label text-white">Email :</label>
						<input type="text" name="email" class="form-control rounded-4" id="email" value="<?= $mhs["email"]; ?>">
					</div>
					<div class="mb-3">
						<label for="jurusan" class="form-label text-white">Jurusan :</label>
						<input type="text" name="jurusan" class="form-control rounded-4" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
					</div>
					<div class="mb-3">
						<label for="gambar" class="form-label text-white ">Gambar :</label>
						<img src="img/<?= $mhs['gambar']; ?>" width="100">
						<input type="file" name="gambar" class="form-control rounded-4 mt-3" id="gambar">
					</div>
					<div class="d-grid z col-6 mx-auto mb-3">
						<button type="submit" name="submit" class="btn text-black" style="background: aquamarine">Ubah Data!</button>
					</div>
				</form>

				</form>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>