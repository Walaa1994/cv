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