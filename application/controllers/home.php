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
		$id=$this->session->userdata('u_id');
		$Dataset_path="C:\\tdbCV";
		$personalInfo="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
			PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
			PREFIX foaf: <http://xmlns.com/foaf/0.1/>
			select ?FirstName ?LastName ?Birthday ?Gender ?Nationality ?MaritalStatus ?Phone ?Email ?Country ?City ?Street
			where {
			  ?resume cv:aboutPerson ?person.  
			  ?person foaf:firstName ?FirstName .
			  ?person foaf:lastName  ?LastName .
			  ?person foaf:birthday  ?Birthday .
			  ?person cv:gender ?Gender .
			  ?person cv:hasNationality ?Nationality .
			  ?person cv:maritalStatus ?MaritalStatus .
			  ?person foaf:phone ?Phone .
			  ?person foaf:mbox ?Email .
			  ?person vcard:hasAddress ?c .
			  ?c vcard:country-name ?Country .
			  ?c vcard:locality ?City .
			  ?c vcard:street-address ?Street .
			}    ";
		$this->load->library('query');
		$query_result=$this->query->querysparql($personalInfo,$Dataset_path);
		$first_name=$query_result['results']['bindings'][0]['FirstName']['value'];
		$last_name=$query_result['results']['bindings'][0]['LastName']['value'];
		$birthday=$query_result['results']['bindings'][0]['Birthday']['value'];
		$gender=$query_result['results']['bindings'][0]['Gender']['value'];
		$Nationality=$query_result['results']['bindings'][0]['Nationality']['value'];
		$MaritalStatus=$query_result['results']['bindings'][0]['MaritalStatus']['value'];
		$Phone=$query_result['results']['bindings'][0]['Phone']['value'];
		$Email=$query_result['results']['bindings'][0]['Email']['value'];
		$Country=$query_result['results']['bindings'][0]['Country']['value'];
		$City=$query_result['results']['bindings'][0]['City']['value'];
		$Street=$query_result['results']['bindings'][0]['Street']['value'];
		//echo '<pre>';
		//print_r($query_result);
		$this->data['first_name']=$first_name;
		$this->data['last_name']=$last_name;
		$this->data['birthday']=$birthday;
		$this->data['gender']=$gender;
		$this->data['Nationality']=$Nationality;
		$this->data['MaritalStatus']=$MaritalStatus;
		$this->data['Phone']=$Phone;
		$this->data['Email']=$Email;
		$this->data['Country']=$Country;
		$this->data['City']=$City;
		$this->data['Street']=$Street;

        $Education ="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
					PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
					PREFIX foaf: <http://xmlns.com/foaf/0.1/>
					select ?eduMajor ?eduMinor ?eduStartDate ?eduGradDate ?studiedIn ?degreeType 
					where {
					 ?resume cv:hasEducation ?q .
					 ?q cv:eduMajor ?eduMajor.
					 ?q cv:eduMinor ?eduMinor.
					 ?q cv:eduStartDate ?eduStartDate.
					 ?q cv:eduGradDate ?eduGradDate.
					 ?q cv:studiedIn ?studiedIn.
					 ?q cv:degreeType ?degreeType.
					}";
		$this->load->library('query');
		$edu_result=$this->query->querysparql($Education,$Dataset_path);
		//echo '<pre>';
		//print_r($edu_result);

       foreach ($edu_result['results']['bindings'] as  $value) {
       	$eduMajor=$value['eduMajor']['value'];
       	$eduMinor=$value['eduMinor']['value'];
       	$eduStartDate=$value['eduStartDate']['value'];
       	$eduGradDate=$value['eduGradDate']['value'];
       	$studiedIn=$value['studiedIn']['value'];
       	$degreeType=$value['degreeType']['value'];

       	$this->data['eduMajor']=$eduMajor;
       	$this->data['eduMinor']=$eduMinor;
       	$this->data['eduStartDate']=$eduStartDate;
        $this->data['eduGradDate']=$eduGradDate;
        $this->data['studiedIn']=$studiedIn;
        $this->data['degreeType']=$degreeType;
       }

       $workHistory="";

		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'seeker_profile';
        $this->load->view('layouts/layout', $this->data);
	}

	function Company_profile (){

		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'company_profile';
        $this->load->view('layouts/layout', $this->data);
	}
	function OneAnnouncement_page  (){

		$this->data['pageTitle']='Announcement page';
        $this->data['subview'] = 'one_announcement-page';
        $this->load->view('layouts/layout', $this->data);
	}

	function Announcement_page  (){
		$id=$this->session->userdata('u_id');
		$this->load->model('user_model');
		$this->data['company_id']=$this->user_model->get_company($id);
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