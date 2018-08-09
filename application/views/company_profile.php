<div class="mdl-grid site-max-width">
	<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
    <div class="cpmoany-profile-cover">
      
    </div>
    <div class="mdl-card__supporting-text">
      you can add your company and all infomation .
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('Company/AddCompany'));?>">
        Add Company Information
      </a>
      <?php if ($company_check) { ?>
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('Company/AddAnnouncement'));?>">
        Add Announcement .
      </a>
      <?php } ?>
    </div>
  </div>
</div>

<section class="section--center mdl-grid site-max-width">
  <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white  mdl-shadow--4dp" style="background-color: #DCDDE2!important;">
  <img src="<?php echo base_url();?>/assets/img/company-icon.png">
   <!--  <i class="fa fa-building fa-5x" style="color: black" aria-hidden="true"></i> -->
  </header>
  <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone  mdl-shadow--4dp">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">
        <?php if ($companyProfile!=null) 
                  echo $companyProfile[0]['en_name'];
              else 
                  echo "Company English Name";
         ?>
         </h2>
    </div>
    <div class="mdl-card__supporting-text">
      <?php if ($companyProfile!=null) {
        echo $companyProfile[0]['ar_name'];
      } else {
        echo "Company Arabic Name";
      }
        ?>
    </div>
  </div>
</section>
<section class="section--center mdl-grid site-max-width">
    <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__media"  >
            <!-- <img class="article-image" src="<?php echo base_url();?>/assets/img/portfolio1.jpg" border="0" alt=""> -->
            <i class="fa fa-map-marker fa-3x" style="color: #fff;     padding: 4% 38%;" aria-hidden="true"></i>
        </div>
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Company Location</h2>
        </div>
        <div class="mdl-card__supporting-text">
          <ul>
            <li>
              City : <?php 
              if ($companyProfile!=null)
                 echo $companyProfile[0]['city'];
              else
                echo "Company City";
                 ?>.  
            </li>
            <li>
              Country : <?php if ($companyProfile!=null) {
                echo $companyProfile[0]['country'];
              } else {
                echo "Company Country";
              }
               ?>.
            </li>
            <li>
              Address : <?php if ($companyProfile!=null) {
                echo $companyProfile[0]['address'];
              } else {
                echo "Company Address";
              }
               ?>.
            </li>
          </ul>
        </div>
    </div>
    <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__media">
            <i class="fa fa-comment fa-3x" aria-hidden="true" style="color: #fff;    padding: 4% 38%;"></i>
        </div>
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Company Descriptioin</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <ul>
            <li>
             Descriptioin : <?php if ($companyProfile!=null) {
               echo $companyProfile[0]['description'];
             } else {
               echo "Company Description";
             }
              ?>.  
            </li>
            
          </ul>
        </div>
    </div>
    <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__media">
            <i class="fa fa-history fa-3x" aria-hidden="true"  style="color: #fff;    padding: 4% 38%;"></i>
        </div>
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Company History</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <ul>
            <li>
              Professional Field of The Company : <?php if ($companyProfile!=null) {
                echo $companyProfile[0]['prof_field'];
              } else {
                echo "Company Professional Field ";
              }
               ?>.  
            </li>
            <li>
              The Year of Foundation : <?php if ($companyProfile!=null) {
                echo $companyProfile[0]['foundation_year'];
              } else {
                echo "Company Foundation Year";
              }
               ?>.
            </li>
          </ul>
        </div>
    </div>
</section>

<?php if ($company_check) { ?>

  <div class="row">
                <div class="col-md-6">

                    <!-- Card -->
                    
                    <!-- Card -->
                     <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('Home/Announcement_page'));?>" >
                        View Announcement
       
                         </a>
                      </div>
                </div>
               
            </div>
             <?php } ?>
