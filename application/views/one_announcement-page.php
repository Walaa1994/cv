<div class="col-lg-4 col-md-6 mb-4">

                  <!-- Card -->
                  <div class="card card-cascade">

                    <!-- Card image -->
                    <div class="view view-cascade gradient-card-header blue-gradient">

                      <!-- Title -->
                      <h2 class="card-header-title mb-3"><?php echo $company->en_name;?></h2>
                      <!-- Subtitle -->
                      <?php foreach ($result['basic']['results']['bindings'] as  $value1){ ?>
                      <p class="card-header-subtitle mb-0"><?php echo $value1['description']['value'];?></p>

                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">

                      <!-- Text -->
                      <p class="card-text"><?php 
                            echo nl2br("Job Mode: ".$value1['mode']['value']."\n");
                            echo nl2br("Employment Type: ".$value1['type']['value']."\n");
                            echo nl2br("Salary: ".$value1['salary']['value']." SYP\n");
                            echo nl2br("Locality:".$value1['locality']['value']."\n");
                          }
                          foreach ($result['education']['results']['bindings'] as  $value2) {
                            echo nl2br("Certificate Name: ".$value2['eduMajor']['value']."\n");
                            echo nl2br("Specialization Name: ".$value2['eduMinor']['value']."\n");
                            echo nl2br("Degree Type: ".$value2['eduDegree']['value']."\n");
                          }
                          foreach ($result['skills']['results']['bindings'] as $value3) {
                            echo nl2br("Skill Name: ".$value3['skillName']['value']."\n");
                            echo nl2br("Years of experience: ".$value3['skillExperience']['value']."\n");
                          }

                          ?>
                          </p>

                      <hr>

                      

                    </div>

                  </div>
                  <!-- Card -->

                </div>