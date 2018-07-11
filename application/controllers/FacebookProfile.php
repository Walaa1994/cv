<?php
    if (! defined('BASEPATH')) exit('No direct script access allowed');
    require 'Facebook/autoload.php';

    Class FacebookProfile extends CI_controller{

     public function index(){

	    // session_start();
		  $fb = new Facebook\Facebook([
		  'app_id' => '268652723889487', 
		  'app_secret' => '5fc96e75ffda5df619f77328b03cabac',
		  'default_graph_version' => 'v3.0',
		  ]);
		  try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $fb->get('/me?fields=posts', $_SESSION['fb_access']);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$user = $response->getGraphUser();
		echo"<pre>";
		$user = json_decode($user, true);
		print_r($user['posts'][0]['message']);
    }

}


?>