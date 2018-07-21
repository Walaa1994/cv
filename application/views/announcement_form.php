 <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  <style>
form#multiphase > #phase2, #phase3, #phase4{ display:none; }
</style>
  <script>
 $(document).ready(function () {
 $(".mdb-select").formSelect();
  });
                   
function _(x){
  return document.getElementById(x);
}
function processPhase1(){
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 32;
    _("status").innerHTML = "Phase 2 of 4";
}
function processPhase2(){
    _("phase2").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 48;
    _("status").innerHTML = "Phase 3 of 4";
}
function processPhase3(){
    _("phase3").style.display = "none";
    _("phase4").style.display = "block";
    _("progressBar").value = 64;
    _("status").innerHTML = "Phase 4 of 4";
}
/*
function processPhase4(){
    _("phase4").style.display = "none";
    _("phase5").style.display = "block";
    _("progressBar").value = 80;
    _("status").innerHTML = "Phase 5 of 6";
}
function processPhase5(){
    _("phase5").style.display = "none";
    _("phase6").style.display = "block";
    _("progressBar").value = 100;
    _("status").innerHTML = "Phase 6 of 6";
}*/
function backPhase2(){
    _("phase2").style.display = "none";
    _("phase1").style.display = "block";
    _("progressBar").value = 16;
    _("status").innerHTML = "Phase 1 of 4";
}
function backPhase3(){
    _("phase3").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 32;
    _("status").innerHTML = "Phase 2 of 4";
}
function backPhase4(){
    _("phase4").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 48;
    _("status").innerHTML = "Phase 3 of 4";
}
function backPhase5(){
    _("phase5").style.display = "none";
    _("phase4").style.display = "block";
    _("progressBar").value = 64;
    _("status").innerHTML = "Phase 4 of 4";
}/*
function backPhase6(){
    _("phase6").style.display = "none";
    _("phase5").style.display = "block";
    _("progressBar").value = 80;
    _("status").innerHTML = "Phase 5 of 6";
}*/
function submitForm(){
    _("multiphase").method = "post";
    _("multiphase").action = '<?php echo base_url();?>index.php/company/AnnouncementInfo';
    _("multiphase").submit();
}

