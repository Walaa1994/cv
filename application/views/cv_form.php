<!DOCTYPE html>
<html>

<head>
 <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  <meta charset="UTF-8">
  <title>CV Form</title>  
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
});
</script>
</head>

<body>

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
        <p>Father Name</p>
        <input  type="father_name" id="father_name" name="father_name"/>
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
        <input type="radio" id="marital_state" name="marital_state" value="single" > Single<br>
        <input type="radio" id="marital_state" name="marital_state" value="married" > Married<br>
        </div>

        <div>
        <p id="radio_gender">Gender</p>
        <input type="radio" id="gender" name="gender" value="male" > Male<br>
        <input type="radio" id="gender" name="gender" value="female" > Female<br>        
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
        <div id="more_feild" >
            
        </div>
        <div id="education_block">
            <div>
            <p>Certificate Name</p>
            <input type="cert_name" id="cert_name" name="cert_name[]"/>
            </div>

            <div>
            <p>Date of Grants</p>
            <input type="date" id="grants_date" name="grants_date[]"/>
            </div>

            <div>
            <p>Donor</p>
            <input type="donor" id="donor" name="donor[]"/>
            </div>

            <div>
            <p>The Rate (optional)</p>
            <input type="rate" id="rate" name="rate[]"/>
            </div>

        </div>
        <a id="AddNewRecord" class="btn btn-link m-b-10 m-l-5">Add new row</a>
        
        <button id="next" onclick="processPhase2()">Next</button>
        <button id="previous" onclick="backPhase2()">Previous</button>
    </div>
    <!-- end phase2 -->

    <!-- start phase3 --> 
    <div id="phase3">
        <h3>Work Experience</h3>
        <div>
        <p>Company Name</p>
        <input type="company_name" id="company_name" name="company_name"/>
        </div>

        <div>
        <p>Job Position</p>
        <input type="job_pos" id="job_pos" name="job_pos"/>
        </div>

        <div>
        <p>Time Period</p>
        <p><span>from</span></p>

        <input type="date" id="from_date" name="from_date"/>

        <p><span>to</span></p>

        <input type="date" id="to_date" name="to_date"/>

        </div>

        <div>
        <p>Main activities and responsibilities</p>
        <textarea id="activity" name="activity"></textarea>
        </div>

        <div>
        <p>Significant Accomplishments</p>
        <textarea id="Accomplishments" name="Accomplishments"></textarea>
        </div>

        <button id="next" onclick="processPhase3()">Next</button>
        <button id="previous" onclick="backPhase3()">Previous</button>
    </div>
    <!-- end phase3 -->

    <!-- start phase4 -->
    <div id="phase4">
        <h3>Personal Skills</h3>
        <div>
        <p>Skill Name</p>
        <input type="skill_name" id="skill_name" name="skill_name"/>
        </div>

        <div>
        <p>Years of experience</p>
        <select id="select" name="year_exp">
        <option value="">choose ...</option>
        <option value="less than 1 year">less than 1 year</option>
        <option value="1 year">1 year</option>
        <option value="more than 1 year">more than 1 year</option>
        <option value="2 year">2 year</option>
        <option value="more than 2 year">more than 2 year</option>
        <option value="3 year">3 year</option>
        <option value="more than 3 year">more than 3 year</option>
        </select>
        </div>

        <button id="next" onclick="processPhase4()">Next</button>
        <button id="previous" onclick="backPhase4()">Previous</button>
    </div>
    <!-- end phase4 -->

    <!-- start phase5 -->
    <div id="phase5">
        <h3>Personal Interests</h3>
        <div>
        <p>Interest Name</p>
        <input type="interest_name" id="interest_name" name="interest_name"/>
        </div>

        <div>
        <p>Degree of interest</p>
        <select id="select" name="interest_degree">
        <option value="">choose ...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </div>

        <button id="next" onclick="processPhase5()">Next</button>
        <button id="previous" onclick="backPhase5()">Previous</button>
    </div>
    <!-- end phase5 -->

    <!-- start phase6 -->
    <div id="phase6">
        <h3>References & Referees</h3>
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

        <button id="next" onclick="submitForm()">Save</button>
        <button id="previous" onclick="backPhase6()">Previous</button>
    </div>
    <!-- end phase6 -->
  </form>
</div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>

</body>

</html>