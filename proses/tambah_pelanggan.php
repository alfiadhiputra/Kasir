<?php
	include '../config/koneksi.php';

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi Kesalahan';
	$id_meja		= $_POST['id_meja'];
	
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$no_hp 			= $_POST['no_hp'];
	$alamat   		= $_POST['alamat'];
	$jenis_kelamin  = $_POST['jenis_kelamin'];

	//buat id_pelanggan
	$id_pelanggan = 'IP';
	$id_pelanggan .= rand(0, 999999);

	$input_pelanggan = $koneksi->query("INSERT INTO pelanggan VALUES('$id_pelanggan', '$nama_pelanggan', '$jenis_kelamin', '$no_hp', '$alamat')");

	if ($input_pelanggan) 
	{
		$query = $koneksi->query("UPDATE meja SET status = 'penuh' WHERE id_meja = $id_meja");
		session_start();
		$_SESSION['id_pelanggan'] = $id_pelanggan;
		$_SESSION['id_meja']      = $id_meja;
		$data['hasil'] = true;
		$data['pesan'] = 'Berhasil';
	}

	echo json_encode($data);