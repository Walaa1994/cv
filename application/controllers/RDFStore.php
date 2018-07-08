<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RDFStore extends CI_Controller {

		public function jenaTDB($rdf_path){
		 $Dataset_path="C:\\tdb";

			shell_exec("javac -cp  java_RDFStore\\*; java_RDFStore\\RDFStore.java");
			
		    shell_exec("java -cp java_RDFStore\\*;java_RDFStore  RDFStore $rdf_path $Dataset_path");			
		}
}