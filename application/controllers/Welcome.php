<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('welcome');
	}

	public function Register()
	{
		$this->load->helper(array('Form','Url','html'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('Email','Email','trim|required');
		
		if($this->form_validation->run()==false){
			$this->Welcome();

		}else{

			$user=array(
				'password'=> $this->input->post('password'),
				'username'=> $this->input->post('username'),
				'Email'=>    $this->input->post('Email')

				);
			$this->load->model('Register_model');
			$this->Register_model->add_user($user);
			


		}
		
		
		

		
	}
}
