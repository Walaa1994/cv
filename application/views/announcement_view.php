 <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  
  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>
<div>
<div id="form">
  <div id="triangle"></div>
  <form id="multiphase" action="<?php echo base_url().'index.php/company/find_cvs';?>" method="post">
    <input id="result" name="result" type="hidden" value="<?php echo htmlspecialchars(json_encode($result));?>">
  	<?php 
    foreach ($result['basic']['results']['bindings'] as  $value1){
      echo nl2br($value1['description']['value']."\n");
      echo nl2br($value1['model']['value']."\n");
      echo nl2br($value1['type']['value']."\n");
      echo nl2br($value1['salary']['value']."\n");
      echo nl2br($value1['locality']['value']."\n");
    }
    foreach ($result['education']['results']['bindings'] as  $value2) {
      echo nl2br($value2['eduMajor']['value']."\n");
      echo nl2br($value2['eduMinor']['value']."\n");
      echo nl2br($value2['eduDegree']['value']."\n");
    }
    foreach ($result['skills']['results']['bindings'] as $value3) {
      echo nl2br($value3['skillName']['value']."\n");
      echo nl2br($value3['skillExperience']['value']."\n");
    }   
  	?>
  	<input type="submit" value="Find CVs" />
  </form>

</div>
</div>
</div>