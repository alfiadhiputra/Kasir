<?php
	include '../../config/koneksi.php';
	$id_transaksi = $_GET['id_transaksi'];
	$query = $koneksi->query("SELECT * FROM transaksi
		INNER JOIN pesanan ON transaksi.id_pesanan = pesanan.id_pesanan 
		INNER JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan
	
		WHERE transaksi.id_transaksi = '$id_transaksi'");
	$data = mysqli_fetch_assoc($query);
	$id_pesanan = $data['id_pesanan'];

?>

<form action="proses/konfirmasi_pesanan.php" method="post"  id="konfirmasi_pesanan">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Lihat Pesanan</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<center>
	        			<h5><strong>ID Transaksi : <?php echo $data['id_transaksi'];?></strong></h5>
	        			<h5><strong>ID Pesanan : <?php echo $data['id_pesanan'];?></strong></h5>
	        		</center>
	        		<div class="row">
						<div class="col-xs-6">
							Nama Pelanggan : <?php echo $data['nama_pelanggan'];?><br>
							Waktu          : Jam <?php echo $data['waktu'];?> / <?php echo $data['tgl'];?>
		        		</div>
		        		<div class="col-xs-6">
							Status : <span class="label label-info"><?php echo $data['status'];?></span><br>
		        		</div>
	        		</div>
	        		<div class="row">
						<div class="col-xs-12" style="margin-top: 20px">
							<strong>Rincian Pesanan :</strong>
							<table class="table no-bordered table-striped" style="font-size: 12px">
								<thead>
									<tr>
										<td>Menu</td>
										<td>Harga</td>
										<td>Qty</td>
										<td>Total Harga</td>
									</tr>
								</thead>
								<tbody>
									<?php
										$query = $koneksi->query("SELECT * FROM pesanan_detail 
											INNER JOIN menu ON pesanan_detail.id_menu = menu.id_menu
											WHERE pesanan_detail.id_pesanan = '$id_pesanan'");
										while($rows = mysqli_fetch_assoc($query)) :
									?>
									<tr>
										<td><?php echo $rows['nm_menu'];?></td>
										<td>Rp. <?php echo number_format($rows['harga']);?></td>
										<td><?php echo $rows['qty'];?></td>
										<td>Rp. <?php echo number_format($rows['total_harga']);?></td>
									</tr>

									<?php
										endwhile;
									?>
									<tr>
										<td colspan="3"><strong>Total</strong></td>
										<td><strong>Rp. <?php echo number_format($data['total_pesanan']);?></strong></td>
									</tr>
									<tr>
										<td colspan="3"><strong>Bayar</strong></td>
										<td><strong>Rp. <?php echo number_format($data['bayar']);?></strong></td>
									</tr>
									<tr>
										<td colspan="3"><strong>Kembali</strong></td>
										<td><strong>Rp. <?php echo number_format($data['bayar']-$data['total']);?></strong></td>
									</tr>
								</tbody>
							</table>
							<button class="btn btn-warning btn-sm pull-right" type="button"><i class="fa fa-print"></i> Cetak Bukti Pembayaran</button>
						</div>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	      			<?php
	      				if ($data['status'] == 'menunggu diantar') :
	      			?>
	      			<input type="hidden" name="id_pesanan" value="<?php echo $data['id_pesanan'];?>">
	        		<button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Konfirmasi</button><br>
	        		*Klik tombol konfirmasi jika pesanan telah selesai diproses oleh waiter
	        		<?php endif;?>
	      		</div>
    		</form>