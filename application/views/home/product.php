<!-- container -->
<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?php echo base_url()?>electro/img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Danh sách<br> máy tính</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?php echo base_url()?>electro/img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Danh sách<br>Phụ kiện</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?php echo base_url()?>electro/img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Danh sách<br> máy ảnh</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản phẩm</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->


										<?php
											if(isset($data) && count($data) > 0){
												foreach($data as $key => $value){
										?>
										<div class="product">
											<div class="product-img" style="padding:10px">
												<img src="<?php echo base_url()?>electro/<?php echo $value->image?>" alt=""  >
											</div>
											<div class="product-body">
												<input class="product_id" type="hidden" value="<?php echo $value->id?>" />
												<h3 class="product-name"><a href="<?php echo base_url()?>index.php/home/getDetail?id=<?php echo $value->id ?>"><?php echo $value->name ?></a></h3>
												<h4 class="product-price"><span><?php echo $value->price ?></span> <span>VNĐ</span> <del class="product-old-price">990.00 VNĐ</del></h4>
												<p class="product-category">Số lượng còn: <?php echo $value->available_number?></p>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<button class="add-to-cart-btn btn btn-danger" style="display:block; margin:10px auto;"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
										</div>
										<!-- /product -->
										<?php 
												}
											} 
										?>
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
