<div class="row">
    <script type="text/javascript">
        new WOW().init();
    </script>
    <?php $index=1;
        foreach ($result as $value) {
            foreach ($value as $value1) {
    ?>
    <div class="col-lg-4 col-md-12 mb-4">
        <!--Rotating card-->
        <div class="card-wrapper">
            <div id="card-<?php echo $index ?>" class="card card-rotating effect__click ">
                <!--Front Side-->
                <div class="face front">
                    <!-- Image-->
                    <div class="card-up">
                        <img src="https://mdbootstrap.com/images/reg/reg%20(35).jpg" class="img-fluid">
                    </div>
                    <!--Avatar-->
                    <div class="avatar"><img src="https://mdbootstrap.com/wp-content/uploads/2015/10/team-avatar-2.jpg" class="img-circle img-responsive">
                    </div>
                    <!--Content-->
                    <div class="card-block">
                        <h4><?php echo $value1['first_name']." ".$value1['last_name'];?></h4>
                        <?php foreach ($value1['jobTitle'] as $value2) {?>
                        <strong><?php echo $value2; ?></strong>
                        <?php }?>
                        <!--Triggering button-->
                        <a class="rotate-btn" id="rotate-btn-<?php echo $index ?>" data-card="card-<?php echo $index ?>">
                        <i class="fa fa-repeat"></i> Click here to rotate</a>
                    </div>
                </div>
                <!--/.Front Side-->
                <!--Back Side-->
                <div class="face back">
                    <!--Content-->
                    <h4>About me</h4>
                    <hr>
                    <strong>Personal Information</strong>
                    <p>First Name: <?php echo $value1['first_name'];?></p>
                    <p>Last Name: <?php echo $value1['last_name'];?></p>
                    <p>Birthdate: <?php echo $value1['birthday'];?></p>
                    <p>Gender: <?php echo $value1['gender'];?></p>
                    <p>Nationality: <?php echo $value1['Nationality'];?></p>
                    <p>Marital Status: <?php echo $value1['MaritalStatus'];?></p>
                    <p><?php echo $value1['Phone'];?></p>
                    <p><?php echo $value1['Email'];?></p>
                    <p>Country: <?php echo $value1['Country'];?></p>
                    <p>City: <?php echo $value1['City'];?></p>
                    <p>Street: <?php echo $value1['Street'];?></p>
                    <p> </p>
                    <strong>Education</strong>
                    <?php for ($i=0; $i < count($value1['eduMajor']) ; $i++) { ?>
                    <p>Certificate Name: <?php echo $value1['eduMajor'][$i];?></p>
                    <p>Specialization Name: <?php echo $value1['eduMinor'][$i];?></p>
                    <p>Start Date: <?php echo $value1['eduStartDate'][$i];?></p>
                    <p>Date of Grants: <?php echo $value1['eduGradDate'][$i];?></p>
                    <p>Donor: <?php echo $value1['studiedIn'][$i];?></p>
                    <p>Degree Type: <?php echo $value1['degreeType'][$i];?></p>
                    <p> </p>
                    <?php } ?>
                    <strong>Work Experience</strong>
                    <?php for ($i=0; $i < count($value1['employedIn']) ; $i++) { ?>
                    <p>Company Name: <?php echo $value1['employedIn'][$i];?></p>
                    <p>Job Position: <?php echo $value1['jobTitle'][$i];?></p>
                    <p>from: <?php echo $value1['eduStartDate'][$i];?></p>
                    <p>to: <?php echo $value1['eduGradDate'][$i];?></p>
                    <p>CareerLevel: <?php echo $value1['studiedIn'][$i];?></p>
                    <p>Job Type: <?php echo $value1['degreeType'][$i];?></p>
                    <p>Is Current: <?php echo $value1['degreeType'][$i];?></p>
                    <p> </p>
                    <?php } ?>
                    <?php } ?>
                    <hr>
                    <!--Social Icons-->
                    <!--Triggering button-->
                    <a class="rotate-btn back" id="rotate-btn-back-<?php echo $index ?>" data-card="card-<?php echo $index ?>"><i class="fa fa-undo"></i> Click here to rotate back</a>
                </div>
                <!--/.Back Side-->
            </div>
        <!--/.Rotating card-->  
        </div>
    </div>
           <script>
             $("#rotate-btn-<?php echo $index;?>").click(function(){
             $("#card-<?php echo $index;?>").addClass("flipped");
                });
             $("#rotate-btn-back-<?php echo $index ?>").click(function(){
             $("#card-<?php echo $index;?>").removeClass("flipped");
                });
            </script>
               <?php
                 if ($index %3 ==0) {
                       echo "</div><div class='row'>";}
                     $index++;
                        } ?>
</div>


  
  
