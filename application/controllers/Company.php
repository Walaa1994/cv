<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
    
    public function AddCompany()
    {
    	$this->data['pageTitle']='Add Company';
        $this->data['subview'] = 'company_form';
        $this->load->view('layouts/layout', $this->data);
    }

    public function AddAnnouncement()
    {
    	$this->data['pageTitle']='Add Announcement';
        $this->data['subview'] = 'announcement_form';
        $this->load->view('layouts/layout', $this->data);
    }

    public function AnnouncementInfo()
    {
        $job_title = $this->input->post('job_title');
        $Job_Mode = $this->input->post('Job_Mode');
        $employment_type = $this->input->post('employment_type');
        $locality = $this->input->post('locality');
        $cert_name = $this->input->post('cert_name');
        $spe_name = $this->input->post('spe_name');
        $degreeType = $this->input->post('degreeType');
        $hours_per = $this->input->post('hours_per');
        $salary = $this->input->post('salary');
        $salary_per = $this->input->post('salary_per');
        $skill_name = $this->input->post('skill_name');
        $year_exp = $this->input->post('year_exp');
        $characteristic = $this->input->post('characteristic');
        $characteristic_degree = $this->input->post('characteristic_degree');
        $Language_Name = $this->input->post('Language_Name');
        $Is_Active = $this->input->post('Is_Active');

        $xml = new DOMDocument("1.0","UTF-8");
        $xml->formatOutput = true;
        
        //append root tag
        $rootTag = $xml->createElement('announcement');
        $xml->appendChild($rootTag);

        //the Announcement is active or not
        $IsActiveTag=$xml->createElement("IsActive",$Is_Active);
        $rootTag->appendChild($IsActiveTag);
        //basic info
        $BasicInfoTag=$xml->createElement("BasicInfo");
        $job_titleTag=$xml->createElement("jobtitle", $job_title);
        $Job_ModeTag=$xml->createElement("jobMode",$Job_Mode);
        $employment_typeTag=$xml->createElement("jobType",$employment_type);
        $salaryTag=$xml->createElement("Salary",$salary);

        $BasicInfoTag->appendChild($job_titleTag);
        $BasicInfoTag->appendChild($Job_ModeTag);
        $BasicInfoTag->appendChild($employment_typeTag);
        $BasicInfoTag->appendChild($salaryTag);
        $rootTag->appendChild($BasicInfoTag);
        //end basic info

        //personal info
        $PersonalInfoTag=$xml->createElement("PersonalInfo");
        $localityTag=$xml->createElement("locality", $locality);
        $PersonalInfoTag->appendChild($localityTag);
        $rootTag->appendChild($PersonalInfoTag);
        //end personal info

        //education
        $EducationTag=$xml->createElement("Education");
        foreach ($cert_name as $key => $value) {
            $cert_nameTag=$xml->createElement("eduMajor", $value);
            $spe_nameTag=$xml->createElement("eduMinor",$spe_name[$key]);
            $degreeTypeTag=$xml->createElement("degreeType",$degreeType[$key]);
            $EducationTag->appendChild($cert_nameTag);
            $EducationTag->appendChild($spe_nameTag);
            $EducationTag->appendChild($degreeTypeTag);
            $rootTag->appendChild($EducationTag);
        }
        //end education

        //skills
         $PersonalSkillsTag=$xml->createElement("PersonalSkills"); 
         foreach ($skill_name as $key => $value) {
            $skill_nameTag=$xml->createElement("skillName",$value);
            $year_expTag=$xml->createElement("skillYearsExperience",$year_exp[$key]);
            $PersonalSkillsTag->appendChild($skill_nameTag);
            $PersonalSkillsTag->appendChild($year_expTag);;
            $rootTag->appendChild($PersonalSkillsTag);
            }
        //endskills

        //language
        $LanguageTag=$xml->createElement("Language");
        foreach ($Language_Name as $key => $value) {
            $Language_NameTag=$xml->createElement("Name",$value);
            $LanguageTag->appendChild($Language_NameTag);
            $rootTag->appendChild($LanguageTag);
        }
        //end language 
        $xml->save('Announcement.xml') or die('XML Create Error');   

        redirect('/Xslt/xslt_cv/Announcement.xml');
    }
}

