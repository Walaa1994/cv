
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function CompanyHome()
    {
        $this->data['result'] = array('yyy','hh','kk','bb','vvv');
        $this->data['pageTitle']='Company Home';
        $this->data['subview'] = 'company_home';
        $this->load->view('layouts/layout', $this->data);
    }

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
        $salary = $this->input->post('salary');
        $skill_name = $this->input->post('skill_name');
        $year_exp = $this->input->post('year_exp');
        $characteristic = $this->input->post('characteristic');
        $characteristic_degree = $this->input->post('characteristic_degree');
        $Language_Name = $this->input->post('Language_Name');
        $Is_Active = $this->input->post('IsActive');

        $xml = new DOMDocument("1.0","UTF-8");
        $xml->formatOutput = true;
        
        //append root tag
        $rootTag = $xml->createElement('announcement');
        $xml->appendChild($rootTag);

        //id
        $IDTag=$xml->createElement("ID",uniqid());
        $rootTag->appendChild($IDTag);


        //the Announcement is active or not
        $IsActiveTag=$xml->createElement("IsActive",$Is_Active);
        $rootTag->appendChild($IsActiveTag);
        //basic info
        $BasicInfoTag=$xml->createElement("BasicInfo");
        $job_titleTag=$xml->createElement("jobtitle", $job_title);
        $Job_ModeTag=$xml->createElement("jobMode",$Job_Mode);
        $employment_typeTag=$xml->createElement("jobType",$employment_type);
        $salaryTag=$xml->createElement("Salary",$salary);
        $IDCompanyTag=$xml->createElement("IDCompany",$this->session->userdata('u_id'));

        $BasicInfoTag->appendChild($job_titleTag);
        $BasicInfoTag->appendChild($Job_ModeTag);
        $BasicInfoTag->appendChild($employment_typeTag);
        $BasicInfoTag->appendChild($salaryTag);
        $BasicInfoTag->appendChild($IDCompanyTag);
        $rootTag->appendChild($BasicInfoTag);
        //end basic info

        //personal info
        $PersonalInfoTag=$xml->createElement("PersonalInfo");
        $localityTag=$xml->createElement("locality", $locality);
        $PersonalInfoTag->appendChild($localityTag);
        $rootTag->appendChild($PersonalInfoTag);
        //end personal info

        //education
        foreach ($cert_name as $key => $value) {
            $EducationTag=$xml->createElement("Education");
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
         foreach ($skill_name as $key => $value) {
            $PersonalSkillsTag=$xml->createElement("PersonalSkills");
            $skill_nameTag=$xml->createElement("skillName",$value);
            $year_expTag=$xml->createElement("skillYearsExperience",$year_exp[$key]);
            $PersonalSkillsTag->appendChild($skill_nameTag);
            $PersonalSkillsTag->appendChild($year_expTag);;
            $rootTag->appendChild($PersonalSkillsTag);
            }
        //endskills

        //language
        foreach ($Language_Name as $key => $value) {
            $LanguageTag=$xml->createElement("Language");
            $Language_NameTag=$xml->createElement("Name",$value);
            $LanguageTag->appendChild($Language_NameTag);
            $rootTag->appendChild($LanguageTag);
        }
        //end language 
        $xml->save('Announcement.xml') or die('XML Create Error');   

        redirect('/Xslt/xslt_announcement/Announcement.xml');
    }

    public function create_company()
    {
        $this->load->model('user_model');
        $this->user_model->add_company();
        $this->load->view('company_home');
    }
}

