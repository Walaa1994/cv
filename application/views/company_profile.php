<div class="mdl-grid site-max-width">
	<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
    <div class="cpmoany-profile-cover">
      
    </div>
    <div class="mdl-card__supporting-text">
      you can add your company and all infomation .
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('Company/AddCompany'));?>" target="_blank">
        Add Company Information
      </a>
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('Company/AddAnnouncement'));?>" target="_blank">
        Add Announcement .
      </a>
    </div>
  </div>
</div>

<section class="section--center mdl-grid site-max-width">
  <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white  mdl-shadow--4dp" style="background-color: #DCDDE2!important;">
  <img src="<?php echo base_url();?>/assets/img/company-icon.png">
   <!--  <i class="fa fa-building fa-5x" style="color: black" aria-hidden="true"></i> -->
  </header>
  <?php foreach ($companyProfile as  $value) { ?>
  <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone  mdl-shadow--4dp">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><?php echo $value['en_name'];?></h2>
    </div>
    <div class="mdl-card__supporting-text">
      <?php echo $value['ar_name']; ?>
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
              City : <?php echo $value['city'];?> .  
            </li>
            <li>
              Country : <?php echo $value['country'];?>.
            </li>
            <li>
              Address : <?php echo $value['address'];?>.
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
             Descriptioin : <?php echo $value['description'];?>.  
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
              Professional Field of The Company : <?php echo $value['prof_field'];?>.  
            </li>
            <li>
              The Year of Foundation : <?php echo $value['foundation_year'];?>.
            </li>
          </ul>
        </div>
    </div>
</section>
<?php } ?>



  <div class="row">
                <div class="col-md-6">

                    <!-- Card -->
                    <div class="card card-image mb-3" style="background-image: url('https://mdbootstrap.com/img/Photos/Categories/Components/img(10).jpg');">

                        <!-- Content -->
                        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                            <div>
                                <h5 class="pink-text">
                                    <i class="fa fa-bullhorn"></i> Marketing</h5>
                                <h3 class="card-title pt-2">
                                    <strong>This is card title</strong>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                                    optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                                    Odit sed qui, dolorum!.</p>
                                <a href="<?php echo(site_url('Home/OneAnnouncement_page'));?>" class="btn btn-pink waves-effect waves-light">
                                    <i class="fa fa-clone left"></i> View More</a>
                            </div>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Card -->
                     <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="<?php echo(site_url('Home/Announcement_page'));?>" target="_blank">
                        View More
       
                         </a>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-image mb-3" style="background-image: url('https://mdbootstrap.com/img/Photos/Categories/Components/img(10).jpg');">
                        <div class="text-white text-center d-flex align-items-center rgba-indigo-strong py-5 px-4">
                            <div>
                                <h5 class="orange-text">
                                    <i class="fa fa-bullhorn"></i> Software</h5>
                                <h3 class="card-title pt-2">
                                    <strong>This is card title</strong>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                                    optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                                    Odit sed qui, dolorum!.</p>
                                <a href="<?php echo(site_url('Home/OneAnnouncement_page'));?>" class="btn btn-deep-orange waves-effect waves-light">
                                    <i  class="fa fa-clone left"></i> View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
