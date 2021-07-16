<?php
	include '../config/koneksi.php';
	$id_pesanan = $_GET['id_pesanan'];

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;
	$query = $koneksi->query("DELETE FROM pesanan_detail WHERE id_pesanan_detail = $id_pesanan");

	if ($query) {
		$data['hasil'] = true;
		$data['pesan'] = 'Berhasil';
	}

	echo json_encode($data);
?>