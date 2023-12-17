<?php
require 'functions.php';

if (isset($_POST["register"])) {

	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			</script>";
	} else {
		echo mysqli_error($fauzan);
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Halaman Registrasi</title>
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

		label {
			display: block;
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
					<a class="nav-link" href="login.php">Login</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="card">
		<h1 class="fs-2 text-md-center pt-2 text-center" style="color: #b8a77e; font-weight: 700;">Halaman Registrasi</h1>
		<div id="container" class="container d-flex justify-content-center align-item-enter" style="background: #235468; border-radius: 15px; max-width: 50%">
			<div id="login-container">
				<form action="" method="post" class="row align-items-center">
					<p class="fs-2 text-md-center pt-2 text-center" style="color : #b8a77e; font-weight: 700;">Registrasi</p>
					<div class="mb-3">
						<label for="username" class="row align-items-center">username :</label>
						<input type="text" name="username" id="username" class="form-control rounded-4" placeholder="Username">
					</div>
					<div class="mb-3 mt-3">
						<label for="password" class="row align-items-center">password :</label>
						<input type="password" name="password" id="password" class="form-control rounded-4" placeholder="Password">
					</div>
					<div class="mb-3">
						<label for="password2" class="row align-items-center">konfirmasi password :</label>
						<input type="password" name="password2" id="password2" class="form-control rounded-4" placeholder="Konfirmasi Password">
					</div>
					<div class="d-grid z col-6 mx-auto mb-3">
						<button class="btn text-black" style="background: aquamarine;" type="submit" name="register">Register!</button>
					</div>


					<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>