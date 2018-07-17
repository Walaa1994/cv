<!DOCTYPE html>
<html>

<head>
<link href="<?php echo base_url();?>/assets/css/bigfive.css" rel='stylesheet' type='text/css' />

  <meta charset="UTF-8">
  <title>Personal Test Form</title>

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
        _("multiphase").action = '<?php echo base_url();?>index.php/Seeker/BigFiveCalcu';
        _("multiphase").submit();
    }
  </script>
  <body>
  <h2>Personality Test</h2>

  <div id="form">
  <div id="triangle"></div>
  <form id="multiphase" onsubmit="return false">
      <progress id="progressBar" value="33" max="100" style="width:250px;"></progress>
      <h3 id="status">Phase 1 of 3</h3>
    <!-- start phase1 -->
    <div id="phase1">
    <table>
  <tr>
  <th></th>
    <th><p>INACCURATE</p></th>
    <th><p>NEUTRAL</p></th>
    <th><p>ACCURATE</p></th> 
  </tr>


  <tr>
    <td>Is talkative</td>
      <td><input type="radio" class="option-input radio" name="bigfive1" value="1"  required="required">
      <input type="radio" id="bigfive1" name="bigfive1" value="2">
      </td>
    <td><input type="radio" id="bigfive1" name="bigfive1" value="3"> </td>
    <td><input type="radio" id="bigfive1" name="bigfive1" value="4">
        <input type="radio" id="bigfive1" name="bigfive1" value="5"></td>
  </tr>
  

   <tr>
    <td><p class="color-filed">Tends to find fault with others</p></td>

    <td><input type="radio" id="bigfive2" name="bigfive2" value="1" required="required">
      <input type="radio" id="bigfive2" name="bigfive2" value="2">
    </td>
    <td><input type="radio" id="bigfive2" name="bigfive2" value="3"> </td>
    <td><input type="radio" id="bigfive2" name="bigfive2" value="4">
       <input type="radio" id="bigfive2" name="bigfive2" value="5"></td>
   </tr>

    <tr>
     <td><p class="color-filed">Does a thorough job </p></td>
     <td><input type="radio" id="bigfive3" name="bigfive3" value="1" required="required">
      <input type="radio" id="bigfive3" name="bigfive3" value="2">
     </td>
     <td><input type="radio" id="bigfive3" name="bigfive3" value="3"> </td>
     <td><input type="radio" id="bigfive3" name="bigfive3" value="4">
      <input type="radio" id="bigfive3" name="bigfive3" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Is depressed, blue  </p></td>
      <td><input type="radio" id="bigfive4" name="bigfive4" value="1" required="required">
       <input type="radio" id="bigfive4" name="bigfive4" value="2">
      </td>
      <td><input type="radio" id="bigfive4" name="bigfive4" value="3"> </td>
      <td><input type="radio" id="bigfive4" name="bigfive4" value="4">
        <input type="radio" id="bigfive4" name="bigfive4" value="5"></td>
    </tr>

    <tr>
       <td><p class="color-filed">Is original, comes up with new ideas  </p></td>
       <td><input type="radio" id="bigfive5" name="bigfive5" value="1" required="required">
        <input type="radio" id="bigfive5" name="bigfive5" value="2">
      </td>
      <td><input type="radio" id="bigfive5" name="bigfive5" value="3" required="required"> </td>
      <td><input type="radio" id="bigfive5" name="bigfive5" value="4">
        <input type="radio" id="bigfive5" name="bigfive5" value="5"></td>
    </tr>



    <tr>
      <td><p class="color-filed">Is reserved  </p></td>
      <td><input type="radio" id="bigfive6" name="bigfive6" value="1" required="required">
       <input type="radio" id="bigfive" name="bigfive" value="2">
      </td>
      <td><input type="radio" id="bigfive6" name="bigfive6" value="3"> </td>
      <td><input type="radio" id="bigfive6" name="bigfive6" value="4">
       <input type="radio" id="bigfive6" name="bigfive6" value="5"></td>
    </tr>
    <tr>
      <td><p class="color-filed">Is helpful and unselfish with others </p></td>
      <td><input type="radio" id="bigfive7" name="bigfive7" value="1" required="required">
       <input type="radio" id="bigfive7" name="bigfive7" value="2">
      </td>
      <td><input type="radio" id="bigfive7" name="bigfive7" value="3"> </td>
      <td><input type="radio" id="bigfive7" name="bigfive7" value="4">
       <input type="radio" id="bigfive7" name="bigfive7" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Can be somewhat careless  </p></td>
      <td><input type="radio" id="bigfive8" name="bigfive8" value="1" required="required">
       <input type="radio" id="bigfive8" name="bigfive8" value="2">
      </td>
      <td><input type="radio" id="bigfive8" name="bigfive8" value="3"> </td>
      <td><input type="radio" id="bigfive8" name="bigfive8" value="4">
       <input type="radio" id="bigfive8" name="bigfive8" value="5"></td>
    </tr>

    <tr>
       <td><p class="color-filed">Is relaxed, handles stress well   </p></td>
       <td><input type="radio" id="bigfive9" name="bigfive9" value="1" required="required">
        <input type="radio" id="bigfive9" name="bigfive9" value="2">
      </td>
       <td><input type="radio" id="bigfive9" name="bigfive9" value="3"> </td>
       <td><input type="radio" id="bigfive9" name="bigfive9" value="4">
         <input type="radio" id="bigfive9" name="bigfive9" value="5"></td>
    </tr>


    <tr>
      <td><p class="color-filed">Is curious about many different things </p></td>
      <td><input type="radio" id="bigfive10" name="bigfive10" value="1" required="required">
        <input type="radio" id="bigfive10" name="bigfive10" value="2">
      </td>
       <td><input type="radio" id="bigfive10" name="bigfive10" value="3"> </td>
       <td><input type="radio" id="bigfive10" name="bigfive10" value="4">
         <input type="radio" id="bigfive10" name="bigfive10" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Is full of energy </p></td>
      <td><input type="radio" id="bigfive11" name="bigfive11" value="1" required="required">
       <input type="radio" id="bigfive11" name="bigfive11" value="2">
      </td>
      <td><input type="radio" id="bigfive11" name="bigfive11" value="3"> </td>
      <td><input type="radio" id="bigfive11" name="bigfive11" value="4">
       <input type="radio" id="bigfive11" name="bigfive11" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Starts quarrels with others</p></td>
      <td><input type="radio" id="bigfive12" name="bigfive12" value="1" required="required">
       <input type="radio" id="bigfive12" name="bigfive12" value="2">
      </td>
      <td><input type="radio" id="bigfive12" name="bigfive12" value="3"> </td>
      <td><input type="radio" id="bigfive12" name="bigfive12" value="4">
       <input type="radio" id="bigfive12" name="bigfive12" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Is a reliable worker </p></td>
      <td><input type="radio" id="bigfive13" name="bigfive13" value="1" required="required">
       <input type="radio" id="bigfive13" name="bigfive13" value="2">
      </td>
      <td><input type="radio" id="bigfive13" name="bigfive13" value="3"> </td>
      <td><input type="radio" id="bigfive13" name="bigfive13" value="4">
       <input type="radio" id="bigfive13" name="bigfive13" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Can be tense </p></td>
      <td><input type="radio" id="bigfive14" name="bigfive14" value="1" required="required">
       <input type="radio" id="bigfive14" name="bigfive14" value="2">
      </td>
      <td><input type="radio" id="bigfive14" name="bigfive14" value="3"> </td>
      <td><input type="radio" id="bigfive14" name="bigfive14" value="4">
       <input type="radio" id="bigfive14" name="bigfive14" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Is ingenious, a deep thinker </p></td>
      <td><input type="radio" id="bigfive15" name="bigfive15" value="1" required="required">
       <input type="radio" id="bigfive15" name="bigfive15" value="2">
      </td>
      <td><input type="radio" id="bigfive15" name="bigfive15" value="3"> </td>
      <td><input type="radio" id="bigfive15" name="bigfive15" value="4">
       <input type="radio" id="bigfive15" name="bigfive15" value="5"></td>
    </tr>

    
 
