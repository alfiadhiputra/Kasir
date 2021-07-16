<?php
	session_start();

	
	

	if (empty($_SESSION['id_pelanggan'])) {
		header('location:masuk');
	}
	else{

		$id_pelanggan = $_SESSION['id_pelanggan'];
		
		$query = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
		$hitung = mysqli_num_rows($query);
		if ($hitung > 0) {
			$data = mysqli_fetch_assoc($query);

			
			$nama_pelanggan = $data['nama_pelanggan'];
			$no_hp = $data['no_hp'];
			$jenis_kelamin = $data['jenis_kelamin'];
			$alamat = $data['alamat'];
		}
		else{
			header('location:masuk');
		}
	}
?>