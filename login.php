<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($fauzan, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

if (isset($_SESSION["login"])) {
	header("Location: data.php");
	exit;
}


if (isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($fauzan, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if (mysqli_num_rows($result) === 1) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if (isset($_POST['remember'])) {
				// buat cookie
				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}

			header("Location: data.php");
			exit;
		}
	}

	$error = true;
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Halaman Login</title>
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
					<a class="nav-link" href="login.php">Login</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="card">
		<h1 class="fs-2 text-md-center pt-2 text-center" style="color: #b8a77e; font-weight: 700;" >Halaman Login Admin</h1>
		<?php if (isset($error)) : ?>
			<p style="color: red; font-style: italic; text-align:center">username / password salah</p>
		<?php endif; ?>
		<div id="container" class="container d-flex justify-content-center align-item-enter" style="background: #235468; border-radius: 15px; max-width: 50%" >
			<div id="login-container">
				<form action="" method="post" class="row align-items-center">
					<p class="fs-2 text-md-center pt-2 text-center" style="color : #b8a77e; font-weight: 700;">L O G I N</p>
					<div class="mb-3">
						<label for="username" class="form-label text-white">Username :</label>
						<input type="text" name="username" id="username" class="form-control rounded-4" placeholder="Username">
					</div>
					<div>
						<label for="password" class="form-label text-white">Password :</label>
						<div>
							<input type="password" name="password" id="password" class="form-control rounded-4" placeholder="Password">
							<button class="btn" type="button" id="eye">
								<i class="bi bi-eye-slash-fill" style="color: aqua;"></i>
							</button>
						</div>
					</div>
					<div class="mb-5">
						<input type="checkbox" name="remember" id="remember">
						<label for="remember" style="color: white;">Remember me</label>
					</div>
					<div class="d-grid z col-6 mx-auto mb-3">
						<button class="btn text-black" style="background: aquamarine;" type="submit" name="login">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>