<!DOCTYPE html>
<html>

<head>
  <link href="<?php echo base_url();?>/assets/css/cv.css" rel='stylesheet' type='text/css' />
  <meta charset="UTF-8">
  <title>Announcement Form</title>

  <style>
    form#multiphase > #phase2, #phase3{ display:none; }
  </style>

  <script>
    function _(x){
      return document.getElementById(x);
    }
    function processPhase1(){
        _("phase1").style.display = "none";
        _("phase2").style.display = "block";
        _("progressBar").value = 66;
        _("status").innerHTML = "Phase 2 of 3";
    }
    function processPhase2(){
        _("phase2").style.display = "none";
        _("phase3").style.display = "block";
        _("progressBar").value = 100;
        _("status").innerHTML = "Phase 3 of 3";
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
      <h3 id="status">Phase 1 of 3</h3>
    <!-- start phase1 -->
    <div id="phase1">
      <h3>Basic Information</h3>
      <div>
        <p>Job Title</p>
        <input type="job_title" id="job_title" name="job_title"/>
      </div>

      <div>
        <p>Employment Type</p>
        <select id="select" name="employment_type">
          <option value="0">Choose ...</option>
          <option value="full time">Full Time</option>
          <option value="part time">Part Time</option>
          <option value="freelancer">Freelancer</option>
          <option value="remotely">Remotely</option>
        </select>
      </div>

      <div>
        <p>Working Hours</p>  
        <input style="width:40%;" type="working_hours" id="working_hours" name="working_hours"/>

        <span>per</span>

        <select style="width:40%;" id=select name=hours_per>
          <option value="0">Choose ...</option>
          <option value="day">Day</option>
          <option value="week">Week</option>
          <option value="month">Month</option>
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

      <button id="next" onclick="processPhase2()">Next</button>
      <button id="previous" onclick="backPhase2()">Previous</button>
    </div>
    <!-- end phase2 -->

    <!-- start phase3 -->
    <div id="phase3">
        <h3>Personal Characteristics of The Job</h3>
        <div>
        <p>Characteristic</p>
        <input type="characteristic" id="characteristic" name="characteristic"/>
        </div>

        <div>
        <p>Degree of Characteristic</p>
        <select id="select" name="characteristic_degree">
        <option value="">choose ...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </div>

        <button id="next" onclick="submitForm()">Save</button>
        <button id="previous" onclick="backPhase3()">Previous</button>
    </div>
    <!-- end phase3 -->
  </form>
</div>

  <script src="<?php echo base_url('http://codepen.io/assets/libs/fullpage/jquery.js')?>"></script>

  <script src="<?php echo base_url('assets/bootstrap/js/index')?>"></script>


  

</body>

</html>