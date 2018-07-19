 <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  
  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>

  <!--Search buttom-->
  <div id="cosearch">
  <button type="submit" class="btn btn-primary" id="Function Name in controller">Search</button>
  <input type="text" name="query_text">
</div>
<div>
<div id="form">
  <div id="triangle"></div>
  <?php
  foreach ($result['results']['bindings'] as  $value) {?>
  <form id="multiphase" action=<?php echo base_url().'index.php/company/view_announcement/'.$value['id']['value'];?> method="post">
  	<?php 
  	echo $value['job']['value'];
  	?>
  	<input type="submit" value="View Announcement" />
  </form>
  <?php } ?>

</div>
</div>
</div>