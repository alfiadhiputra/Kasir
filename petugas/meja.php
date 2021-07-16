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
		        <div id="meja"></div>
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
    		loadData_meja();

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

			function loadData_meja(keyword = '')
			{
				$.get('ajax/meja.php?keyword='+keyword, function(data){
					$('#meja').html(data);

					$('.tambah_meja').click(function(){
						

		   				$('#form_tambah_meja').submit(function(e){
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
		   								$('#mymodal_tambah_meja').modal('hide');
										$('.modal-backdrop').remove();
										$('body').removeClass('modal-open');
		   								success();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'success',
		   									text  : data.pesan, 
		   								});
		   								loadData_meja();
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

					
					$('.ubah_meja').click(function(){
						let id_meja = $(this).attr('value');
						$.get('template/modal_ubah_meja.php?id_meja='+id_meja, function(data){
							$('#modal_ubah_meja').html(data);
							$('#form_ubah_meja').submit(function(e){
								e.preventDefault();
								var me = $(this);
								$.ajax
								({
									url:me.attr('action'),
									method:'POST',
									data:new FormData(this),
									dataType:'JSON',
									contentType:false,
									processData:false,
									success:function(data)
									{
										if (data.hasil == true) 
										{
											$('#mymodal_ubah_meja').modal('hide');
												$('.modal-backdrop').remove();
												$('body').removeClass('modal-open');
												success();
												swal({
										            title: "Sukses",
										            text: data.pesan, 
										            icon: "success",
										    })
											loadData_meja();

										}
										else
										{
											error();
											swal({
														icon: 'error',
														title: 'Gagal',
														text: data.pesan,
													})
													return false;
										}
									}
								});
							});
						});
					});

					$('.hapus_meja').click(function(){
						let id_meja = $(this).attr('value');
						swal({
				            title: "Lanjutkan Menghapus?",
				            text: 'Data yang dihapus tidak dapat dikembalikan.', 
				            icon: "warning",
				            buttons: true,
				            dangerMode: true,
				        })
				        .then((willDelete) =>
				        {
				          	if (willDelete) 
				          	{
				          		$.ajax
						  		({
									url:'proses/hapus_meja.php?id_meja='+id_meja,
									method:'POST',
									dataType:'JSON',
									success: function(data){
										if (data.hasil == true) {
											success();
								            swal(data.pesan, {
								              icon: "success",
								            });
											loadData_meja();
										}
										else
										{
											error();
								            swal(data.pesan, {
								              icon: "error",
								            });
										}
									}

								});        
				          	}
				          	
				        });

					});

					klik();
				});


			}

			$('#cari').keyup(function(){
				var keyword = $(this).val();
				loadData_menu(keyword);
			});

			


    	});
    </script>
</body>
</html>