<?php include '../config/koneksi.php';?>
<?php require 'proses/cek_login.php';?>
<?php
	if ($level != 'administrator' AND $level != 'waiter') {
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
		        <div id="menu"></div>
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
    		loadData_menu();

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

			function loadData_menu(keyword = '')
			{
				$.get('ajax/menu.php?keyword='+keyword, function(data){
					$('#menu').html(data);

					$('.tambah_menu').click(function(){
						$("#inputGambar").change(function () {
		        			readURL(this);
		   				});

		   				$('#form_tambah_menu').submit(function(e){
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
		   								$('#mymodal_tambah_menu').modal('hide');
										$('.modal-backdrop').remove();
										$('body').removeClass('modal-open');
		   								success();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'success',
		   									text  : data.pesan, 
		   								});
		   								loadData_menu();
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

					
					$('.ubah_menu').click(function(){
						let id = $(this).attr('value');
						$.get('template/modal_ubah_menu.php?id='+id, function(data){
							$('#modal_ubah_menu').html(data);
							$('#form_ubah_menu').submit(function(e){
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
									beforeSend:function()
									{
										$('#pesan').html('<b>Uploading...</b>');
									},
									success:function(data)
									{
										if (data.hasil == true) 
										{
											$('#mymodal_ubah_menu').modal('hide');
												$('.modal-backdrop').remove();
												$('body').removeClass('modal-open');
												success();
												swal({
										            title: "Sukses",
										            text: data.pesan, 
										            icon: "success",
										    })
											loadData_menu();

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

					$('.hapus_menu').click(function(){
						let id_menu = $(this).attr('value');
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
									url:'proses/hapus_menu.php?id_menu='+id_menu,
									method:'POST',
									dataType:'JSON',
									success: function(data){
										if (data.hasil == true) {
											success();
								            swal(data.pesan, {
								              icon: "success",
								            });
											loadData_menu();
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