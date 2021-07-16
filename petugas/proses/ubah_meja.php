<?php
	include '../../config/koneksi.php';
	$id_meja = $_POST['id_meja'];
	
	$kd_meja = $_POST['kd_meja'];
	$status = $_POST['status'];
	
	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi Kesalahan';

	
		
		$query = $koneksi->query("UPDATE meja SET kd_meja = '$kd_meja', status = '$status' WHERE id_meja = $id_meja");
		if ($query) {
			$data['hasil'] = true;
			$data['pesan'] = 'Data Berhasil Diubah';
		}
	
	echo json_encode($data);
?>