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
		<button class="btn btn-success btn-sm pull-right tambah_menu klik" data-toggle="modal" data-target="#mymodal_tambah_menu" type="button"><i class="fa fa-plus"></i> Tambah Menu</button>
	</div>
</div>
<div class="row">
	<?php
		$query = $koneksi->query("SELECT * FROM menu WHERE nm_menu LIKE '%$keyword%' OR harga LIKE '$keyword'");
		while($rows = mysqli_fetch_assoc($query)) :
	?>
	<div class="col-xs-6 col-sm-4 col-md-3">
		<div class="info-box border-primary">
			<div class="item_img_sm justify-content-center">
				<center><img src="../assets/img/menu/<?php echo $rows['gambar_menu'];?>" alt=""></center>
			</div>
			<div class="item_text">
				<center><h5><strong><?php echo $rows['nm_menu'];?></strong></h5></center>
				<h5>harga : <?php echo $rows['harga'];?></h5>
				<h5>Deskripsi : <?php echo $rows['deskripsi'];?></h5>
			</div><br>
			<div class="dropdown pull-right">
			  <a href="#!" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <i class="glyphicon glyphicon-option-vertical"></i>
			  </a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <button class="btn btn-sm pull-left btn-danger dropdown-item hapus_menu" type="button" value="<?php echo $rows['id_menu'];?>"><i class="fa fa-trash-o"></i> Hapus</button>
			    <button class="btn btn-sm pull-right btn-info dropdown-item ubah_menu" type="button" data-toggle="modal" data-target="#mymodal_ubah_menu" value="<?php echo $rows['id_menu'];?>"><i class="fa fa-edit"></i> Ubah</button>
			  </div>
			</div><br>
		</div>
	</div>
	<?php
		endwhile;
	?>
</div>

<!-- Modal -->
<div class="modal fade" id="mymodal_ubah_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<div id="modal_ubah_menu"></div>
    	</div>
 	 </div>
</div>
<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="mymodal_tambah_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/tambah_menu.php" method="post" enctype="multipart/form-data" id="form_tambah_menu">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="nm_menu" class="label-control">Nama Menu</label>
						<input type="text" class="form-control" name="nm_menu" id="nm_menu" placeholder="Masukan Nama Menu..." required>
	        		</div>
	        		<div class="form-group">
						<label for="harga" class="label-control">Harga</label>
						<input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan Harga..." required>
	        		</div>
	        		<div class="form-group">
						<label for="deskripsi" class="label-control">Deskripsi</label>
						<textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan Nama..." required></textarea>
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