<link href="<?php echo base_url();?>/assets/css/bigfive.css" rel='stylesheet' type='text/css' />
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
        $("#progressBar").attr("aria-valuenow","66") ;
        $("#progressBar").css("width","66%");
        /*_("progressBar").value = 66;
        _("status").innerHTML = "Phase 2 of 3";*/
    }
    function processPhase2(){
        _("phase2").style.display = "none";
        _("phase3").style.display = "block";
        $("#progressBar").attr("aria-valuenow","100") ;
        $("#progressBar").css("width","100%");
      /*  _("progressBar").value = 100;
        _("status").innerHTML = "Phase 3 of 3";*/
    }
    
    function backPhase2(){
        _("phase2").style.display = "none";
        _("phase1").style.display = "block";
        $("#progressBar").attr("aria-valuenow","0") ;
        $("#progressBar").css("width","0%");
       /* _("progressBar").value = 33;
        _("status").innerHTML = "Phase 1 of 3";*/
    }
    function backPhase3(){
        _("phase3").style.display = "none";
        _("phase2").style.display = "block";
        $("#progressBar").attr("aria-valuenow","33") ;
        $("#progressBar").css("width","33%");
       /* _("progressBar").value = 66;
        _("status").innerHTML = "Phase 2 of 3";*/
    }
   
    function submitForm(){
        _("multiphase").method = "post";
        _("multiphase").action = '<?php echo base_url();?>index.php/Seeker/BigFiveCalcu';
        _("multiphase").submit();
    }
  </script>
 <div class="mdl-grid site-max-width">
  <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
    <div class="bigfive">
      
    </div>
  
    <div class="mdl-card__actions mdl-card-">
      <!-- cv Form -->
  <div id="form">
  <div id="triangle"></div>
  <?php
         $attributes = array('id' => 'multiphase', 'onsubmit' => 'return false');
          echo form_open_multipart('', $attributes);?>
          <div class="my-2 progress">
            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    <!-- start phase1 -->
    <div id="phase1">
    <table>
  <tr>
  <th></th>
    <th><p>غير دقيق</p></th>
    <th><p>محايد</p></th>
    <th><p>دقيق</p></th> 
  </tr>


  <tr>
    <td>هل انت شخص كثير الكلام</td>
      <td>
          <input type="radio" class="form-check-input" name="bigfive1" value="1" id="radio1" required="required">
            <label class="form-check-label" for="radio1"></label>
          <input type="radio"  id="radio2" class="form-check-input" name="bigfive1" value="2">
            <label class="form-check-label" for="radio2"></label>
      </td>

      <td>
          <input type="radio" id="radio3" class="form-check-input" name="bigfive1" value="3"> 
            <label class="form-check-label" for="radio3"></label>
      </td>

      <td>
           <input type="radio" id="radio4" class="form-check-input" name="bigfive1" value="4">
             <label class="form-check-label" for="radio4"></label>
           <input type="radio" id="radio5" class="form-check-input" name="bigfive1" value="5">
              <label class="form-check-label" for="radio5"></label></td>
  </tr>
  

   <tr>
    <td><p class="color-filed">هل أنت شخص تميل للعثور على خطأ مع الآخرين</p></td>

    <td><input type="radio" id="radio6" class="form-check-input" name="bigfive2" value="1" required="required">
          <label class="form-check-label" for="radio6"></label>

      <input type="radio" id="radio7" class="form-check-input" name="bigfive2" value="2">
      <label class="form-check-label" for="radio7"></label>
    </td>
    <td><input type="radio" id="radio8" class="form-check-input" name="bigfive2" value="3">
    <label class="form-check-label" for="radio8"></label> </td>
    <td><input type="radio" id="radio9" class="form-check-input" name="bigfive2" value="4">
    <label class="form-check-label" for="radio9"></label>
       <input type="radio" id="radio10" class="form-check-input" name="bigfive2" value="5">
       <label class="form-check-label" for="radio10"></label></td>
   </tr>

    <tr>
     <td><p class="color-filed">هل أنت شخص يعمل بشكل دقيق </p></td>
     <td><input type="radio" id="radio11" class="form-check-input" name="bigfive3" value="1" required="required">
     <label class="form-check-label" for="radio11"></label>
      <input type="radio" id="radio12" class="form-check-input" name="bigfive3" value="2">
      <label class="form-check-label" for="radio12"></label></td>
     <td><input type="radio" id="radio13" class="form-check-input" name="bigfive3" value="3">
     <label class="form-check-label" for="radio13"></label> </td>
     <td><input type="radio" id="radio14" class="form-check-input" name="bigfive3" value="4">
     <label class="form-check-label" for="radio14"></label>
      <input type="radio" id="radio15" class="form-check-input" name="bigfive3" value="5">
      <label class="form-check-label" for="radio15"></label></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل انت شخص مكتئب </p></td>
      <td><input type="radio" id="radio16" class="form-check-input" name="bigfive4" value="1" required="required">
      <label class="form-check-label" for="radio16"></label>
       <input type="radio" id="radio17" class="form-check-input" name="bigfive4" value="2">
       <label class="form-check-label" for="radio17"></label>
      </td>
      <td><input type="radio" id="radio18" class="form-check-input" name="bigfive4" value="3">
      <label class="form-check-label" for="radio18"></label> </td>
      <td><input type="radio" id="radio19" class="form-check-input" name="bigfive4" value="4">
      <label class="form-check-label" for="radio19"></label>
        <input type="radio" id="radio20" class="form-check-input" name="bigfive4" value="5">
        <label class="form-check-label" for="radio20"></label></td>
    </tr>

    <tr>
       <td><p class="color-filed">هل أنت شخص تعطي أفكار جديدة  </p></td>
       <td><input type="radio" id="radio21" class="form-check-input" name="bigfive5" value="1" required="required">
       <label class="form-check-label" for="radio21"></label>
        <input type="radio" id="radio22" class="form-check-input" name="bigfive5" value="2">
        <label class="form-check-label" for="radio22"></label>
      </td>
      <td><input type="radio" id="radio23" class="form-check-input" name="bigfive5" value="3" required="required">
      <label class="form-check-label" for="radio23"></label> </td>
      <td><input type="radio" id="radio24" class="form-check-input" name="bigfive5" value="4">
      <label class="form-check-label" for="radio24"></label>
        <input type="radio" id="radio25" class="form-check-input" name="bigfive5" value="5">
        <label class="form-check-label" for="radio25"></label></td>
    </tr>



    <tr>
      <td><p class="color-filed">هل أنت شخص متحفظ ,كتوم </p></td>
      <td><input type="radio" id=radio26" class="form-check-input" name="bigfive6" value="1" required="required">
      <label class="form-check-label" for="radio26"></label>
       <input type="radio" id="radio27" class="form-check-input" name="bigfive" value="2">
       <label class="form-check-label" for="radio27"></label>
      </td>
      <td><input type="radio" id="radio28" class="form-check-input" name="bigfive6" value="3">
      <label class="form-check-label" for="radio28"></label> </td>
      <td><input type="radio" id="radio29" class="form-check-input" name="bigfive6" value="4">
      <label class="form-check-label" for="radio29"></label>
       <input type="radio" id="radio30" class="form-check-input" name="bigfive6" value="5">
       <label class="form-check-label" for="radio30"></label></td>
    </tr>
    <tr>
      <td><p class="color-filed">هل أنت شخص متعاون وتساعد الآخرين </p></td>
      <td><input type="radio" id="radio31" class="form-check-input" name="bigfive7" value="1" required="required">
      <label class="form-check-label" for="radio31"></label>
       <input type="radio" id="radio32" class="form-check-input" name="bigfive7" value="2">
       <label class="form-check-label" for="radio32"></label>
      </td>
      <td><input type="radio" id="radio33" class="form-check-input" name="bigfive7" value="3">
      <label class="form-check-label" for="radio33"></label> </td>
      <td><input type="radio" id="radio34" class="form-check-input" name="bigfive7" value="4">
      <label class="form-check-label" for="radio34"></label>
       <input type="radio" id="radio35" class="form-check-input" name="bigfive7" value="5">
       <label class="form-check-label" for="radio35"></label></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص مهمل الى حد ما  </p></td>
      <td><input type="radio" id="radio36" class="form-check-input" name="bigfive8" value="1" required="required">
      <label class="form-check-label" for="radio36"></label>
       <input type="radio" id="radio37" class="form-check-input" name="bigfive8" value="2">
       <label class="form-check-label" for="radio37"></label>
      </td>
      <td><input type="radio" id="radio38" class="form-check-input" name="bigfive8" value="3">
      <label class="form-check-label" for="radio38"></label> </td>
      <td><input type="radio" id="radio39" class="form-check-input" name="bigfive8" value="4">
      <label class="form-check-label" for="radio39"></label>
       <input type="radio" id="radio40" class="form-check-input" name="bigfive8" value="5">
       <label class="form-check-label" for="radio40"></label></td>
    </tr>

    <tr>
       <td><p class="color-filed">هل انت شخص مرتاح وتساعد الآخرين في ازالة التوتر  </p></td>
       <td><input type="radio" id="radio41" class="form-check-input" name="bigfive9" value="1" required="required">
        <label class="form-check-label" for="radio41"></label>
        <input type="radio" id="radio42" class="form-check-input" name="bigfive9" value="2">
         <label class="form-check-label" for="radio42"></label>
      </td>
       <td><input type="radio" id="radio43" class="form-check-input" name="bigfive9" value="3">
        <label class="form-check-label" for="radio43"></label> </td>
       <td><input type="radio" id="radio44" class="form-check-input" name="bigfive9" value="4">
        <label class="form-check-label" for="radio44"></label>
         <input type="radio" id="radio45" class="form-check-input" name="bigfive9" value="5">
          <label class="form-check-label" for="radio45"></label></td>
    </tr>


    <tr>
      <td><p class="color-filed">هل انت شخص متآلف مع الكثير من الاشياء الغريبة</p></td>
      <td><input type="radio" id="radio46" class="form-check-input" name="bigfive10" value="1" required="required">
      <label class="form-check-label" for="radio46"></label>
        <input type="radio" id="bigfive10" class="form-check-input" name="bigfive10" value="2">
        <label class="form-check-label" for="radio47"></label>
      </td>
       <td><input type="radio" id="radio48" class="form-check-input" name="bigfive10" value="3">
       <label class="form-check-label" for="radio48"></label> </td>
       <td><input type="radio" id="radio49" class="form-check-input" name="bigfive10" value="4">
       <label class="form-check-label" for="radio49"></label>
         <input type="radio" id="radio50" class="form-check-input" name="bigfive10" value="5">
         <label class="form-check-label" for="radio50"></label></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص مليئ بالطاقة </p></td>
      <td><input type="radio" id="radio51" class="form-check-input" name="bigfive11" value="1" required="required">
      <label class="form-check-label" for="radio51">
       <input type="radio" id="radio52" class="form-check-input" name="bigfive11" value="2">
       <label class="form-check-label" for="radio52">
      </td>
      <td><input type="radio" id="radio53" class="form-check-input" name="bigfive11" value="3">
      <label class="form-check-label" for="radio53"> </td>
      <td><input type="radio" id="radio54" class="form-check-input" name="bigfive11" value="4">
      <label class="form-check-label" for="radio54">
       <input type="radio" id="radio55" class="form-check-input" name="bigfive11" value="5">
       <label class="form-check-label" for="radio55"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل انت شخص يفتعل المشاكل مع الأخرين</p></td>
      <td><input type="radio" class="form-check-input" id="radio56" name="bigfive12" value="1" required="required">
      <label class="form-check-label" for="radio56">
       <input type="radio" id="radio57" class="form-check-input" name="bigfive12" value="2">
       <label class="form-check-label" for="radio57">
      </td>
      <td><input type="radio" id="radio58" class="form-check-input" name="bigfive12" value="3">
      <label class="form-check-label" for="radio58"> </td>
      <td><input type="radio" id="radio59" class="form-check-input" name="bigfive12" value="4">
      <label class="form-check-label" for="radio59">
       <input type="radio" id="radio60" class="form-check-input" name="bigfive12" value="5">
       <label class="form-check-label" for="radio60"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص يوثق به </p></td>
      <td><input type="radio" id="radio61" class="form-check-input" name="bigfive13" value="1" required="required">
      <label class="form-check-label" for="radio61">
       <input type="radio" id="radio62" class="form-check-input" name="bigfive13" value="2">
       <label class="form-check-label" for="radio62">
      </td>
      <td><input type="radio" id="radio63" class="form-check-input" name="bigfive13" value="3">
      <label class="form-check-label" for="radio63"> </td>
      <td><input type="radio" id="radio64" class="form-check-input" name="bigfive13" value="4">
      <label class="form-check-label" for="radio64">
       <input type="radio" id="radio65" class="form-check-input" name="bigfive13" value="5">
       <label class="form-check-label" for="radio65"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص يمكن أن تكون متوتر</p></td>
      <td><input type="radio" id="radio66" class="form-check-input" name="bigfive14" value="1" required="required">
      <label class="form-check-label" for="radio66">
       <input type="radio" id="radio67" class="form-check-input" name="bigfive14" value="2">
       <label class="form-check-label" for="radio67">
      </td>
      <td><input type="radio" id="radio68" class="form-check-input" name="bigfive14" value="3">
      <label class="form-check-label" for="radio68"></td>
      <td><input type="radio" id="radio69" class="form-check-input" name="bigfive14" value="4">
      <label class="form-check-label" for="radio69">
       <input type="radio" id="radio70" class="form-check-input" name="bigfive14" value="5">
       <label class="form-check-label" for="radio70"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص عبقري ذو تفكير عميق</p></td>
      <td><input type="radio" id="radio71" class="form-check-input" name="bigfive15" value="1" required="required">
      <label class="form-check-label" for="radio71">
       <input type="radio" id="radio72" class="form-check-input" name="bigfive15" value="2">
       <label class="form-check-label" for="radio72">
      </td>
      <td><input type="radio" id="radio73" class="form-check-input" name="bigfive15" value="3">
      <label class="form-check-label" for="radio73"> </td>
      <td><input type="radio" id="radio74" class="form-check-input" name="bigfive15" value="4">
      <label class="form-check-label" for="radio74">
       <input type="radio" id="radio75" class="form-check-input" name="bigfive15" value="5">
       <label class="form-check-label" for="radio75"></td>
    </tr>

    
 
