<?php

class Home extends CI_Controller {
	
	function index()
	{
		$this->load->view('static_page');
	}
	
	function sekeer_page()
	{
		$this->load->view('sekeer_page');
	}
	function company_page()
	{
		$this->load->view('company_page');
	}
}