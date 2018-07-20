<?php

class Home extends CI_Controller {
	
	function index()
	{
		$this->load->view('static_page');
	}
	
	function sekeer_page()
	{
		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'sekeer_page';
        $this->load->view('layouts/layout', $this->data);
	}
	function company_page()
	{
		$this->load->view('company_page');
	}

	function seeker_profile (){
		$id=$this->session->userdata('u_id');
		$Dataset_path="C:\\tdbCV";
		$personalInfo="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
			PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
			PREFIX foaf: <http://xmlns.com/foaf/0.1/>
			select ?FirstName ?LastName ?Birthday ?Gender ?Nationality ?MaritalStatus ?Phone ?Email ?Country ?City ?Street
			where {
			  ?resume cv:cvTitle \"$id\".
			  ?resume cv:aboutPerson ?person.  
			  ?person foaf:firstName ?FirstName .
			  ?person foaf:lastName  ?LastName .
			  ?person foaf:birthday  ?Birthday .
			  ?person cv:gender ?Gender .
			  ?person cv:hasNationality ?Nationality .
			  ?person cv:maritalStatus ?MaritalStatus .
			  ?person foaf:phone ?Phone .
			  ?person foaf:mbox ?Email .
			  ?person vcard:hasAddress ?c .
			  ?c vcard:country-name ?Country .
			  ?c vcard:locality ?City .
			  ?c vcard:street-address ?Street .
			}    ";
		$this->load->library('query');
		$query_result=$this->query->querysparql($personalInfo,$Dataset_path);
		$first_name=$query_result['results']['bindings'][0]['FirstName']['value'];
		$last_name=$query_result['results']['bindings'][0]['LastName']['value'];
		$birthday=$query_result['results']['bindings'][0]['Birthday']['value'];
		$gender=$query_result['results']['bindings'][0]['Gender']['value'];
		$Nationality=$query_result['results']['bindings'][0]['Nationality']['value'];
		$MaritalStatus=$query_result['results']['bindings'][0]['MaritalStatus']['value'];
		$Phone=$query_result['results']['bindings'][0]['Phone']['value'];
		$Email=$query_result['results']['bindings'][0]['Email']['value'];
		$Country=$query_result['results']['bindings'][0]['Country']['value'];
		$City=$query_result['results']['bindings'][0]['City']['value'];
		$Street=$query_result['results']['bindings'][0]['Street']['value'];
		//echo '<pre>';
		//print_r($query_result);
		$this->data['first_name']=$first_name;
		$this->data['last_name']=$last_name;
		$this->data['birthday']=$birthday;
		$this->data['gender']=$gender;
		$this->data['Nationality']=$Nationality;
		$this->data['MaritalStatus']=$MaritalStatus;
		$this->data['Phone']=$Phone;
		$this->data['Email']=$Email;
		$this->data['Country']=$Country;
		$this->data['City']=$City;
		$this->data['Street']=$Street;

        $Education ="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
					PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
					PREFIX foaf: <http://xmlns.com/foaf/0.1/>
					select ?eduMajor ?eduMinor ?eduStartDate ?eduGradDate ?studiedIn ?degreeType 
					where {
					 ?resume cv:cvTitle \"$id\".
					 ?resume cv:hasEducation ?q .
					 ?q cv:eduMajor ?eduMajor.
					 ?q cv:eduMinor ?eduMinor.
					 ?q cv:eduStartDate ?eduStartDate.
					 ?q cv:eduGradDate ?eduGradDate.
					 ?q cv:studiedIn ?studiedIn.
					 ?q cv:degreeType ?degreeType.
					}";
		$this->load->library('query');
		$edu_result=$this->query->querysparql($Education,$Dataset_path);
		//echo '<pre>';
		//print_r($edu_result);

       foreach ($edu_result['results']['bindings'] as  $value) {
       	$eduMajor[]=$value['eduMajor']['value'];
       	$eduMinor[]=$value['eduMinor']['value'];
       	$eduStartDate[]=$value['eduStartDate']['value'];
       	$eduGradDate[]=$value['eduGradDate']['value'];
       	$studiedIn[]=$value['studiedIn']['value'];
       	$degreeType[]=$value['degreeType']['value'];
       }

       $this->data['eduMajor']=$eduMajor;
       	$this->data['eduMinor']=$eduMinor;
       	$this->data['eduStartDate']=$eduStartDate;
        $this->data['eduGradDate']=$eduGradDate;
        $this->data['studiedIn']=$studiedIn;
        $this->data['degreeType']=$degreeType;

       $workHistory="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
					PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
					PREFIX foaf: <http://xmlns.com/foaf/0.1/>
					select ?employedIn ?jobTitle ?startDate ?endDate ?careerLevel ?jobType ?isCurrent 
					where {
					 ?resume cv:cvTitle \"$id\".
					 ?resume cv:hasWorkHistory ?q .
					 ?q cv:employedIn ?employedIn.
					 ?q cv:jobTitle ?jobTitle.
					 ?q cv:startDate ?startDate.
					 ?q cv:endDate ?endDate.
					 ?q cv:careerLevel ?careerLevel.
					 ?q cv:jobType ?jobType.
					 ?q cv:isCurrent ?isCurrent.
					}";
		$this->load->library('query');
		$work_result=$this->query->querysparql($workHistory,$Dataset_path);
		//echo '<pre>';
		//print_r($work_result);
		foreach ($work_result['results']['bindings'] as  $value) {
       	$employedIn[]=$value['employedIn']['value'];
       	$jobTitle[]=$value['jobTitle']['value'];
       	$startDate[]=$value['startDate']['value'];
       	$endDate[]=$value['endDate']['value'];
       	$careerLevel[]=$value['careerLevel']['value'];
       	$jobType[]=$value['jobType']['value'];
       	$isCurrent[]=$value['isCurrent']['value'];
       }


       	$this->data['employedIn']=$employedIn;
       	$this->data['jobTitle']=$jobTitle;
       	$this->data['startDate']=$startDate;
        $this->data['endDate']=$endDate;
        $this->data['careerLevel']=$careerLevel;
        $this->data['jobType']=$jobType;
        $this->data['isCurrent']=$isCurrent;


       $skills="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
					PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
					PREFIX foaf: <http://xmlns.com/foaf/0.1/>
					select ?skillName ?skillYearsExperience ?skillLevel  
					where {
					 ?resume cv:cvTitle \"$id\".
					 ?resume cv:hasSkill ?q .
					 ?q cv:skillName ?skillName.
					 ?q cv:skillYearsExperience ?skillYearsExperience.
					 ?q cv:skillLevel ?skillLevel.
					}";
		$this->load->library('query');
		$skills_result=$this->query->querysparql($skills,$Dataset_path);

		foreach ($skills_result['results']['bindings'] as  $value) {
       	$skillName[]=$value['skillName']['value'];
       	$skillYearsExperience[]=$value['skillYearsExperience']['value'];
       	$skillLevel[]=$value['skillLevel']['value'];
       }

        $this->data['skillName']=$skillName;
       	$this->data['skillYearsExperience']=$skillYearsExperience;
       	$this->data['skillLevel']=$skillLevel;

		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'seeker_profile';
        $this->load->view('layouts/layout', $this->data);
	}

