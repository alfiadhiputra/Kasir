<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<?php
					$query = $koneksi->query("SELECT * FROM menu ORDER BY id_menu DESC");
					while($rows = mysqli_fetch_assoc($query)) :
				?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<a class="main-btn quick-view" href="produk_detail.php?id=<?php echo $rows['id_menu'];?>">
								<i class="fa fa-search-plus"></i> Quick view
							</a>
							<img src="assets/img/menu/<?php echo $rows['gambar_menu'];?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">Rp. <?php echo number_format($rows['harga']);?></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#"><?php echo $rows['nm_menu'];?></a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<a href="produk_detail.php?id=<?php echo $rows['id_menu'];?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Lihat Selengkapnya</a>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile;?>
				<!-- /Product Single -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>