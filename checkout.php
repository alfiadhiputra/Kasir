<?php 
	include 'config/koneksi.php';
	require 'proses/cek_login.php';
	if (empty($_SESSION['id_pesanan'])) {
		header('location:index');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php require"tampilan/title.php";?>
</head>

<body>
	<!-- HEADER -->
	<header>
		<?php require"tampilan/header.php";?>
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<?php require 'tampilan/navigation.php';?>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="konfirmasi_pesanan" class="clearfix" method="post" action="proses/konfirmasi_pesanan.php">
					<div class="col-md-12">
						<div id="menu_order"></div>
					</div>
					<button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"></i> Konfirmasi Pesanan</button>

					
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	<?php require 'tampilan/footer.php';?>
	<!-- /FOOTER -->

	<?php require 'tampilan/js.php';?>
	<script>
		$(document).ready(function(){
			
			loadData_menu();

			function loadData_menu()
			{
				$.get('ajax/menu_order.php', function(data){
					$('#menu_order').html(data);
						$('.hapus_pesanan').click(function(){
							let id_pesanan = $(this).attr('value');
							$.ajax({
								url: 'proses/hapus_pesanan.php?id_pesanan='+id_pesanan,
								method: $(this).attr('method'),
								dataType: 'json',
								success: function(data){
									if(data.hasil == true)
									{
									
										loadData_menu();
									}
									else{
										swal({
											title : 'Gagal',
											icon  : 'error',
											text  : data.pesan,
										});
									}
								}

						});
					});

					$('#konfirmasi_pesanan').submit(function(e){
						e.preventDefault();
						$.ajax({
	   						url: $(this).attr('action'),
	   						method: $(this).attr('method'),
	   						data: new FormData(this),
	   						dataType: 'JSON',
	   						contentType: false,
	   						processData: false,
	   						success: function(data){
	   							if(data.hasil == true)
	   							{
	   								window.location.assign('sukses');
	   							}
	   							else{
	   								swal({
	   									title : 'Sukses',
	   									icon  : 'error',
	   									text  : data.pesan,
	   								});
	   							}
	   						}
	   					});
					});
				});
			}
		});
	</script>

</body>

</html>
