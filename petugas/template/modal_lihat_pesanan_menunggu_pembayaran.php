<?php
	include '../../config/koneksi.php';
	$id_pesanan = $_GET['id_pesanan'];
	$query = $koneksi->query("SELECT * FROM pesanan 
		INNER JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan
	
		WHERE pesanan.id_pesanan = '$id_pesanan'");
	$data = mysqli_fetch_assoc($query);

?>

<form action="proses/simpan_transaksi.php" method="post"  id="konfirmasi_pesanan">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Lihat Pesanan</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<center><h5><strong>ID Pesanan : <?php echo $data['id_pesanan'];?></strong></h5></center>
	        		<div class="row">
						<div class="col-xs-6">
							Nama Pelanggan : <?php echo $data['nama_pelanggan'];?><br>
							Waktu          : Jam <?php echo $data['waktu'];?> / <?php echo $data['tgl'];?>
		        		</div>
		        		<div class="col-xs-6">
							Status : <span class="label label-info"><?php echo $data['status'];?></span><br>
							<?php
								$id_user = $data['id_user'];
								$q = $koneksi->query("SELECT * FROM user WHERE id_user = $id_user");
								$u = mysqli_fetch_assoc($q);
	      						if ($data['status'] == 'selesai') :
	      					?>
								Waiter : <?php echo $u['nm_user'];?>
	      					<?php endif;?>
							
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
										<td><?php echo $rows['nm_menu'];?></td>
										<td>Rp. <?php echo number_format($rows['total_harga']);?></td>
									</tr>

									<?php
										endwhile;
									?>
									<tr>
										<td colspan="3"><strong>Total</strong></td>
										<td><strong>Rp. <?php echo number_format($data['total_pesanan']);?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	      			
	      			<input type="hidden" name="id_pesanan" value="<?php echo $data['id_pesanan'];?>">
	      			<input type="hidden" name="total" value="<?php echo $data['total_pesanan'];?>">
	      			<input type="hidden" name="waktu" value="<?php echo $data['waktu'];?>">
	      			<input type="hidden" name="tgl" value="<?php echo $data['tgl'];?>">
					<div class="form-group">
						<label class="label-control pull-left">Bayar</label>
	      				<input type="number" name="bayar" class="form-control">
					</div>
	        		<button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Konfirmasi</button><br>
	      		</div>
    		</form>