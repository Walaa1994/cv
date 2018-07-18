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
    _("multiphase").action = '<?php echo base_url();?>index.php/seeker/CVFormInfo';
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
     html_code += "<td><input type='cert_name' id='cert_name' name='cert_name[]'/></td>";
     html_code += "<td><input type='spe_name' id='spe_name' name='spe_name[]'/></td>";
     html_code += "<td><input type='date' id='start_date' name='start_date[]'/></td>";
     html_code += "<td><input type='date' id='grants_date' name='grants_date[]'/></td>";
     html_code += "<td><input type='donor' id='donor' name='donor[]'/></td>";
     html_code += '<td><select id="select" name="degreeType[]"><option value="">choose ...</option><option value="EduHighSchool">High School</option><option value="EduVocational">Vocational</option><option value="EduCollegeCoursework">College Coursework</option><option value="EduBachelor">Bachelorl</option><option value="EduMaster">Master</option><option value="EduDoctorate">Doctorate</option><option value="EduAssociate">Associate</option><option value=" EduProfessional">Professional</option></select></td>';
     html_code += "<td><button type='button' name='remove' data-row='row"+count_education+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
     html_code += "</tr>";  
     $('#crud_table_education').append(html_code);  
   });
       
     //experiance
     count_experience=1;
     $('#add_experience_info').click(function(){debugger;
        count_experience = count_experience + 1;
        var html_code = "<tr id='row"+count_experience+"'>";
         html_code += "<td><input type='company_name' id='company_name' name='company_name[]'/></td>";
         html_code += "<td><input type='job_pos' id='job_pos' name='job_pos[]'/></td>";
         html_code += "<td> <input type='date' id='from_date' name='from_date[]'/></td>";
         html_code += "<td><input type='date' id='to_date' name='to_date[]'/></td>";
         html_code += '<td><select id="select" name="careerLevel[]"><option value="">choose ...</option><option value="HighSchool">Student (high school)</option><option value="Student">Student (graduate/undergraduate)</option><option value="EntryLvl">Entry level (less than 2 years of experience)</option><option value="MidCareer">Mid-career (2+ years of experience)</option><option value="Management">Management (manager/director of staff)</option><option value="Executive">Executive (SVP, EVP, VP)</option><option value="SeniorExecutive">Senior Executive (president / CEO)</option>  </select></td>';
         html_code += '<td><select id="select" name="JobType[]"><option value="">choose ...</option><option value="Emplyee">Employee</option><option value="Contractor">Contractor</option><option value="Intern">Intern</option></select></td>';
         html_code += '<td><select id="select" name="IsCurrent[]"><option value="">choose ...</option><option value="True">ON</option><option value="False">OFF</option></select></td>';
         html_code += "<td><button type='button' name='remove' data-row='row"+count_experience+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
         html_code += "</tr>";  
         $('#crud_table_experience').append(html_code);         
       });

       //add skills
       count_skills=1;  
     $('#add_skill_info').click(function(){debugger;
          count_skills = count_skills + 1;
          var html_code = "<tr id='row"+count_skills+"'>";
           html_code += "<td><input type='skill_name'id='skill_name' name='skill_name[]'/></td>";
           html_code += "<td><input type='year_exp'id='year_exp' name='year_exp[]'/></td>";
           html_code += "<td><select id='select' name='SkillLevel[]'><option value=''>choose ...</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4 year'>4</option>option value='5'>5</option> </select></td>";
           html_code += "<td><button type='button' name='remove' data-row='row"+count_skills+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
           html_code += "</tr>";  
           $('#crud_table_skill').append(html_code);
         });

     //add languages
       count_languages=1;  
     $('#add_lang_info').click(function(){debugger;
          count_languages = count_languages + 1;
          var html_code = "<tr id='row"+count_languages+"'>";


            html_code += "<td><input type='Language_Name' id='Language_Name' name='Language_Name[]'/></td>";
           html_code += "<td><select id='select' name='Spoken_Level[]'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><select id='select' name='Reading_Level[]'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><select id='select' name='Writing_Level[]'><option value=''>choose ...</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";
           html_code += "<td><button type='button' name='remove' data-row='row"+count_languages+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
           html_code += "</tr>";  
           $('#crud_table_lang').append(html_code);
         });


});
    $(document).on('click', '.remove', function(){
      var delete_row = $(this).data("row");
      $('#' + delete_row).remove();
     });
</script>

