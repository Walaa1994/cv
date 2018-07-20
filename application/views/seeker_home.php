    <script>  
      $(document).ready(function () {
          $(".mdb-select").formSelect();
        });
    </script>
<form action="<?php echo base_url().'index.php/home/seeker_search';?>" method="post">
    <div class="col-md-10 mb-4">
    <div class="md-form">
        <input type="text" id="job_title" name="job_title" class="form-control">
        <label for="job_title" class="">Job Title</label>
    </div>
    </div


    <div>
    <select name="job_mode" class="mdb-select colorful-select dropdown-primary">
     <option value="">Choose</option>
     <option value="Full-Time">Full Time</option>
     <option value="Part-Time">Part Time</option>
    </select>

    <select name="job_type" class="mdb-select colorful-select dropdown-primary">
     <option value="">Choose</option>
     <option value="Emplyee">Employee</option>
     <option value="Contractor">Contractor</option>
     <option value="Intern">Inter</option>
    </select>    
    </div>

    <div class="col-md-10 mb-4">
        <div class="md-form">
            <input type="text" name="salary" id="salary" class="form-control">
            <label for="salary" class="">Salary</label>
        </div>
    </div>
    <div class="col-md-10 mb-4">
        <div class="md-form">
            <input type="text" name="locality" id="locality" class="form-control">
            <label for="locality" class="">Locality</label>
        </div>
    </div>

    <div class="mdl-card__actions  mdl-card--border">
      <input type="submit" value="Find CVs" />
    </div>
</form>

  <?php $this->load->view('announcement_search',$result);?>