<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Company Form</title>

    
    <link href="<?php echo base_url();?>/assets/css/style.css" rel='stylesheet' type='text/css' />

</head>

<body>

<div id="login">
  <div id="triangle"></div>
  <h1>Add Company</h1>
  <form action="<?php echo base_url();?>index.php/login/login_validation" method="post">
    
    <div>
      <p>Company Name (Arabic)</p>
      <input id="ar_com_name" name="ar_com_name"/>
    </div>
    <div>
      <p>Company Name (English)</p>
      <input id="en_com_name" name="en_com_name"/>
    </div>
    <!--professional field need modify to select -->
     <div>
      <p>Professional Field of The Company</p>
      <select id="com_field" name="com_field">
        <option value="0">Choose ...</option>
        <option value="designing">Designing</option>
        <option value="information technology">Information Technology</option>
        <option value="electrical engineering">Electrical Engineering</option>
        <option value="transportation company">Transportation Company</option>
        <option value="financial services and exchange">Financial Services and Exchange</option>
        <option value="marketing">Marketing</option>
        <option value="Sales">Sales</option>
        <option value="telecom">Telecom</option>
        <option value="food industry">Food Industry</option>
        <option value="accounting work">Accounting Work</option>
        <option value="plastic industry">Plastic Industry</option>
        <option value="administrative works">Administrative Works</option>
        <option value="secretarial">Secretarial</option>
        </select>
    </div>
    <div>
      <?php $year=2019;?>
      <p>The Year of Foundation</p>
      <select id=com_year name=com_year>
      <option value="0">Year</option>
      <?php 
      for ($i = 0; $i <= 117; $i++) {
      $year=$year-1;
      echo "<option value='.$year.'>$year</option>";
      }?>
      </select>
    </div>
    <div>
      <p>The Owner of Company</p>
      <input id="com_owner" name="com_owner"/>
    </div>
    <div>
      <p>City</p>
      <input id="com_city" name="com_city"/>
    </div>
    <div>
      <p>Governorate</p>
      <input id="com_governorate" name="com_governorate"/>
    </div>
    <div>
      <p>Address</p>
      <input id="com_address" name="com_address"/>
    </div>
    <div>
      <p>phone</p>
      <input id="com_phone" name="com_phone"/>
    </div>
    <div>
      <p>Email</p>
      <input id="com_email" name="com_email"/>
    </div>
    <div>
      <p>Web Site</p>
      <input id="com_website" name="com_website"/>
    </div>
    <input type="submit" value="Submit" />
  </form>
</div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>

  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>


  

</body>

</html>