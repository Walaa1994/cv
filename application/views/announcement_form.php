<!DOCTYPE html>
<html>

<head>
  <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  <meta charset="UTF-8">
  <title>Announcement Form</title>

  <style>
    form#multiphase > #phase2, #phase3, #phase4{ display:none; }
  </style>

  <script>
    function _(x){
      return document.getElementById(x);
    }
    function processPhase1(){
        _("phase1").style.display = "none";
        _("phase2").style.display = "block";
        _("progressBar").value = 50;
        _("status").innerHTML = "Phase 2 of 4";
    }
    function processPhase2(){
        _("phase2").style.display = "none";
        _("phase3").style.display = "block";
        _("progressBar").value = 75;
        _("status").innerHTML = "Phase 3 of 4";
    }
    function processPhase3(){
        _("phase3").style.display = "none";
        _("phase4").style.display = "block";
        _("progressBar").value = 100;
        _("status").innerHTML = "Phase 4 of 4";
    }
    function backPhase2(){
        _("phase2").style.display = "none";
        _("phase1").style.display = "block";
        _("progressBar").value = 25;
        _("status").innerHTML = "Phase 1 of 4";
    }
    function backPhase3(){
        _("phase3").style.display = "none";
        _("phase2").style.display = "block";
        _("progressBar").value = 50;
        _("status").innerHTML = "Phase 2 of 4";
    }
    function backPhase4(){
        _("phase4").style.display = "none";
        _("phase3").style.display = "block";
        _("progressBar").value = 75;
        _("status").innerHTML = "Phase 3 of 4";
    }
    function submitForm(){
        _("multiphase").method = "post";
        _("multiphase").action = '<?php echo base_url();?>index.php/company/AnnouncementInfo';
        _("multiphase").submit();
    }
  </script>
</head>

