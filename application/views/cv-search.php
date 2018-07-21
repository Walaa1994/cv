    <script>  
      $(document).ready(function () {
          $(".mdb-select").formSelect();
        });
    </script>
<form action="<?php echo base_url().'index.php/seeker/CV_search';?>" method="post">
    <div class="col-md-10 mb-4">
    <div class="md-form">
        <input type="text" id="cert_name" name="cert_name" class="form-control">
        <label for="cert_name" class="">Certificate Name</label>
    </div>
  </div>

   <div class="col-md-10 mb-4">
        <div class="md-form">
            <input type="text" name="locality" id="locality" class="form-control">
            <label for="locality" class="">Locality</label>
        </div>
    </div>

    <div>
    <select name="degreeType" class="mdb-select colorful-select dropdown-primary">
     <option value="">Choose</option>
     <option value="EduHighSchool">High School</option>
    <option value="EduVocational">Vocational</option>
    <option value="EduCollegeCoursework">College Coursework</option>
    <option value="EduBachelor">Bachelor</option>
    <option value="EduMaster">Master</option>
    <option value="EduDoctorate">Doctorate</option>
    <option value="EduAssociate">Associate</option>
    <option value=" EduProfessional">Professional</option>
    </select>

    <select name="marital_state" class="mdb-select colorful-select dropdown-primary">
     <option value="">Choose</option>
     <option value="Married">Married</option>
     <option value="Divorced">Divorced</option>
     <option value="Single">Single</option>
     <option value="Widowed">Widowed</option>
    </select>    
    </div>

    <div class="col-md-10 mb-4">
        <div class="md-form">
            <input type="text" name="Jop_Title" id="Jop_Title" class="form-control">
            <label for="Jop_Title" class="">Jop Title</label>
        </div>
    </div>
    <div class="col-md-10 mb-4">
        <div class="md-form">
            <input type="number" name="Experience_Level" id="Experience_Level" class="form-control">
            <label for="Experience_Level" class="">Experience Level</label>
        </div>
    </div>

    <div class="mdl-card__actions  mdl-card--border">
      <input type="submit" value="Find CVs" />
    </div>
</form>

 <!-- <?php $this->load->view('cv-search',$result);?>-->