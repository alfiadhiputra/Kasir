<?php
	include '../../config/koneksi.php';
	$id = $_GET['id'];
	$query = $koneksi->query("SELECT * FROM menu WHERE id_menu = $id");
	$data = mysqli_fetch_assoc($query);
?>

<form action="proses/ubah_menu.php" method="post" enctype="multipart/form-data" id="form_ubah_menu">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Ubah Menu</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
	        			<input type="hidden" name="id_menu" value="<?php echo $id;?>">
	        			<input type="hidden" name="gambar_lama" value="<?php echo $data['gambar_menu'];?>">
						<label for="nm_menu" class="label-control">Nama Menu</label>
						<input type="text" class="form-control" name="nm_menu" id="nm_menu" value="<?php echo $data['nm_menu'];?>" required>
	        		</div>
	        		<div class="form-group">
						<label for="harga" class="label-control">Harga</label>
						<input type="number" class="form-control" name="harga" id="harga" value="<?php echo $data['harga'];?>" required>
	        		</div>
	        		<div class="form-group">
						<label for="deskripsi" class="label-control">Deskripsi</label>
						<textarea class="form-control" name="deskripsi" id="deskripsi"><?php echo $data['nm_menu'];?></textarea>
	        		</div>
	        		
	        		<div class="form-group">
						<label for="level" class="label-control">Gambar</label><br>
						<img src="../assets/img/menu/<?php echo $data['gambar_menu'];?>" alt="" id="image_upload_preview" style="height: 120px; width: 120px"><br>
						<input type="file" class="btn btn-default btn-block" name="gambar" id="inputGambar"><br>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Simpan</button>
	      		</div>
    		</form>