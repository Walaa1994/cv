<?php
libxml_disable_entity_loader(false);
defined('BASEPATH') OR exit('No direct script access allowed');
//this class for convert pdf to text
include(APPPATH.'controllers/pdf2text.php');

class Seeker extends CI_Controller {

    public function index()
    {
		$this->data['pageTitle']='Seeker Home';
        $this->data['subview'] = 'seeker_home';
        $this->load->view('layouts/layout', $this->data);
    }
    //commite batoul

    public function CVForm()
    {
        $this->data['pageTitle']='Create Resume';
        $this->data['subview'] = 'cv_form';
        $this->load->view('layouts/layout', $this->data);
    }

    public function CVFormInfo()
    {
        //Personal Information
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $birth_date = $this->input->post('birth_date');
        $nationality = $this->input->post('nationality');
        $marital_state = $this->input->post('marital_state');
        $gender = $this->input->post('gender');
        $country = $this->input->post('country');
        $city = $this->input->post('city');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');

        //Education
        $cert_name = $this->input->post('cert_name');
        $spe_name = $this->input->post('spe_name');
        $start_date = $this->input->post('start_date');
        $grants_date = $this->input->post('grants_date');
        $donor = $this->input->post('donor');
        $degreeType = $this->input->post('degreeType');
        

        //Work Experience
        $company_name = $this->input->post('company_name');
        $job_pos = $this->input->post('job_pos');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $careerLevel = $this->input->post('careerLevel');
        $jobType = $this->input->post('JobType');
        //var_dump($jobType);
        $isCurrent = $this->input->post('IsCurrent');
        //var_dump($isCurrent);

        //Personal Skills
        $skill_name = $this->input->post('skill_name');
        $year_exp = $this->input->post('year_exp');
        $SkillLevel=$this->input->post('SkillLevel');

        //languages
        $Language_Name = $this->input->post('Language_Name');
        $Spoken_Level = $this->input->post('Spoken_Level');
        $Reading_Level = $this->input->post('Reading_Level');
        $Writing_Level = $this->input->post('Writing_Level');

        //References & Referees
        $ref_name = $this->input->post('ref_name');
        $ref_phone = $this->input->post('ref_phone');
        $ref_email = $this->input->post('ref_email');
        $IsActive = $this->input->post('IsActive');

        //creating xml file
        $xml = new DOMDocument("1.0","UTF-8");
        $xml->formatOutput = true;

        //append root tag
        $rootTag = $xml->createElement('resume');
        $xml->appendChild($rootTag);
        
        //is active
        $IDTag=$xml->createElement("ID",$this->session->userdata('u_id'));
        $rootTag->appendChild($IDTag);

        $IsActiveTag=$xml->createElement("IsActive",$IsActive);
        $rootTag->appendChild($IsActiveTag);

        //personalinformation
        $dataTag=$xml->createElement("PersonalInfo");
        $first_nameTag=$xml->createElement("firstName",$first_name);
        $last_nameTag=$xml->createElement("lastName", $last_name);
        $birth_dateTag=$xml->createElement("birthday", $birth_date);
        $nationalityTag=$xml->createElement("Nationality", $nationality);
        $marital_stateTag=$xml->createElement("MaritalStatus", $marital_state);
        $genderTag=$xml->createElement("gender", $gender);
        $countryTag=$xml->createElement("country-name", $country);
        $cityTag=$xml->createElement("locality", $city);
        $addressTag=$xml->createElement("street-address", $address);
        $emailTag=$xml->createElement("Email",  $email);
        $phoneTag=$xml->createElement("Telephone", $phone);
        $dataTag->appendChild($first_nameTag);
        $dataTag->appendChild($last_nameTag);
        $dataTag->appendChild($birth_dateTag);
        $dataTag->appendChild($nationalityTag);
        $dataTag->appendChild($marital_stateTag);
        $dataTag->appendChild($genderTag);
        $dataTag->appendChild($countryTag);
        $dataTag->appendChild($cityTag);
        $dataTag->appendChild($addressTag);
        $dataTag->appendChild($emailTag);
        $dataTag->appendChild($phoneTag);
        $rootTag->appendChild($dataTag);

        //Education
         
        foreach ($cert_name as $key => $value) {
            $EducationTag=$xml->createElement("Education");
            $cert_nameTag=$xml->createElement("eduMajor",$value);
            $spe_nameTag=$xml->createElement("eduMinor",$spe_name[$key]);
            $start_dateTag=$xml->createElement("eduStartDate",$start_date[$key]);
            $grants_dateTag=$xml->createElement("eduGradDate",$grants_date[$key]);
            $donorTag=$xml->createElement("studiedIn",$donor[$key]);
            $degreeTypeTag=$xml->createElement("degreeType",$degreeType[$key]);
            $EducationTag->appendChild($cert_nameTag);
            $EducationTag->appendChild($spe_nameTag);
            $EducationTag->appendChild($start_dateTag);
            $EducationTag->appendChild($grants_dateTag);  
            $EducationTag->appendChild($donorTag);
            $EducationTag->appendChild($degreeTypeTag);
            $rootTag->appendChild($EducationTag);
        }
 
        foreach ($company_name as $key => $value) {
            $ExperienceTag=$xml->createElement("WorkExperience");
            $company_nameTag=$xml->createElement("employedIn",$value);
            $job_posTag=$xml->createElement("jobTitle",$job_pos[$key]);
            $from_dateTag=$xml->createElement("startDate",$from_date[$key]);
            $to_dateTag=$xml->createElement("endDate",$to_date[$key]);
            $careerLevelTag=$xml->createElement("careerLevel",$careerLevel[$key]);
         // $jobTypeTag=$xml->createElement("JobType",$jobType[$key]);
         // $isCurrentTag=$xml->createElement("isCurrent",$isCurrent[$key]);

            $ExperienceTag->appendChild($company_nameTag);
            $ExperienceTag->appendChild($job_posTag);
            $ExperienceTag->appendChild($from_dateTag);
            $ExperienceTag->appendChild($to_dateTag);
            $ExperienceTag->appendChild($careerLevelTag);
          //$ExperienceTag->appendChild($jobTypeTag);
          //$ExperienceTag->appendChild($isCurrentTag);
            $rootTag->appendChild($ExperienceTag);
        }

        //personal skils 
        foreach ($skill_name as $key => $value) {
            $PersonalSkillsTag=$xml->createElement("PersonalSkills");
            $skill_nameTag=$xml->createElement("skillName",$value);
            $year_expTag=$xml->createElement("skillYearsExperience",$year_exp[$key]);
            $SkillLevelTag=$xml->createElement("skillLevel",$SkillLevel[$key]);

            $PersonalSkillsTag->appendChild($skill_nameTag);
            $PersonalSkillsTag->appendChild($year_expTag);
            $PersonalSkillsTag->appendChild($SkillLevelTag);
            $rootTag->appendChild($PersonalSkillsTag);
        }

        //end personal skills

        //Language
        $LanguageTag=$xml->createElement("Language");
        $Language_NameTag=$xml->createElement("Name", $Language_Name);
        $Spoken_LevelTag=$xml->createElement("SpokenLevel",$Spoken_Level);
        $Reading_LevelTag=$xml->createElement("ReadingLevel", $Reading_Level);
        $Writing_LevelTag=$xml->createElement("WritingLevel", $Writing_Level);
        $LanguageTag->appendChild($Language_NameTag);
        $LanguageTag->appendChild($Spoken_LevelTag);
        $LanguageTag->appendChild($Reading_LevelTag);
        $LanguageTag->appendChild($Writing_LevelTag);
        $rootTag->appendChild($LanguageTag);
        //end language

        //References
        $ReferencesTag=$xml->createElement("References");
        $ref_nameTag=$xml->createElement("Name", $ref_name);
        $ref_phoneTag=$xml->createElement("Phone",$ref_phone);
        $ref_emailTag=$xml->createElement("Email",$ref_email);
        $ReferencesTag->appendChild($ref_nameTag);
        $ReferencesTag->appendChild($ref_phoneTag);
        $ReferencesTag->appendChild($ref_emailTag);
        $rootTag->appendChild($ReferencesTag);

        //end References
        $xml->save('cv.xml') or die('XML Create Error');   

        redirect('/Xslt/xslt_cv/cv.xml');

    }