//add new record
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 1;
    $("#AddNewRecord").click(function(e){debugger;
        $("#more_feild").append($("#education_block").html()+'<hr>');
       next++;
    });

    //add row
    var count_education = 1;
   $('#add_education_info').click(function(){
    count_education = count_education + 1;
    var html_code = "<tr id='row"+count_education+"'>";
     html_code += "<td><input type='text' id='cert_name' name='cert_name[]' class='form-control'/></td>";
     html_code += "<td><input type='text' id='spe_name' name='spe_name[]' class='form-control'/></td>";
     //html_code += "<td><input type='date' id='start_date' name='start_date[]' class='form-control'/></td>";
     //html_code += "<td><input type='date' id='grants_date' name='grants_date[]' class='form-control'/></td>";
     //html_code += "<td><input type='text' id='donor' name='donor[]' class='form-control'/></td>";
     html_code += '<td><select name="degreeType[]" class="form-control mdb-select colorful-select dropdown-primary"><option value="">choose ...</option><option value="EduHighSchool">High School</option><option value="EduVocational">Vocational</option><option value="EduCollegeCoursework">College Coursework</option><option value="EduBachelor">Bachelor</option><option value="EduMaster">Master</option><option value="EduDoctorate">Doctorate</option><option value="EduAssociate">Associate</option><option value=" EduProfessional">Professional</option></select></td>';
     html_code += "<td><a class='btn-floating btn-sm btn-danger my-0 waves-effect waves-light remove'  name='remove' data-row='row"+count_education+"'><i class='fa fa-times'></i></a></td>";   
     html_code += "</tr>";
     $('#crud_table_education').append(html_code);
      $(".mdb-select").formSelect();
  
   });
       
     //experiance
     count_experience=1;
     $('#add_experience_info').click(function(){debugger;
        count_experience = count_experience + 1;
        var html_code = "<tr id='row"+count_experience+"'>";
         html_code += "<td><input type='text' id='company_name' name='company_name[]' class='form-control'/></td>";
         html_code += "<td><input type='text' id='job_pos' name='job_pos[]' class='form-control'/></td>";
         html_code += "<td> <input type='date' id='from_date' name='from_date[]' class='form-control'/></td>";
         html_code += "<td><input type='date' id='to_date' name='to_date[]' class='form-control'/></td>";
         html_code += '<td><select id="select" name="careerLevel[]"><option value="">choose ...</option><option value="HighSchool">Student (high school)</option><option value="Student">Student (graduate/undergraduate)</option><option value="EntryLvl">Entry level (less than 2 years of experience)</option><option value="MidCareer">Mid-career (2+ years of experience)</option><option value="Management">Management (manager/director of staff)</option><option value="Executive">Executive (SVP, EVP, VP)</option><option value="SeniorExecutive">Senior Executive (president / CEO)</option>  </select></td>';
         html_code += '<td><select id="select" name="JobType[]"><option value="">choose ...</option><option value="Emplyee">Employee</option><option value="Contractor">Contractor</option><option value="Intern">Intern</option></select></td>';
         html_code += '<td><select id="select" name="IsCurrent[]"><option value="">choose ...</option><option value="True">ON</option><option value="False">OFF</option></select></td>';
         html_code += "<td><a class='btn-floating btn-sm btn-danger my-0 waves-effect waves-light remove'  name='remove' data-row='row"+count_experience+"'><i class='fa fa-times'></i></a></td>";   
         html_code += "</tr>";  
         $('#crud_table_experience').append(html_code);  

       });

       //add skills
       count_skills=1;  
     $('#add_skill_info').click(function(){debugger;
          count_skills = count_skills + 1;
          var html_code = "<tr id='row"+count_skills+"'>";
           html_code += "<td><input type='text'id='skill_name' name='skill_name[]' class='form-control'/></td>";
           html_code += "<td><input type='text'id='year_exp' name='year_exp[]' class='form-control'/></td>";
           html_code += "<td><select id='select' name='SkillLevel[]'><option value=''>choose ...</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4 year'>4</option>option value='5'>5</option> </select></td>";
           html_code += "<td><a class='btn-floating btn-sm btn-danger my-0 waves-effect waves-light remove'  name='remove' data-row='row"+count_skills+"'><i class='fa fa-times'></i></a></td>";   
           html_code += "</tr>";  
           $('#crud_table_skill').append(html_code);
         });

     //add languages
       count_languages=1;  
     $('#add_lang_info').click(function(){debugger;
          count_languages = count_languages + 1;
          var html_code = "<tr id='row"+count_languages+"'>";


            html_code += "<td><input type='text' id='Language_Name' name='Language_Name[]' class='form-control'/></td>";
           html_code += "<td><select id='select' name='Spoken_Level[]'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><select id='select' name='Reading_Level[]'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><select id='select' name='Writing_Level[]'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><a class='btn-floating btn-sm btn-danger my-0 waves-effect waves-light remove'  name='remove' data-row='row"+count_languages+"'><i class='fa fa-times'></i></a></td>";   
           html_code += "</tr>";  
           $('#crud_table_lang').append(html_code);
         });


});
    $(document).on('click', '.remove', function(){
      var delete_row = $(this).data("row");
      $('#' + delete_row).remove();
     });
