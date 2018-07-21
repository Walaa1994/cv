<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('register');
	}


	public function register()
	{
        $this->load->helper(array('Form','Url','html'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('password','password','trim|required');
        $this->form_validation->set_rules('Cpassword','Cpassword','trim|required|matches[password]');
        $this->form_validation->set_rules('Email','Email','trim|required');
        $this->form_validation->set_rules('seek_com','seek_com','trim|required');
        $data['img']=base_url().'/assets/UserPhoto/default_photo.jpg';

        if($this->form_validation->run()==false){
                $this->index();
        }
        else{
        	$this->load->model('User_model');
            $user=array(
                    'username'=> $this->input->post('username'),
                    'password'=> $this->input->post('password'),
                    'Email'=>    $this->input->post('Email'),
                    'type'=>$this->input->post('seek_com'),
                    'Image'=>$data['img']
                    );    
            $this->User_model->add_user($user);
            redirect('User/login');
        }    
	}


	public function login()
	{		
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
			$this->load->model('User_model');
			if($this->User_model->get_user($username, $password))
				$this->user_page();
			else{
				$this->session->set_flashdata('error','invalid username and password');
				redirect(base_url(). 'index.php/User/login');
			}
		}
		else{
			$this->login();
		}
	}

	public function user_page(){
		if($this->session->userdata('type')== "seeker")
			redirect(base_url() . 'index.php/home/seeker_profile');
		else
			redirect(base_url() . 'index.php/home/Company_profile');
	}

	public function user_home(){
		if($this->session->userdata('type')== "seeker")
			redirect(base_url() . 'index.php/home/sekeer_home');
		else
			redirect(base_url() . 'index.php/home/Announcement_page');
	}
	public function enter(){

		if($this->session->userdata('username') != '')
		{
			echo '<h2> welcom - '.$this->session->userdata('username').'</h2>';
			echo '<label><a href"'.base_url().'index.php/User/logout">logout</a></label>';
		}
		else{
			redirect(base_url(). 'index.php/User/login');
		}
	}

	public function logout(){

		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_photo');
		redirect(base_url() . 'index.php/User/login');
	}

}