<div id="form">
  <div id="triangle"></div>
  <form id="multiphase" onsubmit="return false">
      <progress id="progressBar" value="16" max="100" style="width:250px;"></progress>
      <h3 id="status">Phase 1 of 6</h3>
    <!-- start phase1 -->
    <div id="phase1">
      <h3>Personal Information</h3>
      <div>
      <p>First Name</p>
      <input type="first_name" id="first_name" name="first_name"/>
      </div>

      <div>
      <p>Last Name</p>
      <input type="last_name" id="last_name" name="last_name"/>
      </div>

      <div>
      <p>Date of Birth</p>
      <input type="date" id="birth_date" name="birth_date"/>
      </div>

      <div>
      <p>Nationality</p>
      <input type="nationality" id="nationality" name="nationality"/>
      </div>

      <div>
      <p id="radio_marital">Marital State</p>
      <input type="radio" id="marital_state" name="marital_state" value="Married" > Married<br>
      <input type="radio" id="marital_state" name="marital_state" value="Divorced" > Divorced<br>
      <input type="radio" id="marital_state" name="marital_state" value="Single" > Single<br>
      <input type="radio" id="marital_state" name="marital_state" value="Widowed" > Widowed<br>
      </div>

      <div>
      <p id="radio_gender">Gender</p>
      <input type="radio" id="gender" name="gender" value="Male" > Male<br>
      <input type="radio" id="gender" name="gender" value="Female" > Female<br>        
      </div>

      <div>
      <p>Country</p>
      <input type="country" id="country" name="country"/>
      </div>

      <div>
      <p>City</p>
      <input type="city" id="city" name="city"/>
      </div>

      <div>
      <p>Address</p>
      <input type="address" id="address" name="address"/>
      </div>

      <div>
      <p>Email</p>
      <input type="email" id="email" name="email"/>
      </div>

      <div>
      <p>Phone Number</p>
      <input type="phone" id="phone" name="phone"/>
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
            <th width="20%">Certificate Name</th>
            <th width="10%">Specialization Name</th>
            <th width="20%">Start Date</th>
            <th width="10%">Date of Grants</th>
            <th width="10%">Donor</th>
            <th width="25%">Degree Type</th>
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
              <input type="date" id="start_date" name="start_date[]"/>
            </td>
            <td>
              <input type="date" id="grants_date" name="grants_date[]"/>      
            </td>
            <td>
              <input type="donor" id="donor" name="donor[]"/>
            </td>
            <td>
              <select id="select" name="degreeType[]">
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
          </tr>
        </table>

        <div align="right">
         <button type="button" name="add" id="add_education_info" class="btn btn-success btn-xs">+</button>
        </div>
      </div>

      <button id="previous" onclick="backPhase2()">Previous</button>
      <button id="next" onclick="processPhase2()">Next</button>
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
      </tr>
      <tr> 
        <td>
          <input type="company_name" id="company_name" name="company_name[]"/>
        </td>
        <td>
          <input type="job_pos" id="job_pos" name="job_pos[]"/>
        </td>
        <td>
          <input type="date" id="from_date" name="from_date[]"/>
        </td>  
        <td>
          <input type="date" id="to_date" name="to_date[]"/>
        </td>
        <td>
          <select id="select" name="careerLevel[]">
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
          <select id="select" name="JobType[]">
            <option value="">choose ...</option>
            <option value="Emplyee">Employee</option>
            <option value="Contractor">Contractor</option>
            <option value="Intern">Intern</option>
          </select>
        </td>
        <td>
          <select id="select" name="IsCurrent[]">
            <option value="">choose ...</option>
            <option value="True">ON</option>
            <option value="False">OFF</option>
          </select>
        </td>
      </tr>
      </table>
      <div align="right">
        <button type="button" name="add" id="add_experience_info" class="btn btn-success btn-xs">+</button>
      </div>
      </div>

      
      <button id="previous" onclick="backPhase3()">Previous</button>
      <button id="next" onclick="processPhase3()">Next</button>
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
        </tr>
        <tr>
          <td>
            <input type="skill_name" id="skill_name" name="skill_name[]"/>
          </td>
          <td>
            <input type="year_exp" id="year_exp" name="year_exp[]"/>
          </td>
          <td>
            <select id="select" name="SkillLevel[]">
            <option value="">choose ...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
          </td>
        </tr>
        </table>
        <div align="right">
          <button type="button" name="add" id="add_skill_info" class="btn btn-success btn-xs">+</button>
        </div>
      </div>
      <button id="previous" onclick="backPhase4()">Previous</button>
      <button id="next" onclick="processPhase4()">Next</button>
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
        </tr>

       <tr>
     <td><input type="Language_Name" id="Language_Name" name="Language_Name[]"/></td>
         <td>
        <select id="select" name="Spoken_Level[]">
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
        <select id="select" name="Reading_Level[]">
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
        <select id="select" name="Writing_Level[]">
        <option value="">choose ...</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
         </td>
         </tr>
         </table>
         <div align="right">
          <button type="button" name="add" id="add_lang_info" class="btn btn-success btn-xs">+</button>
        </div>
        </div>
      

      <button id="previous" onclick="backPhase5()">Previous</button>
      <button id="next" onclick="processPhase5()">Next</button>
    </div>
    <!-- end phase5 -->

    <!-- start phase6 -->
    <div id="phase6">
      <h3>References and Referees</h3>
      <div>
      <p>Person/Company/Organization Name</p>
      <input type="ref_name" id="ref_name" name="ref_name"/>
      </div>

      <div>
      <p>Phone Number (Optional)</p>
      <input type="ref_phone" id="ref_phone" name="ref_phone"/>
      </div>

      <div>
      <p>Email (Optional)</p>
      <input type="ref_email" id="ref_email" name="ref_email"/>
      </div>

      <div>
      <p id="radio_active">Is Active</p>
      <input type="radio" id="IsActive" name="IsActive" value="True" >ON<br>
      <input type="radio" id="IsActive" name="IsActive" value="False">OFF<br>        
      </div>

      <button id="previous" onclick="backPhase6()">Previous</button>
      <button id="next" onclick="submitForm()">Save</button>
    </div>
    <!-- end phase6 -->
  </form>
</div>
<!-- 
  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script> -->
