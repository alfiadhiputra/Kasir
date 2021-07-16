<?php
	include 'config/koneksi.php';
	if (empty($_GET['id'])) {
		header('location:index');
	}

	$id_menu = $_GET['id'];

	require 'proses/cek_login.php';

	$query = $koneksi->query("SELECT * FROM menu WHERE id_menu = $id_menu");
	$hitung = mysqli_num_rows($query);

	if ($hitung < 1) {
		header('location:index');
	}

	$rows = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php require"tampilan/title.php";?>

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- header -->
		<?php require"tampilan/header.php";?>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<?php require"tampilan/navigation.php";?>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#">Category</a></li>
				<li class="active"><?php echo $rows['nm_menu'];?></li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">

							<div class="product-view">
								<img src="assets/img/menu/<?php echo $rows['gambar_menu'];?>" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<h2 class="product-name">Nama Menu  : <?php echo $rows['nm_menu'];?></h2>
							<h3 class="product-price">Harga     : <?php echo number_format($rows['harga']);?></h3>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
							</div>
							<p>Deskripsi : <br><?php echo $rows['deskripsi'];?></p>
							<form action="proses/tambah_pesanan.php" method="post" id="tambah">
								<input type="hidden" name="id_menu" value="<?php echo $rows['id_menu'];?>">
							
								<div class="product-btns">
									<div class="qty-input">
										<span class="text-uppercase">QTY: </span>
										<input type="number" name="qty" value="1" maxlength="1" class="input">
									</div>
										<button class="primary-btn add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Pesan Sekarang</button>
									<div class="pull-right">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->



	<!-- FOOTER -->
	<?php require 'tampilan/footer.php';?>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<?php require 'tampilan/js.php';?>
	<script>
		$(document).ready(function(){
			$('#tambah').submit(function(e){
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
							
								window.location.assign('checkout');
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
		});
	</script>

</body>

</html>
