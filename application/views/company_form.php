 <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
<div class="mdl-grid site-max-width">
  <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
    <div class="mdl-card__title">
      <!--<h2 class="mdl-card__title-text">Are you already have CV?</h2>-->
    </div>
    <div class="mdl-card__supporting-text">
      you can add your company here:
    </div>
    <div class="mdl-card__actions mdl-card-">
      <!-- cv Form -->
      <div id="Form">
        <!-- <div id="triangle"></div> -->
          <form id="multiphase" action="<?php echo base_url();?>index.php/home/Company_profile" method="post">
            <div id="phase1">
              <div class="row">
                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">

                          <input type="text" name="ar_com_name" id="ar_com_name" class="form-control">

                          <label for="ar_com_name" class="">Company Name (Arabic)</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>

              <div class="row">
                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">

                          <input type="text" name="en_com_name" id="en_com_name" class="form-control">

                          <label for="en_com_name" class="">Company Name (English)</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>

              <div class="row">
                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">
                          <input type="text" id="com_desc" name="com_desc" class="form-control">
                          <label for="com_desc" class="">Company Descriptioin</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>

              <!--professional field need modify to select -->

              <div class="row">
              <!--Grid column-->
                <div class="col-md-10 mb-4">
                  <div class="md-form">
                    <!-- <p>Professional Field of The Company</p> -->
                    <select id="com_field" name="com_field" class="mdb-select colorful-select dropdown-primary">
                      <option value="0">Choose ...</option>
                      <option value="designing">Designing</option>
                      <option value="information technology">Information Technology</option>
                      <option value="electrical engineering">Electrical Engineering</option>
                      <option value="transportation company">Transportation Company</option>
                      <option value="financial services and exchange">Financial Services and Exchange</option>
                      <option value="marketing">Marketing</option>
                      <option value="Sales">Sales</option>
                      <option value="telecom">Telecom</option>
                      <option value="food industry">Food Industry</option>
                      <option value="accounting work">Accounting Work</option>
                      <option value="plastic industry">Plastic Industry</option>
                      <option value="administrative works">Administrative Works</option>
                      <option value="secretarial">Secretarial</option>
                      </select>
                      <label for="com_field" class="">Professional Field of The Company</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                      <?php $year=2019;?>
                      <!-- <p>The Year of Foundation</p> -->
                      <select id='com_year' name='com_year'  class="mdb-select colorful-select dropdown-primary">
                      <option value="0">Year</option>
                      <?php 
                      for ($i = 0; $i <= 117; $i++) {
                      $year=$year-1;
                      echo "<option value='.$year.'>$year</option>";
                      }?>
                      </select>
                      <label for="com_year" class="">The Year of Foundation</label>
                    </div>
                  </div>
                </div>

              <div class="row">
                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">
                          <input type="text" id="com_owner" name="com_owner" class="form-control">
                          <label for="com_owner" class="">The Owner of Company</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>

              <div class="row">
                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">
                          <input type="text" id="com_country" name="com_country" class="form-control">
                          <label for="com_country" class="">Country</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>
                
              <div class="row">

                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">
                          <input type="text" id="com_city" name="com_city" class="form-control">
                          <label for="com_city" class="">City</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>

              <div class="row">

                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">
                          <input type="text" id="com_address" name="com_address" class="form-control">
                          <label for="com_address" class="">Address</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>
            
              <div class="row">

                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">
                          <input type="email" id="com_email" name="com_email" class="form-control">
                          <label for="com_email" class="">Email</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>
            
              <div class="row">
                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">
                          <input type="text" id="com_phone" name="com_phone" class="form-control">
                          <label for="com_phone" class="">Phone Number</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>

              <div class="row">
                  <!--Grid column-->
                  <div class="col-md-10 mb-4">
                      <div class="md-form">
                          <input type="text" id="com_website" name="com_website" class="form-control">
                          <label for="com_website" class="">Web Site</label>
                      </div>
                  </div>
                  <!--Grid column-->
              </div>
              <div style="float: right;">
                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Save" />  
              </div>
              
            </div>
          </form>

        <!-- end form -->
        </div>  
    </div>
  </div>
</div>