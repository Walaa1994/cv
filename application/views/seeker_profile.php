<div class="mdl-grid site-max-width">
	<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Are you already have CV?</h2>
    </div>
    <div class="mdl-card__supporting-text">
      you can upload your cv and all data extract and re-stract with professional cv.
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('seeker/uploadcv'));?>" target="_blank">
        Upload
      </a>
       /
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('seeker/cvForm'));?>" target="_blank">
        Create Your CV.
      </a>
    </div>
  </div>
</div>

<section class="section--center mdl-grid site-max-width">
  <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white  mdl-shadow--4dp">
    <!--<i  aria-hidden="true"></i>-->
    <div  >
        <img src="<?php echo $this->session->userdata('user_photo')?>" alt="image" class="img_float_l img_frame"/>
    </div>

  </header>
  <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone  mdl-shadow--4dp">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">
        <?php 
           echo $first_name." ".$last_name;
        ?></h2>
    </div>
    <div class="mdl-card__supporting-text">
     <?php echo $gender.' - '.$birthday; echo "<br>";
           echo "Nationality : ".$Nationality; echo "<br>";
           echo "Marital Status : ".$MaritalStatus; echo "<br>";
           echo $Phone; echo "<br>";
           echo $Email; echo "<br>";
           echo "Address : ".$Country."-".$City."-".$Street; ?>
    </div>
    <div class="mdl-card__actions  mdl-card--border">
      <a href="#" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent">
        Find Job
      </a>
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

<section class="section--center mdl-grid site-max-width homepage-portfolio">
    <a class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="portfolio.html">
      Download CV
    </a>
</section>

<div class="homepage-footer">
  <section class="mdl-grid site-max-width">
      <div class="mdl-cell mdl-card mdl-cell--8-col mdl-cell--4-col-tablet  mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Your Personal test result</h2>
        </div>
        <ul class="demo-list-three mdl-list">
            <li class="mdl-list__item mdl-list__item--three-line">
              <span class="mdl-list__item-primary-content">
                <i class="material-icons mdl-list__item-avatar">person</i>
                <span>Amazing people, always ready to help!</span>
                <span class="mdl-list__item-text-body">
                  Bryan Cranston, CEO, Amazing.com
                </span>
              </span>
            </li>
            <li class="mdl-list__item mdl-list__item--three-line">
              <span class="mdl-list__item-primary-content">
                <i class="material-icons  mdl-list__item-avatar">person</i>
                <span>Awesome work, they can do almost anything..</span>
                <span class="mdl-list__item-text-body">
                Aaron Paul, Marketing Lead, Awesome.com
                </span>
              </span>
            </li>
        </ul>
      </div>
      <div class="demo-card-event mdl-cell mdl-card mdl-shadow--4dp event-card portfolio-card">
        <div class="mdl-card__title mdl-card--expand">
          <h4>
            Openness : 20%<br>
            Conscientiousness : 40% <br>
            Extraversion : 30%<br>
            Agreeableness : 79%<br>
            Neuroticism : 70%
          </h4>
        </div>
        <div class="mdl-card__actions mdl-card--border">
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('FacebookLogin/index')); ?>">
            Personal Test
          </a>
          <div class="mdl-layout-spacer"></div>
          <i class="fa fa-facebook-official" aria-hidden="true"></i>
        </div>
      </div>
  </section>
  </div>