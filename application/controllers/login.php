<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		
		
		

		$this->load->view('login');
	}
	public function log(){
		$this->load->view('login');


	}
	public function login_validation(){


		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('login_model');
			if($this->login_model->can_login($username, $password)){

				
				//$this->enter();
				redirect(base_url() . 'index.php/Welcome/');
			}
			else{

				$this->session->set_flashdata('error','invalid username and password');
				redirect(base_url(). 'index.php/login/log');
			}


		}else{

			$this->log();
		}
	}
	public function enter(){

		if($this->session->userdata('username') != '')
		{
			echo '<h2> welcom - '.$this->session->userdata('username').'</h2>';
			echo '<label><a href"'.base_url().'index.php/login/logout">logout</a></label>';



		}
		else{

			redirect(base_url(). 'index.php/login/log');
		}
	}

	public function logout(){

		$this->session->unset_userdata('username');
		redirect(base_url() . 'index.php/login/log');


	}






}
