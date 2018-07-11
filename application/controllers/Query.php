<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Controller {

        public function WriteFile($txt){
            $myfile = fopen("savequery.txt", "w") or die("Unable to open file!");
			fwrite($myfile, $txt);
			fclose($myfile);
        }
		public function querysparql(){
		 $Dataset_path="C:\\tdbCV";
		 $filename="savequery.txt";
	     $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
				PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
				PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
				PREFIX vcard: <http://www.w3.org/2001/vcard-rdf/3.0#>
				PREFIX foaf: <http://xmlns.com/foaf/0.1/>
				select ?FirstName  ?LastName
				where {
				  ?resume cv:hasSkill ?q .   
				  ?q cv:skillName \"java\". 
				  ?resume cv:aboutPerson ?person.  
				  ?person foaf:firstName ?FirstName .
				  ?person foaf:lastName ?LastName .
				} " ;

            $this->WriteFile($query);
			shell_exec("javac -cp  java_RDFStore\\*; java_RDFStore\\Sparql.java");

		    shell_exec("java -cp java_RDFStore\\*;java_RDFStore  Sparql $filename $Dataset_path");	

            $json_path = base_url().'/java_RDFStore/ResultSparql.json';
		    $str = file_get_contents($json_path);

		    $json = json_decode($str, true);
		    echo '<pre>' . print_r($json, true) . '</pre>';
		}
}