	function Company_profile (){

		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'company_profile';
        $this->load->view('layouts/layout', $this->data);
	}
	function OneAnnouncement_page  ($id){
		/*$query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            select distinct ?description ?model ?type ?salary ?locality ?eduMajor ?eduMinor ?eduDegree 
            ?skillName ?skillExperience
            where {
                ?ann cv:hasTarget ?target . 
                ?target cv:targetJobDescription ?description.
                ?target cv:targetJobMode ?model.
                ?target cv:targetJobType ?type.
                ?target cv:targetSalary ?salary.
                ?ann cv:aboutPerson ?person.
                ?person vcard:locality ?locality.
                ?ann cv:cvTitle \"$id\".
                ?ann cv:hasEducation ?edu.
                ?edu cv:eduMajor ?eduMajor.
                ?edu cv:eduMinor ?eduMinor.
                ?edu cv:degreeType ?eduDegree.
                ?ann cv:hasSkill ?skill.
                ?skill cv:skillName ?skillName.
                ?skills cv:skillYearsExperience ?skillExperience.
            } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        echo '<pre>';
        print_r($query_result);*/

        $com_id=$this->session->userdata('u_id');
		$this->load->model('user_model');
		$this->data['company']=$this->user_model->get_company($com_id);

        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            select ?description ?mode ?type ?salary ?locality
            where {
                ?ann cv:hasTarget ?target . 
                ?target cv:targetJobDescription ?description.
                ?target cv:targetJobMode ?mode.
                ?target cv:targetJobType ?type.
                ?target cv:targetSalary ?salary.
                ?ann cv:aboutPerson ?person.
                ?person vcard:locality ?locality.
                ?ann cv:cvTitle \"$id\".
            } " ;
        //echo "$query";
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result['basic']=$this->query->querysparql($query,$dataset_path);

        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        select ?eduMajor ?eduMinor ?eduDegree 
        where {
            ?ann cv:hasEducation ?edu.
            ?edu cv:eduMajor ?eduMajor.
            ?edu cv:eduMinor ?eduMinor.
            ?edu cv:degreeType ?eduDegree.
            ?ann cv:cvTitle \"$id\".
        } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result['education']=$this->query->querysparql($query,$dataset_path);

        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        select DISTINCT ?skillName ?skillExperience
        where {
            ?ann cv:hasSkill ?skill.
            ?skill cv:skillName ?skillName.
            ?skills cv:skillYearsExperience ?skillExperience.
            ?ann cv:cvTitle \"$id\".
        } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $query_result['skills']=$this->query->querysparql($query,$dataset_path);

        /*echo '<pre>';
        print_r($query_result);*/
        $this->data['result']=$query_result;
		$this->data['pageTitle']='Announcement page';
        $this->data['subview'] = 'one_announcement-page';
        $this->load->view('layouts/layout', $this->data);
	}

