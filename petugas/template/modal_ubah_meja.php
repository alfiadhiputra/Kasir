<?php
	include '../../config/koneksi.php';
	$id_meja = $_GET['id_meja'];
	$query = $koneksi->query("SELECT * FROM meja WHERE id_meja = $id_meja");
	$data = mysqli_fetch_assoc($query);
?>

<form action="proses/ubah_meja.php" method="post"  id="form_ubah_meja">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Ubah Meja</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
	        			<input type="hidden" name="id_meja" value="<?php echo $id_meja;?>">
						<label for="kd_meja" class="label-control">Kode Meja</label>
						<input type="text" class="form-control" name="kd_meja" id="kd_meja" value="<?php echo $data['kd_meja'];?>" required>
	        		</div>
	        		<div class="form-group">
						<label for="status" class="label-control">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="kosong">Kosong</option>
							<option value="penuh">Penuh</option>
						</select>
						
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Simpan</button>
	      		</div>
    		</form>