</table>

      <button id="next" onclick="processPhase1()">Next</button>
    </div>
    <!-- end phase1 -->
  
    <!-- start phase2 -->  
    <div id="phase2">
     <table>
  <tr>
  <th></th>
    <th><p>INACCURATE</p></th>
    <th><p>NEUTRAL</p></th>
    <th><p>ACCURATE</p></th> 
  </tr>


  <tr>
    <td>Generates a lot of enthusiasm </td>
      <td><input type="radio" name="bigfive31" name="bigfive16" value="1"  required="required">
      <input type="radio" id="bigfive16" name="bigfive16" value="2">
      </td>
    <td><input type="radio" id="bigfive16" name="bigfive16" value="3"> </td>
    <td><input type="radio" id="bigfive16" name="bigfive16" value="4">
        <input type="radio" id="bigfive16" name="bigfive16" value="5"></td>
  </tr>
  

   <tr>
    <td><p class="color-filed"> Has a forgiving nature </p></td>

    <td><input type="radio" id="bigfive17" name="bigfive17" value="1" required="required">
      <input type="radio" id="bigfive17" name="bigfive17" value="2">
    </td>
    <td><input type="radio" id="bigfive17" name="bigfive17" value="3"> </td>
    <td><input type="radio" id="bigfive17" name="bigfive17" value="4">
       <input type="radio" id="bigfive17" name="bigfive17" value="5"></td>
   </tr>

    <tr>
     <td><p class="color-filed">Tends to be disorganized  </p></td>
     <td><input type="radio" id="bigfive18" name="bigfive18" value="1" required="required">
      <input type="radio" id="bigfive18" name="bigfive18" value="2">
     </td>
     <td><input type="radio" id="bigfive18" name="bigfive18" value="3"> </td>
     <td><input type="radio" id="bigfive18" name="bigfive18" value="4">
      <input type="radio" id="bigfive18" name="bigfive18" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Worries a lot   </p></td>
      <td><input type="radio" id="bigfive19" name="bigfive19" value="1" required="required">
       <input type="radio" id="bigfive19" name="bigfive19" value="2">
      </td>
      <td><input type="radio" id="bigfive19" name="bigfive19" value="3"> </td>
      <td><input type="radio" id="bigfive19" name="bigfive19" value="4">
        <input type="radio" id="bigfive19" name="bigfive19" value="5"></td>
    </tr>

    <tr>
       <td><p class="color-filed">Has an active imagination   </p></td>
       <td><input type="radio" id="bigfive20" name="bigfive20" value="1" required="required">
        <input type="radio" id="bigfive20" name="bigfive20" value="2">
      </td>
      <td><input type="radio" id="bigfive20" name="bigfive20" value="3" required="required"> </td>
      <td><input type="radio" id="bigfive20" name="bigfive20" value="4">
        <input type="radio" id="bigfive20" name="bigfive20" value="5"></td>
    </tr>



    <tr>
      <td><p class="color-filed">Tends to be quiet  </p></td>
      <td><input type="radio" id="bigfive21" name="bigfive21" value="1" required="required">
       <input type="radio" id="bigfive21" name="bigfive21" value="2">
      </td>
      <td><input type="radio" id="bigfive21" name="bigfive21" value="3"> </td>
      <td><input type="radio" id="bigfive21" name="bigfive21" value="4">
       <input type="radio" id="bigfive21" name="bigfive21" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Is generally trusting  </p></td>
      <td><input type="radio" id="bigfive22" name="bigfive22" value="1" required="required">
       <input type="radio" id="bigfive22" name="bigfive22" value="2">
      </td>
      <td><input type="radio" id="bigfive22" name="bigfive22" value="3"> </td>
      <td><input type="radio" id="bigfive22" name="bigfive22" value="4">
       <input type="radio" id="bigfive22" name="bigfive22" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Tends to be lazy   </p></td>
      <td><input type="radio" id="bigfive23" name="bigfive23" value="1" required="required">
       <input type="radio" id="bigfive23" name="bigfive23" value="2">
      </td>
      <td><input type="radio" id="bigfive23" name="bigfive23" value="3"> </td>
      <td><input type="radio" id="bigfive23" name="bigfive23" value="4">
       <input type="radio" id="bigfive23" name="bigfive23" value="5"></td>
    </tr>

    <tr>
       <td><p class="color-filed">Is emotionally stable, not easily upset   </p></td>
       <td><input type="radio" id="bigfive24" name="bigfive24" value="1" required="required">
        <input type="radio" id="bigfive24" name="bigfive24" value="2">
      </td>
       <td><input type="radio" id="bigfive24" name="bigfive24" value="3"> </td>
       <td><input type="radio" id="bigfive24" name="bigfive24" value="4">
         <input type="radio" id="bigfive24" name="bigfive24" value="5"></td>
    </tr>


    <tr>
      <td><p class="color-filed">Is inventive  </p></td>
      <td><input type="radio" id="bigfive25" name="bigfive25" value="1" required="required">
        <input type="radio" id="bigfive25" name="bigfive25" value="2">
      </td>
       <td><input type="radio" id="bigfive25" name="bigfive25" value="3"> </td>
       <td><input type="radio" id="bigfive25" name="bigfive25" value="4">
         <input type="radio" id="bigfive25" name="bigfive25" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Has an assertive personality  </p></td>
      <td><input type="radio" id="bigfive26" name="bigfive26" value="1" required="required">
       <input type="radio" id="bigfive26" name="bigfive26" value="2">
      </td>
      <td><input type="radio" id="bigfive26" name="bigfive26" value="3"> </td>
      <td><input type="radio" id="bigfive26" name="bigfive26" value="4">
       <input type="radio" id="bigfive26" name="bigfive26" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Can be cold and aloof </p></td>
      <td><input type="radio" id="bigfive27" name="bigfive27" value="1" required="required">
       <input type="radio" id="bigfive27" name="bigfive27" value="2">
      </td>
      <td><input type="radio" id="bigfive27" name="bigfive27" value="3"> </td>
      <td><input type="radio" id="bigfive27" name="bigfive27" value="4">
       <input type="radio" id="bigfive27" name="bigfive27" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Perseveres until the task is finished</p></td>
      <td><input type="radio" id="bigfive28" name="bigfive28" value="1" required="required">
       <input type="radio" id="bigfive28" name="bigfive28" value="2">
      </td>
      <td><input type="radio" id="bigfive28" name="bigfive28" value="3"> </td>
      <td><input type="radio" id="bigfive28" name="bigfive28" value="4">
       <input type="radio" id="bigfive28" name="bigfive28" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Can be moody  </p></td>
      <td><input type="radio" id="bigfive29" name="bigfive29" value="1" required="required">
       <input type="radio" id="bigfive29" name="bigfive29" value="2">
      </td>
      <td><input type="radio" id="bigfive29" name="bigfive29" value="3"> </td>
      <td><input type="radio" id="bigfive29" name="bigfive29" value="4">
       <input type="radio" id="bigfive29" name="bigfive29" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Values artistic, aesthetic experiences  </p></td>
      <td><input type="radio" id="bigfive30" name="bigfive30" value="1" required="required">
       <input type="radio" id="bigfive30" name="bigfive30" value="2">
      </td>
      <td><input type="radio" id="bigfive30" name="bigfive30" value="3"> </td>
      <td><input type="radio" id="bigfive30" name="bigfive30" value="4">
       <input type="radio" id="bigfive30" name="bigfive30" value="5"></td>
    </tr>
 
