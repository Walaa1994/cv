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
        $cert_name[] = $this->input->post('cert_name[]');
        $spe_name[] = $this->input->post('spe_name[]');
        $grants_date[] = $this->input->post('grants_date[]');
        $endgrants_date[] = $this->input->post('endgrants_date[]');
        $donor[] = $this->input->post('donor[]');
        $degreeType[] = $this->input->post('degreeType[]');
        

        //Work Experience
        $company_name = $this->input->post('company_name');
        $job_pos = $this->input->post('job_pos');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $careerLevel = $this->input->post('careerLevel');
        $jobType = $this->input->post('jobType');
        $isCurrent = $this->input->post('isCurrent');

        //Personal Skills
        $skill_name = $this->input->post('skill_name');
        $year_exp = $this->input->post('year_exp');
        $SkillLevel=$this->input->post('SkillLevel');

        //Personal Interests
        $interest_name = $this->input->post('interest_name');
        $interest_degree = $this->input->post('interest_degree');

        //References & Referees
        $ref_name = $this->input->post('ref_name');
        $ref_phone = $this->input->post('ref_phone');
        $ref_email = $this->input->post('ref_email');

        $result='Personal Information: first name '.$first_name.' last name '.$last_name.' Date of Birth '.$birth_date.' nationality '.$nationality.' marital state '.$marital_state.' gender '.$gender.' country '.$country.' city '.$city.' address '.$address.' email '.$email.' Phone Number '.$phone.' Education: ';

        $i=0;
        foreach ($cert_name as $value){
            $result.=' certificate name '.$value[$i];
        }

         $i=0;
        foreach ($spe_name as $value1){
            $result.=' specialization name '.$value1[$i];
        }

        $i=0;
        foreach ($grants_date as $value2) {
           $result.=' Date of Grants '.$value2[$i];
           $i++;
        }

        $i=0;
        foreach ($endgrants_date as $value3) {
           $result.=' EndDate of Grants '.$value3[$i];
           $i++;
        }

        $i=0;
        foreach ($donor as $value4) {
           $result.=' donor '.$value4[$i];
           $i++;
        }

        $i=0;
        foreach ($degreeType as $value5) {
           $result.=' Degree Type '.$value5[$i];
           $i++;
        }

        

        $result.=' Work Experience: company name '.$company_name.'careerLevel'.$careerLevel.'jobType'.$jobType.' Job Position '.$job_pos.'isCurrent'.$isCurrent.' time period: from date'.$from_date.' to date '.$to_date.' Skill Name '.$skill_name.'SkillLevel'.$SkillLevel.' Years of experience '.$year_exp.' Interest Name '.$interest_name.' Degree of interest '.$interest_degree.' References & Referees: Person/Company/Organization Name '.$ref_name.' Phone Number '.$ref_phone.' Email '.$ref_email;
        echo $result; 
        //var_dump($cert_name);
        //test

    $xml = new DOMDocument("1.0","UTF-8");
    $xml->load("cv.xml");
    $rootTag=$xml->getElementsByTagName("document")->item(0);
    //personalinformation
    $dataTag=$xml->createElement("PersonalInformation");
    $first_nameTag=$xml->createElement("first_name",$first_name);
    $last_nameTag=$xml->createElement("last_name", $last_name);
    $birth_dateTag=$xml->createElement("birth_date", $birth_date);
    $nationalityTag=$xml->createElement("nationality", $nationality);
    $marital_stateTag=$xml->createElement("marital_state", $marital_state);
    $genderTag=$xml->createElement("gender", $gender);
    $countryTag=$xml->createElement("country", $country);
    $cityTag=$xml->createElement("city", $city);
    $addressTag=$xml->createElement("address", $address);
    $emailTag=$xml->createElement("email",  $email);
    $phoneTag=$xml->createElement("phone", $phone);
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
    $cert=array_values($cert_name[0]);
    $spe=array_values($spe_name[0]);
    $grants_date=array_values($grants_date[0]);
    $endgrants_date=array_values($endgrants_date[0]);
    $donor=array_values($donor[0]);
    $degreeType=array_values($degreeType[0]);
    for ($i=0; $i <sizeof($cert) ; $i++) { 
    $cert_nameTag=$xml->createElement("CertificateName",$cert[$i]);
    $spe_nameTag=$xml->createElement("SpecializationName",$spe[$i]);
    $grants_dateTag=$xml->createElement("DateofGrants",$grants_date[$i]);
    $endgrants_dateTag=$xml->createElement("EndDateofGrants",$endgrants_date[$i]);
    $donorTag=$xml->createElement("Donor",$donor[$i]);
    $degreeTypeTag=$xml->createElement("DegreeType",$degreeType[$i]);

    }
    $EducationTag->appendChild($cert_nameTag);
    $EducationTag->appendChild($spe_nameTag);
    $EducationTag->appendChild($grants_dateTag);
    $EducationTag->appendChild($endgrants_dateTag);
    $EducationTag->appendChild($donorTag);
    $EducationTag->appendChild($degreeTypeTag);
    $rootTag->appendChild($EducationTag);
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
