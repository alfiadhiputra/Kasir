<?php include '../config/koneksi.php';?>
<?php require 'proses/cek_login.php';?>
<?php include_once'template/header.php';?>
<body class="nav-md">
    <div class="container body">
      	<div class="main_container">
        	
        	<?php include 'template/sidebar.php';?>
			
			<?php include 'template/top_nav.php';?>
      

	        <!-- page content -->
	        <div class="right_col" role="main">
		        <div class="row">
		        	<div id="pesanan"></div>
		        </div>
	        </div>
	        <!-- /page content -->

	        <!-- footer content -->
	        <?php include 'template/footer.php';?>
	        <!-- /footer content -->


      	</div>
    </div>

    <!-- JavaScript -->
    <?php require 'template/js.php';?>
    <!-- /JavaScript-->
    <script>
    	$(document).ready(function(){
    		klik();
    		loadData_pesanan();

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

			function loadData_pesanan()
			{
				$.get('ajax/pesanan_menunggu_pembayaran.php', function(data){
					$('#pesanan').html(data);
					$('.lihat_pesanan').click(function(){
						let id_pesanan = $(this).attr('value')
						$.get('template/modal_lihat_pesanan_menunggu_pembayaran.php?id_pesanan='+id_pesanan, function(data){
							$('#modal_lihat_pesanan').html(data);
							$('#konfirmasi_pesanan').submit(function(e){
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
		   								$('#mymodal_lihat_pesanan').modal('hide');
										$('.modal-backdrop').remove();
										$('body').removeClass('modal-open');
		   								success();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'success',
		   									text  : data.pesan, 
		   								});
		   								loadData_pesanan();
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
							})
						});
					});

					$('.lihat_transaksi').click(function(){
						let id_transaksi = $(this).attr('value');
						$.get('template/modal_lihat_transaksi.php?id_transaksi='+id_transaksi, function(data){
							$('#modal_lihat_transaksi').html(data);
						});
					});
				})
			}
    	});
    </script>
</body>
</html>