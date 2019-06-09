<div class="container">
  <div class="section-title">
    <div class="col-md-3">
      <h3 class="title">Lich sử mua hàng</h3>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-3">
    <button class="primary-btn order-submit" data-toggle="modal" data-target="#resetPasswordModal" > Đổi mật khẩu</button>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col"> </th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Thành tiền (VNĐ)</th>
        <th scope="col">Thời gian</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($data) && !empty($data)) {
        foreach ($data as $key => $value) {
          ?>
          <tr>
            <th scope="row"><img src="<?php echo base_url() . 'electro/' . $value->image ?>" width="100px;" height="100px;"></th>
            <td><?php echo $value->name ?></td>
            <td><?php echo $value->amount ?></td>
            <td><?php echo $value->total_row_price ?></td>
            <td><?php echo $value->create_time ?></td>
          </tr>
        <?php
      }
    }
    ?>
    </tbody>
  </table>
</div>

<?php
  $this->load->view('home/reset_password_modal')
?>