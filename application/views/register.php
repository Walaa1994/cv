<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>our app</title>
  <link href="<?php echo base_url();?>/assets/css/style.css" rel='stylesheet' type='text/css' />
</head>

<body style="background: url(<?php echo base_url();?>/assets/images/background.jpg);">

  <span href="#" class="button" id="toggle-login">jobs web applicatoin</span>
  <div id="login">
    <div id="triangle"></div>
    <h1>Register</h1>
    <form action='<?php echo base_url();?>index.php/User/register' method="post">
      <?php echo validation_errors();?>
      
      <input type="username" name="username" placeholder="username" />
      <input type="password" name="password" placeholder="password" />
      <input type="Password" name="Cpassword" placeholder="Confrim Password" />   
      <input type="email" name="Email" placeholder="Email" />
      <input type="submit" value="Register" />
    </form>
  </div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>

  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>

</body>
</html>