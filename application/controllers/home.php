<?php

class Home extends CI_Controller {
	
	function index()
	{
		$this->data['pageTitle']='home page';
		$this->data['subview'] = 'test';
		$this->load->view('layouts/layout', $this->data);
	}

	
}