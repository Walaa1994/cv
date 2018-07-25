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
      <a href="<?php echo(site_url('home/find_job/'.$this->session->userdata('u_id')));?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent">
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
           if($eduMajor!="Certificate : "){
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
            <?php } }
              else {
                echo $eduMajor; echo "<br>";
                echo $eduMinor; echo "<br>";
                echo $eduStartDate; echo "<br>";
                echo $eduGradDate; echo "<br>";
                echo $studiedIn; echo "<br>";
                echo $degreeType; echo "<br>";
              }
            ?>
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
            if($employedIn !="Company : "){
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
            <?php } }
            else {
                echo $employedIn."<br>";
                echo $jobTitle."<br>";
                echo $startDate."<br>";
                echo $endDate."<br>";
                echo $careerLevel."<br>";
                echo $jobType."<br>";
                echo $isCurrent."<br>";
              }
            ?>
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
             if($skillName!="Skill Name : "){
            foreach($skillName as $key => $value) {?>
            <li>
              <?php
              echo "Skill Name : ".$value; echo "<br>";
              echo "Years of experience : ".$skillYearsExperience[$key]; echo "<br>";
              echo "Skill Level : ".$skillLevel[$key]; echo "<br>";

              ?>  
            </li>
            <?php } }
            else {
                echo $skillName."<br>";
                echo $skillYearsExperience."<br>";
                echo $skillLevel."<br>";
                }?>
          </ul>
        </div>
    </div>
</section>

<section class="section--center mdl-grid site-max-width homepage-portfolio">
    <a class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="http://localhost/cv/index.php/home/downloadCV">
      Download CV
    </a>
</section>

<div class="homepage-footer">
  <section class="mdl-grid site-max-width">
      <div class="mdl-cell mdl-card mdl-cell--8-col mdl-cell--4-col-tablet  mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Your Personal Test Result</h2>
        </div>
        <ul class="demo-list-three mdl-list">
            <li class="mdl-list__item mdl-list__item--three-line" style="height: 122px;">
              <span class="mdl-list__item-primary-content" style="height: 90px;">
                <i class="material-icons mdl-list__item-avatar">person</i>
                <span>
                  <?php
                    if($openness>$conscientiousness && $openness>$extraversion && $openness>$agreeableness &&
                     $openness>$neuroticism )
                      echo "Openness";

                    if($conscientiousness>$openness && $conscientiousness>$extraversion && $conscientiousness>$agreeableness &&
                        $conscientiousness>$neuroticism)
                        echo "Conscientiousness";

                    if($extraversion>$openness && $extraversion>$conscientiousness && $extraversion>$agreeableness && 
                      $extraversion>$neuroticism)
                      echo "Extraversion";

                    if($agreeableness>$openness && $agreeableness>$conscientiousness && $agreeableness>$extraversion && 
                      $agreeableness>$neuroticism)
                      echo "Agreeableness";

                    if($neuroticism>$openness && $neuroticism>$conscientiousness && $neuroticism>$extraversion &&
                      $neuroticism>$agreeableness)
                      echo "Neuroticism";
                  ?>
                </span>
                <span class="mdl-list__item-text-body" style="height: 90px; padding-left: 56px;">
                 <?php
                    if($openness>$conscientiousness && $openness>$extraversion && $openness>$agreeableness &&
                     $openness>$neuroticism )
                      echo "People who are high in this trait tend to be more adventurous and creative. People low in this trait are often much more traditional and may struggle with abstract thinking ,Very creative , Open to trying new things , Focused on tackling new challenges , Happy to think about abstract concepts .";

                     if($conscientiousness>$openness && $conscientiousness>$extraversion && $conscientiousness>$agreeableness && $conscientiousness>$neuroticism) 
                      echo "Standard features of this dimension include high levels of thoughtfulness, with good impulse control and goal-directed behaviors. Highly conscientiousness tend to be organized and mindful of details , Spend time preparing , Finish important tasks right away , Pay attention to details .";

                    if($extraversion>$openness && $extraversion>$conscientiousness && $extraversion>$agreeableness && 
                      $extraversion>$neuroticism)
                      echo "Extraversion is characterized by excitability, sociability, talkativeness, assertiveness, and high amounts of emotional expressiveness. People who are high in extraversion are outgoing and tend to gain energy in social situations.";

                    if($agreeableness>$openness && $agreeableness>$conscientiousness && $agreeableness>$extraversion && 
                      $agreeableness>$neuroticism)
                      echo "trust, altruism, kindness, affection, and other prosocial behaviors. People who are high in agreeableness tend to be more cooperative while those low in this trait tend to be more competitive and even manipulative .";

                    if($neuroticism>$openness && $neuroticism>$conscientiousness && $neuroticism>$extraversion &&
                      $neuroticism>$agreeableness)
                      echo "Neuroticism is a trait characterized by sadness, moodiness, and emotional instability . Individuals who are high in this trait tend to be experience mood swings, anxiety, irritability and sadness.Those low in this trait tend to be more stable and emotionally resilient .";

                    echo "<br>";
                    if($warning_message != " ")
                    echo "Note : ".$warning_message;
                 ?>
                </span>
              </span>
            </li>
            <!--<li class="mdl-list__item mdl-list__item--three-line">
              <span class="mdl-list__item-primary-content">
                <i class="material-icons  mdl-list__item-avatar">person</i>
                <span>Awesome work, they can do almost anything..</span>
                <span class="mdl-list__item-text-body">
                Aaron Paul, Marketing Lead, Awesome.com
                </span>
              </span>
            </li>-->
        </ul>
      </div>
      <div style="background-color:#3f51b5" class="demo-card-event mdl-cell mdl-card mdl-shadow--4dp event-card portfolio-card">
        <div  class="mdl-card__title mdl-card--expand" style="width: 292px;">
        <h4>
         <?php
           echo "Openness : ".$openness."%"."<br>";
           echo "Conscientiousness :".$conscientiousness."%"."<br>";
           echo "Extraversion : ".$extraversion."%"."<br>";
           echo "Agreeableness : ".$agreeableness."%"."<br>";
           echo "Neuroticism : ".$neuroticism."%"."<br>";

         ?>
        </h4>
          <!--<h4>
            Openness : 20%<br>
            Conscientiousness : 40% <br>
            Extraversion : 30%<br>
            Agreeableness : 79%<br>
            Neuroticism : 70%
          </h4>-->
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