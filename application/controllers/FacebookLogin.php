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
		  'app_id' => '268652723889487', 
		  'app_secret' => '5fc96e75ffda5df619f77328b03cabac',
		  'default_graph_version' => 'v3.0',
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