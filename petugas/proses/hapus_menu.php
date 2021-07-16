<?php
	include '../../config/koneksi.php';

	$id_menu = $_GET['id_menu'];

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi kesalahan...';

	$query = $koneksi->query("SELECT * FROM menu WHERE id_menu = $id_menu");
	$data = mysqli_fetch_assoc($query);

	$gambar = $data['gambar_menu'];

	
	
	$query = $koneksi->query("DELETE FROM menu WHERE id_menu = $id_menu");

	if ($query) {
		if (file_exists('../../assets/img/menu/'.$gambar))
		{
			unlink('../../assets/img/menu/'.$gambar);
		}
		$data['hasil'] = true;
		$data['pesan'] = 'Data berhasil dihapus';
	}

	echo json_encode($data);


?>