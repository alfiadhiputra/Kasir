<div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Crafty Crab</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/petugas/<?php echo $gambar_user;?>" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $nm_user;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <?php
                /*
                 * Menu untuk Administrator
                 */
                  
                  if ($level == 'administrator') : 
              ?>
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">                  
                  <li><a href="index"><i class="fa fa-home"></i> Home </a></li>
                  <li><a href="menu"><i class="fa fa-list-alt"></i> Menu</a></li>
                  <li><a href="meja"><i class="fa fa-rocket"></i> Meja</a></li>
                   <li><a href="petugas"><i class="fa fa-users"></i> Petugas</a></li>
                </ul>
              </div>
      
              <?php endif; ?>

              <?php
                /*
                 * Menu untuk Waiter
                 */
                  
                  if ($level == 'waiter') : 
              ?>
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">                  
                  <li><a href="index"><i class="fa fa-home"></i> Home </a></li>
                  <li><a href="menu"><i class="fa fa-list-alt"></i> Menu</a></li>      
                  <li><a href="pesanan"><i class="fa fa-shopping-cart"></i> Pesanan</a></li>
                </ul>
              </div>
              <?php endif;?>

              <?php
                /*
                 * Menu untuk Waiter
                 */
                  
                  if ($level == 'kasir') : 
              ?>
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">                  
                  <li><a href="index"><i class="fa fa-home"></i> Home </a></li>
                   <li><a href="transaksi"><i class="fa fa-refresh"></i> Transaksi</a></li>
                </ul>
              </div>
              <?php endif;?>
              <?php
                /*
                 * Menu untuk Waiter
                 */
                  
                  if ($level == 'owner') : 
              ?>
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">                  
                  <li><a href="index"><i class="fa fa-home"></i> Home </a></li>
                   <li><a href="laporan"><i class="fa fa-refresh"></i> Laporan</a></li>
                </ul>
              </div>
              <?php endif;?>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>