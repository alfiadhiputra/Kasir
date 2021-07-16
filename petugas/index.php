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
		        	<div class="col-xs-6">
						<form action="" method="" class="form-inline">
							<div class="form-group">
								<input type="text" placeholder="Enter Keyword..." name="keyword" class="form-control" id="cari">
							</div>
							<div class="form-group">
								<button class="btn btn-info" type="submit" name="cari" style="margin-top: -5px">Cari</button>
							</div>
						</form>
		        	</div>
		        	<div class="col-xs-6">
						
						
		        	</div>
		        </div>
		        <div class="row">
		            <div class="col-md-12 col-sm-12 col-xs-12">
	                  	
	                </div>
		        </div>
		        <br />
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
    	});
    </script>
</body>
</html>