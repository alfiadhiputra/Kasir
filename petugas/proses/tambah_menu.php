<?php
	include'../../config/koneksi.php';
	$nm_menu = $_POST['nm_menu'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];

	//gambar
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

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;
	
		if (move_uploaded_file($lokasi_gambar, '../../assets/img/menu/' . $namaGambar)) {
			$query = $koneksi->query("INSERT INTO menu VALUES(NULL, '$nm_menu', '$harga', '$namaGambar', '$deskripsi')");
			if ($query) {
				$data['hasil'] = true;
				$data['pesan'] = 'Data berhasil ditambahkan';
			}
		}
	

	echo json_encode($data);

?>