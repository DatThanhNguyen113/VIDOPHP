<!-- HEADER -->
<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +000-00-00-00</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> vido@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Cao đẳng Viễn Đông</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> VNĐ</a></li>
					
						<?php 
						if($this->session->userdata('username')){
						?>
						<li><a ><i class="fa fa-user-o"></i> <?=$this->session->userdata('username')?></a></li>
						<li><a href="<?=base_url()?>index.php/home/History"><i class="fa fa-user-o"></i>Lịch sử mua hàng </a></li>
						<li><a href="<?=base_url()?>index.php/home/logout"><i class="fa fa-user-o"></i>Đăng xuất</a></li>
						<?php 
						}else{
						?>
						<li><a href="<?=base_url()?>index.php/account/index" ><i class="fa fa-user-o"></i> Tài khoản</a></li>
						<?php }?>
						
						<li><a href="<?php echo base_url();?>index.php/home/about"><i class="fa fa-user-o"></i> Thông tin</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="<?php echo base_url()?>electro/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="GET" action="<?php echo base_url()?>index.php/home/searchProduct"> 
									<input  class="input" placeholder="Nhập tìm kiếm" name="searchname" >
									<button class="search-btn">Tìm kiếm</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>

								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
									<?php 
										if(!isset($_SESSION)) 
										{ 
											session_start(); 
										} 
										$this->load->view('layout/cart_dropdown_layout')
									?>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->