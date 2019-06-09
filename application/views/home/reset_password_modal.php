<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Billing Details -->


                <!-- <div class="input-group">
                <p>Nhập số điện thoại của bạn. Chúng tôi sẽ gửi 1 mã otp để xác nhận danh tính</p>
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="sendOtp();">Gửi Otp</button>
                    </div>
                </div>
                <p id="phoneValidate"></p> -->
                <p>Nhập số điện thoại của bạn. Chúng tôi sẽ gửi 1 mã otp để xác nhận danh tính</p>
                <div class="input-group">

                    <input type="text" class="form-control" id="phone">
                    <span class="input-group-addon" onclick="sendOtp();">Gửi Otp</span>
                    <p></p>
                </div>

                <div id="NewPass">

                </div>
                <p id="phoneValidate"></p>
                <!-- /Billing Details -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="submit" class="btn btn-primary" onclick="resetPassword();">Đồng ý</button>
            </div>
        </div>
    </div>
</div>

<script>
    function sendOtp() {
        var mPhone = $('#phone').val();
        if (mPhone.length < 1) {
            $('#phoneValidate').html('Xin nhập số điện thoại');
            return;
        }
        if (!validatePhone(mPhone)) {
            $('#phoneValidate').html('Số điện thoại không đúng định dạng');
            return;
        }
        var mUserName = '<?= $this->session->userdata('username') ?>';
        var params = JSON.stringify({
            'phone': mPhone,
            'username': mUserName
        })
        $.ajax({
            url: 'http://vidoandroid.vidophp.tk/api/Service/SendOtpSMS',
            contentType: "application/json; charset=utf-8",
            type: "POST",
            dataType: 'json',
            data: params,
            success: function(data) {
                if (parseInt(data.status) == 200) {
                    $('#NewPass').html('<input type="text" class="form-control" placeholder="Nhập mã Otp mà bạn nhận được" id="otpToken"><p></p><input type="password" class="form-control" placeholder="Nhập mật khẩu mới" id="password">');
                    alert('Gửi Otp thành công, xin hãy kiểm tra điện thoại');
                    storeOtp(data.message);
                } else {
                    alert('Gửi Otp thất bại');
                }
            },
            error: function(data) {
                alert(data.responseText);
            }
        });
    }

    function validatePhone(txtPhone) {
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(txtPhone) && txtPhone.length < 11) {
            return true;
        } else {
            return false;
        }
    }

    function resetPassword() {
        var mCode = $('#otpToken').val();
        var mPass = $('#password').val();
        if (mCode.length < 1 || mPass.length < 1) {
            $('#phoneValidate').html('Xin nhập đầy đủ');
            return;
        }
        var params = {
            'token': mCode,
            'pass_word': mPass
        };
        $.ajax({
            url: '<?php echo base_url() ?>index.php/account/resetPassword',
            type: "POST",
            dataType: 'json',
            data: params,
            success: function(data) {
                if (parseInt(data.status) > 0) {
                    $('#resetPasswordModal').modal('toggle');
                    $('#NewPass').html('');
                    $('#phone').val('');
                    alert(data.message);
                } else {
                    alert(data.message);
                    $('#resetPasswordModal').modal('toggle');
                    $('#NewPass').html('');
                    $('#phone').val('');
                }
            },
            error: function(data) {
                alert(data.responseText);
            }
        });
    }

    function storeOtp(token) {
        var params = {
            'code': token
        };
        $.ajax({
            url: '<?php echo base_url() ?>index.php/account/storeOtpSession',
            type: "POST",
            dataType: 'json',
            data: params,
            success: function(data) {},
        });
    }
</script>