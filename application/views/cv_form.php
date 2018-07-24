 <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  <style>
form#multiphase > #phase2, #phase3, #phase4, #phase5, #phase6{ display:none; }
</style>
  <script>
function _(x){
  return document.getElementById(x);
}
function processPhase1(){
    debugger;
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    $("#progressBar").attr("aria-valuenow","20") ;
    $("#progressBar").css("width","20%");
    //_("status").innerHTML = "Phase 2 of 6";
}
function processPhase2(){
    _("phase2").style.display = "none";
    _("phase3").style.display = "block";
    $("#progressBar").attr("aria-valuenow","40") ;
    $("#progressBar").css("width","40%");
}
function processPhase3(){
    _("phase3").style.display = "none";
    _("phase4").style.display = "block";
    $("#progressBar").attr("aria-valuenow","60") ;
    $("#progressBar").css("width","60%");
}
function processPhase4(){
    _("phase4").style.display = "none";
    _("phase5").style.display = "block";
    $("#progressBar").attr("aria-valuenow","80") ;
    $("#progressBar").css("width","80%");
}
function processPhase5(){
    _("phase5").style.display = "none";
    _("phase6").style.display = "block";
    $("#progressBar").attr("aria-valuenow","100") ;
    $("#progressBar").css("width","100%");
}
function backPhase2(){
    _("phase2").style.display = "none";
    _("phase1").style.display = "block";
    $("#progressBar").attr("aria-valuenow","0") ;
    $("#progressBar").css("width","0%");
}
function backPhase3(){
    _("phase3").style.display = "none";
    _("phase2").style.display = "block";
    $("#progressBar").attr("aria-valuenow","20") ;
    $("#progressBar").css("width","20%");
}
function backPhase4(){
    _("phase4").style.display = "none";
    _("phase3").style.display = "block";
    $("#progressBar").attr("aria-valuenow","40") ;
    $("#progressBar").css("width","40%");
}
function backPhase5(){
    _("phase5").style.display = "none";
    _("phase4").style.display = "block";
    $("#progressBar").attr("aria-valuenow","60") ;
    $("#progressBar").css("width","60%");
}
function backPhase6(){
    _("phase6").style.display = "none";
    _("phase5").style.display = "block";
    $("#progressBar").attr("aria-valuenow","80") ;
    $("#progressBar").css("width","80%");
}
function submitForm(){
    _("multiphase").method = "post";
    _("multiphase").action = '<?php echo base_url();?>index.php/seeker/CVFormInfo';
    _("multiphase").submit();
}

//add new record

