<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//this class for convert pdf to text
include(APPPATH.'controllers/pdf2text.php');

class Seeker extends CI_Controller {

	public function index()
	{
		
	}
        
        public function CVForm()
	{
            $this->data['pageTitle']='Create Resume';
            $this->data['subview'] = 'cv_form';
            $this->load->view('layouts/layout', $this->data);
	}

	public function UploadCv()
	{
            $this->load->view('upload');
	}

	public function DoUpload(){
            if(isset($_FILES['userFile']))
             {
                $a = new PDF2Text();
                $a->setFilename($_FILES['userFile']['tmp_name']);
                $a->decodePDF();
                echo $a->output();
             }
	}
}
