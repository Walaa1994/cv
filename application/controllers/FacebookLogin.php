<?php
    if (! defined('BASEPATH')) exit('No direct script access allowed');
    require 'Facebook/autoload.php';

    Class FacebookLogin extends CI_controller{

     public function index(){

        $this->load->view('FacebookLogin');

    }

    public function login (){
    	
        session_start();
		$fb = new Facebook\Facebook([
		  'app_id' => '147879859270785', 
		  'app_secret' => 'aa20ff9faaac65e05a771ddabd8a119e',
		  'default_graph_version' => 'v2.11',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

         if (isset($_GET['state'])) {
		    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
		}
		
		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl(base_url().'/index.php/FacebookCallback', $permissions);

		header("location:".$loginUrl);
    }

}


?>