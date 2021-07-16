<?php
	include'../../config/koneksi.php';
	$kd_meja = $_POST['kd_meja'];
	$status = 'kosong';
	

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;
	
		
			$query = $koneksi->query("INSERT INTO meja VALUES(NULL, '$kd_meja', '$status')");
			if ($query) {
				$data['hasil'] = true;
				$data['pesan'] = 'Data berhasil ditambahkan';
			}
			else{
				$data['pesan'] = 'Gagal menambahkan data';
			}
		
	

	echo json_encode($data);

?>