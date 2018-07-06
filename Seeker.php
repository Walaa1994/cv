<?php
libxml_disable_entity_loader(false);
defined('BASEPATH') OR exit('No direct script access allowed');
//this class for convert pdf to text
include(APPPATH.'controllers/pdf2text.php');

class Seeker extends CI_Controller {

    public function index()
    {

    }

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
        $grants_date = $this->input->post('grants_date');
        $endgrants_date = $this->input->post('endgrants_date');
        $donor = $this->input->post('donor');
        $degreeType = $this->input->post('degreeType');
        

        //Work Experience
        $company_name = $this->input->post('company_name');
        $job_pos = $this->input->post('job_pos');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $careerLevel = $this->input->post('careerLevel');
        $jobType = $this->input->post('JobType');
        var_dump($jobType);
        $isCurrent = $this->input->post('IsCurrent');
        var_dump($isCurrent);

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


       /* $result='Personal Information: first name '.$first_name.' last name '.$last_name.' Date of Birth '.$birth_date.' nationality '.$nationality.' marital state '.$marital_state.' gender '.$gender.' country '.$country.' city '.$city.' address '.$address.' email '.$email.' Phone Number '.$phone.' Education: ';

       
        foreach ($cert_name as $key=>$value){
            $result.=' certificate name '.$value;
            $result.=$spe_name[$key];
        }

         
        foreach ($spe_name as $value1){
            $result.=' specialization name '.$value1;
        }

        
        foreach ($grants_date as $value2) {
           $result.=' Date of Grants '.$value2;
           
        }

        
        foreach ($endgrants_date as $value3) {
           $result.=' EndDate of Grants '.$value3;
       }
           

       
        foreach ($donor as $value4) {
           $result.=' donor '.$value4;
           
        }

        
        foreach ($degreeType as $value5) {
           $result.=' Degree Type '.$value5;
       }

       


           
        

        

        //$result.=' Skill Name '.$skill_name.'SkillLevel'.$SkillLevel.' Years of experience '.$year_exp.' Interest Name '.$interest_name.' Degree of interest '.$interest_degree.' References & Referees: Person/Company/Organization Name '.$ref_name.' Phone Number '.$ref_phone.' Email '.$ref_email;
        echo $result; 
        //var_dump($cert_name);
        //test
        */

    $xml = new DOMDocument("1.0","UTF-8");
    $xml->load("cv.xml");
    $rootTag=$xml->getElementsByTagName("document")->item(0);
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
    $EducationTag=$xml->createElement("Education"); 
    foreach ($cert_name as $key => $value) {
        # code...
        $cert_nameTag=$xml->createElement("eduMajor",$value);
        $spe_nameTag=$xml->createElement("eduMinor",$spe_name[$key]);
        $grants_dateTag=$xml->createElement("eduStartDate",$grants_date[$key]);
        $endgrants_dateTag=$xml->createElement("eduGradDate",$endgrants_date[$key]);
        $donorTag=$xml->createElement("studiedIn",$donor[$key]);
        $degreeTypeTag=$xml->createElement("degreeType",$degreeType[$key]);
        $EducationTag->appendChild($cert_nameTag);
        $EducationTag->appendChild($spe_nameTag);
        $EducationTag->appendChild($grants_dateTag);
        $EducationTag->appendChild($endgrants_dateTag);
        $EducationTag->appendChild($donorTag);
        $EducationTag->appendChild($degreeTypeTag);
        $rootTag->appendChild($EducationTag);
    }

    $ExperienceTag=$xml->createElement("WorkExperience"); 
     foreach ($company_name as $key => $value) {
        # code...
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
       // $ExperienceTag->appendChild($jobTypeTag);
        //$ExperienceTag->appendChild($isCurrentTag);
        $rootTag->appendChild($ExperienceTag);
    }
    //personal skils
    $PersonalSkillsTag=$xml->createElement("PersonalSkills"); 
     foreach ($skill_name as $key => $value) {
        # code...
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
    $xml->save("cv.xml");
    
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
}
