<!DOCTYPE html>
<html>

<head>
  <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  <meta charset="UTF-8">
  <title>Announcement Form</title>

  <style>
    form#multiphase > #phase2, #phase3, #phase4, #phase5{ display:none; }
  </style>

  <script>
    function _(x){
      return document.getElementById(x);
    }
    function processPhase1(){
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 40;
    _("status").innerHTML = "Phase 2 of 5";
}
function processPhase2(){
    _("phase2").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 60;
    _("status").innerHTML = "Phase 3 of 5";
}
function processPhase3(){
    _("phase3").style.display = "none";
    _("phase4").style.display = "block";
    _("progressBar").value = 80;
    _("status").innerHTML = "Phase 4 of 5";
}
function processPhase4(){
    _("phase4").style.display = "none";
    _("phase5").style.display = "block";
    _("progressBar").value = 100;
    _("status").innerHTML = "Phase 5 of 5";
}
function backPhase2(){
    _("phase2").style.display = "none";
    _("phase1").style.display = "block";
    _("progressBar").value = 20;
    _("status").innerHTML = "Phase 1 of 5";
}
function backPhase3(){
    _("phase3").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 40;
    _("status").innerHTML = "Phase 2 of 5";
}
function backPhase4(){
    _("phase4").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 60;
    _("status").innerHTML = "Phase 3 of 5";
}
function backPhase5(){
    _("phase5").style.display = "none";
    _("phase4").style.display = "block";
    _("progressBar").value = 80;
    _("status").innerHTML = "Phase 4 of 5";
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
  <progress id="progressBar" value="33" max="100" style="width:250px;"></progress>
      <h3 id="status">Phase 1 of 5</h3>
    <!-- start phase1 -->
    <div id="phase1">
      <h3>Basic Information</h3>
      <div>
        <p>Is Active</p>
        <select id="select" name="Is_Active">
        <option value="">choose ...</option>
        <option value="True">ON</option>
        <option value="False">OFF</option>
        </select>
        </div>
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
          <option value="Emplyee">Emplyee</option>
          <option value="Contractor">Contractor</option>
          <option value="Intern">Intern</option>
        </select>
      </div>

      <div>
        <p>Salary(optional)</p>  
        <input style="width:40%;" type="salary" id="salary" name="salary"/>
        <span>per</span>
        <select style="width:40%;" id=select name=salary_per>
          <option value="0">Choose ...</option>
          <option value="hour">Hour</option>
          <option value="month">Month</option>
        </select>
      </div>

      <input style="margin-bottom: 20px;" type="checkbox" name="privacy" value="public">Make this announcemnt public for seekers<br>

      <button id="next" onclick="processPhase1()">Next</button>
    </div>
    <!-- end phase1 -->

    <!-- start phase2 -->
    <div id="phase2">
      <h3>Personal Information</h3>
      <div>
      <p>Locality</p>
      <input type="locality" id="locality" name="locality"/>
      </div>
      
      <button id="previous" onclick="backPhase2()">Previous</button>
      <button id="next" onclick="processPhase2()">Next</button>
    </div>
    <!-- end phase2 -->

    <!-- start phase3 -->
    <div id="phase3">
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
                      <option value="EduHighSchool">EduHighSchool</option>
                      <option value="EduVocational">EduVocational</option>
                      <option value="EduCollegeCoursework">EduCollegeCoursework</option>
                      <option value="EduBachelor">EduBachelorl</option>
                      <option value="EduMaster">EduMaster</option>
                      <option value="EduDoctorate">EduDoctorate</option>
                      <option value="EduAssociate">EduAssociate</option>
                      <option value=" EduProfessional"> EduProfessional</option>
                          
                      </select>
              </td>
              <td></td>
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
           html_code += '<td><select id="select" name="degreeType[]"><option value="">choose ...</option><option value="EduHighSchool">EduHighSchool</option><option value="EduVocational">EduVocational</option><option value="EduCollegeCoursework">EduCollegeCoursework</option><option value="EduBachelor">EduBachelorl</option><option value="EduMaster">EduMaster</option><option value="EduDoctorate">EduDoctorate</option><option value="EduAssociate">EduAssociate</option><option value=" EduProfessional"> EduProfessional</option></select></td>';
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
      
      <button id="previous" onclick="backPhase3()">Previous</button>
      <button id="next" onclick="processPhase3()">Next</button>
    </div>
    <!-- end phase3 -->

    <!-- start phase4 -->
    <div id="phase4">
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
      <select id="select" name="year_exp[]">
      <option value="">choose ...</option>
      <option value="less than 1 year">less than 1 year</option>
      <option value="1 year">1 year</option>
      <option value="more than 1 year">more than 1 year</option>
      <option value="2 year">2 year</option>
      <option value="more than 2 year">more than 2 year</option>
      <option value="3 year">3 year</option>
      <option value="more than 3 year">more than 3 year</option>
      </select>
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
           html_code += "<td><select id='select' name='year_exp[]'><option value="">choose ...</option><option value='less than 1 year'>less than 1 year</option><option value='1 year'>1 year</option><option value='more than 1 year'>more than 1 year</option><option value='2 year'>2 year</option><option value='more than 2 year'>more than 2 year</option><option value='3 year'>3 year</option><option value='more than 3 year'>more than 3 year</option></select></td>";
  
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
      
      
      <button id="previous" onclick="backPhase4()">Previous</button>
      <button id="next" onclick="processPhase4()">Next</button>
    </div>
    <!-- end phase4 -->

    <!-- start phase5 -->
    <div id="phase5">
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
        <td></td>
        </tr>
        </table>
        <div align="right">
             <button type="button" name="add" id="add_language_info" class="btn btn-success btn-xs">+</button>
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
    <!-- end phase5 -->
  </form>
</div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>

  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>


  

</body>

</html>