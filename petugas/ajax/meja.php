<?php
	include '../../config/koneksi.php';
	if (empty($_GET['keyword'])) {
		$keyword = '';
	}
	else{
		$keyword = $_GET['keyword'];
	}
?>
<div class="row" style="margin-top: 10px">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<button class="btn btn-success btn-sm pull-right tambah_meja klik" data-toggle="modal" data-target="#mymodal_tambah_meja" type="button"><i class="fa fa-plus"></i> Tambah Meja</button>
	</div>
</div>
<div class="row">
	<?php
		$query = $koneksi->query("SELECT * FROM meja WHERE kd_meja LIKE '%$keyword%' OR status LIKE '$keyword'");
		while($rows = mysqli_fetch_assoc($query)) :
	?>
	<div class="col-xs-6 col-sm-4 col-md-3">
		<div class="info-box border-primary" style="height: 170px">
			<div class="item_text">
				<center><h5><strong>Kode Meja : <?php echo $rows['kd_meja'];?></strong></h5></center>
				<h5>Status    : <span class="label label-warning"><?php echo $rows['status'];?></span></h5>
				<?php
					if ($rows['status'] == 'kosong') {
						echo"<small class='text-info'>Meja sedang tidak digunakan</small>";
					}else if($rows['status'] == 'penuh'){
						echo"<small class='text-danger'>Meja sedang digunakan</small>";
					}
				?>
			</div><br>
			<div class="dropdown pull-right">
			  <a href="#!" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <i class="glyphicon glyphicon-option-vertical"></i>
			  </a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <button class="btn btn-sm pull-left btn-danger dropdown-item hapus_meja" type="button" value="<?php echo $rows['id_meja'];?>"><i class="fa fa-trash-o"></i> Hapus</button>
			    <button class="btn btn-sm pull-right btn-info dropdown-item ubah_meja" type="button" data-toggle="modal" data-target="#mymodal_ubah_meja" value="<?php echo $rows['id_meja'];?>"><i class="fa fa-edit"></i> Ubah</button>
			  </div>
			</div><br>
		</div>
	</div>
	<?php
		endwhile;
	?>
</div>

<!-- Modal -->
<div class="modal fade" id="mymodal_ubah_meja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<div id="modal_ubah_meja"></div>
    	</div>
 	 </div>
</div>
<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="mymodal_tambah_meja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/tambah_meja.php" method="post" id="form_tambah_meja">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Meja</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="kd_meja" class="label-control">Kode Meja</label>
						<input type="text" class="form-control" name="kd_meja" id="kd_meja" placeholder="Masukan Kode Meja..." required>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Simpan</button>
	      		</div>
    		</form>
    	</div>
 	 </div>
</div>
<!-- Modal -->