<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <title>our app</title>
  <link href="<?php echo base_url();?>/assets/css/style.css" rel='stylesheet' type='text/css' />

</head>

<body  style="background: url(<?php echo base_url();?>/assets/images/background.jpg);">


  <span href="<?php echo base_url();?>index.php/User/index" class="button" id="toggle-login">Register</span>

<div id="login">
  <div id="triangle"></div>
  <h1>Login</h1>
  <form action="<?php echo base_url();?>index.php/User/login_validation" method="post">
    
  <input type="username" name="username" placeholder="username" />
    <span class="test-danger"><?php echo form_error('username');?></span>
    <input type="password" name="password" placeholder="password" />
    <span class="test-danger"><?php echo form_error('password');?></span>
    <input  type="submit" value="login" />
    <?php
      echo $this->session->flashdata('error');
      ?>
  </form>
</div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>

  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>


  

</body>

</html>