</table>
<div style="margin: 0 auto;">
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light">
                  
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="processPhase1()">
                  <i class="fa fa-forward"></i>
              </a>
            </div>

      <!-- <button id="next" onclick="processPhase1()">Next</button> -->
    </div>
    <!-- end phase1 -->
  
    <!-- start phase2 -->  
    <div id="phase2">
     <table>
  <tr>
  <th></th>
    <th><p>غير دقيق</p></th>
    <th><p>محايد</p></th>
    <th><p>دقيق</p></th> 
  </tr>


  <tr>
    <td>هل انت شخص تولد الكثير من الحماس </td>
      <td><input type="radio" id="radio76" class="form-check-input" name="bigfive16" value="1"  required="required">
      <label class="form-check-label" for="radio76">
      <input type="radio" id="radio77" class="form-check-input" name="bigfive16" value="2">
      <label class="form-check-label" for="radio77">
      </td>
    <td><input type="radio" id="radio78" class="form-check-input" name="bigfive16" value="3">
    <label class="form-check-label" for="radio78"></td>
    <td><input type="radio" id="radio79" class="form-check-input" name="bigfive16" value="4">
    <label class="form-check-label" for="radio79">
        <input type="radio" id="radio80" class="form-check-input" name="bigfive16" value="5">
        <label class="form-check-label" for="radio80"></td>
  </tr>
  

   <tr>
    <td><p class="color-filed"> هل انت شخص متسامح </p></td>

    <td><input type="radio" id="radio81" class="form-check-input" name="bigfive17" value="1" required="required">
     <label class="form-check-label" for="radio81">
      <input type="radio" id="radio82" class="form-check-input" name="bigfive17" value="2">
       <label class="form-check-label" for="radio82">
    </td>
    <td><input type="radio" id="radio83" class="form-check-input" name="bigfive17" value="3">
     <label class="form-check-label" for="radio83"> </td>
    <td><input type="radio" id="radio84" class="form-check-input" name="bigfive17" value="4">
     <label class="form-check-label" for="radio84">
       <input type="radio" id="radio85" class="form-check-input" name="bigfive17" value="5">
        <label class="form-check-label" for="radio85"></td>
   </tr>

    <tr>
     <td><p class="color-filed">هل أنت شخص تميل لعدم الانتظام</p></td>
     <td><input type="radio" id="radio86" class="form-check-input" name="bigfive18" value="1" required="required">
     <label class="form-check-label" for="radio86">
      <input type="radio" id="radio87" class="form-check-input" name="bigfive18" value="2">
      <label class="form-check-label" for="radio87">
     </td>
     <td><input type="radio" id="radio88" class="form-check-input" name="bigfive18" value="3">
     <label class="form-check-label" for="radio88"> </td>
     <td><input type="radio" id="radio89" class="form-check-input" name="bigfive18" value="4">
     <label class="form-check-label" for="radio89">
      <input type="radio" id="radio90" class="form-check-input" name="bigfive18" value="5">
      <label class="form-check-label" for="radio90"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص قلق كثيرا</p></td>
      <td><input type="radio" id="radio91" class="form-check-input" name="bigfive19" value="1" required="required">
      <label class="form-check-label" for="radio91">
       <input type="radio" id="radio92" class="form-check-input" name="bigfive19" value="2">
       <label class="form-check-label" for="radio92">
      </td>
      <td><input type="radio" id="radio93" class="form-check-input" name="bigfive19" value="3">
      <label class="form-check-label" for="radio93"> </td>
      <td><input type="radio" id="radio94" class="form-check-input" name="bigfive19" value="4">
       <label class="form-check-label" for="radio94">
        <input type="radio" id="radio95" class="form-check-input" name="bigfive19" value="5">
        <label class="form-check-label" for="radio95"></td>
    </tr>

    <tr>
       <td><p class="color-filed">هل أنت شخص ذو خيال نشط</p></td>
       <td><input type="radio" id="radio96" class="form-check-input" name="bigfive20" value="1" required="required">
       <label class="form-check-label" for="radio96">
        <input type="radio" id="radio97" class="form-check-input" name="bigfive20" value="2">
        <label class="form-check-label" for="radio97">
      </td>
      <td><input type="radio" id="radio98" class="form-check-input" name="bigfive20" value="3" required="required">
      <label class="form-check-label" for="radio98"> </td>
      <td><input type="radio" id="radio99" class="form-check-input" name="bigfive20" value="4">
      <label class="form-check-label" for="radio99">
        <input type="radio" id="radio100" class="form-check-input"  name="bigfive20" value="5">
        <label class="form-check-label" for="radio100"></td>
    </tr>



    <tr>
      <td><p class="color-filed">هل أنت شخص هادئ </p></td>
      <td><input type="radio" id="bigfive21" class="form-check-input" name="bigfive21" value="1" required="required">
      <label class="form-check-label" for="radio101">
       <input type="radio" id="radio102" class="form-check-input" name="bigfive21" value="2">
       <label class="form-check-label" for="radio102">
      </td>
      <td><input type="radio" id="radio103" class="form-check-input" name="bigfive21" value="3">
      <label class="form-check-label" for="radio103"> </td>
      <td><input type="radio" id="radio104" class="form-check-input" name="bigfive21" value="4">
      <label class="form-check-label" for="radio104">
       <input type="radio" id="radio105" class="form-check-input" name="bigfive21" value="5">
       <label class="form-check-label" for="radio105"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص لديه ثقة بكل من يلقاه </p></td>
      <td><input type="radio" id="radio106" class="form-check-input" name="bigfive22" value="1" required="required">
      <label class="form-check-label" for="radio106">
       <input type="radio" id="radio107" class="form-check-input" name="bigfive22" value="2">
       <label class="form-check-label" for="radio107">
      </td>
      <td><input type="radio" id="radio108" class="form-check-input" name="bigfive22" value="3">
      <label class="form-check-label" for="radio108"> </td>
      <td><input type="radio" id="radio109" class="form-check-input" name="bigfive22" value="4">
      <label class="form-check-label" for="radio109">
       <input type="radio" id="radio110" class="form-check-input" name="bigfive22" value="5">
       <label class="form-check-label" for="radio110"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل انت شخص تميل للكسل</p></td>
      <td><input type="radio" id="radio111" class="form-check-input" name="bigfive23" value="1" required="required">
      <label class="form-check-label" for="radio111">
       <input type="radio" id="radio112" class="form-check-input" name="bigfive23" value="2">
       <label class="form-check-label" for="radio112">
      </td>
      <td><input type="radio" id="radio113" class="form-check-input" name="bigfive23" value="3">
      <label class="form-check-label" for="radio113"> </td>
      <td><input type="radio" id="radio114" class="form-check-input" name="bigfive23" value="4">
      <label class="form-check-label" for="radio114">
       <input type="radio" id="radio115" class="form-check-input" name="bigfive23" value="5">
       <label class="form-check-label" for="radio115"></td>
    </tr>

    <tr>
       <td><p class="color-filed">هل أنت شخص مستقر عاطفيا,لا ينفعل بسهولة</p></td>
       <td><input type="radio" id="radio116" class="form-check-input" name="bigfive24" value="1" required="required">
       <label class="form-check-label" for="radio116">
        <input type="radio" id="radio117" class="form-check-input" name="bigfive24" value="2">
        <label class="form-check-label" for="radio117">
      </td>
       <td><input type="radio" id="radio118" class="form-check-input" name="bigfive24" value="3">
       <label class="form-check-label" for="radio118"> </td>
       <td><input type="radio" id="radio119" class="form-check-input" name="bigfive24" value="4">
       <label class="form-check-label" for="radio119">
         <input type="radio" id="radio120" class="form-check-input" name="bigfive24" value="5">
         <label class="form-check-label" for="radio120"></td>
    </tr>


    <tr>
      <td><p class="color-filed">هل أنت شخص مبتكر</p></td>
      <td><input type="radio" id="radio121" class="form-check-input" name="bigfive25" value="1" required="required">
      <label class="form-check-label" for="radio121">
        <input type="radio" id="radio122" class="form-check-input" name="bigfive25" value="2">
        <label class="form-check-label" for="radio122">
      </td>
       <td><input type="radio" id="radio123" class="form-check-input" name="bigfive25" value="3">
       <label class="form-check-label" for="radio123"> </td>
       <td><input type="radio" id="radio124" class="form-check-input" name="bigfive25" value="4">
       <label class="form-check-label" for="radio124">
         <input type="radio" id="radio125" class="form-check-input" name="bigfive25" value="5">
         <label class="form-check-label" for="radio125"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص حازم</p></td>
      <td><input type="radio" id="radio126" class="form-check-input" name="bigfive26" value="1" required="required">
      <label class="form-check-label" for="radio126">
       <input type="radio" id="radio127" class="form-check-input" name="bigfive26" value="2">
       <label class="form-check-label" for="radio127">
      </td>
      <td><input type="radio" id="radio128" class="form-check-input" name="bigfive26" value="3">
      <label class="form-check-label" for="radio128"> </td>
      <td><input type="radio" id="radio129" class="form-check-input" name="bigfive26" value="4">
      <label class="form-check-label" for="radio129">
       <input type="radio" id="radio130" class="form-check-input" name="bigfive26" value="5">
       <label class="form-check-label" for="radio130"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص منعزل</p></td>
      <td><input type="radio" id="radio131" class="form-check-input" name="bigfive27" value="1" required="required">
       <label class="form-check-label" for="radio131">
       <input type="radio" id="radio132" class="form-check-input" name="bigfive27" value="2">
        <label class="form-check-label" for="radio132">
      </td>
      <td><input type="radio" id="radio133" class="form-check-input" name="bigfive27" value="3">
       <label class="form-check-label" for="radio133"> </td>
      <td><input type="radio" id="radio134" class="form-check-input" name="bigfive27" value="4">
       <label class="form-check-label" for="radio134">
       <input type="radio" id="radio135" class="form-check-input" name="bigfive27" value="5">
        <label class="form-check-label" for="radio135"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص مثابر لانتهاء مهامه</p></td>
      <td><input type="radio" id="radio136" class="form-check-input" name="bigfive28" value="1" required="required">
      <label class="form-check-label" for="radio136">
       <input type="radio" id="radio137" class="form-check-input" name="bigfive28" value="2">
       <label class="form-check-label" for="radio137">
      </td>
      <td><input type="radio" id="radio138" class="form-check-input" name="bigfive28" value="3">
      <label class="form-check-label" for="radio138"> </td>
      <td><input type="radio" id="radio139" class="form-check-input" name="bigfive28" value="4">
      <label class="form-check-label" for="radio139">
       <input type="radio" id="radio140" class="form-check-input" name="bigfive28" value="5">
       <label class="form-check-label" for="radio140"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص متقلب المزاج</p></td>
      <td><input type="radio" id="radio141" class="form-check-input" name="bigfive29" value="1" required="required">
      <label class="form-check-label" for="radio141">
       <input type="radio" id="radio142" class="form-check-input" name="bigfive29" value="2">
       <label class="form-check-label" for="radio142">
      </td>
      <td><input type="radio" id="radio143" class="form-check-input" name="bigfive29" value="3">
      <label class="form-check-label" for="radio143"> </td>
      <td><input type="radio" id="radio144" class="form-check-input" name="bigfive29" value="4">
      <label class="form-check-label" for="radio144">
       <input type="radio" id="radio145" class="form-check-input" name="bigfive29" value="5">
       <label class="form-check-label" for="radio145"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص مهتم بالقيم الفنية والتجارب الجمالية </p></td>
      <td><input type="radio" id="radio146" class="form-check-input" name="bigfive30" value="1" required="required">
      <label class="form-check-label" for="radio146">
       <input type="radio" id="radio147" class="form-check-input" name="bigfive30" value="2">
       <label class="form-check-label" for="radio147">
      </td>
      <td><input type="radio" id="radio148" class="form-check-input" name="bigfive30" value="3">
      <label class="form-check-label" for="radio148"> </td>
      <td><input type="radio" id="radio149" class="form-check-input" name="bigfive30" value="4">
      <label class="form-check-label" for="radio149">
       <input type="radio" id="radio150" class="form-check-input" name="bigfive30" value="5">
       <label class="form-check-label" for="radio150"></td>
    </tr>
 
