<link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  
  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>
<div>
<div id="form">
  <div id="triangle"></div>
  <form id="multiphase" action=<?php echo base_url().'index.php/company/view_announcement/';?> method="post">
  	<?php 
    echo '<pre>';
  	print_r( $result1);
  	?>
  	<input type="submit" value="View Announcement" />
  </form>
</div>
</div>
</div>