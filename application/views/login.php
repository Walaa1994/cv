<!DOCTYPE html>
<html>
<head>
  <title>CV Star Soft</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/login/css/main.css">
<!--===============================================================================================-->
</head>


<body>


  

  <div class="limiter">
    <div style="background-color:#D0DDE9" class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url(<?php echo base_url();?>/assets/login/images/bg-01.jpg);">
          <span class="login100-form-title-1">
            login
          </span>
        </div>


        <form class="login100-form validate-form" action="<?php echo base_url();?>index.php/User/login_validation" method="post">
          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" name="username" placeholder="Enter username">
            <span class="test-danger"><?php echo form_error('username');?></span>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Enter password">
            <span class="test-danger"><?php echo form_error('password');?></span>
            <span class="focus-input100"></span>
          </div>
 
          <div class="flex-sb-m w-full p-b-30">
            <div class="contact100-form-checkbox" style="font-size: small;">
            Don't have an account? <a href="<?php echo(site_url("User/register"))?>">Register</a>
          </div>
<!--            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
              <label class="label-checkbox100" for="ckb1">
                Remember me
              </label>
            </div>

            <div>
              <a href="#" class="txt1">
                Forgot Password?
              </a>
            </div> -->
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
          <?php
            echo $this->session->flashdata('error');
            ?>
        </form>
        <div style="float: right;"><a href="<?php echo(site_url('Home/index'))?>"><i class="fa fa-2x fa-home" aria-hidden="true" style="color: #2e444f;padding-bottom: 8px;padding-right: 8px;"></i></a></div>
      </div>
    </div>
  </div>

<!--===============================================================================================-->
  <script src="<?php echo base_url();?>/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>/assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>/assets/login/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url();?>/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>/assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>/assets/login/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url();?>/assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>/assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>/assets/login/js/main.js"></script>


</body>

</html>
