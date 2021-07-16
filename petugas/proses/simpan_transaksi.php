<?php
	include '../../config/koneksi.php';

	$id_pesanan = $_POST['id_pesanan'];
	$total      = $_POST['total'];
	$bayar      = $_POST['bayar'];
	$waktu      = $_POST['waktu'];
	$tgl        = $_POST['tgl'];

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;

	if ($bayar < $total) {
		$data['pesan'] = 'Jumlah pembayaran kurang';
	}
	else{
		$query = $koneksi->query("INSERT INTO transaksi VALUES(NULL, '$id_pesanan', '$total', '$bayar', '$waktu', '$tgl')");
		if ($query) {

			$query = $koneksi->query("UPDATE pesanan SET status = 'selesai' WHERE id_pesanan = '$id_pesanan'");
			if ($query) {
				$data['hasil'] = true;
				$data['pesan'] = 'Berhasil';
			}
			
		}
	}

	echo json_encode($data);
?>