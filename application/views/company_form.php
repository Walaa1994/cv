<!DOCTYPE html>
<html>

<head>
  <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  <meta charset="UTF-8">
  <title>Company Form</title>
</head>

<body>
<div id="form">
  <div id="triangle"></div>
  <form id="multiphase" action="<?php echo base_url();?>index.php/company/create_company" method="post">
    
    <div>
      <p>Company Name (Arabic)</p>
      <input type="ar_com_name" id="ar_com_name" name="ar_com_name"/>
    </div>

    <div>
      <p>Company Name (English)</p>
      <input type="en_com_name" id="en_com_name" name="en_com_name"/>
    </div>

    <div>
      <p>Company Descriptioin</p>
      <textarea type="com_desc" id="com_desc" name="com_desc"></textarea> 
    </div>

    <!--professional field need modify to select -->
     <div>
      <p>Professional Field of The Company</p>
      <select id="select" name="com_field">
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
      <select id=select name=com_year>
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
      <input type="com_owner" id="com_owner" name="com_owner"/>
    </div>

    <div>
      <p>Country</p>
      <input type="com_country" id="com_country" name="com_country"/>
    </div>

    <div>
      <p>City</p>
      <input type="com_city" id="com_city" name="com_city"/>
    </div>

    <div>
      <p>Address</p>
      <input type="com_address" id="com_address" name="com_address"/>
    </div>
    <div>
      <p>Phone</p>
      <input type="com_phone" id="com_phone" name="com_phone"/>
    </div>
    <div>
      <p>Email</p>
      <input type="com_email" id="com_email" name="com_email"/>
    </div>
    <div>
      <p>Web Site</p>
      <input type="com_website" id="com_website" name="com_website"/>
    </div>
    <input type="submit" value="Submit" />
  </form>
</div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>

  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>


  

</body>

</html>