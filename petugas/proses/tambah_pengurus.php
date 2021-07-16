<?php
	include'../../config/koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$konfirmasi_password = $_POST['konfirmasi_password'];
	$nm_user = $_POST['nm_user'];
	$level = $_POST['level'];

	//gambar
	$gambar = $_FILES['gambar']['name'];
	$lokasi_gambar  = $_FILES['gambar']['tmp_name'];
	$extensi = explode('.', $gambar);
	$extensi = strtolower(end($extensi));
	$extensiValid = ['jpg', 'jpeg', 'gif', 'png'];
	$size = $_FILES['gambar']['size'];
	$namaGambar = 'user_';
	$namaGambar .= rand(10,99999);
	$namaGambar .= '.';
	$namaGambar .= $extensi;

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;

	$query = $koneksi->query("SELECT * FROM user WHERE username = '$username'");
	$hitung = mysqli_num_rows($query);

	if ($hitung > 0) {
		$data['pesan'] = 'Username sudah digunakan';
	}
	else if ($password != $konfirmasi_password) {
		$data['pesan'] = 'Password tidak sama';
	}
	else{
		if (move_uploaded_file($lokasi_gambar, '../assets/images/petugas/' . $namaGambar)) {
			$query = $koneksi->query("INSERT INTO user VALUES(NULL, '$username', '$password', '$nm_user', '$namaGambar', '$level')");
			if ($query) {
				$data['hasil'] = true;
				$data['pesan'] = 'Data berhasil ditambahkan';
			}
		}
	}

	echo json_encode($data);

?>