$(document).ready(function () {

  //date time picker
  $('#birth_date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

  //select field
  //$('.mdb-select').material_select();

  $(".mdb-select").formSelect();
/*
   $(document).on("load", ".mdb-select" , function() {
        $(".mdb-select").formSelect();
    });
*/
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
     html_code += '<td><select id="select" name="degreeType[]" class="mdb-select colorful-select dropdown-primary"><option value="">choose ...</option><option value="EduHighSchool">High School</option><option value="EduVocational">Vocational</option><option value="EduCollegeCoursework">College Coursework</option><option value="EduBachelor">Bachelorl</option><option value="EduMaster">Master</option><option value="EduDoctorate">Doctorate</option><option value="EduAssociate">Associate</option><option value=" EduProfessional">Professional</option></select></td>';
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
         html_code += '<td><select id="select" name="careerLevel[]" class="mdb-select colorful-select dropdown-primary"><option value="">choose ...</option><option value="HighSchool">Student (high school)</option><option value="Student">Student (graduate/undergraduate)</option><option value="EntryLvl">Entry level (less than 2 years of experience)</option><option value="MidCareer">Mid-career (2+ years of experience)</option><option value="Management">Management (manager/director of staff)</option><option value="Executive">Executive (SVP, EVP, VP)</option><option value="SeniorExecutive">Senior Executive (president / CEO)</option>  </select></td>';
         html_code += '<td><select id="select" name="JobType[]" class="mdb-select colorful-select dropdown-primary"><option value="">choose ...</option><option value="Emplyee">Employee</option><option value="Contractor">Contractor</option><option value="Intern">Intern</option></select></td>';
         html_code += '<td><select id="select" name="IsCurrent[]" class="mdb-select colorful-select dropdown-primary"><option value="">choose ...</option><option value="True">ON</option><option value="False">OFF</option></select></td>';
         html_code += "<td><a class='btn-floating btn-sm btn-danger my-0 waves-effect waves-light remove'  name='remove' data-row='row"+count_experience+"'><i class='fa fa-times'></i></a></td>";   
         html_code += "</tr>";  
         $('#crud_table_experience').append(html_code);  
         $(".mdb-select").formSelect();        
       });

       //add skills
       count_skills=1;  
     $('#add_skill_info').click(function(){debugger;
          count_skills = count_skills + 1;
          var html_code = "<tr id='row"+count_skills+"'>";
           html_code += "<td><input type='text'id='skill_name' name='skill_name[]' class='form-control'/></td>";
           html_code += "<td><input type='text'id='year_exp' name='year_exp[]' class='form-control'/></td>";
           html_code += "<td><select id='select' name='SkillLevel[]' class='mdb-select colorful-select dropdown-primary'><option value=''>choose ...</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4 year'>4</option>option value='5'>5</option> </select></td>";
           html_code += "<td><a class='btn-floating btn-sm btn-danger my-0 waves-effect waves-light remove'  name='remove' data-row='row"+count_skills+"'><i class='fa fa-times'></i></a></td>";   
           html_code += "</tr>";  
           $('#crud_table_skill').append(html_code);
           $(".mdb-select").formSelect(); 
         });

     //add languages
       count_languages=1;  
     $('#add_lang_info').click(function(){debugger;
          count_languages = count_languages + 1;
          var html_code = "<tr id='row"+count_languages+"'>";


            html_code += "<td><input type='text' id='Language_Name' name='Language_Name[]' class='form-control'/></td>";
           html_code += "<td><select id='select' name='Spoken_Level[]' class='mdb-select colorful-select dropdown-primary'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><select id='select' name='Reading_Level[]' class='mdb-select colorful-select dropdown-primary'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><select id='select' name='Writing_Level[]' class='mdb-select colorful-select dropdown-primary'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><a class='btn-floating btn-sm btn-danger my-0 waves-effect waves-light remove'  name='remove' data-row='row"+count_languages+"'><i class='fa fa-times'></i></a></td>";   
           html_code += "</tr>";  
           $('#crud_table_lang').append(html_code);
           $(".mdb-select").formSelect(); 
         });


});
    $(document).on('click', '.remove', function(){
      var delete_row = $(this).data("row");
      $('#' + delete_row).remove();
     });
