<?php 
	include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>CraftyCrab | Masuk</title>
	<link rel="short icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Style -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/login.css">

	<!-- JavaScript -->
	<?php require 'tampilan/js.php';?>
	<script src="assets/js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
</head>
<body>
	<div class="wrapper">
		<div class="container wow fadeInDown animated" data-wow-delay="0.7s">
			
			<div class="bar-adm" style="margin-top: 10px">
				<span>Isi Data Diri</span>
			</div>

			<div id="login">
				<form action="proses/tambah_pelanggan.php" method="post" id="tambah">
					<div class="form-group wow fadeIn animated" data-wow-delay="1.7s">
						<label for="nama_pelanggan" class="label-control">Nama Anda</label>
						<input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan nama anda...." id="nama_pelanggan" required>
					</div>
					<div class="form-group wow fadeIn animated" data-wow-delay="2.7s">
						<label for="no_hp" class="label-control">No Handphone</label>
						<input type="text" class="form-control" name="no_hp" placeholder="Masukan no telepon" id="no_hp" required>
					</div>
					<div class="form-group wow fadeIn animated" data-wow-delay="2.7s">
						<label for="alamat" class="label-control">Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control"></textarea>
					</div>
					<input type="radio" name="jenis_kelamin" value="pria" checked>Pria <input type="radio" name="jenis_kelamin" value="wanita"> Wanita 
					<hr>
					<div class="form-group wow fadeIn animated" data-wow-delay="2.7s">
						<label for="id_meja" class="label-control">Pilih kode meja yang anda tempati</label>
						<select name="id_meja" id="id_meja" class="form-control">
							<?php
								$query = $koneksi->query("SELECT * FROM meja WHERE status = 'kosong'");
								$hitung = mysqli_num_rows($query);
								while($rows = mysqli_fetch_assoc($query)):
							?>
								<option value="<?php echo $rows['id_meja'];?>"><?php echo $rows['kd_meja'];?></option>
							<?php endwhile;?>
						</select>
						*kode meja tertera pada meja
					</div>
					<div class="form-group">
						<?php
							if ($hitung  < 1) {
								echo"<div class='alert alert-danger'>Mohon maaf meja sedang penuh</div>";
							}
							else{
						?>
						<button class="btn btn-success pull-right wow bounce animated" data-wow-delay="3s"" name="logadm" type="submit">Masuk</button>
						<?php } ?>
					</div>
				</form>
				<div id="pesan">
					
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){

			$('#tambah').submit(function(e){
				e.preventDefault();
				$.ajax({
					url:$(this).attr('action'),
					method:$(this).attr('method'),
					data: new FormData(this),
					dataType: 'JSON',
					contentType: false,
					processData: false,
					success: function(data)
					{
						if(data.hasil == true)
						{
							window.location.assign('index');
						}
						else
						{
							
							swal({
								title: 'Gagal',
								icon: 'error',
								text: data.pesan
							});
						}
					}
				});
			});
		});
	</script>
</body>
</html>