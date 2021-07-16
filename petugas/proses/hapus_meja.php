<?php
	include '../../config/koneksi.php';

	$id_meja = $_GET['id_meja'];

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi kesalahan...';

	

	
	
	$query = $koneksi->query("DELETE FROM meja WHERE id_meja = $id_meja");

	if ($query) {
	
		$data['hasil'] = true;
		$data['pesan'] = 'Data berhasil dihapus';
	}

	echo json_encode($data);


?>