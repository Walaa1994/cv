<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Controller {

        public function WriteFile($txt){
            $myfile = fopen("savequery.txt", "w") or die("Unable to open file!");
			fwrite($myfile, $txt);
			fclose($myfile);
        }
		public function querysparql(){
		 $Dataset_path="C:\\tdb";
		 $filename="savequery.txt";
	     $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
				PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
				PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
				PREFIX vcard: <http://www.w3.org/2001/vcard-rdf/3.0#>
				PREFIX foaf: <http://xmlns.com/foaf/0.1/>
				select ?FirstName  
				where {
				  ?resume cv:hasSkill ?q .   
				  ?q cv:skillName \"php\". 
				  ?resume cv:aboutPerson ?person.  
				  ?person foaf:firstName ?FirstName .
				} " ;

            $this->WriteFile($query);
			shell_exec("javac -cp  java_RDFStore\\*; java_RDFStore\\Sparql.java");
			
		    echo shell_exec("java -cp java_RDFStore\\*;java_RDFStore  Sparql $filename $Dataset_path");			
		}
}