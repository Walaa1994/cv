<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <title>our app</title>  
  <link href="<?php echo base_url();?>/assets/css/style.css" rel='stylesheet' type='text/css' />
  <style>
form#multiphase{ border:#000 1px solid; padding:24px; width:350px; }
form#multiphase > #phase2, #phase3, #show_all_data{ display:none; }
</style>
  <script>
var fname, lname, gender, country;
function _(x){
  return document.getElementById(x);
}
function processPhase1(){
  fname = _("first_name").value;
  lname = _("last_name").value;
  city= _("city").value;
  email= _("email").value;
  gender= _("gender").value;
  if(fname.length > 2 && lname.length > 2 && city.length > 2 && email.length > 2 && gender.length > 0){
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 66;
    _("status").innerHTML = "Phase 2 of 3";
  } else {
      alert("Please fill in the fields"); 
  }
}
function processPhase2(){
    degree=_("degree").value;
    school=_("school").value;
    fos=_("fos").value;
    study_city=_("study_city").value;
    edu_month_from_time=_("edu_month_from").value;    
    edu_from_year_time=_("edu_year_from").value;
    edu_month_to_time=_("edu_month_to").value;
    edu_year_to_time=_("edu_year_to").value;
  if(degree.length > 0 && school.length > 0 && fos.length > 0 && study_city.length > 0 && edu_month_from != "0" && edu_year_from != "0" && edu_month_to != "0" && edu_year_to != "0"){
    _("phase2").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 100;
    _("status").innerHTML = "Phase 3 of 3";
  } else {
      alert("Please fill in the fields"); 
  }
}
function backPhase2(){
    _("phase2").style.display = "none";
    _("phase1").style.display = "block";
    _("progressBar").value = 33;
    _("status").innerHTML = "Phase 1 of 3";
}
function backPhase3(){
    _("phase3").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 66;
    _("status").innerHTML = "Phase 2 of 3";
}
function submitForm(){
    job_title=_("job_title").value;
    company=_("company").value;
    work_city=_("work_city").value;
    work_month=_("work_month").value;
    work_year=_("work_year").value;
    if (job_title.length>0 && company.length>0 && work_city.length>0 && work_month!=="0" &&work_year!=="0") {
        _("multiphase").method = "post";
        _("multiphase").action = "my_parser.php";
        _("multiphase").submit();
    } 
    else {
        alert("Please fill in the fields"); 
    }
    
}
</script>
</head>

<body>

<div id="login">
  <div id="triangle"></div>
  <h1>Create Resume</h1>
  <progress id="progressBar" value="33" max="100" style="width:250px;"></progress>
  <h3 id="status">Phase 1 of 3</h3>
  <form id="multiphase" onsubmit="return false">
    <div id="phase1">
        <h3>Basics</h3>
        <div>
        <p>First Name</p>
        <input id="first_name" name="first_name"/>
        </div>

        <div>
        <p>Last Name</p>
        <input id="last_name" name="last_name"/>
        </div>

        <div>
        <p>City</p>
        <input id="city" name="city"/>
        </div>

        <h3>Contact Information</h3>
        <div>
        <p>Email</p>
        <input type="email" id="email" name="email"/>
        </div>

        <div>
        <p>Phone Number (optional)</p>
        <input id="phone" name="phone"/>
        </div>

        <h3>Resume Privacy Setting</h3>
        <div>
        <input type="radio" id="gender" name="gender" value="public" checked="checked"> Public<br>
        <p><span>Your resume will be visible to anyone, in accordance with our terms. Your phone number and email address are only provided to employers you apply or respond to. Your street address is visible only to you.</span></p>
        </div>
        <div>
        <input type="radio" id="gender" name="gender" value="private"> Private<br>
        <p><span>Your resume is not visible. Employers cannot find your resume, but you can attach it when you apply to a job.</span></p>
        </div>

        <button onclick="processPhase1()">Next</button>
    </div>

    <div id="phase2">
        <h3>Education</h3>
        <div>
        <p>Degree</p>
        <input id="degree" name="degree"/>
        <p>e.g. BA, BS, JD, PhD.</p>
        </div>

        <div>
        <p>School</p>
        <input id="school" name="school"/>
        </div>

        <div>
        <p>Field of Study</p>
        <input id="fos" name="fos"/>
        <p>e.g. Biology, Computer Science, Intellectual Property, Nursing, Psychology.</p>
        </div>

        <div>
        <p>Study City</p>
        <input id="study_city" name="study_city"/>
        </div>

        <div>
        <p>Time Period</p>
        <select id=edu_month_from name=edu_month_from>
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
        <select id=edu_year_from name=edu_year_from>
        <option value="0">Year</option>
        <?php 
        for ($i = 0; $i <= 117; $i++) {
        $year=$year-1;
        echo "<option value='.$year.'>$year</option>";
        }?>
        </select>

        <span>to</span>

        <select id=edu_month_to name=edu_month_to>
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

        <?php $year1=2019;?>
        <select select id=edu_year_to name=edu_year_to>
        <option value="0">Year</option>
        <?php 
        for ($x = 0; $x <= 117; $x++) {
        $year1=$year1-1;
        echo "<option value='.$year1.'>$year1</option>";
        }?>
        </select>

        <span>Current students: enter your expected graduation year</span>
        </div>
        <button onclick="processPhase2()">Next</button>
        <button onclick="backPhase2()">Previous</button>
    </div>

    
    <div id="phase3">
        <h3>Work Experience</h3>
        <div>
        <p>Job Title</p>
        <input id="job_title" name="job_title"/>
        </div>

        <div>
        <p>Company</p>
        <input id="company" name="company"/>
        </div>

        <div>
        <p>City</p>
        <input id="work_city" name="work_city"/>
        </div>

        <div>
        <p>Time Period</p>
        <select id="work_month" name="work_month">
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
        <select id="work_year" name="work_year">
        <option value="0">Year</option>
        <?php 
        for ($y = 0; $y <= 117; $y++) {
        $year2=$year2-1;
        echo "<option value='.$year.'>$year2</option>";
        }?>
        </select>
        <span>to</span>
        <b>Present</b>
        </div>

        <div>
        <p>Description</p>
        <textarea name="description"></textarea>
        <p><span>Describe your position and any significant accomplishments.</span></p>
        </div>
        <button onclick="submitForm()">Submit Data</button>
        <button onclick="backPhase3()">Previous</button>
    </div>

  </form>
</div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>

  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>


  

</body>

</html>