<?php
	include '../config/koneksi.php';
	session_start();
	$id_pelanggan = $_SESSION['id_pelanggan'];
	$id_pesanan = $_SESSION['id_pesanan'];
	$total_pesanan = $_POST['total_pesanan'];
	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi Kesalahan';
	$query = $koneksi->query("UPDATE pesanan SET status = 'menunggu diantar', total_pesanan = $total_pesanan WHERE status = 'memilih menu' AND id_pelanggan = '$id_pelanggan' AND id_pesanan = '$id_pesanan'");

	if ($query) {


		$_SESSION['sukses'] = true;
		$data['hasil'] = true;
		$data['pesan'] = 'Berhasil';
	}

	echo json_encode($data);
?>