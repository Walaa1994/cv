<?php
    if (! defined('BASEPATH')) exit('No direct script access allowed');
    require 'Facebook/autoload.php';
    Class FacebookProfile extends CI_controller{
     public function index(){
	    // session_start();
		  $fb = new Facebook\Facebook([
		  'app_id' => '147879859270785', // Replace {app-id} with your app id
		  'app_secret' => 'aa20ff9faaac65e05a771ddabd8a119e',
		  'default_graph_version' => 'v2.11',
		  ]);
		  try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $fb->get('/me?fields=posts.limit(200)', $_SESSION['fb_access']);
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
		//print_r($user['posts']);
		$posts_str='';
		foreach ($user['posts'] as $value) {
			if (array_key_exists('message', $value)) {
				$posts_str.=$value['message']." ";
			}		
		}
		$this->WriteFile($posts_str,"posts.txt");
		redirect('curl');
    }

    public function WriteFile($txt,$file_path){
            $myfile = fopen($file_path, "w") or die("Unable to open file!");
			fwrite($myfile, $txt);
			fclose($myfile);
        }
}
?>