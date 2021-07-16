<?php include 'config/koneksi.php';?>
<?php require 'proses/cek_login.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php require"tampilan/title.php";?>
</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- header -->
		<?php require"tampilan/header.php";?>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
		<?php require"tampilan/navigation.php";?>
	<!-- /NAVIGATION -->

	<!-- HOME -->
	<?php require 'tampilan/banner.php';?>
	<!-- /HOME -->

	<!-- section -->
	<?php require 'tampilan/kategori.php';?>
	<!-- /section -->


	<!-- section -->
	<?php require 'tampilan/produk.php';?>
	<!-- /section -->

	<!-- FOOTER -->
	<?php require 'tampilan/footer.php';?>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<?php require 'tampilan/js.php';?>

</body>

</html>
