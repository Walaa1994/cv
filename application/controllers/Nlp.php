<?php
ini_set('max_execution_time', 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Nlp extends CI_Controller {

	public function nlp($file_path="C:\\xampp\\htdocs\\cv\\java_Nlp\\New.txt"){
		
			shell_exec("javac -cp  java_Nlp\\*; java_Nlp\\CoreNlp.java");
			
			shell_exec("java -cp java_Nlp\\*;java_Nlp  CoreNlp $file_path");
			
		}
	
}