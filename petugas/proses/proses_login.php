<?php
	include '../../config/koneksi.php';
	
	/*
	 *	[1]Deklarasi variabel setiap inputan
	 */
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level    = $_POST['level'];

	//-----------------------------------------------------------------------------------------------------

	/*
	 *	[2]Cek apakah username yang di inputkan terdaftar di database
	 */
	
	$query = $koneksi->query("SELECT * FROM user WHERE username = '$username' AND level = '$level'");

	//-----------------------------------------------------------------------------------------------------


	/*
	 * [3]hitung data
	 */
	
	$hitung = mysqli_num_rows($query);

	//-----------------------------------------------------------------------------------------------------
	/*
	 *	[4]Jika variabel hitung lebih dari 0, maka username terdaftar.
	 *	   Jika tidak tampilkan pesan "Username tidak terdaftar" dan hasil = false
	 */
	
	if ($hitung > 0) {
		/*
		 *	[5]Cek apakah password yang di inputkan sesuai dengan data di database
		 */
		$query = $koneksi->query("SELECT * FROM user WHERE username = '$username' AND password = '$password' AND level = '$level'");
		//--------------------------------------------------------------------------------------------------
		
		/*
		 *	[6]hitung data
	 	 */
	 
	 	$hitung = mysqli_num_rows($query);

	 	//--------------------------------------------------------------------------------------------------
	 	
	 	/*
	 	 *	[7]Jika variabel hitung lebih dari 0, maka password sesuai. Buat session, hasil = true
	 	 *	   Jika tidak tampilkan pesan "Password Salah", hasil = false
	 	 */
	 	
	 	if ($hitung > 0) {
	 		session_start();
	 		$_SESSION['login'] = true;
	 		$_SESSION['username'] = $username;
	 		$data['hasil'] = true;
	 		$data['pesan'] = 'Berhasil';
	 	}
	 	else{
	 		$data['hasil'] = false;
	 		$data['pesan'] = 'Password Salah';
	 	}

	}


	else{
		$data['hasil'] = false;
		$data['pesan'] = 'Username tidak terdaftar';
	}
	

	echo json_encode($data);


	
?>