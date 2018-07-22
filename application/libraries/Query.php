<?php
ini_set('max_execution_time',0); 
defined('BASEPATH') OR exit('No direct script access allowed');

class Query {

		public function WriteFile($txt){
            $myfile = fopen("savequery.txt", "w") or die("Unable to open file!");
			fwrite($myfile, $txt);
			fclose($myfile);
        }
        public function querysparql($query,$Dataset_path){
		 //$Dataset_path="C:\\tdbAnnouncement";
		 $filename="savequery.txt";
	     /*$query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
			PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
			PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
			PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
			PREFIX foaf: <http://xmlns.com/foaf/0.1/>
			select ?job ?id
			where {
			    ?add cv:hasTarget ?w . 
			  	?w cv:targetCompanyDescription \"63\".
			  	?w cv:targetJobDescription ?job.
			  	?add cv:cvTitle ?id.
			} " ;*/

            $this->WriteFile($query);
			shell_exec("javac -cp  java_RDFStore\\*; java_RDFStore\\Sparql.java");

		    shell_exec("java -cp java_RDFStore\\*;java_RDFStore  Sparql $filename $Dataset_path");	

            $json_path = base_url().'/java_RDFStore/ResultSparql.json';
		    $str = file_get_contents($json_path);

		    $json = json_decode($str, true);
		    return $json;
		}
}
