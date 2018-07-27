<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');
    require 'Facebook/autoload.php';
    
    Class FacebookCallback extends CI_controller{

     public function index(){

	   session_start();
  
		$fb = new Facebook\Facebook([
		  'app_id' => '147879859270785', // Replace {app-id} with your app id
		  'app_secret' => 'aa20ff9faaac65e05a771ddabd8a119e',
		  'default_graph_version' => 'v2.11',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		if (! isset($accessToken)) {
		  if ($helper->getError()) {
		    header('HTTP/1.0 401 Unauthorized');
		    echo "Error: " . $helper->getError() . "\n";
		    echo "Error Code: " . $helper->getErrorCode() . "\n";
		    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
		    header('HTTP/1.0 400 Bad Request');
		    echo 'Bad request';
		  }
		  exit;
		}

		// Logged in
		echo '<h3>Access Token</h3>';
		$_SESSION['fb_access']=$accessToken->getValue();
		header("location:FacebookProfile");

	    }

}


?>