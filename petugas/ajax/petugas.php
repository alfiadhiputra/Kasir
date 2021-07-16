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
		<button class="btn btn-warning btn-sm pull-right tambah_pengurus klik" data-toggle="modal" data-target="#mymodal_tambah_pengurus" type="button"><i class="fa fa-plus"></i> Tambah Pengurus</button>
	</div>
</div>
<div class="row">
	<?php
		$query = $koneksi->query("SELECT * FROM user WHERE username LIKE '%$keyword%' OR nm_user LIKE '$keyword' OR level LIKE '%$keyword%'");
		while($rows = mysqli_fetch_assoc($query)) :
	?>
	<div class="col-xs-6 col-sm-4 col-md-3">
		<div class="info-box border-warning">
			<div class="item_img_sm justify-content-center">
				<center><img src="assets/images/petugas/<?php echo $rows['gambar_user'];?>" alt=""></center>
			</div>
			<div class="item_text">
				<center><h5><strong><?php echo $rows['username'];?></strong></h5></center>
				<h5>Nama : <?php echo $rows['nm_user'];?></h5>
				<h5>Level : <?php echo $rows['level'];?></h5>
			</div><br>
			<div class="dropdown pull-right">
			  <a href="#!" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <i class="glyphicon glyphicon-option-vertical"></i>
			  </a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <button class="btn btn-sm btn-block btn-danger dropdown-item hapus_pengurus" type="button"><i class="fa fa-trash-o"></i> Hapus</button>
			    <button class="btn btn-sm btn-block btn-info dropdown-item hapus_pengurus" type="button"><i class="fa fa-edit"></i> Ubah</button>
			  </div>
			</div><br>
		</div>
	</div>
	<?php
		endwhile;
	?>
</div>

<!-- Modal -->
<div class="modal fade" id="mymodal_tambah_pengurus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/tambah_pengurus.php" method="post" enctype="multipart/form-data" id="form_tambah_pengurus">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Pengurus</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="username" class="label-control">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username..." required>
	        		</div>
	        		<div class="form-group">
						<label for="password" class="label-control">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password..." required>
	        		</div>
	        		<div class="form-group">
						<label for="konfirmasi_password" class="label-control">Konfirmasi Password</label>
						<input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukan Password Sekali Lagi..." required>
	        		</div>
	        		<div class="form-group">
						<label for="nm_user" class="label-control">Nama</label>
						<input type="text" class="form-control" name="nm_user" id="nm_user" placeholder="Masukan Nama..." required>
	        		</div>
	        		<div class="form-group">
						<label for="level" class="label-control">Level</label>
						<select name="level" id="level" class="form-control">
							<option value="administrator">Administrator</option>
							<option value="waiter">Waiter</option>
							<option value="kasir">Kasir</option>
							<option value="owner">Owner</option>
						</select>
	        		</div>
	        		<div class="form-group">
						<label for="level" class="label-control">Gambar</label><br>
						<img src="../assets/img/blank_images.svg" alt="" id="image_upload_preview" style="height: 120px; width: 120px"><br>
						<input type="file" class="btn btn-default btn-block" name="gambar" id="inputGambar" required><br>
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