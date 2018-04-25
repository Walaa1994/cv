<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
    
    public function index()
    {
    	$this->data['pageTitle']='Add Company';
        $this->data['subview'] = 'company_form';
        $this->load->view('layouts/layout', $this->data);
    }

}

