
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - Bán hàng uy tín</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>electro/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>electro/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>electro/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>electro/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?php echo base_url() ?>electro/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> -->

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>electro/css/style.css" />


	<!-- jQuery Plugins -->
	<script src="<?php echo base_url() ?>electro/js/jquery.min.js"></script>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<header>
		<!-- HEADER -->
		<?php $this->load->view('layout/content_layout') ?>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="<?php echo base_url() ?>index.php/home/index">Trang chủ</a></li>
						<?php
						if (isset($pt)) {
							foreach ($pt as $key => $value) {
								?>
								<li><a href="<?php echo base_url() ?>index.php/home/product?type=<?php echo $value->id ?>"><?php echo $value->name ?></a></li>
							<?php }
					} ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
		</div>
		<?php
		if (isset($subview)) {
			$this->load->view($subview);
		}
		?>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Đăng kí nhận<strong>thông tin mới nhất</strong></p>
							<form>
								<input class="input" type="email" placeholder="Nhập email của bạn">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Quan tâm</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->

					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> Bản quyền <i class="fa fa-heart-o" aria-hidden="true"></i> bởi Nhóm 7</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<script src="<?php echo base_url() ?>electro/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>electro/js/slick.min.js"></script>
		<script src="<?php echo base_url() ?>electro/js/nouislider.min.js"></script>
		<script src="<?php echo base_url() ?>electro/js/jquery.zoom.min.js"></script>

		<script>
			$('.add-to-cart-btn').click(function(event) {
				var selectedHtml = event.currentTarget.parentElement.outerHTML;
				selectedHtml = $.parseHTML(selectedHtml);

				var mImage = selectedHtml[0].children[0].children[0].attributes[0].value;
				var mID = selectedHtml[0].children[1].children[0].attributes[2].textContent;
				var mName = selectedHtml[0].children[1].children[1].children[0].innerHTML;
				var mPrice = selectedHtml[0].children[1].children[2].children[0].innerHTML;
				var mAmount = 1;
				var params = {
					id: mID,
					name: mName,
					price: mPrice,
					amount: mAmount,
					img: mImage
				};
				console.log('params', params);
				$.ajax({
					url: '<?php echo base_url() ?>index.php/home/addToCart',
					type: "POST",
					dataType: 'json',
					data: params,
					success: function(data) {
						if (parseInt(data.status) > 0) {
							//	console
							alert(data.message);
							$("#giohang").load('<?= base_url() ?>index.php/home/reloadCart');
							$.ajax({
								url: '<?php echo base_url() ?>index.php/home/getCartCommonParams',
								type: "POST",
								dataType: 'json',
								success: function(data) {
									$('#totalPrice').html(data['totalPrice']);
									$('#totalQty').html(data['totalQty']);
								},
								error: function(data) {
									alert(data.responseText);
								}
							});
						}
					},
					error: function(data) {
						alert(data.responseText);
					}
				});
			});

			// $('.delete').click(function(event) {
			// 	console.log('remove cart clicked');
			// 	removeCart(event);
			// });

			function removeCart() {
				var selectedHtml = event.currentTarget.parentElement.outerHTML;
				selectedHtml = $.parseHTML(selectedHtml);
				var mId = selectedHtml[0].children[0].value;
				var params = {
					'id': mId
				};
				$.ajax({
					url: '<?php echo base_url() ?>index.php/home/removeFromCart',
					type: "POST",
					data: params,
					dataType: 'json',
					success: function(data) {
						if (parseInt(data.status) > 0) {
							var mRef = window.location.href;
							if (mRef.indexOf('cartCheckout') > 0) {
								window.location.reload();
							} else {
								$("#giohang").load('<?= base_url() ?>index.php/home/reloadCart');
								$.ajax({
									url: '<?php echo base_url() ?>index.php/home/getCartCommonParams',
									type: "POST",
									dataType: 'json',
									success: function(data) {
										$('#totalPrice').html(data['totalPrice']);
										$('#totalQty').html(data['totalQty']);
									},
									error: function(data) {
										alert(data.responseText);
									}
								});
							}

						}
					},
					error: function(data) {
						alert(data.responseText);
					}
				});
			}
		</script>
		<script src="<?php echo base_url() ?>electro/js/main.js"></script>
</body>

</html>