</table>
            <div>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light"  onclick="backPhase2()">
                  <i class="fa fa-backward"></i>
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="processPhase2()">
                  <i class="fa fa-forward"></i>
              </a>
            </div>



      
  

      <!-- <button id="previous" onclick="backPhase2()">Previous</button>
      <button id="next" onclick="processPhase2()">Next</button> -->
    </div>
    <!-- end phase2 -->

    

   

    

    <!-- start phase3 -->
    <div id="phase3">
     <table>
  <tr>
  <th></th>
    <th><p>غير دقيق</p></th>
    <th><p>محايد</p></th>
    <th><p>دقيق</p></th> 
  </tr>


  <tr>
    <td>هل أنت شخص خجول </td>
      <td><input type="radio" class="form-check-input" id="radio151" name="bigfive31" value="1"  required="required">
      <label class="form-check-label" for="radio151">
      <input type="radio" id="radio152" class="form-check-input" name="bigfive31" value="2">
      <label class="form-check-label" for="radio152">
      </td>
    <td><input type="radio" id="radio153" class="form-check-input" name="bigfive31" value="3">
    <label class="form-check-label" for="radio153"> </td>
    <td><input type="radio" id="radio154" class="form-check-input" name="bigfive31" value="4">
    <label class="form-check-label" for="radio154">
        <input type="radio" id="radio155" class="form-check-input" name="bigfive31" value="5">
        <label class="form-check-label" for="radio155"></td>
  </tr>
  

   <tr>
    <td><p class="color-filed">هل أنت شخص متفهم للجميع</p></td>

    <td><input type="radio" id="radio156" class="form-check-input" name="bigfive32" value="1" required="required">
    <label class="form-check-label" for="radio156">
      <input type="radio" id="radio157" class="form-check-input" name="bigfive32" value="2">
      <label class="form-check-label" for="radio157">
    </td>
    <td><input type="radio" id="radio158" class="form-check-input" name="bigfive32" value="3">
    <label class="form-check-label" for="radio158"> </td>
    <td><input type="radio" id="radio159" class="form-check-input" name="bigfive32" value="4">
    <label class="form-check-label" for="radio159">
       <input type="radio" id="radio160" class="form-check-input" name="bigfive32" value="5">
       <label class="form-check-label" for="radio160"></td>
   </tr>

    <tr>
     <td><p class="color-filed">هل أنت شخص ينفذ الأشياء بكفاءة</p></td>
     <td><input type="radio" id="radio161" class="form-check-input" name="bigfive33" value="1" required="required">
     <label class="form-check-label" for="radio161">
      <input type="radio" id="radio162" class="form-check-input" name="bigfive33" value="2">
      <label class="form-check-label" for="radio162">
     </td>
     <td><input type="radio" id="radio163" class="form-check-input" name="bigfive33" value="3">
     <label class="form-check-label" for="radio163"></td>
     <td><input type="radio" id="radio164" class="form-check-input" name="bigfive33" value="4">
     <label class="form-check-label" for="radio164">
      <input type="radio" id="radio165" class="form-check-input" name="bigfive33" value="5">
      <label class="form-check-label" for="radio165"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص يضبط أفعاله في حالات التوتر</p></td>
      <td><input type="radio" id="radio166" class="form-check-input" name="bigfive34" value="1" required="required">
      <label class="form-check-label" for="radio166">
       <input type="radio" id="radio167" class="form-check-input" name="bigfive34" value="2">
       <label class="form-check-label" for="radio167">
      </td>
      <td><input type="radio" id="radio168" class="form-check-input" name="bigfive34" value="3">
      <label class="form-check-label" for="radio168"> </td>
      <td><input type="radio" id="radio169" class="form-check-input" name="bigfive34" value="4">
      <label class="form-check-label" for="radio169">
        <input type="radio" id="radio170" class="form-check-input" name="bigfive34" value="5">
        <label class="form-check-label" for="radio170"></td>
    </tr>

    <tr>
       <td><p class="color-filed">هل أنت شخص يفضل الروتين في العمل </p></td>
       <td><input type="radio" id="radio171" class="form-check-input" name="bigfive35" value="1" required="required">
       <label class="form-check-label" for="radio171">
        <input type="radio" id="radio172" class="form-check-input" name="bigfive35" value="2">
        <label class="form-check-label" for="radio172">
      </td>
      <td><input type="radio" id="radio173" class="form-check-input" name="bigfive35" value="3" required="required">
      <label class="form-check-label" for="radio173"> </td>
      <td><input type="radio" id="radio174" class="form-check-input" name="bigfive35" value="4">
      <label class="form-check-label" for="radio174">
        <input type="radio" id="radio175" class="form-check-input" name="bigfive35" value="5">
        <label class="form-check-label" for="radio175"></td>
    </tr>



    <tr>
      <td><p class="color-filed">هل أنت شخص اجتماعي   </p></td>
      <td><input type="radio" id="radio176" class="form-check-input" name="bigfive36" value="1" required="required">
       <label class="form-check-label" for="radio176">
       <input type="radio" id="radio177" class="form-check-input" name="bigfive36" value="2">
        <label class="form-check-label" for="radio177">
      </td>
      <td><input type="radio" id="radio178" class="form-check-input" name="bigfive36" value="3">
       <label class="form-check-label" for="radio178"> </td>
      <td><input type="radio" id="radio179" class="form-check-input" name="bigfive36" value="4">
       <label class="form-check-label" for="radio179">
       <input type="radio" id="radio180" class="form-check-input" name="bigfive36" value="5">
        <label class="form-check-label" for="radio180"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص فظ في الرد على الآخرين </p></td>
      <td><input type="radio" id="radio181" class="form-check-input" name="bigfive37" value="1" required="required">
      <label class="form-check-label" for="radio181">
       <input type="radio" id="radio182" class="form-check-input" name="bigfive37" value="2">
       <label class="form-check-label" for="radio182">
      </td>
      <td><input type="radio" id="radio183" class="form-check-input" name="bigfive37" value="3">
      <label class="form-check-label" for="radio183"> </td>
      <td><input type="radio" id="radio184" class="form-check-input" name="bigfive37" value="4">
      <label class="form-check-label" for="radio184">
       <input type="radio" id="radio185" class="form-check-input" name="bigfive37" value="5">
       <label class="form-check-label" for="radio185"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل انت شخص يضع الخطط في عمله ويسير عليها</p></td>
      <td><input type="radio" id="radio186" class="form-check-input" name="bigfive38" value="1" required="required">
      <label class="form-check-label" for="radio186">
       <input type="radio" id="radio187" class="form-check-input" name="bigfive38" value="2">
       <label class="form-check-label" for="radio187">
      </td>
      <td><input type="radio" id="radio188" class="form-check-input" name="bigfive38" value="3">
      <label class="form-check-label" for="radio188"> </td>
      <td><input type="radio" id="radio189" class="form-check-input" name="bigfive38" value="4">
      <label class="form-check-label" for="radio189">
       <input type="radio" id="radio190" class="form-check-input" name="bigfive38" value="5">
       <label class="form-check-label" for="radio190"></td>
    </tr>

    <tr>
       <td><p class="color-filed">هل انت شخص ينفعل بسهولة</p></td>
       <td><input type="radio" id="radio191" class="form-check-input" name="bigfive39" value="1" required="required">
       <label class="form-check-label" for="radio191">
        <input type="radio" id="radio192" class="form-check-input" name="bigfive39" value="2">
        <label class="form-check-label" for="radio192">
      </td>
       <td><input type="radio" id="radio193" class="form-check-input" name="bigfive39" value="3">
       <label class="form-check-label" for="radio193"> </td>
       <td><input type="radio" id="radio194" class="form-check-input" name="bigfive39" value="4">
       <label class="form-check-label" for="radio194">
         <input type="radio" id="radio195" class="form-check-input" name="bigfive39" value="5">
         <label class="form-check-label" for="radio195"></td>
    </tr>


    <tr>
      <td><p class="color-filed">هل أنت شخص مفكر جيد</p></td>
      <td><input type="radio" id="radio196" class="form-check-input" name="bigfive40" value="1" required="required">
       <label class="form-check-label" for="radio196">
        <input type="radio" id="radio197" class="form-check-input" name="bigfive40" value="2">
         <label class="form-check-label" for="radio197">
      </td>
       <td><input type="radio" id="radio198" class="form-check-input" name="bigfive40" value="3">
        <label class="form-check-label" for="radio198"> </td>
       <td><input type="radio" id="radio199" class="form-check-input" name="bigfive40" value="4">
        <label class="form-check-label" for="radio199">
         <input type="radio" id="radio200" class="form-check-input" name="bigfive40" value="5">
          <label class="form-check-label" for="radio200"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل انت شخص لديه اهتمامات فنية</p></td>
      <td><input type="radio" id="radio201" class="form-check-input" name="bigfive41" value="1" required="required">
      <label class="form-check-label" for="radio201">
       <input type="radio" id="radio202" class="form-check-input" name="bigfive41" value="2">
       <label class="form-check-label" for="radio202">
      </td>
      <td><input type="radio" id="radio203" class="form-check-input" name="bigfive41" value="3">
      <label class="form-check-label" for="radio203"> </td>
      <td><input type="radio" id="radio204" class="form-check-input" name="bigfive41" value="4">
      <label class="form-check-label" for="radio204">
       <input type="radio" id="radio205" class="form-check-input" name="bigfive41" value="5">
       <label class="form-check-label" for="radio205"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص يحب التعاون مع الآخرين</p></td>
      <td><input type="radio" id="radio206" class="form-check-input" name="bigfive42" value="1" required="required">
      <label class="form-check-label" for="radio206">
       <input type="radio" id="radio207" class="form-check-input" name="bigfive42" value="2">
       <label class="form-check-label" for="radio207">
      </td>
      <td><input type="radio" id="radio208" class="form-check-input" name="bigfive42" value="3">
      <label class="form-check-label" for="radio208"></td>
      <td><input type="radio" id="radio209" class="form-check-input" name="bigfive42" value="4">
      <label class="form-check-label" for="radio209">
       <input type="radio" id="radio210" class="form-check-input" name="bigfive42" value="5">
       <label class="form-check-label" for="radio210"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص متحير,مشتت الذهن</p></td>
      <td><input type="radio" id="radio211" class="form-check-input" name="bigfive43" value="1" required="required">
      <label class="form-check-label" for="radio211">
       <input type="radio" id="radio212" class="form-check-input" name="bigfive43" value="2">
       <label class="form-check-label" for="radio212">
      </td>
      <td><input type="radio" id="radio213" class="form-check-input" name="bigfive43" value="3">
      <label class="form-check-label" for="radio213"> </td>
      <td><input type="radio" id="radio214" class="form-check-input" name="bigfive43" value="4">
      <label class="form-check-label" for="radio214">
       <input type="radio" id="radio215" class="form-check-input" name="bigfive43" value="5">
       <label class="form-check-label" for="radio215"></td>
    </tr>

    <tr>
      <td><p class="color-filed">هل أنت شخص متطور في الفن أو الأدب أو الموسيقا</p></td>
      <td><input type="radio" id="radio216" class="form-check-input" name="bigfive44" value="1" required="required">
      <label class="form-check-label" class="form-check-input" for="radio216">
       <input type="radio" id="radio217" class="form-check-input" name="bigfive44" value="2">
       <label class="form-check-label" for="radio217">
      </td>
      <td><input type="radio" id="radio218" class="form-check-input" name="bigfive44" value="3">
      <label class="form-check-label" for="radio218"> </td>
      <td><input type="radio" id="radio219" class="form-check-input" name="bigfive44" value="4">
      <label class="form-check-label" for="radio219">
       <input type="radio" id="radio220" class="form-check-input" name="bigfive44" value="5">
       <label class="form-check-label" for="radio220"></td>
    </tr>
 
</table>
 <div>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="backPhase3()">
                  <i class="fa fa-backward"></i>
              </a>
              <a type="button" class="btn-floating my-1 btn-ins waves-effect waves-light" onclick="submitForm()">
                  <i class="fa fa-save"></i>
              </a>
            </div>



      

     <!--  <button id="previous" onclick="backPhase3()">Previous</button>
      <button id="next" onclick="submitForm()">Save</button> -->
    </div>
    <!-- end phase3 -->
  </form>
</div>
</div>
</div>
</div>
