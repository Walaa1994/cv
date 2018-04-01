<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
		
		
		
		
		$this->load->view('register');
	}


	public function Reg()
	{
		$this->load->helper(array('Form','Url','html'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_rules('Cpassword','Cpassword','trim|required|matches[password]');
		
		$this->form_validation->set_rules('Email','Email','trim|required');
		
		
		if($this->form_validation->run()==false){
			$this->index();

		}else{

			
				$user=array(
				'username'=> $this->input->post('username'),
				'password'=> $this->input->post('password'),
				'Email'=>    $this->input->post('Email'),
				



				);
			$this->load->model('register_model');
			$this->register_model->add_user($user);
			
		
			
			redirect('Register/login');


		}
	}


	public function login()
	{
		
		
		
		
		$this->load->view('login');
	}





	
	
		



	





}
