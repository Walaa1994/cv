
    <script>  
      $(document).ready(function () {
          $(".mdb-select").formSelect();
        });
      function taggle(){
          debugger;
          if($("#advance_search").css("display")=="none")
            $("#advance_search").css("display","inline-flex");
          else
            $("#advance_search").css("display","none");
        }
    </script>
  <form action="<?php echo base_url().'index.php/home/seeker_search';?>" method="post">
      <div class="col-md-10 mb-4">
        <div class="md-form" style="display: inline-flex;width: 100%;">
          <input type="text"  id="job_title" name="job_title" class="form-control">
          <label for="job_title" class="">Job Title</label>
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
          <select name="job_mode" class="mdb-select colorful-select dropdown-primary">
          <option value="">Choose Job Mode</option>
          <option value="Full-Time">Full Time</option>
          <option value="Part-Time">Part Time</option>
          </select>
         </div>
         <div class="col-md-3 mb-3">
            <select name="job_type" class="mdb-select colorful-select dropdown-primary">
            <option value="">Choose Job Type</option>
            <option value="Emplyee">Employee</option>
            <option value="Contractor">Contractor</option>
            <option value="Inter">Inter</option>
            </select>
         </div>
        <div class="col-md-3 mb-3">
          <div class="md-form">
              <input type="text" name="salary" id="salary" class="form-control">
              <label for="salary" class="">Salary</label>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="md-form">
              <input type="text" name="locality" id="locality" class="form-control">
              <label for="locality" class="">Locality</label>
          </div>
        </div>
      </div>
      </div>
</form>

  <?php $this->load->view('announcement_search',$result);?>