<body>
<div id="form">
  <div id="triangle"></div>
  <form id="multiphase" onsubmit="return false">
  <progress id="progressBar" value="25" max="100" style="width:250px;"></progress>
  <h3 id="status">Phase 1 of 4</h3>
    <!-- start phase1 -->
    <div id="phase1">
      <h3>Basic Information</h3>
      <div>
        <p>Job Title</p>
        <input type="job_title" id="job_title" name="job_title"/>
      </div>

      <div>
        <p>Job Mode</p>
        <select id="select" name="Job_Mode">
          <option value="0">Choose ...</option>
          <option value="full time">Full Time</option>
          <option value="part time">Part Time</option>
        </select>
      </div>

      <div>
        <p>Employment Type</p>
        <select id="select" name="employment_type">
          <option value="0">Choose ...</option>
          <option value="Emplyee">Employee</option>
          <option value="Contractor">Contractor</option>
          <option value="Intern">Intern</option>
        </select>
      </div>

      <div>
        <p>Salary</p>  
        <input type="salary" id="salary" name="salary"/>
      </div>

      <h3>Personal Information</h3>
      <div>
      <p>Locality</p>
      <input type="locality" id="locality" name="locality"/>
      </div>

      <button id="next" onclick="processPhase1()">Next</button>
    </div>
    <!-- end phase1 -->  

    <!-- start phase2 -->
    <div id="phase2">
      <h3>Education</h3>
      <div class="table-responsive">
        <table class="table table-bordered" id="crud_table_education">
          <tr>
            <th width="25%">Certificate Name</th>
            <th width="25%">Specialization Name</th>
            <th width="45%">Degree Type</th>
            <th width="5%"></th>
          </tr>

          <tr>
            <td>
              <input type="cert_name" id="cert_name" name="cert_name[]"/>
            </td>
            <td>
                <input type="spe_name" id="spe_name" name="spe_name[]"/>
            </td>
            <td>
              <select id="select" name="degreeType[]">
                  <option value="">choose ...</option>
                  <option value="EduHighSchool">High School</option>
                  <option value="EduVocational">Vocational</option>
                  <option value="EduCollegeCoursework">College Coursework</option>
                  <option value="EduBachelor">Bachelorl</option>
                  <option value="EduMaster">Master</option>
                  <option value="EduDoctorate">Doctorate</option>
                  <option value="EduAssociate">Associate</option>
                  <option value="EduProfessional">Professional</option>
              </select>
            </td>
          </tr>
        </table>
        <div align="right">
         <button type="button" name="add" id="add_education_info" class="btn btn-success btn-xs">+</button>
        </div>
      </div>

      <script>
        $(document).ready(function(){
         var count = 1;
         $('#add_education_info').click(function(){
          count = count + 1;
          var html_code = "<tr id='row"+count+"'>";
           html_code += "<td><input type='cert_name' id='cert_name' name='cert_name[]'/></td>";
           html_code += "<td><input type='spe_name' id='spe_name' name='spe_name[]'/></td>";
           html_code += '<td><select id="select" name="degreeType[]"><option value="">choose ...</option><option value="EduHighSchool">High School</option><option value="EduVocational">Vocational</option><option value="EduCollegeCoursework">College Coursework</option><option value="EduBachelor">Bachelorl</option><option value="EduMaster">Master</option><option value="EduDoctorate">Doctorate</option><option value="EduAssociate">Associate</option><option value=" EduProfessional">Professional</option></select></td>';
           html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
           html_code += "</tr>";  
           $('#crud_table_education').append(html_code);
           
         });
         });

         $(document).on('click', '.remove', function(){
          var delete_row = $(this).data("row");
          $('#' + delete_row).remove();
         });
      </script>
      
      <button id="previous" onclick="backPhase2()">Previous</button>
      <button id="next" onclick="processPhase2()">Next</button>
    </div>
    <!-- end phase2 -->

    <!-- start phase3 -->
    <div id="phase3">
      <h3>Personal Skills</h3>
      <div class="table-responsive">
        <table class="table table-bordered" id="crud_table_skill">
          <tr>
            <th width="50%">Skill Name</th>
            <th width="50%">Years of experience</th>
          </tr>

          <tr>
            <td>
              <input type="skill_name" id="skill_name" name="skill_name[]"/>
            </td>
            <td>
             <input type="year_exp" id="year_exp" name="year_exp[]"/>
            </td>
          </tr>
        </table>
        <div align="right">
          <button type="button" name="add" id="add_skill_info" class="btn btn-success btn-xs">+</button>
        </div>
      </div>
      <script>
        $(document).ready(function(){
         var count = 1;
         $('#add_skill_info').click(function(){
          count = count + 1;
          var html_code = "<tr id='row"+count+"'>";
           html_code += "<td><input type='skill_name' id='skill_name' name='skill_name[]'/></td>";
           html_code += "<td><input type='year_exp' id='year_exp' name='year_exp[]'/></td>";
           html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
           html_code += "</tr>";  
           $('#crud_table_skill').append(html_code);   
         });
         });
        $(document).on('click', '.remove', function(){
          var delete_row = $(this).data("row");
          $('#' + delete_row).remove();
         });
      </script>
      
      <button id="previous" onclick="backPhase3()">Previous</button>
      <button id="next" onclick="processPhase3()">Next</button>
    </div>
    <!-- end phase3 -->

    <!-- start phase4 -->
    <div id="phase4">
      <h3>Languages</h3>
      <div class="table-responsive">
        <table class="table table-bordered" id="crud_table_language">
          <tr>
            <th width="95%">Language Name</th>
            <th width="5%"></th>
          </tr>
          <tr>
            <td>
              <input type="Languages_Name" id="Languages_Name" name="Language_Name[]"/>
            </td>
          </tr>
        </table>
        <div align="right">
          <button type="button" name="add" id="add_language_info" class="btn btn-success btn-xs">+</button>
        </div>
        <div>
          <h3>Is Active</h3>
          <input type="radio" id="IsActive" name="IsActive" value="True" >ON<br>
          <input type="radio" id="IsActive" name="IsActive" value="False">OFF<br>        
        </div>
      </div>
      <script>
        $(document).ready(function(){
         var count = 1;
         $('#add_language_info').click(function(){
          count = count + 1;
          var html_code = "<tr id='row"+count+"'>";
           html_code += "<td><input type='Languages_Name' id='Languages_Name' name='Language_Name[]'/></td>";
           html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";
           html_code += "</tr>"; 
           $('#crud_table_language').append(html_code);       
         });
         });
         $(document).on('click', '.remove', function(){
          var delete_row = $(this).data("row");
          $('#' + delete_row).remove();
         });
      </script>
      <button id="previous" onclick="backPhase4()">Previous</button>
      <button id="next" onclick="submitForm()">Save</button>
    </div>
    <!-- end phase4 -->
  </form>
</div>
  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>
</body>
</html>