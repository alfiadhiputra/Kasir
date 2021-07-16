<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Administrator</title>
	<link rel="short icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Style -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/login.css">

	<!-- JavaScript -->
	<?php require 'template/js.php';?>
	<script>
		new WOW().init();
	</script>
</head>
<body>
	<div class="wrapper">
		<div class="container wow fadeInDown animated" data-wow-delay="0.7s">
			<div class="header-adm"><img src="assets/images/favicon.ico" alt="Admin"></div>
			<div class="bar-adm">
				<span>Petugas</span>
			</div>

			<div id="login">
				<form action="proses/proses_login.php" method="post" id="form_login">
					<div class="form-group wow fadeIn animated" data-wow-delay="1.7s">
						<label for="username" class="label-control">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username" id="username" required>
					</div>
					<div class="form-group wow fadeIn animated" data-wow-delay="2.7s">
						<label for="password" class="label-control">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password..." id="password" required>
					</div>
					<div class="form-group wow fadeIn animated" data-wow-delay="2.7s">
						<label for="password" class="label-control">Masuk Sebagai :</label>
						<select name="level" id="" class="form-control">
							<option value="administrator">Administrator</option>
							<option value="kasir">Kasir</option>
							<option value="waiter">Waiter</option>
							<option value="owner">Owner</option>
						</select>
					</div>
					<div class="form-group">
						<a href="../" class="btn btn-danger pull-left">Kembali</a>
						<button class="btn btn-success pull-right wow bounce animated" data-wow-delay="3s"" name="logadm" type="submit">Masuk</button>
					</div>
				</form>
				<div id="pesan">
					
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){

			function error()
			{
				document.getElementById('error').play();	
			}  

			function success()
			{
				document.getElementById('success').play();	
			}
			$('#form_login').submit(function(e){
				e.preventDefault();
				$.ajax({
					url:$(this).attr('action'),
					method:$(this).attr('method'),
					data: new FormData(this),
					dataType: 'JSON',
					contentType: false,
					processData: false,					
					beforeSend: function(){
						$('#pesan').html('<b>Uploading...</b>');
					},
					success: function(data)
					{
						if(data.hasil == true)
						{
							window.location.assign('index');
						}
						else
						{
							error();
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