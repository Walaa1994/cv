<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    //hello my frinds I'm Hamida ^_^
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('upload');
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
}
