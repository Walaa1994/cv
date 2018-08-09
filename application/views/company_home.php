
    <script>  
      $(document).ready(function () {
          $(".mdb-select").formSelect();
        });
      function taggle(){
          
          if($("#advance_search").css("display")=="none")
            $("#advance_search").css("display","inline-flex");
          else
            $("#advance_search").css("display","none");
        }
    </script>
  <form action="<?php echo base_url().'index.php/home/company_search';?>" method="post">
      <div class="col-md-10 mb-4">
        <div class="md-form" style="display: inline-flex;width: 100%;">
          <input type="text" name="cert_name" id="cert_name" class="form-control">
          <label for="cert_name" class="">Certificate Name</label>
          <div>
            <input type="submit" value="Search" class="fa fa-search">
              <!-- <i class="fa fa-search"> </i> -->
            </input>
            <a href="#" id="more" class="fa-lg p-2 m-2" onclick="taggle();">
             <i class="fa fa-bars" style="color: #000;"> </i>
            </a>
          </div>

        </div>
      <div class="row" id="advance_search" style="margin-top: 0px;display: none;">
    <div class="col-md-3 mb-3">
          <div class="md-form">
              <input type="text" name="locality" id="locality" class="form-control">
              <label for="locality" class="">Locality</label>
          </div>
        </div>
    <div class="col-md-3 mb-3">
          <select name="degreeType" class="mdb-select colorful-select dropdown-primary">
            <option value="" >choose ...</option>
            <option value="EduHighSchool">High School</option>
            <option value="EduVocational">Vocational</option>
            <option value="EduCollegeCoursework">College Coursework</option>
            <option value="EduBachelor">Bachelor</option>
            <option value="EduMaster">Master</option>
            <option value="EduDoctorate">Doctorate</option>
            <option value="EduAssociate">Associate</option>
            <option value=" EduProfessional">Professional</option>
           </select>
         </div>
         <div class="col-md-3 mb-3">
            <select name="marital_state" class="mdb-select colorful-select dropdown-primary">
            <option value="" >choose ...</option>
            <option value="Married">Married</option>
            <option value="Divorced">Divorced</option>
            <option value="Single">Single</option>
            <option value="Widowed">Widowed</option>
            </select>
         </div>
         <div class="col-md-3 mb-3">
          <div class="md-form">
              <input type="text" name="job_Title" id="job_Title" class="form-control">
              <label for="job_Title" class="">Job Title</label>
          </div>
        </div>  
      </div>
      </div>
</form>
  <?php $this->load->view('cv-view',$result);?>

