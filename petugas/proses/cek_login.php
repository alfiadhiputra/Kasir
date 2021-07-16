<?php
	session_start();

	$login = $_SESSION['login'];
	$username = $_SESSION['username'];

	if ($login != true) {
		header('location:login');
	}
	else{
		$query = $koneksi->query("SELECT * FROM user WHERE username = '$username'");
		$hitung = mysqli_num_rows($query);
		if ($hitung > 0) {
			$data = mysqli_fetch_assoc($query);

			$id_user = $data['id_user'];
			$username = $data['username'];
			$password = $data['password'];
			$nm_user = $data['nm_user'];
			$gambar_user = $data['gambar_user'];
			$level = $data['level'];
		}
		else{
			header('location:login');
		}
	}
?>