    public function UploadCv()
    {
        $this->data['pageTitle']='Upload CV';
        $this->data['subview'] = 'upload';
        $this->load->view('layouts/layout', $this->data);
    }

    public function DoUpload(){
        if(isset($_FILES['userFile']))
         {
            $a = new PDF2Text();
            $a->setFilename($_FILES['userFile']['tmp_name']);
            $a->decodePDF();
            echo $a->output();
         }
    }

   /* public function BigFiveForm()
    {
        $this->data['pageTitle']='The Big Five Personality Test';
        $this->data['subview'] = 'bigfive_form';
        $this->load->view('layouts/layout', $this->data);
    }
    */

    public function BigFiveForm()
    {
        $this->load->view('bigfive_form');
    }

    public function BigFiveCalcu()
    {
      $q1 = $this->input->post('bigfive1');
      $q3 = $this->input->post('bigfive3');
      $q4 = $this->input->post('bigfive4');
      $q5 = $this->input->post('bigfive5');
      $q7 = $this->input->post('bigfive7');
      $q10 = $this->input->post('bigfive10');
      $q11 = $this->input->post('bigfive11');
      $q13 = $this->input->post('bigfive13');
      $q14 = $this->input->post('bigfive14');
      $q15 = $this->input->post('bigfive15');
      $q16 = $this->input->post('bigfive16');
      $q17 = $this->input->post('bigfive17');
      $q18 = $this->input->post('bigfive18');
      $q19 = $this->input->post('bigfive19');
      $q20 = $this->input->post('bigfive20');
      $q22 = $this->input->post('bigfive22');
      $q25 = $this->input->post('bigfive25');
      $q26 = $this->input->post('bigfive26');
      $q28 = $this->input->post('bigfive28');
      $q29 = $this->input->post('bigfive29');
      $q30 = $this->input->post('bigfive30');
      $q32 = $this->input->post('bigfive32');
      $q33 = $this->input->post('bigfive33');
      $q36 = $this->input->post('bigfive36');
      $q38 = $this->input->post('bigfive38');
      $q39 = $this->input->post('bigfive39');
      $q40 = $this->input->post('bigfive40');
      $q42 = $this->input->post('bigfive42');
      $q44 = $this->input->post('bigfive44');
      $q2=$this->Question2();
      $q6=$this->Question6();
      $q8=$this->Question8();
      $q9=$this->Question9();
      $q12=$this->Question12();
      $q21=$this->Question21();
      $q23=$this->Question23();
      $q24=$this->Question24();
      $q27=$this->Question27();
      $q31=$this->Question31();
      $q34=$this->Question34();
      $q35=$this->Question35();
      $q37=$this->Question37();
      $q41=$this->Question41();
      $q43=$this->Question43();


        $Agreeableness=round(((($q2+$q7+$q12+$q17+$q22+$q27+$q32+$q37+$q42)/9)*100)/5);
        echo'Agreeableness= '.$Agreeableness.'  ';

        $Openness=round(((($q5+$q10+$q15+$q20+$q25+$q30+$q35+$q40+$q41+$q44)/10)*100)/5);
        echo'Openness= '.$Openness.'  ';

        $Conscientiousness=round(((($q3+$q8+$q13+$q18+$q23+$q23+$q28+$q33+$q43)/9)*100)/5);
        echo'Conscientiousness= '.$Conscientiousness.'  ';

        $Extraversion=round(((($q1+$q6+$q11+$q16+$q21+$q26+$q31+$q36)/8)*100)/5);
         echo'Extraversion= '.$Extraversion.'  ';

        $Neuroticism=round(((($q4+$q9+$q14+$q19+$q24+$q29+$q34+$q39)/8)*100)/5);
          echo'Neuroticism= '.$Neuroticism.'  ';

          $id=66;
          $this->updatesparql($Openness,$Conscientiousness, $Extraversion,$Agreeableness,$Neuroticism,$id);


  }

