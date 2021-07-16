<?php 
	include 'config/koneksi.php';
	require 'proses/cek_login.php';
	if (empty($_SESSION['sukses'])) {
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
				<li class="active">Sukses</li>
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
				
					<div class="col-md-12">
						<?php 

							$id_pelanggan = $_SESSION['id_pelanggan'];
							$id_pesanan  = $_SESSION['id_pesanan'];
						?><center>
						<img src="assets/img/success.png" alt="" style="width: 120px; height: 120px">
						<h3>Terima Kasih pesanan akan segera tiba di meja anda.</h3></center>
						<div class="order-summary clearfix">
							<div class="section-title">
								<h4 class="title">ID Pesanan Anda : <?php echo $_SESSION['id_pesanan'];?></h4>

							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total_semua = 0;
										$query = $koneksi->query("SELECT * FROM pesanan_detail INNER JOIN pesanan  ON pesanan_detail.id_pesanan = pesanan.id_pesanan INNER JOIN menu ON pesanan_detail.id_menu = menu.id_menu WHERE pesanan.id_pesanan = '$id_pesanan' AND pesanan.id_pelanggan = '$id_pelanggan' AND pesanan.status = 'menunggu diantar'");
										while($rows = mysqli_fetch_assoc($query)) :
									?>
									<tr>
										<td class="thumb">
											<img src="assets/img/menu/<?php echo $rows['gambar_menu'];?>" alt="">
										</td>
										<td class="details">
											<a href="#"><?php echo $rows['nm_menu'];?></a>
											
										</td>
										<td class="price text-center"><strong>Rp. <?php echo number_format($rows['harga']);?></strong>
										</td>
										<td class="qty text-center"><?php echo $rows['qty'];?></td>
										<td class="total text-center">Rp. <?php echo number_format($rows['total_harga']);?></td>
										<td class="text-right"></td>
									</tr>
									<?php
										$total_semua = $total_semua + $rows['total_harga'];
										endwhile;
									?>
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">Rp. <?php echo number_format($total_semua);?></th>
									</tr>
								</tfoot>
							</table>
							<button class="btn btn-info pull-right"><i class="fa fa-print"></i> Simpan Bukti Pesanan</button>
						
						</div>
					</div>
				
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

</body>

</html>
