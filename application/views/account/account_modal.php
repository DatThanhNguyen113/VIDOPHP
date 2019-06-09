<div class="modal fade login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Đăng nhập</h4>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="social">
                        <div id="gSignInWrapper">
                            <div id="customBtn" class="customGPlusSignIn">
                                <img src="<?php echo base_url()?>electro/img/mGoogleIcon.png" width="40px;" height="40px;">
                                <span class="icon"></span>
                                <span class="buttonText">Google</span>
                            </div>
                        </div>
                    </div>
                    <div class="division">
                        <div class="line l"></div>
                        <span>or</span>
                        <div class="line r"></div>
                    </div>
                    <div class="content">
                        <div class="error"></div>
                        <div class="form loginBox">
                            <input placeholder="tài khoản" id="mLoginUserName" class="form-control" name="mLoginUserName" style="height:35px;margin-bottom:8px;" type="text" />
                            <p id="validateLoginUserName"></p>
                            <input type="password" placeholder="mật khẩu" class="form-control" id="mLoginPassword" name="mLoginPassword" style="height:35px;margin-bottom:8px;" />
                            <p id="validateLoginPassword"></p>
                            <?php echo  $this->session->flashdata('login_msg') ?>
                            <button type="button" class="btn btn-default btn-login" onclick="getLogin();">Đăng nhập</button>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            <input placeholder="tài khoản" id="mRegisterUserName" name="mRegisterUserName" class="form-control" id="email" style="height:35px;margin-bottom:8px;" />
                            <p id="validateRegisterUserName"></p>
                            <input type="password" placeholder="mật khẩu" id="mRegisterPassword" name="mRegisterPassword" class="form-control" style="height:35px;margin-bottom:8px;" />
                            <p id="validateRegisterPassword"></p>
                            <input placeholder="email" id="mRegisterEmail" name="mRegisterEmail" class="form-control" style="height:35px;margin-bottom:8px;" />
                            <p id="validateRegisterEmail"></p>
                            <input placeholder="địa chỉ" id="mRegisterAddress" name="mRegisterAddress" class="form-control" style="height:35px;margin-bottom:8px;" />
                            <p id="validateRegisterAddress"></p>
                            <?php echo  $this->session->flashdata('register_msg') ?>
                            <button type="button" class="btn btn-default btn-login" onclick="getRegister();">Đăng kí</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                    <span>Chưa có tài khoản
                        <a href="javascript: showRegisterForm();">Tạo tài khoản</a>
                        ?</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>Đã có tài khoản ?</span>
                    <a href="javascript: showLoginForm();">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getRegister() {
        if (validateRegisterForm()) {
            var params = {
                'user_name': $('#mRegisterUserName').val(),
                'pass_word': $('#mRegisterPassword').val(),
                'email': $('#mRegisterEmail').val(),
                'address': $('#mRegisterAddress').val(),
                'roleid': 3
            };
            $.ajax({
                url: '<?php echo base_url() ?>index.php/account/sign_up',
                type: "POST",
                dataType: 'json',
                data: params,
                success: function(data) {
                    if (parseInt(data.status) > 0) {
                        alert(data.message);
                        $('form').animate({
                            height: "toggle",
                            opacity: "toggle"
                        }, "slow");
                        $('#mLoginUserName').val($('#mRegisterUserName').val());
                        $('#mLoginPassword').val($('#mRegisterPassword').val());
                    } else {
                        alert(data.message);
                    }
                },
                error: function(data) {
                    alert(data.responseText);
                }
            });
        }

    }

    function getLogin() {
        if (validateLoginForm()) {
            var params = {
                'user_name': $('#mLoginUserName').val(),
                'pass_word': $('#mLoginPassword').val()
            };
            $.ajax({
                url: '<?php echo base_url() ?>index.php/account/sign_in',
                type: "POST",
                dataType: 'json',
                data: params,
                success: function(data) {
                    if (parseInt(data.status) > 0) {
                        window.location.href = data.message;
                    } else {
                        alert(data.message);
                    }
                },
                error: function(data) {
                    alert(data.responseText);
                }
            });
        }
    }

    function validateLoginForm() {
        var allow = true;
        if ($('#mLoginUserName').val().length < 1) {
            $('#validateLoginUserName').html('Vui lòng nhập tên đăng nhập');
            allow = false;
        }
        if ($('#mLoginPassword').val().length < 1) {
            $('#validateLoginPassword').html('Vui lòng nhập mật khẩu');
            allow = false;
        }
        return allow;
    }

    function validateRegisterForm() {
        var allow = true;
        if ($('#mRegisterUserName').val().length < 1) {
            $('#validateRegisterUserName').html('Vui lòng nhập tên đăng nhập');
            allow = false;
        }
        if ($('#mRegisterPassword').val().length < 1) {
            $('#validateRegisterPassword').html('Vui lòng nhập mật khẩu');
            allow = false;
        }
        if ($('#mRegisterEmail').val().length < 1) {
            $('#validateRegisterEmail').html('Vui lòng nhập email');
            allow = false;
        }
        if ($('#mRegisterAddress').val().length < 1) {
            $('#validateRegisterAddress').html('Vui lòng nhập địa chỉ');
            allow = false;
        }
        return allow;
    }
</script>
<script>
    $(function() {
        startApp();
    });
    var googleUser = {};
    var startApp = function() {
        gapi.load('auth2', function() {
            // Retrieve the singleton for the GoogleAuth library and set up the client.
            auth2 = gapi.auth2.init({
                client_id: '361200121303-441p085lsacqihksg6i6e6nfgn7sp8nb.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin',
                // Request scopes in addition to 'profile' and 'email'
                //scope: 'additional_scope'
            });
            attachSignin(document.getElementById('customBtn'));
        });
    };

    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                debugger;
                var profile = googleUser.getBasicProfile();
                var params = {
                'user_name': profile.getEmail(),
                'social_id': profile.getId()
            };
            $.ajax({
                url: '<?php echo base_url() ?>index.php/account/socialSignIn',
                type: "POST",
                dataType: 'json',
                data: params,
                success: function(data) {
                    if (parseInt(data.status) > 0) {
                        window.location.href = data.message;
                    } else {
                        alert(data.message);
                    }
                },
                error: function(data) {
                    alert(data.responseText);
                }
            });
            },
            function(error) {
                alert(JSON.stringify(error, undefined, 2));
            });
    }


    function addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }
</script>