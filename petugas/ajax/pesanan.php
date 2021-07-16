<?php include '../../config/koneksi.php';?>
<div class="col-xs-12 col-sm-12 col-md-8">
	<div class="box-mid border-warning">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<h4>Laporan Pesanan</h4>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<input type="text" id="cari" class="form-control" placeholder="Masukan kata kunci...">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?php
					$query = $koneksi->query("SELECT * FROM pesanan");
					$hitung = mysqli_num_rows($query);
				?>
				Jumlah Pesanan : <strong><?php echo $hitung;?></strong> Pesanan<br>
				<button class="btn btn-success btn-sm pull-right"><i class="fa fa-print"></i> Cetak Laporan</button>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID Pesanan</th>
								<th>Waktu</th>
								<th>Total Pesanan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$total = 0;
								while($rows = mysqli_fetch_assoc($query)) :
							?>
							<tr>
								<td><?php echo $rows['id_pesanan'];?></td>
								<td>Jam <?php echo $rows['waktu'];?> / <?php echo $rows['tgl'];?></td>
								<td>Rp. <?php echo number_format($rows['total_pesanan']);?></td>
								<td><span class="label label-warning"><?= $rows['status'] ;?></span></td>
								<td>
									<button class="btn btn-info btn-sm lihat_pesanan" data-toggle="modal" data-target="#mymodal_lihat_pesanan" value="<?php echo $rows['id_pesanan'];?>">
										<i class="fa fa-edit"></i> Lihat
									</button>
								</td>

							</tr>
							<?php
								$total = $total + $rows['total_pesanan'];
								endwhile;
							?>
							<tr>
								<td colspan="2"><strong><h4>Total</h4></td>
								<td colspan="2"><strong><h4>Rp. <?php echo number_format($total);?></h4></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-4">
	<div class="box-mid border-warning" style="overflow-y: auto; max-height: 500px">
		<?php
			$query = $koneksi->query("SELECT * FROM pesanan INNER JOIN meja ON pesanan.id_meja = meja.id_meja WHERE pesanan.status = 'menunggu diantar'");
			$hitung = mysqli_num_rows($query);
		?>
		<h4>Pesanan Masuk <span class="badge" style="background-color: red"><?php echo $hitung;?></span></h4>
		<h5>Status <span class="label label-warning">menunggu diantar</span></h5>
		<hr>
		<?php
			if ($hitung > 0) {
			
			while($rows = mysqli_fetch_assoc($query)) :
		?>
		<div class="info-box" style="height: 150px">
			<center><strong>Meja : <?php echo $rows['kd_meja'];?></strong></center>
			ID Pesanan : <?php echo $rows['id_pesanan'];?> <br>
			Waktu Pesan : Jam <?php echo $rows['waktu'];?> | <?php echo $rows['tgl'];?><br>
			<button class="btn btn-info btn-sm pull-right lihat_pesanan" data-toggle="modal" data-target="#mymodal_lihat_pesanan" value="<?php echo $rows['id_pesanan'];?>">Lihat Pesanan</button>
		</div>
		<?php
			endwhile;
		
			}
			else{

			
		?>
		<div class="box-info">
			<center><img src="../assets/img/empty_cart.jpg" alt="" style="height: 170px; width: 170px"></center>
		</div>
	<?php } ?>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="mymodal_lihat_pesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<div id="modal_lihat_pesanan"></div>
    	</div>
 	 </div>
</div>
<!-- Modal -->