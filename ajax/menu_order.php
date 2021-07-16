<?php 
	include '../config/koneksi.php';
	session_start();
	$id_pelanggan = $_SESSION['id_pelanggan'];
	$id_pesanan   = $_SESSION['id_pesanan']; 
?>
<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Pesanan Anda</h3>
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
										$query = $koneksi->query("SELECT * FROM pesanan_detail INNER JOIN pesanan  ON pesanan_detail.id_pesanan = pesanan.id_pesanan INNER JOIN menu ON pesanan_detail.id_menu = menu.id_menu WHERE pesanan.id_pesanan = '$id_pesanan' AND pesanan.id_pelanggan = '$id_pelanggan' AND pesanan.status = 'memilih menu'");
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
										<td class="text-right"><button class="main-btn icon-btn hapus_pesanan" value="<?php echo $rows['id_pesanan_detail'];?>" type="button"><i class="fa fa-close"></i></button></td>
									</tr>
									<?php
										$total_semua = $total_semua + $rows['total_harga'];
										endwhile;
									?>
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"><a href="index" class="btn btn-warning">Tambah Pesanan</a></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">Rp. <?php echo number_format($total_semua);?></th>
									</tr>
								</tfoot>
							</table>
							<input type="hidden" name="total_pesanan" value="<?php echo $total_semua;?>">
						
						</div>