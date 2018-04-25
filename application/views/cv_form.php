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
var fname, lname, gender, country;
function _(x){
  return document.getElementById(x);
}
function processPhase1(){
  /*fname = _("first_name").value;
  lname = _("last_name").value;
  city= _("city").value;
  email= _("email").value;
  gender= _("gender").value;
  if(fname.length > 2 && lname.length > 2 && city.length > 2 && email.length > 2 && gender.length > 0){*/
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 32;
    _("status").innerHTML = "Phase 2 of 6";
  /*} else {
      alert("Please fill in the fields"); 
  }*/
}
function processPhase2(){
    /*degree=_("degree").value;
    school=_("school").value;
    fos=_("fos").value;
    study_city=_("study_city").value;
    edu_month_from_time=_("edu_month_from").value;    
    edu_from_year_time=_("edu_year_from").value;
    edu_month_to_time=_("edu_month_to").value;
    edu_year_to_time=_("edu_year_to").value;
  if(degree.length > 0 && school.length > 0 && fos.length > 0 && study_city.length > 0 && edu_month_from != "0" && edu_year_from != "0" && edu_month_to != "0" && edu_year_to != "0"){*/
    _("phase2").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 48;
    _("status").innerHTML = "Phase 3 of 6";
  /*} else {
      alert("Please fill in the fields"); 
  }*/
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
   /* job_title=_("job_title").value;
    company=_("company").value;
    work_city=_("work_city").value;
    work_month=_("work_month").value;
    work_year=_("work_year").value;
    if (job_title.length>0 && company.length>0 && work_city.length>0 && work_month!="0" &&work_year!="0") {*/
        _("multiphase").method = "post";
        _("multiphase").action = "my_parser.php";
        _("multiphase").submit();
    /*} 
    else {
        alert("Please fill in the fields"); 
    }*/
    
}
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
        <input type="birth_date" id="birth_date" name="birth_date"/>
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
        <div>
        <p>Certificate Name</p>
        <input type="cert_name" id="cert_name" name="cert_name"/>
        </div>

        <div>
        <p>Date of Grants</p>
        <select id="select" name="grants_day">
        <option value="0">Day</option>
        <?php 
        for ($i = 1; $i <= 31; $i++) {
        echo "<option value='.$i.'>$i</option>";
        }?>
        </select>

        <select id="select" name="grants_month">
        <option value="0">Month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
        </select>

        <?php $year=2019;?>
        <select id=select name=grants_year>
        <option value="0">Year</option>
        <?php 
        for ($i = 0; $i <= 117; $i++) {
        $year=$year-1;
        echo "<option value='.$year.'>$year</option>";
        }?>
        </select>
        </div>

        <div>
        <p>Donor</p>
        <input type="donor" id="donor" name="donor"/>
        </div>

        <div>
        <p>The Rate (optional)</p>
        <input type="rate" id="rate" name="rate"/>
        </div>

        
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
        <select id="select" name="time_day_from">
        <option value="0">Day</option>
        <?php 
        for ($i = 1; $i <= 31; $i++) {
        echo "<option value='.$i.'>$i</option>";
        }?>
        </select>

        <select id="select" name="time_month_from">
        <option value="0">Month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
        </select>

        <?php $year2=2019;?>
        <select id="select" name="time_year_from">
        <option value="0">Year</option>
        <?php 
        for ($y = 0; $y <= 117; $y++) {
        $year2=$year2-1;
        echo "<option value='.$year.'>$year2</option>";
        }?>
        </select>

        <p><span>to</span></p>

        <select id="select" name="time_day_to">
        <option value="0">Day</option>
        <?php 
        for ($i = 1; $i <= 31; $i++) {
        echo "<option value='.$i.'>$i</option>";
        }?>
        </select>

        <select id="select" name="time_month_to">
        <option value="0">Month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
        </select>

        <?php $year2=2019;?>
        <select id="select" name="time_year_to">
        <option value="0">Year</option>
        <?php 
        for ($y = 0; $y <= 117; $y++) {
        $year2=$year2-1;
        echo "<option value='.$year.'>$year2</option>";
        }?>
        </select>
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
        <input type="interest_name" id="interest_name" name="company_name"/>
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

        <button id="next" onclick="submit()">Save</button>
        <button id="previous" onclick="backPhase6()">Previous</button>
    </div>
    <!-- end phase6 -->
  </form>
</div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>

</body>

</html>