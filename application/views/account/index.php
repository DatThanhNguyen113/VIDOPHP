<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


  <style>
    body {
      padding-top: 60px;
    }
  </style>
  <style type="text/css">
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 190px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }

    #customBtn:hover {
      cursor: pointer;
    }

    span.label {
      font-family: serif;
      font-weight: normal;
    }

    span.icon {
      background: url('/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
    }

    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 42px;
      padding-right: 42px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>
  <link href="<?php echo base_url() ?>electro/css/account/assets/css/bootstrap.css" rel="stylesheet" />
  <link href="<?php echo base_url() ?>electro/css/account/assets/css/login-register.css" rel="stylesheet" />
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  <script src="https://apis.google.com/js/api:client.js"></script>

  <script src="<?php echo base_url() ?>electro/css/account/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>electro/css/account/assets/js/bootstrap.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>electro/css/account/assets/js/login-register.js" type="text/javascript"></script>
</head>

<body>

  <div class="container">



    <?php
    $this->load->view('account/account_modal.php')
    ?>
  </div>

  <!-- //main -->
  <!-- <script>
   $(function(){
    $('#modalLoginForm').modal('show');
   });
    $('.message a').click(function() {
      $('form').animate({
        height: "toggle",
        opacity: "toggle"
      }, "slow");
    });
    $(function() {
      var mUrl = window.location.href;
      var iDex = mUrl.indexOf('sign_up');
      if (parseInt(iDex) > -1) {
        $('form').animate({
          height: "toggle",
          opacity: "toggle"
        }, "slow");
      }
    });

  </script> -->
  <script type="text/javascript">
    $(document).ready(function() {
      openLoginModal();
      var mUrl = window.location.href;
      var iDex = mUrl.indexOf('sign_up');
      if (parseInt(iDex) > -1) {
        showRegisterForm();
      }
    });
  </script>
</body>

</html>