    public function updatesparql($one,$two,$three,$four,$five,$id){
        $Dataset_path="C:\\tdbCV";
        $filename="savequery.txt";
        $query="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
                PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
                PREFIX foaf: <http://xmlns.com/foaf/0.1/>
                INSERT
                { 
                  ?a cv:otherInfoDescription \"$one\".
                  ?b cv:otherInfoDescription \"$two\".
                  ?c cv:otherInfoDescription \"$three\".
                  ?d cv:otherInfoDescription \"$four\".
                  ?e cv:otherInfoDescription \"$five\".
                } 
                where {
                  ?resume cv:hasOtherInfo ?a.
                  ?a cv:otherInfoType \"openness\".
                  ?resume cv:hasOtherInfo ?b.
                  ?b cv:otherInfoType \"conscientiousness\".
                  ?resume cv:hasOtherInfo ?c.
                  ?c cv:otherInfoType \"extraversion\".
                  ?resume cv:hasOtherInfo ?d.
                  ?d cv:otherInfoType \"agreeableness\".
                  ?resume cv:hasOtherInfo ?e.
                  ?e cv:otherInfoType \"neuroticism\".
                  ?resume cv:cvTitle \"$id\".
                }";

            $this->WriteFile($query);
            shell_exec("javac -cp  java_RDFStore\\*; java_RDFStore\\UpdateSparql.java");

            shell_exec("java -cp java_RDFStore\\*;java_RDFStore  UpdateSparql $filename $Dataset_path");  

        }