</script>
<div class="mdl-grid site-max-width">
  <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
    <div class="mdl-card__title">
      <!--<h2 class="mdl-card__title-text">Are you already have CV?</h2>-->
    </div>
    <div class="mdl-card__supporting-text">
      you can upload your cv and all data extract and re-stract with professional cv.
    </div>
    <div class="mdl-card__actions mdl-card-">
      <!-- cv Form -->
      <div id="Form">
        <!-- <div id="triangle"></div> -->
        <form id="multiphase" onsubmit="return false">
            <progress id="progressBar" value="16" max="100" style="width:250px;"></progress>
            <h3 id="status">Phase 1 of 4</h3>
          <!-- start phase1 -->
          <div id="phase1">
            <h3>Basic Information</h3>
            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="job_title" name="job_title" class="form-control">
                        <label for="job_title" class="">Job Title</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
      <div class="row">
              <div class="col-md-10 mb-4">
                <p id="radio_marital">Job Mode</p>
                    <fieldset class="form-check">
                        <input class="form-check-input" name="Job_Mode" type="radio" id="radio1" checked="checked" value="Full-Time">
                        <label class="form-check-label" for="radio1">Full Time</label>
                    </fieldset>

                    <fieldset class="form-check">
                        <input class="form-check-input" name="Job_Mode" type="radio" id="radio2" value="Part- Time">
                        <label class="form-check-label" for="radio2">Part Time</label>
                    </fieldset>

                </div>
            </div>


            <div class="row">
              <div class="col-md-10 mb-4">
                <p id="radio_marital">Employment Type</p>
                    <fieldset class="form-check">
                        <input class="form-check-input" name="employment_type" type="radio" id="radio3" checked="checked" value="Emplyee">
                        <label class="form-check-label" for="radio3">Employee</label>
                    </fieldset>

                    <fieldset class="form-check">
                        <input class="form-check-input" name="employment_type" type="radio" id="radio4" value="Contractor">
                        <label class="form-check-label" for="radio4">Contractor</label>
                    </fieldset>

                    <fieldset class="form-check">
                        <input class="form-check-input" name="employment_type" type="radio" id="radio5" value="Intern">
                        <label class="form-check-label" for="radio5">Intern</label>
                    </fieldset>

                </div>
            </div>

            

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="salary" name="salary" class="form-control">
                        <label for="salary" class="">Salary</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="locality" name="locality" class="form-control">
                        <label for="locality" class="">Locality</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
         
            <!-- <button class="btn peach-gradient btn-sm waves-effect waves-light">
                Next
            </button> -->
            <div style="margin: 0 auto;">
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light">
                  
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="processPhase1()">
                  <i class="fa fa-forward"></i>
              </a>
            </div>
          </div>
          <!-- end phase1 -->
        
          <!-- start phase2 -->  
          <div id="phase2">
            <h3>Education</h3>
            <div class="table-responsive">
              <table class="table table-bordered" id="crud_table_education">
                <tr>
                  <th width="30%">Certificate Name</th>
                  <th width="30%">Specialization Name</th>
                  <th width="35%">Degree Type</th>
                  <th width="5%"></th>
                </tr>
                <tr> 
                  <td>
                      <input type="text" id="Nationality" class="form-control" name="cert_name[]">
                  </td>
                  <td>
                    <input type="text" id="spe_name" name="spe_name[]" class="form-control"/>
                  </td>
                  <td>
                    <select  name="degreeType[]" class="form-control mdb-select colorful-select dropdown-primary">
                      <option value="">choose ...</option>
                      <option value="EduHighSchool">High School</option>
                      <option value="EduVocational">Vocational</option>
                      <option value="EduCollegeCoursework">College Coursework</option>
                      <option value="EduBachelor">Bachelor</option>
                      <option value="EduMaster">Master</option>
                      <option value="EduDoctorate">Doctorate</option>
                      <option value="EduAssociate">Associate</option>
                      <option value=" EduProfessional">Professional</option>
                    </select>
                  </td>
                  <td></td>
                </tr>
              </table>

              <div align="right">
                <a class="btn-floating btn-sm  btn-success my-0 waves-effect waves-light" name="add" id="add_education_info">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>

            <div>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light"  onclick="backPhase2()">
                  <i class="fa fa-backward"></i>
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="processPhase2()">
                  <i class="fa fa-forward"></i>
              </a>
            </div>

          </div>
          <!-- end phase2 -->

          <!-- start phase3 --> 
          <div id="phase3">
            <h3>Personal Skills</h3>
            <div class="table-responsive">
            <table class="table table-bordered" id="crud_table_experience">
            <tr>
              <th width="50%">Skill Name</th>
              <th width="50%">Years of experience</th>
            
              <!--<th width="5%"></th>-->
            </tr>
            <tr> 
              <td>
                <input type="text" id="skill_name" class="form-control" name="skill_name[]"/>
              </td>
              <td>
                <input type="text" id="year_exp" class="form-control" name="year_exp[]"/>
              </td>           
              <td></td>
            </tr>
            </table>
            <div align="right">
              <a class="btn-floating btn-sm  btn-success my-0 waves-effect waves-light" name="add" id="add_skill_info">
                  <i class="fa fa-plus"></i>
                </a>
            </div>
            </div>
            <div>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="backPhase3()">
                  <i class="fa fa-backward"></i>
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="processPhase3()">
                  <i class="fa fa-forward"></i>
              </a>
            </div>

          </div>
          <!-- end phase3 -->

          
          <!-- start phase4 -->
          <div id="phase4">
            <h3>Languages</h3>
            <div class="table-responsive">
              <table class="table table-bordered" id="crud_table_lang"/>
              <tr>
                <th width="95%">Language Name</th>
                <th width="5%"></th>
              </tr>

              <tr>
                <td><input type="text" id="Language_Name" name="Language_Name[]"  class="form-control"/></td> 
                <td></td>
              </tr>

              <tr>
               
              </tr>
              </table>


              </div>
              <div class="row">
              <div class="col-md-10 mb-4">
                <p id="radio_active">Is Active</p>
                <div class="switch">
                    <label>
                        Off
                        <input type="checkbox" checked="checked" name="IsActive" >
                        <span class="lever"></span> On
                    </label>
                </div>
              </div>
            </div>


             <div>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="backPhase4()">
                  <i class="fa fa-backward"></i>
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="submitForm()">
                  <i class="fa fa-save"></i>
              </a>
            </div>

          </div>
          <!-- end phase4 -->
           
          </form>

      </div>

    </div>
  </div>
</div>