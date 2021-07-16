<?php
	include '../config/koneksi.php';
	session_start();

		$id_menu = $_POST['id_menu'];
		$qty = $_POST['qty'];
		
		//id_pelanggan dari session
		$id_pelanggan = $_SESSION['id_pelanggan'];

		//id meja dari session
		$id_meja = $_SESSION['id_meja'];

		$query = $koneksi->query("SELECT * FROM menu WHERE id_menu = $id_menu");
			$rows = mysqli_fetch_assoc($query);

			$total_harga = $rows['harga']*$qty;


	if(empty($_SESSION['id_pesanan']))
	{
		//buat id pesanan
		$id_pesanan = 'IDP';
		$id_pesanan .= rand(0, 99999);
		

		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('d-m-Y');
		$waktu = date('H');

		$data['pesan'] = 'Terjadi Kesalahan';
		$data['hasil'] = false;

		if ($qty >= 10) {
			$data['pesan'] = 'Maksimal pesanan 10';
			$data['hasil'] = false;

	 	}
	 	else{
			
			$query = $koneksi->query("INSERT INTO pesanan VALUES('$id_pesanan', '$id_pelanggan', '$tgl', '$waktu', $id_meja, 'memilih menu', '0', $total_harga)");
			if ($query) {
				$query = $koneksi->query("INSERT INTO pesanan_detail VALUES(NULL, '$id_pesanan', $id_menu, $qty, $total_harga)");
				if ($query) {
					$data['hasil'] = true;
					$data['pesan'] = 'Berhasil';
					$_SESSION['id_pesanan'] = $id_pesanan;
				}
			}else{
				$data['pesan'] = 'gagal';
			}
	 	}
	}
	else{
		$id_pesanan = $_SESSION['id_pesanan'];
		$query = $koneksi->query("INSERT INTO pesanan_detail VALUES(NULL, '$id_pesanan', $id_menu, $qty, $total_harga)");
		if ($query) {
					$data['hasil'] = true;
					$data['pesan'] = 'Berhasil';
					
			}
		else{
				$data['pesan'] = 'gagal';
		}
	}

	

	echo json_encode($data);
?>