</table>


      
  

      <button id="previous" onclick="backPhase2()">Previous</button>
      <button id="next" onclick="processPhase2()">Next</button>
    </div>
    <!-- end phase2 -->

    

   

    

    <!-- start phase3 -->
    <div id="phase3">
     <table>
  <tr>
  <th></th>
    <th><p>INACCURATE</p></th>
    <th><p>NEUTRAL</p></th>
    <th><p>ACCURATE</p></th> 
  </tr>


  <tr>
    <td> Is sometimes shy, inhibited  </td>
      <td><input type="radio" class="option-input radio" name="bigfive31" value="1"  required="required">
      <input type="radio" id="bigfive31" name="bigfive31" value="2">
      </td>
    <td><input type="radio" id="bigfive31" name="bigfive31" value="3"> </td>
    <td><input type="radio" id="bigfive31" name="bigfive31" value="4">
        <input type="radio" id="bigfive31" name="bigfive31" value="5"></td>
  </tr>
  

   <tr>
    <td><p class="color-filed"> Is considerate and kind to almost everyone </p></td>

    <td><input type="radio" id="bigfive32" name="bigfive32" value="1" required="required">
      <input type="radio" id="bigfive32" name="bigfive32" value="2">
    </td>
    <td><input type="radio" id="bigfive32" name="bigfive32" value="3"> </td>
    <td><input type="radio" id="bigfive32" name="bigfive32" value="4">
       <input type="radio" id="bigfive32" name="bigfive32" value="5"></td>
   </tr>

    <tr>
     <td><p class="color-filed">Does things efficiently   </p></td>
     <td><input type="radio" id="bigfive33" name="bigfive33" value="1" required="required">
      <input type="radio" id="bigfive33" name="bigfive33" value="2">
     </td>
     <td><input type="radio" id="bigfive33" name="bigfive33" value="3"> </td>
     <td><input type="radio" id="bigfive33" name="bigfive33" value="4">
      <input type="radio" id="bigfive33" name="bigfive33" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Remains calm in tense situations </p></td>
      <td><input type="radio" id="bigfive34" name="bigfive34" value="1" required="required">
       <input type="radio" id="bigfive34" name="bigfive34" value="2">
      </td>
      <td><input type="radio" id="bigfive34" name="bigfive34" value="3"> </td>
      <td><input type="radio" id="bigfive34" name="bigfive34" value="4">
        <input type="radio" id="bigfive34" name="bigfive34" value="5"></td>
    </tr>

    <tr>
       <td><p class="color-filed">Prefers work that is routine </p></td>
       <td><input type="radio" id="bigfive35" name="bigfive35" value="1" required="required">
        <input type="radio" id="bigfive35" name="bigfive35" value="2">
      </td>
      <td><input type="radio" id="bigfive35" name="bigfive35" value="3" required="required"> </td>
      <td><input type="radio" id="bigfive35" name="bigfive35" value="4">
        <input type="radio" id="bigfive35" name="bigfive35" value="5"></td>
    </tr>



    <tr>
      <td><p class="color-filed">Is outgoing, sociable   </p></td>
      <td><input type="radio" id="bigfive36" name="bigfive36" value="1" required="required">
       <input type="radio" id="bigfive36" name="bigfive36" value="2">
      </td>
      <td><input type="radio" id="bigfive36" name="bigfive36" value="3"> </td>
      <td><input type="radio" id="bigfive36" name="bigfive36" value="4">
       <input type="radio" id="bigfive36" name="bigfive36" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Is sometimes rude to others   </p></td>
      <td><input type="radio" id="bigfive37" name="bigfive37" value="1" required="required">
       <input type="radio" id="bigfive37" name="bigfive37" value="2">
      </td>
      <td><input type="radio" id="bigfive37" name="bigfive37" value="3"> </td>
      <td><input type="radio" id="bigfive37" name="bigfive37" value="4">
       <input type="radio" id="bigfive37" name="bigfive37" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Makes plans and follows through with them   </p></td>
      <td><input type="radio" id="bigfive38" name="bigfive38" value="1" required="required">
       <input type="radio" id="bigfive38" name="bigfive38" value="2">
      </td>
      <td><input type="radio" id="bigfive38" name="bigfive38" value="3"> </td>
      <td><input type="radio" id="bigfive38" name="bigfive38" value="4">
       <input type="radio" id="bigfive38" name="bigfive38" value="5"></td>
    </tr>

    <tr>
       <td><p class="color-filed">Gets nervous easily   </p></td>
       <td><input type="radio" id="bigfive39" name="bigfive39" value="1" required="required">
        <input type="radio" id="bigfive39" name="bigfive39" value="2">
      </td>
       <td><input type="radio" id="bigfive39" name="bigfive39" value="3"> </td>
       <td><input type="radio" id="bigfive39" name="bigfive39" value="4">
         <input type="radio" id="bigfive39" name="bigfive39" value="5"></td>
    </tr>


    <tr>
      <td><p class="color-filed">Likes to reflect, play with ideas  </p></td>
      <td><input type="radio" id="bigfive40" name="bigfive40" value="1" required="required">
        <input type="radio" id="bigfive40" name="bigfive40" value="2">
      </td>
       <td><input type="radio" id="bigfive40" name="bigfive40" value="3"> </td>
       <td><input type="radio" id="bigfive40" name="bigfive40" value="4">
         <input type="radio" id="bigfive40" name="bigfive40" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Has few artistic interests   </p></td>
      <td><input type="radio" id="bigfive41" name="bigfive41" value="1" required="required">
       <input type="radio" id="bigfive41" name="bigfive41" value="2">
      </td>
      <td><input type="radio" id="bigfive41" name="bigfive41" value="3"> </td>
      <td><input type="radio" id="bigfive41" name="bigfive41" value="4">
       <input type="radio" id="bigfive41" name="bigfive41" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Likes to cooperate with others  </p></td>
      <td><input type="radio" id="bigfive42" name="bigfive42" value="1" required="required">
       <input type="radio" id="bigfive42" name="bigfive42" value="2">
      </td>
      <td><input type="radio" id="bigfive42" name="bigfive42" value="3"> </td>
      <td><input type="radio" id="bigfive42" name="bigfive42" value="4">
       <input type="radio" id="bigfive42" name="bigfive42" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed"> Is easily distracted </p></td>
      <td><input type="radio" id="bigfive43" name="bigfive43" value="1" required="required">
       <input type="radio" id="bigfive43" name="bigfive43" value="2">
      </td>
      <td><input type="radio" id="bigfive43" name="bigfive43" value="3"> </td>
      <td><input type="radio" id="bigfive43" name="bigfive43" value="4">
       <input type="radio" id="bigfive43" name="bigfive43" value="5"></td>
    </tr>

    <tr>
      <td><p class="color-filed">Is sophisticated in art, music, or literature </p></td>
      <td><input type="radio" id="bigfive44" name="bigfive44" value="1" required="required">
       <input type="radio" id="bigfive44" name="bigfive44" value="2">
      </td>
      <td><input type="radio" id="bigfive44" name="bigfive44" value="3"> </td>
      <td><input type="radio" id="bigfive44" name="bigfive44" value="4">
       <input type="radio" id="bigfive44" name="bigfive44" value="5"></td>
    </tr>
 
</table>


      

      <button id="previous" onclick="backPhase3()">Previous</button>
      <button id="next" onclick="submitForm()">Save</button>
    </div>
    <!-- end phase3 -->
  </form>
</div>
</body>