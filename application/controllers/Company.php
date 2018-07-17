<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function CompanyHome()
    {
        $id=$this->session->userdata('u_id');
        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            select ?job ?id
            where {
                ?ann cv:hasTarget ?w . 
                ?w cv:targetCompanyDescription \"$id\".
                ?w cv:targetJobDescription ?job.
                ?ann cv:cvTitle ?id.
            } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        $this->data['pageTitle']='Company Home';
        $this->data['subview'] = 'company_home';
        $this->data['result']=$query_result;
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
        $hours_per = $this->input->post('hours_per');
        $salary = $this->input->post('salary');
        $salary_per = $this->input->post('salary_per');
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

    public function view_announcement($id)
    {

        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            select ?description ?model ?type ?salary ?locality
            where {
                ?ann cv:hasTarget ?target . 
                ?target cv:targetJobDescription ?description.
                ?target cv:targetJobMode ?model.
                ?target cv:targetJobType ?type.
                ?target cv:targetSalary ?salary.
                ?ann cv:aboutPerson ?person.
                ?person vcard:locality ?locality.
                ?ann cv:cvTitle \"$id\".
            } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result['basic']=$this->query->querysparql($query,$dataset_path);

        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        select ?eduMajor ?eduMinor ?eduDegree 
        where {
            ?ann cv:hasEducation ?edu.
            ?edu cv:eduMajor ?eduMajor.
            ?edu cv:eduMinor ?eduMinor.
            ?edu cv:degreeType ?eduDegree.
            ?ann cv:cvTitle \"$id\".
        } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result['education']=$this->query->querysparql($query,$dataset_path);

        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        select DISTINCT ?skillName ?skillExperience
        where {
            ?ann cv:hasSkill ?skill.
            ?skill cv:skillName ?skillName.
            ?skills cv:skillYearsExperience ?skillExperience.
            ?ann cv:cvTitle \"$id\".
        } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result['skills']=$this->query->querysparql($query,$dataset_path);

        /*echo '<pre>';
        print_r($query_result);*/
        $this->data['pageTitle']='Announcement';
        $this->data['subview'] = 'announcement_view';
        $this->data['result']=$query_result;
        $this->load->view('layouts/layout', $this->data);
    }

    public function find_cvs()
    {
        $dataJson = $this->input->post('result');
        $result = json_decode(htmlspecialchars_decode($dataJson), true);
        echo '<pre>';
        print_r($result);
        $query="
        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        select ?FirstName ?LastName ?l1 ?locality
        where {
            {
            ?resume cv:cvIsActive \"true\".
             ?resume cv:hasEducation ?w .
             ?resume cv:aboutPerson ?p.
            ";

        foreach ($result['basic']['results']['bindings'] as  $value1){
            $locality=$value1['locality']['value'];
            $query.="?p vcard:hasAddress ?address.
            ?address vcard:locality ?locality.
            FILTER regex(?locality,\"$locality\",\"i\").";
        }
        foreach ($result['education']['results']['bindings'] as $value2) {
            $eduMajor=$value2['eduMajor']['value'];
            $eduMinor=$value2['eduMinor']['value'];
            $eduDegree=$value2['eduDegree']['value'];
            $query.="?w cv:eduMajor \"$eduMajor\".
            ?w cv:degreeType \"$eduDegree\".
            }
            union
            {
              ?resume cv:hasEducation ?education . 
              ?education cv:eduMinor \"eduMinor\".     
            }";
        }
        
        foreach ($result['skills']['results']['bindings'] as $value3){
            $skillName=$value3['skillName']['value'];
            $query.="?resume cv:hasSkill ?q1.
            ?q1 cv:skillName ?l1.
            FILTER (regex(?l1,\"$skillName\",\"i\")).";
        }
        
        $query.="?resume cv:aboutPerson ?person.  
            ?person foaf:firstName ?FirstName .
            ?person foaf:lastName  ?LastName .
            ?person vcard:hasAddress ?address.
            }";
        echo "$query";
        $dataset_path="C:\\tdbCV";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        echo '<pre>';
        print_r($query_result);

        /*$this->data['pageTitle']='Announcement';
        $this->data['subview'] = 'result_find_cvs';
        $this->data['result1']=$query_result;
        $this->load->view('layouts/layout', $this->data);*/
    }
}

