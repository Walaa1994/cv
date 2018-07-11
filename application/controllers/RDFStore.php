<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RDFStore extends CI_Controller {

		public function jenaTDB_cv($rdf_path){
		 $Dataset_path="C:\\tdbCV";

			shell_exec("javac -cp  java_RDFStore\\*; java_RDFStore\\RDFStore.java");
			
		    shell_exec("java -cp java_RDFStore\\*;java_RDFStore  RDFStore $rdf_path $Dataset_path");			
		}

		public function jenaTDB_announcement($rdf_path){
		 $Dataset_path="C:\\tdbAnnouncement";

			shell_exec("javac -cp  java_RDFStore\\*; java_RDFStore\\RDFStore.java");
			
		    shell_exec("java -cp java_RDFStore\\*;java_RDFStore  RDFStore $rdf_path $Dataset_path");			
		}
}