	function Find_CV()
	{
		$dataJson = $this->input->post('result');
        $result = json_decode(htmlspecialchars_decode($dataJson), true);
        echo '<pre>';
        print_r($result);
		$query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        select ?FirstName ?LastName ?id
        where {
            {
            ?resume cv:cvTitle ?id.
            ?resume cv:cvIsActive \"True\".
            ?resume cv:hasEducation ?w .
             ";

	    foreach ($result['education']['results']['bindings'] as $value2) {
		    $eduMajor=$value2['eduMajor']['value'];
		    $eduDegree=$value2['eduDegree']['value'];
		    $query.="?w cv:eduMajor \"$eduMajor\".
		    ?w cv:degreeType <http://rdfs.org/resume-rdf/base.rdfs#EduBachelor>.";
        }

        $i=1;
        foreach ($result['skills']['results']['bindings'] as $value3){
            $skillName=$value3['skillName']['value'];
            $query.="?resume cv:hasSkill ?q$i.
            ?q$i cv:skillName ?l$i.
            FILTER (regex(?l$i,\"$skillName\",\"i\")).";
            $i++;
        }

        $query.="?resume cv:aboutPerson ?person.  
            ?person foaf:firstName ?FirstName .
            ?person foaf:lastName  ?LastName .
            ?person vcard:hasAddress ?address.";

        foreach ($result['basic']['results']['bindings'] as  $value1){
            $locality=$value1['locality']['value'];
            $query.="?address vcard:locality ?locality.
            FILTER regex(?locality,\"$locality\",\"i\").";
        }

        foreach ($result['education']['results']['bindings'] as $value2) {
            $eduMinor=$value2['eduMinor']['value'];
            $query.="
            }
            union
            {
              ?resume cv:hasEducation ?education . 
              ?education cv:eduMinor \"$eduMinor\".     
            }
        }";
        }

        echo "$query";
        $dataset_path="C:\\tdbCV";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        echo '<pre>';
        print_r($query_result);
	}

	function Announcement_page  (){
		$id=$this->session->userdata('u_id');
		$this->load->model('user_model');
		$this->data['company']=$this->user_model->get_company($id);
		//print_r($this->data['company_id']);
        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            select ?job ?id
            where {
                ?ann cv:hasTarget ?w . 
                ?w cv:targetCompanyDescription \"$id\".
                ?w cv:targetJobDescription ?job.
                ?ann cv:cvTitle ?id.
            } " ;
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $this->data['result']=$this->query->querysparql($query,$dataset_path);
		$this->data['pageTitle']='Announcement page';
        $this->data['subview'] = 'Announcement_page';
        $this->load->view('layouts/layout', $this->data);
	}

	function About_Us (){

		$this->data['pageTitle']='About Us';
        $this->data['subview'] = 'aboutus';
        $this->load->view('layouts/layout', $this->data);
	}

	function Contact_Us (){

		$this->data['pageTitle']='Contasct Us';
        $this->data['subview'] = 'contactus';
        $this->load->view('layouts/layout', $this->data);
	}

	function sekeer_home()
	{
		$this->data['pageTitle']='Home';
        $this->data['subview'] = 'seeker_home';
        $this->load->view('layouts/layout', $this->data);
	}
	function cv_view()
	{
		$this->data['pageTitle']='Cv View';
        $this->data['subview'] = 'cv-view';
        $this->load->view('layouts/layout', $this->data);
	}
}