     public  function Question2()
    {

      if( $bigfive2 = $this->input->post('bigfive2')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive2 = $this->input->post('bigfive2')==5){
                return 1;
        

            }
            else 
            if($bigfive2 = $this->input->post('bigfive2')==2){
                return 4;
        

            }

            else 
            if($bigfive2 = $this->input->post('bigfive2')==4){
                return 2;
        

            }

            else 
            if($bigfive2 = $this->input->post('bigfive2')==4){
                return 2;
        

            }

            else 
            if($bigfive2 = $this->input->post('bigfive2')==3){
                return 3;
        

            }



        }

        public function Question6()
    {

      if( $bigfive6 = $this->input->post('bigfive6')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive6 = $this->input->post('bigfive6')==5){
                return 1;
        

            }
            else 
            if($bigfive6 = $this->input->post('bigfive6')==2){
                return 4;
        

            }

            else 
            if($bigfive6 = $this->input->post('bigfive6')==4){
                return 2;
        

            }

            else 
            if($bigfive6 = $this->input->post('bigfive6')==4){
                return 2;
        

            }

            else 
            if($bigfive6 = $this->input->post('bigfive6')==3){
                return 3;
        

            }



        }

        public function Question8()
    {

      if( $bigfive8 = $this->input->post('bigfive8')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive8 = $this->input->post('bigfive8')==5){
                return 1;
        

            }
            else 
            if($bigfive8 = $this->input->post('bigfive8')==2){
                return 4;
        

            }

            else 
            if($bigfive8 = $this->input->post('bigfive8')==4){
                return 2;
        

            }

            else 
            if($bigfive8 = $this->input->post('bigfive8')==4){
                return 2;
        

            }

            else 
            if($bigfive8 = $this->input->post('bigfive8')==3){
                return 3;
        

            }



        }

        public function Question9()
    {

      if( $bigfive9 = $this->input->post('bigfive9')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive9 = $this->input->post('bigfive9')==5){
                return 1;
        

            }
            else 
            if($bigfive9 = $this->input->post('bigfive9')==2){
                return 4;
        

            }

            else 
            if($bigfive9 = $this->input->post('bigfive9')==4){
                return 2;
        

            }

            else 
            if($bigfive9 = $this->input->post('bigfive9')==4){
                return 2;
        

            }

            else 
            if($bigfive9 = $this->input->post('bigfive9')==3){
                return 3;
        

            }

        }

       public  function Question12()
    {

      if( $bigfive12 = $this->input->post('bigfive12')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive12 = $this->input->post('bigfive12')==5){
                return 1;
        

            }
            else 
            if($bigfive12 = $this->input->post('bigfive12')==2){
                return 4;
        

            }

            else 
            if($bigfive12 = $this->input->post('bigfive12')==4){
                return 2;
        

            }

            else 
            if($bigfive12 = $this->input->post('bigfive12')==4){
                return 2;
        

            }

            else 
            if($bigfive12 = $this->input->post('bigfive12')==3){
                return 3;
        

            }



        }
       public  function Question21()
    {

      if( $bigfive21 = $this->input->post('bigfive21')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive21 = $this->input->post('bigfive21')==5){
                return 1;
        

            }
            else 
            if($bigfive21 = $this->input->post('bigfive21')==2){
                return 4;
        

            }

            else 
            if($bigfive21 = $this->input->post('bigfive21')==4){
                return 2;
        

            }

            else 
            if($bigfive21 = $this->input->post('bigfive21')==4){
                return 2;
        

            }

            else 
            if($bigfive21 = $this->input->post('bigfive21')==3){
                return 3;
        

            }



        }
        public function Question23()
    {

      if( $bigfive23 = $this->input->post('bigfive23')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive23 = $this->input->post('bigfive23')==5){
                return 1;
        

            }
            else 
            if($bigfive23 = $this->input->post('bigfive23')==2){
                return 4;
        

            }

            else 
            if($bigfive23 = $this->input->post('bigfive23')==4){
                return 2;
        

            }

            else 
            if($bigfive23 = $this->input->post('bigfive23')==4){
                return 2;
        

            }

            else 
            if($bigfive23 = $this->input->post('bigfive23')==3){
                return 3;
        

            }


        }
        
