<?php

class Home extends CI_Controller {
	
	function index()
	{
<<<<<<< HEAD
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
=======
		$this->data['pageTitle']='home page';
		$this->data['subview'] = 'test';
		$this->load->view('layouts/layout', $this->data);
	}

	
>>>>>>> cab4a5540efa582a735de5ce1555ba39e9ea9bc5
}