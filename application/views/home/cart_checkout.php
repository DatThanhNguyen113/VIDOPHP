<div class="section">
	<!-- container -->
	<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-2"></div>
				<!-- Order Details -->
				<div class="col-md-8 order-details">
					<div class="section-title text-center">
						<h3 class="title">Hóa đơn</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>Sản phẩm</strong></div>
							<div><strong>Thành tiền</strong></div>
						</div>
						<!-- php loop to get session cart-->
						<?php
						$totalQty = 0;
						foreach ($this->cart->contents() as $item) {
							?>
							<div class="order-products">
								<div class="order-col">
									<div><?php echo $item['qty'] ?> X <?php echo $item['name'] ?></div>
									<div><?php echo $item['price'] ?> VNĐ</div>
								</div>
							</div>
							<?php
							$totalQty += $item['price'];
						}
						?>
						<div class="order-col">
							<div>Giao hàng</div>
							<div><strong>Miễn Phí</strong></div>
						</div>
						<div class="order-col">
							<div><strong>Tổng tiền</strong></div>
							<div><strong class="order-total"><?php echo $totalQty ?> VNĐ</strong></div>
						</div>
					</div>
					<button class="primary-btn order-submit" data-toggle="modal" data-target="#exampleModal" > Thanh toán</button>
				</div>
				<div class="col-md-2"></div>
				<!-- /Order Details -->
			</div>

		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<?php
	$this->load->view('home/ship_modal.php');
?>
<script>
	function excuteBill() {
		if(validateExcuteForm()){
			var shipArr = {
			'receiver_name': $('#first-name').val() + $('#last-name').val(),
			'address': $('#address').val(),
			'city': $('#city').val(),
			'phone': $('#tel').val()
		}
		var mUserID = '<?= $this->session->userdata('id') ?>'
		$.ajax({
			url: '<?php echo base_url() ?>index.php/home/excuteBill',
			type: "POST",
			dataType: 'json',
			data: shipArr,
			success: function(data) {
				if (parseInt(data.status) > 0) {
					alert(data.message);
					window.location.reload();
				}
			},
			error: function(data) {
				alert(data.responseText);
			}
		});
		}
	}

	function validateExcuteForm(){
		var allow = true;
		if ($('#first-name').val().length < 1) {
            $('#excuteFirstName').html('Vui lòng nhập họ');
            allow = false;
        }
		if ($('#last-name').val().length < 1) {
            $('#excuteLastName').html('Vui lòng nhập tên ');
            allow = false;
        }
		if ($('#address').val().length < 1) {
            $('#excuteAddress').html('Vui lòng nhập địa chỉ');
            allow = false;
        }
		if ($('#city').val().length < 1) {
            $('#excuteCity').html('Vui lòng nhập thành phố');
            allow = false;
        }
		if ($('#tel').val().length < 1) {
            $('#excuteTel').html('Vui lòng nhập số điện thoại');
            allow = false;
        }
		return allow;
	}
</script>