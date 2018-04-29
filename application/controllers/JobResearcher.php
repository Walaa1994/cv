<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//this class for convert pdf to text
include(APPPATH.'controllers/pdf2text.php');

class JobResearcher extends CI_Controller {

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
		$this->data['pageTitle']='Upload CV';
		$this->data['subview'] = 'upload';
		$this->load->view('layouts/layout', $this->data);

		
	}

	public function do_upload(){
		$config['upload_path'] ='./assets/uploads/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userFile')){
			$error = array('error'=>$this->upload->display_errors());

		}
		else{
			$data = array('uoload_data'=>$this->upload->data());
		}
	}
        
        public function ConvertPdfToText()
	{
		$a = new PDF2Text();
                //this cv.pdf file exisit in the project file (at the same level of application folder)
		$a->setFilename('cv.pdf');
		$a->decodePDF();
		echo $a->output();
	}
}
