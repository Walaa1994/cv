 <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  <style>
form#multiphase > #phase2, #phase3, #phase4, #phase5, #phase6{ display:none; }
</style>
  <script>
function _(x){
  return document.getElementById(x);
}
function processPhase1(){
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 32;
    _("status").innerHTML = "Phase 2 of 6";
}
function processPhase2(){
    _("phase2").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 48;
    _("status").innerHTML = "Phase 3 of 6";
}
function processPhase3(){
    _("phase3").style.display = "none";
    _("phase4").style.display = "block";
    _("progressBar").value = 64;
    _("status").innerHTML = "Phase 4 of 6";
}
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
}
function backPhase2(){
    _("phase2").style.display = "none";
    _("phase1").style.display = "block";
    _("progressBar").value = 16;
    _("status").innerHTML = "Phase 1 of 6";
}
function backPhase3(){
    _("phase3").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 32;
    _("status").innerHTML = "Phase 2 of 6";
}
function backPhase4(){
    _("phase4").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 48;
    _("status").innerHTML = "Phase 3 of 6";
}
function backPhase5(){
    _("phase5").style.display = "none";
    _("phase4").style.display = "block";
    _("progressBar").value = 64;
    _("status").innerHTML = "Phase 4 of 6";
}
function backPhase6(){
    _("phase6").style.display = "none";
    _("phase5").style.display = "block";
    _("progressBar").value = 80;
    _("status").innerHTML = "Phase 5 of 6";
}
function submitForm(){
    _("multiphase").method = "post";
    _("multiphase").action = '<?php echo base_url();?>index.php/company/create_company';
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
     html_code += "<td><input type='date' id='start_date' name='start_date[]' class='form-control'/></td>";
     html_code += "<td><input type='date' id='grants_date' name='grants_date[]' class='form-control'/></td>";
     html_code += "<td><input type='text' id='donor' name='donor[]' class='form-control'/></td>";
     html_code += '<td><select id="select" name="degreeType[]"><option value="">choose ...</option><option value="EduHighSchool">High School</option><option value="EduVocational">Vocational</option><option value="EduCollegeCoursework">College Coursework</option><option value="EduBachelor">Bachelorl</option><option value="EduMaster">Master</option><option value="EduDoctorate">Doctorate</option><option value="EduAssociate">Associate</option><option value=" EduProfessional">Professional</option></select></td>';
     html_code += "<td><a class='btn-floating btn-sm btn-danger my-0 waves-effect waves-light remove'  name='remove' data-row='row"+count_education+"'><i class='fa fa-times'></i></a></td>";   
     html_code += "</tr>";  
     $('#crud_table_education').append(html_code);  
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
      you can add your company here:
    </div>
    <div class="mdl-card__actions mdl-card-">
      <!-- cv Form -->
      <div id="Form">
        <!-- <div id="triangle"></div> -->
        <form id="multiphase" onsubmit="return false">
            <!--<progress id="progressBar" value="16" max="100" style="width:250px;"></progress>
            <h3 id="status">Phase 1 of 6</h3>-->
          <!-- start phase1 -->
          <div id="phase1">
            <!--<h3>Personal Information</h3>-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="ar_com_name" class="form-control">
                        <label for="ar_com_name" class="">Company Name (Arabic)</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="en_com_name" class="form-control">
                        <label for="en_com_name" class="">Company Name (English)</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="com_desc" class="form-control">
                        <label for="com_desc" class="">Company Descriptioin</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="com_owner" class="form-control">
                        <label for="com_owner" class="">The Owner of Company</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="com_country" class="form-control">
                        <label for="com_country" class="">Country</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
              
            <div class="row">

                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="com_city" class="form-control">
                        <label for="com_city" class="">City</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="com_address" class="form-control">
                        <label for="com_address" class="">Address</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            
            <div class="row">

                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="email" id="com_email" class="form-control">
                        <label for="com_email" class="">Email</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            
            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="com_phone" class="form-control">
                        <label for="com_phone" class="">Phone Number</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="com_website" class="form-control">
                        <label for="com_website" class="">Web Site</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
          </div>
          <!-- end phase1 -->
              <a type="button" style="margin-left: 70px;" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="submitForm()">
                  <i class="fa fa-save"></i>
              </a>
        </form>
      </div>
    </div>
  </div>
</div>