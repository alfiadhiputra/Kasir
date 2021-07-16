<?php include '../config/koneksi.php';?>
<?php require 'proses/cek_login.php';?>
<?php
	if ($level != 'administrator') {
		header('location:index');
	}
?>
<?php include_once'template/header.php';?>
<body class="nav-md">
    <div class="container body">
      	<div class="main_container">
        	
        	<?php include 'template/sidebar.php';?>
			
			<?php include 'template/top_nav.php';?>
      

	        <!-- page content -->
	        <div class="right_col" role="main">
	        	<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3">
						<input type="text" id="cari" class="form-control" placeholder="Masukan kata kunci...">
					</div>
				</div>
		        <div id="petugas"></div>
	        </div>
	        <!-- /page content -->
		</div>
        <!-- footer content -->
        <?php include 'template/footer.php';?>
        <!-- /footer content -->
    </div>

    <!-- JavaScript -->
    <?php require 'template/js.php';?>
    <!-- /JavaScript-->
    <script>
    	$(document).ready(function(){
    		klik();
    		loadData_petugas();

    		function klik()
			{
				$('.klik').click(function(){
    				document.getElementById('klik').play();	
    			});	
			}

			function error()
			{
				document.getElementById('error').play();	
			}  

			function success()
			{
				document.getElementById('success').play();	
			}

			function loadData_petugas(keyword = '')
			{
				$.get('ajax/petugas.php?keyword='+keyword, function(data){
					$('#petugas').html(data);

					$('.tambah_pengurus').click(function(){
						$("#inputGambar").change(function () {
		        			readURL(this);
		   				});

		   				$('#form_tambah_pengurus').submit(function(e){
		   					e.preventDefault();
		   					$.ajax({
		   						url: $(this).attr('action'),
		   						method: $(this).attr('method'),
		   						data: new FormData(this),
		   						dataType: 'JSON',
		   						contentType: false,
		   						processData: false,
		   						success: function(data){
		   							if(data.hasil == true)
		   							{
		   								$('#mymodal_tambah_pengurus').modal('hide');
										$('.modal-backdrop').remove();
										$('body').removeClass('modal-open');
		   								success();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'success',
		   									text  : data.pesan, 
		   								});
		   								loadData_petugas();
		   							}
		   							else{
		   								error();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'error',
		   									text  : data.pesan,
		   								});
		   							}
		   						}
		   					});
		   				});
					});



					klik();
				});


			}

			$('#cari').keyup(function(){
				var keyword = $(this).val();
				loadData_petugas(keyword);
			});

			function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                $('#image_upload_preview').attr('src', e.target.result);
		            }

		            reader.readAsDataURL(input.files[0]);
		        }
			}


    	});
    </script>
</body>
</html>