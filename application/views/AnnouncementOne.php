<div class="row">

            <!-- Grid column -->
            <div class="col-lg-5 mb-lg-0 mb-5">
              <!--Image-->
              <img src="<?php echo base_url();?>/assets/img/join-our-team.jpg" alt="Sample project image" class="img-fluid rounded z-depth-1">

            
            <div class="row"> <h5 class="font-weight-bold mb-3">Company: <?php echo $company;?></h5></div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-7">
              <!-- Grid row -->
              <div class="row">
                <div class="col-md-1 col-2">
                  <i class="fa fa-info-circle fa-2x deep-purple-text"></i>
                </div>
                <div class="col-md-11 col-10">
                  <h5 class="font-weight-bold mb-3">Basic Information</h5>
                  <?php foreach ($result['basic']['results']['bindings'] as  $value1){ ?>
                  <p class="grey-text mb-0">Job Mode: <?php echo $value1['description']['value']; ?></p>
                  <p class="grey-text mb-0">Job Mode: <?php echo $value1['mode']['value']; ?></p>
                  <p class="grey-text mb-0">Employment Type: <?php echo $value1['type']['value']; ?></p>
                   <p class="grey-text mb-0">Salary: <?php echo $value1['salary']['value']; ?> SYP</p>
                   <p class="grey-text mb-0">Locality: <?php echo $value1['locality']['value']; ?></p>
                </div>
                <?php } ?>
              </div>

              <!-- Grid row -->

              <!-- Grid row -->
              <div class="row mb-3">
                <div class="col-md-1 col-2">
                  <i class="fa fa-book fa-2x cyan-text"></i>
                </div>
                <div class="col-md-11 col-10">
                  <h5 class="font-weight-bold mb-3">Education</h5>
                  <?php foreach ($result['education']['results']['bindings'] as  $value2) {?>
                  <p class="grey-text">Certificate Name: <?php echo $value2['eduMajor']['value']; ?></p>
                  <p class="grey-text">Specialization Name: <?php echo $value2['eduMinor']['value']; ?></p>
                  <p class="grey-text">Degree Type: <?php echo $value2['eduDegree']['value']; ?></p>
                  <?php } ?>
                </div>
              </div>
              <!-- Grid row -->

              <!-- Grid row -->
              <div class="row mb-3">
                <div class="col-md-1 col-2">
                  <i class="fa fa-code fa-2x red-text"></i>
                </div>
                <div class="col-md-11 col-10">
                  <h5 class="font-weight-bold mb-3">Personal Skills</h5>
                  <?php foreach ($result['skills']['results']['bindings'] as $value3) { ?>
                  <p class="grey-text">Skill Name: <?php echo $value3['skillName']['value']; ?></p>
                   <p class="grey-text">Years of experience: <?php echo $value3['skillExperience']['value']; ?></p>
                   <?php } ?>
                </div>
              </div>
              <!-- Grid row -->

              <?php if ($flag) {?>
              <form action="<?php echo base_url().'index.php/home/Find_CV';?>" method="post">
                <input id="result" name="result" type="hidden" value="<?php echo htmlspecialchars(json_encode($result));?>"> 
                <div class="row">
                <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light">Find CVs</button>
                </div>
              </form>
              <?php } ?>
              <?php if (!$flag){ ?>
                <div class="row">
                <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Send CV</button>
                </div>
              <?php } ?>

            </div>
            <!-- Grid column -->

          </div>