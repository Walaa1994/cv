<?php

class Home extends CI_Controller {
	
	function index()
	{
		$this->load->view('static_page');
	}
	
	function sekeer_page()
	{
		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'sekeer_page';
        $this->load->view('layouts/layout', $this->data);
	}
	function company_page()
	{
		$this->load->view('company_page');
	}

	function seeker_profile (){
		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'seeker_profile';
        $this->load->view('layouts/layout', $this->data);
	}

	function Company_profile (){

		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'company_profile';
        $this->load->view('layouts/layout', $this->data);
	}
	function OneAnnouncement_page  ($id){
		/*$query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            select distinct ?description ?model ?type ?salary ?locality ?eduMajor ?eduMinor ?eduDegree 
            ?skillName ?skillExperience
            where {
                ?ann cv:hasTarget ?target . 
                ?target cv:targetJobDescription ?description.
                ?target cv:targetJobMode ?model.
                ?target cv:targetJobType ?type.
                ?target cv:targetSalary ?salary.
                ?ann cv:aboutPerson ?person.
                ?person vcard:locality ?locality.
                ?ann cv:cvTitle \"$id\".
                ?ann cv:hasEducation ?edu.
                ?edu cv:eduMajor ?eduMajor.
                ?edu cv:eduMinor ?eduMinor.
                ?edu cv:degreeType ?eduDegree.
                ?ann cv:hasSkill ?skill.
                ?skill cv:skillName ?skillName.
                ?skills cv:skillYearsExperience ?skillExperience.
            } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        echo '<pre>';
        print_r($query_result);*/

        $com_id=$this->session->userdata('u_id');
		$this->load->model('user_model');
		$this->data['company']=$this->user_model->get_company($com_id);

        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            select ?description ?mode ?type ?salary ?locality
            where {
                ?ann cv:hasTarget ?target . 
                ?target cv:targetJobDescription ?description.
                ?target cv:targetJobMode ?mode.
                ?target cv:targetJobType ?type.
                ?target cv:targetSalary ?salary.
                ?ann cv:aboutPerson ?person.
                ?person vcard:locality ?locality.
                ?ann cv:cvTitle \"$id\".
            } " ;
        //echo "$query";
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
        $this->data['result']=$query_result;
		$this->data['pageTitle']='Announcement page';
        $this->data['subview'] = 'one_announcement-page';
        $this->load->view('layouts/layout', $this->data);
	}

	function Find_CV($value='')
	{
		$query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        select ?FirstName ?LastName ?id
        where {
            {
            ?resume cv:cvTitle ?id.
            ?resume cv:cvIsActive \"True\".
            ?resume cv:hasEducation ?w .
             ";

	    foreach ($result['education']['results']['bindings'] as $value2) {
		    $eduMajor=$value2['eduMajor']['value'];
		    $eduDegree=$value2['eduDegree']['value'];
		    $query.="?w cv:eduMajor \"$eduMajor\".
		    ?w cv:degreeType <http://rdfs.org/resume-rdf/base.rdfs#EduBachelor>.";
        }

        $i=1;
        foreach ($result['skills']['results']['bindings'] as $value3){
            $skillName=$value3['skillName']['value'];
            $query.="?resume cv:hasSkill ?q$i.
            ?q$i cv:skillName ?l$i.
            FILTER (regex(?l$i,\"$skillName\",\"i\")).";
            $i++;
        }

        $query.="?resume cv:aboutPerson ?person.  
            ?person foaf:firstName ?FirstName .
            ?person foaf:lastName  ?LastName .
            ?person vcard:hasAddress ?address.";

        foreach ($result['basic']['results']['bindings'] as  $value1){
            $locality=$value1['locality']['value'];
            $query.="?address vcard:locality ?locality.
            FILTER regex(?locality,\"$locality\",\"i\").";
        }

        foreach ($result['education']['results']['bindings'] as $value2) {
            $eduMinor=$value2['eduMinor']['value'];
            $query.="
            }
            union
            {
              ?resume cv:hasEducation ?education . 
              ?education cv:eduMinor \"$eduMinor\".     
            }
        }";
        }

        echo "$query";
        $dataset_path="C:\\tdbCV";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        echo '<pre>';
        print_r($query_result);
	}

	function Announcement_page  (){
		$id=$this->session->userdata('u_id');
		$this->load->model('user_model');
		$this->data['company']=$this->user_model->get_company($id);
		//print_r($this->data['company_id']);
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
        $this->data['result']=$this->query->querysparql($query,$dataset_path);
		$this->data['pageTitle']='Announcement page';
        $this->data['subview'] = 'Announcement_page';
        $this->load->view('layouts/layout', $this->data);
	}

	function About_Us (){

		$this->data['pageTitle']='About Us';
        $this->data['subview'] = 'aboutus';
        $this->load->view('layouts/layout', $this->data);
	}

	function Contact_Us (){

		$this->data['pageTitle']='Contasct Us';
        $this->data['subview'] = 'contactus';
        $this->load->view('layouts/layout', $this->data);
	}

	function sekeer_home()
	{
		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'seeker_home';
        $this->load->view('layouts/layout', $this->data);
	}
	function cv_view()
	{
		$this->data['pageTitle']='Cv View';
        $this->data['subview'] = 'cv-view';
        $this->load->view('layouts/layout', $this->data);
	}
}