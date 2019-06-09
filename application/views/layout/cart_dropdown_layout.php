<div class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		<i class="fa fa-shopping-cart"></i>
		<span>Giỏ hàng</span>
		<div class="qty" id="totalQty">0</div>
	</a>
	<div class="cart-dropdown">
		<div class="cart-list" id="giohang">
			<?php
			foreach ($this->cart->contents() as $items) {
				?>
				<div class="product-widget">
					<input type="hidden" value="<?= $items['id'] ?>" />
					<div class="product-img">
						<img src="<?php echo $items['image'] ?>" alt="">
					</div>
					<div class="product-body">
						<h4 class="product-price"><?php echo $items['qty'] ?> x <?php echo $items['name'] ?></h4>
					</div>
					<button class="delete" onclick="removeCart();"><i class="fas fa-window-close"></i></button>
				</div>
				<!-- 
													<div class="product-widget">
														<div class="product-img">
															<img src="<?php echo base_url() ?>electro/img/product02.png" alt="">
														</div>
														<div class="product-body">
															<h3 class="product-name"><a href="#">product name goes here</a></h3>
															<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
														</div>
														<button class="delete"><i class="fa fa-close"></i></button>
													</div> -->
			<?php
		}
		?>
		</div>
		<div class="cart-summary">
			<h5>Tổng cộng: <span id="totalPrice">0</span> VNĐ</h5>
		</div>
		<div class="cart-btns">
			<a href="<?php echo base_url() ?>index.php/home/cartCheckout">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
<script>
	$(function() {
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
	});
</script>