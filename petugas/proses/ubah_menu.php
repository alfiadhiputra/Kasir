<?php
	include '../../config/koneksi.php';
	$id_menu = $_POST['id_menu'];
	$gambar_lama = $_POST['gambar_lama'];
	$nm_menu = $_POST['nm_menu'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	

	//Gambar
	$gambar = $_FILES['gambar']['name'];
	$lokasi_gambar  = $_FILES['gambar']['tmp_name'];
	$extensi = explode('.', $gambar);
	$extensi = strtolower(end($extensi));
	$extensiValid = ['jpg', 'jpeg', 'gif', 'png'];
	$size = $_FILES['gambar']['size'];
	$namaGambar = 'menu_';
	$namaGambar .= rand(10,99999);
	$namaGambar .= '.';
	$namaGambar .= $extensi;

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi Kesalahan';

	if ($gambar == NULL) {
		
		$query = $koneksi->query("UPDATE menu SET nm_menu = '$nm_menu', harga = '$harga', deskripsi = '$deskripsi' WHERE id_menu = $id_menu");
		if ($query) {
			$data['hasil'] = true;
			$data['pesan'] = 'Data Berhasil Diubah';
		}
	}

	else{
		if (move_uploaded_file($lokasi_gambar, '../../assets/img/menu/'. $namaGambar)) 
		{
			$query = $koneksi->query("UPDATE menu SET nm_menu = '$nm_menu', harga = '$harga', deskripsi = '$deskripsi', gambar = '$namaGambar' WHERE id_menu = $id_menu");
			
			if ($query) 
			{
				if (file_exists('../../assets/img/menu/' . $gambar_lama)) {
					unlink('../../assets/img/menu/' . $gambar_lama);
				}

				$data['hasil'] = true;
				$data['pesan'] = 'Data Berhasil Diubah';
			}

		}
	}

	echo json_encode($data);
?>