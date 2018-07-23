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

    //function that hold all data ... Enas
    function seeker_data($seeker_id=null)
    {
      if ($seeker_id != null) {
        $id=$seeker_id;
      } else {
        $id=$this->session->userdata('u_id');
      }
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
    
        if($query_result['results']['bindings']!= null)
        {
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
        }
        else{
            $this->data['first_name']="Full ";
            $this->data['last_name']="Name  ";
            $this->data['birthday']="Birthday : ";
            $this->data['gender']="Gender ";
            $this->data['Nationality']=" ";
            $this->data['MaritalStatus']=" ";
            $this->data['Phone']="Phone :";
            $this->data['Email']="Email :";
            $this->data['Country']="Country";
            $this->data['City']="City";
            $this->data['Street']="Street";
        }

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

       if($edu_result['results']['bindings']!= null)
        {
           foreach ($edu_result['results']['bindings'] as  $value)
            {
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
       }
       else{
           $this->data['eduMajor']="Certificate : ";
           $this->data['eduMinor']="Specialization :";
           $this->data['eduStartDate']="Start Date: ";
           $this->data['eduGradDate']="Date of Grants : ";
           $this->data['studiedIn']="Donor : ";
           $this->data['degreeType']="Degree Type : ";
       }

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
        
        if($work_result['results']['bindings']!= null)
        {
            foreach ($work_result['results']['bindings'] as  $value)
             {
            $employedIn[]=$value['employedIn']['value'];
            $jobTitle[]=$value['jobTitle']['value'];
            $startDate[]=$value['startDate']['value'];
            $endDate[]=$value['endDate']['value'];
            $careerLevel[]=$value['careerLevel']['value'];
            $jobType[]=$value['jobType']['value'];
            $isCurrent[]=$value['isCurrent']['value'];
            }
            $this->data['employedIn']=$employedIn;
            //print_r($this->data['employedIn']) ;
            $this->data['jobTitle']=$jobTitle;
            $this->data['startDate']=$startDate;
            $this->data['endDate']=$endDate;
            $this->data['careerLevel']=$careerLevel;
            $this->data['jobType']=$jobType;
            $this->data['isCurrent']=$isCurrent;
        }
        else{
            $this->data['employedIn']="Company : ";
            $this->data['jobTitle']="Job Position : ";
            $this->data['startDate']="From : ";
            $this->data['endDate']="To : ";
            $this->data['careerLevel']="Career Level : ";
            $this->data['jobType']="Job Type : ";
            $this->data['isCurrent']="Is Current : ";
        }

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

        if($skills_result['results']['bindings']!= null)
        {
            foreach ($skills_result['results']['bindings'] as  $value) {
            $skillName[]=$value['skillName']['value'];
            $skillYearsExperience[]=$value['skillYearsExperience']['value'];
            $skillLevel[]=$value['skillLevel']['value'];
           }
            $this->data['skillName']=$skillName;
            $this->data['skillYearsExperience']=$skillYearsExperience;
            $this->data['skillLevel']=$skillLevel;
        }
        else{
            $this->data['skillName']="Skill Name : ";
            $this->data['skillYearsExperience']="Years of experience : ";
            $this->data['skillLevel']="Skill Level : ";
        }

        $lang="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
                    PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
                    PREFIX foaf: <http://xmlns.com/foaf/0.1/>
                    select ?skillName ?skillLevel ?lngSkillLevelReading ?lngSkillLevelWritten  
                    where {
                     ?resume cv:cvTitle \"$id\".
                     ?resume cv:hasSkill ?q .
                     ?q cv:skillName ?skillName.
                     ?q cv:skillLevel ?skillLevel.
                     ?q cv:lngSkillLevelReading ?lngSkillLevelReading.
                     ?q cv:lngSkillLevelWritten ?lngSkillLevelWritten.
                    }";

        $this->load->library('query');
        $lang_result=$this->query->querysparql($lang,$Dataset_path);

        if($lang_result['results']['bindings']!= null)
        {
            foreach ($lang_result['results']['bindings'] as  $value) {
            $langName[]=$value['skillName']['value'];
            $langspeaking[]=$value['skillLevel']['value'];
            $langReading[]=$value['lngSkillLevelReading']['value'];
            $langwriting[]=$value['lngSkillLevelWritten']['value'];
           }
            $this->data['langName']=$langName;
            $this->data['langspeaking']=$langspeaking;
            $this->data['langReading']=$langReading;
            $this->data['langwriting']=$langwriting;
        }
        else{
            $this->data['langName']="Language Name : ";
            $this->data['langspeaking']="Speaking Level : ";
            $this->data['langReading']="Reading Level : ";
            $this->data['langwriting']="Writing Level : ";
        }

        $refernce="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
                    PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
                    PREFIX foaf: <http://xmlns.com/foaf/0.1/>
                    select ?name ?phone ?mbox  
                    where {
                     ?resume cv:cvTitle \"$id\".
                     ?resume cv:hasReferenc ?q .
                     ?q cv:referenceBy ?y.
                     ?y foaf:name ?name.
                     ?y foaf:phone ?phone.
                     ?y foaf:mbox ?mbox.
                    }";

        $this->load->library('query');
        $ref_result=$this->query->querysparql($refernce,$Dataset_path);
        if($ref_result['results']['bindings']!= null)
        {
    
            $name=$ref_result['results']['bindings'][0]['name']['value'];
            echo $name ;
            $phone=$ref_result['results']['bindings'][0]['phone']['value'];
            $mbox=$ref_result['results']['bindings'][0]['mbox']['value'];
           
            $this->data['name']=$name;
            $this->data['phone']=$phone;
            $this->data['mbox']=$mbox;
        }
        else{
            $this->data['name']="Name : ";
            $this->data['phone']="Phone : ";
            $this->data['mbox']="Email : ";
        }

        $this->load->model('user_model');
        $res=$this->user_model->get_user_image($id);
        $this->data['image']=$res->Image;

        //merg all data in one array and return it
        $result[] = $this->data;
        return $result;
    }

    function seeker_profile ($warning_message=null){
        if ($warning_message!=null) {
            $this->data['warning_message']=$warning_message;
        }
        $this->seeker_data();
        $this->data['pageTitle']='Home';
        $this->data['subview'] = 'seeker_profile';
        $this->load->view('layouts/layout', $this->data);
    }

    function Company_profile (){
        $company_id=$this->session->userdata('u_id');
        $this->load->model('user_model');
        $result=$this->user_model->get_company_profile($company_id);
        /*echo '<pre>';
        print_r($result);*/
        $this->data['companyProfile']=$result;

        $this->data['pageTitle']='Home';
        $this->data['subview'] = 'company_profile';
        $this->load->view('layouts/layout', $this->data);
    }

    function Find_CV()
    {
        $dataJson = $this->input->post('result');
        $result = json_decode(htmlspecialchars_decode($dataJson), true);
        /*echo '<pre>';
        print_r($result);*/
    	$query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        select ?id
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
            ?w cv:degreeType \"$eduDegree\".";
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
            ?person vcard:hasAddress ?address.";

        foreach ($result['basic']['results']['bindings'] as  $value1){
            $locality=$value1['locality']['value'];
            $jobTitle=$value1['description']['value'];
            $query.="?address vcard:locality ?locality.
            FILTER regex(?locality,\"$locality\",\"i\").
            ?resume cv:hasTarget ?target.
		    ?target cv:targetJobDescription ?jobposition.
		    FILTER regex(?jobposition,\"$jobTitle\",\"i\").
            ";
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

        //echo "$query";
        $dataset_path="C:\\tdbCV";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        /*echo '<pre>';
        print_r($query_result);*/
        foreach ($query_result['results']['bindings'] as $value) {
          if (array_key_exists("id",$value))
            $user_result[]=$this->seeker_data($value['id']['value']);
        }
        /*echo '<pre>';
        print_r($result); */ 
        $this->data['result']=$user_result;
        $this->data['pageTitle']='Cv View';
        $this->data['subview'] = 'cv-view';
        $this->load->view('layouts/layout', $this->data); 

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

    function sekeer_home(){

        $this->data['pageTitle']='Home';
        $this->data['subview'] = 'seeker_home';
        $this->data['result'] = '';
        $this->load->view('layouts/layout', $this->data);
    }

    function test(){
        $this->data['pageTitle']='Home';
        $this->data['subview'] = 'blank';
        $this->data['result'] = '';
        $this->load->view('layouts/layout', $this->data);
        /*$this->load->view('blank');*/
    }

    function tt(){
        echo $this->input->post('koko');
    }

    function seeker_search(){
        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
                PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
                PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
                PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
                PREFIX foaf: <http://xmlns.com/foaf/0.1/>
                prefix xsd: <http://www.w3.org/2001/XMLSchema#>
                select ?company ?id ?description
                where {
                    ?ann cv:cvIsActive \"True\".
                    ?ann cv:cvTitle ?id.
                    ?ann cv:hasTarget ?target. 
                    ?target cv:targetJobDescription ?description.
                    ?target cv:targetCompanyDescription ?company.
                ";  
        $job_title=$this->input->post('job_title');
        if ($job_title!=null) {
            $query.="FILTER (regex(?description,\"$job_title\",\"i\")).";
        }
        $job_mode=$this->input->post('job_mode');
        if ($job_mode!=null) {
            $query.="?target cv:targetJobMode \"$job_mode\".";
        }
        $job_type=$this->input->post('job_type');
        if ($job_type!=null) {
            $query.="?target cv:targetJobType \"$job_type\".";
        }
        $salary=$this->input->post('salary');
        if ($salary!=null) {
            $query.="?target cv:targetSalary ?salary.
                    FILTER(xsd:integer(?salary) >= $salary).";
        }
        $locality=$this->input->post('locality');
        if ($locality!=null) {
            $query.="?ann cv:aboutPerson ?address.
                    ?address vcard:locality ?locality.
                    FILTER regex(?locality,\"$locality\",\"i\").";
        }
        $query.="}";
        /*$query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            prefix xsd: <http://www.w3.org/2001/XMLSchema#>
            select ?s ?p ?o 
            where {
                ?s ?p ?o.}";*/
        /*echo '<pre>';
        echo "$query";*/
        $dataset_path="C:\\tdbAnnouncement";
        $this->load->library('query');
        $this->data['result']=$this->query->querysparql($query,$dataset_path);
        /*echo '<pre>';
        print_r($this->data['result']);*/
        foreach ($this->data['result']['results']['bindings'] as $key => $value){ 
            $id=$value['company']['value'];
            $this->load->model('user_model');
            $en_name=$this->user_model->get_company($id)->en_name;
            $this->data['result']['results']['bindings'][$key]['company']['value']= $en_name;    
        }
        /*echo '<pre>';
        print_r($this->data['result']);*/
        $this->data['pageTitle']='seeker_home';
        $this->data['subview'] = 'seeker_home';
        $this->load->view('layouts/layout', $this->data);
    }

    function cv_view()
    {
        $this->data['pageTitle']='Cv View';
        $this->data['subview'] = 'cv-view';
        $this->load->view('layouts/layout', $this->data);
    }

    //to download cv as pdf
    function downloadCV()
    {
        $this->seeker_data();
        $this->load->library('fpdf_gen');
        $this->load->view('cv',$this->data);
    }
}