        public function Question24()
    {

      if( $bigfive24 = $this->input->post('bigfive24')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive24 = $this->input->post('bigfive24')==5){
                return 1;
        

            }
            else 
            if($bigfive24 = $this->input->post('bigfive24')==2){
                return 4;
        

            }

            else 
            if($bigfive24 = $this->input->post('bigfive24')==4){
                return 2;
        

            }

            else 
            if($bigfive24 = $this->input->post('bigfive24')==4){
                return 2;
        

            }

            else 
            if($bigfive24 = $this->input->post('bigfive24')==3){
                return 3;
        

            }



        }
        public function Question27()
    {

      if( $bigfive27 = $this->input->post('bigfive27')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive27 = $this->input->post('bigfive27')==5){
                return 1;
        

            }
            else 
            if($bigfive27 = $this->input->post('bigfive27')==2){
                return 4;
        

            }

            else 
            if($bigfive27 = $this->input->post('bigfive27')==4){
                return 2;
        

            }

            else 
            if($bigfive27 = $this->input->post('bigfive27')==4){
                return 2;
        

            }

            else 
            if($bigfive27 = $this->input->post('bigfive27')==3){
                return 3;
        

            }



        }

       public  function Question31()
    {

      if( $bigfive31 = $this->input->post('bigfive31')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive31 = $this->input->post('bigfive31')==5){
                return 1;
        

            }
            else 
            if($bigfive31 = $this->input->post('bigfive31')==2){
                return 4;
        

            }

            else 
            if($bigfive31 = $this->input->post('bigfive31')==4){
                return 2;
        

            }

            else 
            if($bigfive31 = $this->input->post('bigfive31')==4){
                return 2;
        

            }

            else 
            if($bigfive31 = $this->input->post('bigfive31')==3){
                return 3;
        

            }



        }
       public  function Question34()
    {

      if( $bigfive34 = $this->input->post('bigfive34')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive34 = $this->input->post('bigfive34')==5){
                return 1;
        

            }
            else 
            if($bigfive34 = $this->input->post('bigfive34')==2){
                return 4;
        

            }

            else 
            if($bigfive34 = $this->input->post('bigfive34')==4){
                return 2;
        

            }

            else 
            if($bigfive34 = $this->input->post('bigfive34')==4){
                return 2;
        

            }

            else 
            if($bigfive34 = $this->input->post('bigfive34')==3){
                return 3;
        

            }



        }
       public  function Question35()
    {

      if( $bigfive35 = $this->input->post('bigfive35')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive35 = $this->input->post('bigfive35')==5){
                return 1;
        

            }
            else 
            if($bigfive35 = $this->input->post('bigfive35')==2){
                return 4;
        

            }

            else 
            if($bigfive35 = $this->input->post('bigfive35')==4){
                return 2;
        

            }

            else 
            if($bigfive35 = $this->input->post('bigfive35')==4){
                return 2;
        

            }

            else 
            if($bigfive35 = $this->input->post('bigfive35')==3){
                return 3;
        

            }



        }
        public function Question37()
    {

      if( $bigfive37 = $this->input->post('bigfive37')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive37 = $this->input->post('bigfive37')==5){
                return 1;
        

            }
            else 
            if($bigfive37 = $this->input->post('bigfive37')==2){
                return 4;
        

            }

            else 
            if($bigfive37 = $this->input->post('bigfive37')==4){
                return 2;
        

            }

            else 
            if($bigfive37 = $this->input->post('bigfive37')==4){
                return 2;
        

            }

            else 
            if($bigfive37 = $this->input->post('bigfive37')==3){
                return 3;
        

            }



        }
        public function Question41()
    {

      if( $bigfive41 = $this->input->post('bigfive41')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive41 = $this->input->post('bigfive41')==5){
                return 1;
        

            }
            else 
            if($bigfive41 = $this->input->post('bigfive41')==2){
                return 4;
        

            }

            else 
            if($bigfive41 = $this->input->post('bigfive41')==4){
                return 2;
        

            }

            else 
            if($bigfive41 = $this->input->post('bigfive41')==4){
                return 2;
        

            }

            else 
            if($bigfive41 = $this->input->post('bigfive41')==3){
                return 3;
        

            }



        }
           public function Question43()
    {

      if( $bigfive43 = $this->input->post('bigfive43')==1){
        

        return 5;
     
        
    }
        else 
            if($bigfive43 = $this->input->post('bigfive43')==5){
                return 1;
        

            }
            else 
            if($bigfive41 = $this->input->post('bigfive41')==2){
                return 4;
        

            }

            else 
            if($bigfive43 = $this->input->post('bigfive43')==4){
                return 2;
        

            }

            else 
            if($bigfive43 = $this->input->post('bigfive43')==4){
                return 2;
        

            }

            else 
            if($bigfive43 = $this->input->post('bigfive43')==3){
                return 3;
        

            }



        }

         public function WriteFile($txt){
            $myfile = fopen("savequery.txt", "w") or die("Unable to open file!");
            fwrite($myfile, $txt);
            fclose($myfile);
        }

       

        
    
}