</script>
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Are you already have CV?</h2>
    </div>
    <div class="mdl-card__supporting-text">
      you can upload your cv and all data extract and re-stract with professional cv.
    </div>
    <div class="mdl-card__actions mdl-card-">
      <!-- cv Form -->
      <div id="Form">
        <!-- <div id="triangle"></div> -->
        <!-- <form id="multiphase" onsubmit="return false"> -->
         <?php
         $attributes = array('id' => 'multiphase', 'onsubmit' => 'return false');
          echo form_open_multipart('', $attributes);?>
          <div class="my-2 progress">
            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
            <!-- <progress id="progressBar" value="16" max="100" style="width:250px;"></progress> -->
            <!-- <h3 id="status">Phase 1 of 6</h3> -->
          <!-- start phase1 -->
          <div id="phase1">
            <h3>Personal Information</h3>
            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="first_name" name="first_name" class="form-control">
                        <label for="first_name" class="">First Name</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="last_name" name="last_name" class="form-control">
                        <label for="last_name" class="">Last Name</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="birth_date" name="birth_date" class="form-control">
                        <label for="birth_date" class="">Date of Birth</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>


            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="Nationality" name="nationality" class="form-control">
                        <label for="Nationality" class="">Nationality</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
              <div class="col-md-10 mb-4">
                <p id="radio_marital">Marital State</p>
                    <fieldset class="form-check">
                        <input class="form-check-input" name="marital_state" type="radio" id="radio1" checked="checked" value="Married">
                        <label class="form-check-label" for="radio1">Married</label>
                    </fieldset>

                    <fieldset class="form-check">
                        <input class="form-check-input" name="marital_state" type="radio" id="radio2" value="Divorced">
                        <label class="form-check-label" for="radio2">Divorced</label>
                    </fieldset>

                    <fieldset class="form-check">
                        <input class="form-check-input" name="marital_state" type="radio" id="radio3" value="Single">
                        <label class="form-check-label" for="radio3">Single</label>
                    </fieldset>

                    <fieldset class="form-check">
                        <input class="form-check-input" name="marital_state" type="radio" id="radio2"  value="Widowed" >
                        <label class="form-check-label" for="radio2">Widowed</label>
                    </fieldset>

                </div>
            </div>

            <div class="row">
              <div class="col-md-10 mb-4">
                <p id="radio_gender">Gender</p>
                <fieldset class="form-check">
                  <input class="form-check-input" name="gender" type="radio" id="Male" checked="checked" value="Male">
                  <label class="form-check-label" for="Male">Male</label>
                </fieldset>

                <fieldset class="form-check">
                  <input class="form-check-input" name="gender" type="radio" id="Female" value="Female">
                  <label class="form-check-label" for="Female">Female</label>
                </fieldset>
              </div>
            </div>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="Country" name="country" class="form-control">
                        <label for="Country" class="">Country</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
              
            <div class="row">

                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="City" name="city" class="form-control">
                        <label for="City" class="">City</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="address" name="address" class="form-control">
                        <label for="address" class="">Address</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            
            <div class="row">

                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="email" name="email" id="email" class="form-control">
                        <label for="email" class="">Email</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            
            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="phone" name="phone" class="form-control">
                        <label for="phone" class="">Phone Number</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

          <div class="row">
              <div class="col-md-10 mb-4">
                  <div class="md-form">
                      <div class="file-field">
                       
                         <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                            <span>Choose file</span>
                              <input type="file"  name="userfile">
                          </div>
                      <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" placeholder="Upload your file">
                      </div>
                      
                      </div>
                  </div>
              </div>
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
                  <th width="20%">Certificate Name</th>
                  <th width="20%">Specialization Name</th>
                  <th width="10%">Start Date</th>
                  <th width="10%">Date of Grants</th>
                  <th width="20%">Donor</th>
                  <th width="20%">Degree Type</th>
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
                    <input type="date" id="start_date" name="start_date[]" class="form-control"/>
                  </td>
                  <td>
                    <input type="date" id="grants_date" name="grants_date[]" class="form-control"/>      
                  </td>
                  <td>
                    <input type="text" id="donor" name="donor[]" class="form-control"/>
                  </td>
                  <td>
                    <select id="degreeType" name="degreeType[]" class="mdb-select colorful-select dropdown-primary">
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
            <h3>Work Experience</h3>
            <div class="table-responsive">
            <table class="table table-bordered" id="crud_table_experience">
            <tr>
              <th width="20%">Company Name</th>
              <th width="20%">Job Position</th>
              <th width="10%">from</th>
              <th width="10%">to</th>
              <th width="20%">CareerLevel</th>
              <th width="15%">Job Type</th>
              <th width="5%">Is Current</th>
              <th width="5%"></th>
            </tr>
            <tr> 
              <td>
                <input type="text" id="company_name" class="form-control" name="company_name[]"/>
              </td>
              <td>
                <input type="text" id="job_pos" class="form-control" name="job_pos[]"/>
              </td>
              <td>
                <input type="date" id="from_date" class="form-control" name="from_date[]"/>
              </td>  
              <td>
                <input type="date" id="to_date" class="form-control" name="to_date[]"/>
              </td>
              <td>

                <select id="select" class="mdb-select colorful-select dropdown-primary" name="careerLevel[]">
                  <option value="">choose ...</option>
                  <option value="HighSchool">Student (high school)</option>
                  <option value="Student">Student (graduate/undergraduate)</option>
                  <option value="EntryLvl">Entry level (less than 2 years of experience)</option>
                  <option value="MidCareer">Mid-career (2+ years of experience)</option>
                  <option value="Management">Management (manager/director of staff)</option>
                  <option value="Executive">Executive (SVP, EVP, VP)</option>
                  <option value="SeniorExecutive">Senior Executive (president / CEO)</option>  
                </select>
              </td>
              <td>
                <select id="select" name="JobType[]" class="mdb-select colorful-select dropdown-primary">
                  <option value="">choose ...</option>
                  <option value="Emplyee">Employee</option>
                  <option value="Contractor">Contractor</option>
                  <option value="Intern">Intern</option>
                </select>
              </td>
              <td>
                <select id="select" name="IsCurrent[]" class="mdb-select colorful-select dropdown-primary">
                  <option value="">choose ...</option>
                  <option value="True">ON</option>
                  <option value="False">OFF</option>
                </select>
              </td>
              <td></td>
            </tr>
            </table>
            <div align="right">
              <a class="btn-floating btn-sm  btn-success my-0 waves-effect waves-light" name="add" id="add_experience_info">
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
            <h3>Personal Skills</h3>
            <div class="table-responsive">
              <table class="table table-bordered" id="crud_table_skill"/>
              <tr>
                <th width="40%">Skill Name</th>
                <th width="30%">Years of experience</th>
                <th width="30%">Skill Level</th>       
                <th width="5%"></th>
              </tr>
              <tr>
                <td>
                  <input type="text" id="skill_name" name="skill_name[]"  class="form-control"/>
                </td>
                <td>
                  <input type="text" id="year_exp" name="year_exp[]"  class="form-control"/>
                </td>
                <td>
                  <select id="select" name="SkillLevel[]" class="mdb-select colorful-select dropdown-primary">
                  <option value="">choose ...</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  </select>
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
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="backPhase4()">
                  <i class="fa fa-backward"></i>
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="processPhase4()">
                  <i class="fa fa-forward"></i>
              </a>
            </div>

          </div>
          <!-- end phase4 -->

          <!-- start phase5 -->
          <div id="phase5">
            <h3>Languages</h3>
            <div class="table-responsive">
              <table class="table table-bordered" id="crud_table_lang"/>
              <tr>
                <th width="25%">Language Name</th>
                <th width="25%">SpokenLevel</th>
                <th width="25%">ReadingLevel</th>
                <th width="25%">WritingLevel</th>       
                <th width="5%"></th>
              </tr>

             <tr>
           <td><input type="text" id="Language_Name" name="Language_Name[]"  class="form-control"/></td>
               <td>
              <select id="select" name="Spoken_Level[]" class="mdb-select colorful-select dropdown-primary">
              <option value="">choose ...</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              </select>
              </td>
           

               <td>  
              <select id="select" name="Reading_Level[]" class="mdb-select colorful-select dropdown-primary">
              <option value="">choose ...</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              </select>
               </td>
            

               <td>
              <select id="select" name="Writing_Level[]" class="mdb-select colorful-select dropdown-primary">
              <option value="">choose ...</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              </select>
               </td>
               
               <td></td>
               </tr>
               </table>
               <div align="right">
                <a class="btn-floating btn-sm  btn-success my-0 waves-effect waves-light" name="add" id="add_lang_info">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
              </div>
            

            <div>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="backPhase5()">
                  <i class="fa fa-backward"></i>
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="processPhase5()">
                  <i class="fa fa-forward"></i>
              </a>
            </div>

          </div>
          <!-- end phase5 -->

          <!-- start phase6 -->
          <div id="phase6">
            <h3>References and Referees</h3>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="ref_name" name="ref_name" class="form-control">
                        <label for="ref_name" class="">Person/Company/Organization Name</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="ref_phone" name="ref_phone" class="form-control">
                        <label for="ref_phone" class="">Phone Number (Optional)</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>

            <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="ref_email" name="ref_email" class="form-control">
                        <label for="ref_email" class="">Email (Optional)</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
             <!-- job position -->
             <div class="row">
                <!--Grid column-->
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="job_postion" name="job_postion" class="form-control">
                        <label for="job_postion" class="">Job Postion</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            
            <div class="row">
              <div class="col-md-10 mb-4">
                <p id="radio_active">Is Active</p>
                <input type="hidden" value="False" name="IsActive" />
                <div class="switch">
                    <label>
                        Off
                        <input type="checkbox" value="True" checked="checked" name="IsActive" >
                        <span class="lever"></span> On
                    </label>
                </div>
                <!-- <fieldset class="form-check">
                  <input class="form-check-input" name="IsActive" type="radio" id="IsActive" checked="checked" value="True">
                  <label class="form-check-label" for="Male">ON</label>
                </fieldset>

                <fieldset class="form-check">
                 <input class="form-check-input" name="IsActive" type="radio" id="IsActive" value="False">
                  <label class="form-check-label" for="IsActive">OFF</label> 
                  
                </fieldset> -->
              </div>
            </div>
           



            <div>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="backPhase6()">
                  <i class="fa fa-backward"></i>
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="submitForm()">
                  <i class="fa fa-save"></i>
              </a>
            </div>

          </div>
          <!-- end phase6 -->
        </form>

      </div>

    </div>
  </div>
</div>


<!-- Compiled and minified JavaScript -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->