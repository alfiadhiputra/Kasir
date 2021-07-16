<?php
	$data['hasil'] = true;
	$data['pesan'] = 'Berhasil';
	include '../../config/koneksi.php';
	session_start();
	$username = $_SESSION['username'];
	$query = $koneksi->query("SELECT * FROM user WHERE username = '$username'");
	$data = mysqli_fetch_assoc($query);
	$id_user = $data['id_user'];
	$id_pesanan = $_POST['id_pesanan'];

	

	$query = $koneksi->query("UPDATE pesanan SET status = 'menunggu pembayaran', id_user = $id_user WHERE id_pesanan = '$id_pesanan'");
	if ($query) {
		$data['hasil'] = true;
		$data['pesan'] = 'Berhasil';
	}

	echo json_encode($data);
?>