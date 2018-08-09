<?php
    if (! defined('BASEPATH')) exit('No direct script access allowed');
    require 'Facebook/autoload.php';

    Class FacebookLogin extends CI_controller{

     public function index(){

        $this->data['pageTitle']='Home';
        $this->data['subview'] = 'FacebookLogin';
        $this->load->view('layouts/layout', $this->data);

    }

    public function login (){
    	
        session_start();
		$fb = new Facebook\Facebook([
          'app_id' => '252443352149929', 
          'app_secret' => '1725afdeb40b8278369f7f97c0962216',
          'default_graph_version' => 'v3.1',
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