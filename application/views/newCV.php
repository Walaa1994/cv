

<section class="section--center mdl-grid site-max-width">
  <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white  mdl-shadow--4dp">
    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
  </header>
  <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone  mdl-shadow--4dp">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><?php echo $first_name." ".$last_name; ?></h2>
    </div>
    <div class="mdl-card__supporting-text">
     <?php echo $gender.' - '.$birthday; echo "<br>";
           echo "Nationality : ".$Nationality; echo "<br>";
           echo "Marital Status : ".$MaritalStatus; echo "<br>";
           echo $Phone; echo "<br>";
           echo $Email; echo "<br>";
           echo "Address : ".$Country."-".$City."-".$Street; ?>
    </div>
  </div>
</section>

<section class="section--center mdl-grid site-max-width">
    <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__media"  >
            <!-- <img class="article-image" src="<?php echo base_url();?>/assets/img/portfolio1.jpg" border="0" alt=""> -->
            <i class="fa fa-graduation-cap fa-4x" style="color: #fff;     padding: 4% 38%;" aria-hidden="true"></i>
        </div>
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Education</h2>
        </div>
        <div class="mdl-card__supporting-text">
          <ul>
          <?php 
            foreach($eduMajor as $key => $value) {?>
            <li>
              <?php
               echo "Certificate : ".$value; echo "<br>";
               echo "Specialization  : ".$eduMinor[$key]; echo "<br>";
               echo "Start Date: ".$eduStartDate[$key]; echo "<br>";
               echo "Date of Grants : ".$eduGradDate[$key]; echo "<br>";
               echo "Donor : ".$studiedIn[$key]; echo "<br>";
               echo "Degree Type : ".$degreeType[$key]; echo "<br>";
              ?>  
            </li>
            <?php }?>
          </ul>
        </div>
    </div>
    <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__media">
            <i class="fa fa-briefcase fa-4x" aria-hidden="true" style="color: #fff;    padding: 4% 38%;"></i>
        </div>
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Work Experience</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <ul>
            <?php 
            foreach($employedIn as $key => $value) {?>
            <li>
              <?php
               echo "Company : ".$value; echo "<br>";
               echo "Job Position : ".$jobTitle[$key]; echo "<br>";
               echo "From : ".$startDate[$key]; echo "<br>";
               echo "To : ".$endDate[$key]; echo "<br>";
               echo "Career Level : ".$careerLevel[$key]; echo "<br>";
               echo "Job Type : ".$jobType[$key]; echo "<br>";
               echo "Is Current : ".$isCurrent[$key]; echo "<br>";
              ?>
            </li>
            <?php }?>
          </ul>
        </div>
    </div>
    <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__media">
            <i class="fa fa-lightbulb-o fa-4x" aria-hidden="true"  style="color: #fff;    padding: 4% 38%;"></i>
        </div>
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Skills</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <ul>
             <?php 
            foreach($skillName as $key => $value) {?>
            <li>
              <?php
              echo "Skill Name : ".$value; echo "<br>";
              echo "Years of experience : ".$skillYearsExperience[$key]; echo "<br>";
              echo "Skill Level : ".$skillLevel[$key]; echo "<br>";

              ?>  
            </li>
            <?php }?>
          </ul>
        </div>
    </div>
</section>

<?php class myPDF extends FPDF{

$pdf = new myPDF(); 

?>
