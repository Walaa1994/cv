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