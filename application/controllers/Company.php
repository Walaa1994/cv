<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
    
    public function index()
    {
        $this->load->view('company_form');
    }

}
