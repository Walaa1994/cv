<?php
ini_set('max_execution_time', 0);
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

    function view_ann_cvs(){
        $ann_id=$this->input->post('ann_id');
        $this->load->model('user_model');
        $data=$this->user_model->get_cv($ann_id);
        
        foreach ($data as $key => $value) {

           
            $cvs[$key]=$this->seeker_data($value["cv_id"]);
        }
         $this->data['result']=$cvs;

        $this->data['pageTitle']='Cv View';
        $this->data['subview'] = 'cv-view';
        $this->load->view('layouts/layout', $this->data); 

  
  
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
         /*echo '<pre>';
         print_r($query_result);*/
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
        
        	$this->data['id']=$id;
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

        $personality="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
                      PREFIX vcard: <http://www.w3.org/2001/vcard-rdf/3.0#>
                      PREFIX foaf: <http://xmlns.com/foaf/0.1/>
                      select ?percentile1  ?percentile2 ?percentile3 ?percentile4 ?percentile5
                      where {
                        ?resume cv:cvTitle \"$id\".
                        ?resume cv:hasOtherInfo ?a.
                        ?a cv:otherInfoType \"openness\".
                        ?a cv:otherInfoDescription ?percentile1.

                        ?resume cv:hasOtherInfo ?b.
                        ?b cv:otherInfoType \"conscientiousness\".
                        ?b cv:otherInfoDescription ?percentile2.

                        ?resume cv:hasOtherInfo ?c.
                        ?c cv:otherInfoType \"extraversion\".
                        ?c cv:otherInfoDescription ?percentile3.

                        ?resume cv:hasOtherInfo ?d.
                        ?d cv:otherInfoType \"agreeableness\".
                        ?d cv:otherInfoDescription ?percentile4.

                        ?resume cv:hasOtherInfo ?e.
                        ?e cv:otherInfoType \"neuroticism\".
                        ?e cv:otherInfoDescription ?percentile5.  
                      }";

        $this->load->library('query');
        $per_result=$this->query->querysparql($personality,$Dataset_path);
        if($per_result['results']['bindings']!= null)
        {
    
            $openness=$per_result['results']['bindings'][0]['percentile1']['value'];
            $conscientiousness=$per_result['results']['bindings'][0]['percentile2']['value'];
            $extraversion=$per_result['results']['bindings'][0]['percentile3']['value'];
            $agreeableness=$per_result['results']['bindings'][0]['percentile4']['value'];
            $neuroticism=$per_result['results']['bindings'][0]['percentile5']['value'];
           
            $this->data['openness']=$openness;
            $this->data['conscientiousness']=$conscientiousness;
            $this->data['extraversion']=$extraversion;
            $this->data['agreeableness']=$agreeableness;
            $this->data['neuroticism']=$neuroticism;
        }
        else{
            $this->data['openness']=" ";
            $this->data['conscientiousness']=" ";
            $this->data['extraversion']=" ";
            $this->data['agreeableness']=" ";
            $this->data['neuroticism']=" ";
        }

        $Target="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
                    PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
                    PREFIX foaf: <http://xmlns.com/foaf/0.1/>
                    select ?jobposition  
                    where {
                     ?resume cv:cvTitle \"$id\".
                     ?resume cv:hasTarget ?q .
                     ?q cv:targetJobDescription ?jobposition.
                    }";
        $this->load->library('query');
        $target_result=$this->query->querysparql($Target,$Dataset_path);

        if($target_result['results']['bindings']!= null)
        {
    
            $jobposition=$target_result['results']['bindings'][0]['jobposition']['value']; 
           
            $this->data['jobposition']=$jobposition;
        }
        else{
            $this->data['jobposition']=" ";
        }
        $this->load->model('user_model');
        $res=$this->user_model->get_user_image($id);
        $this->data['image']=$res->Image;

        //merg all data in one array and return it
        $result[] = $this->data;
        return $result;
        /*echo "<pre>";
        print_r($result);*/
    }

    function seeker_profile ($warning_message=null){
        if ($warning_message!=null) {
            $this->data['warning_message']=$warning_message;
        }
        else {
          $this->data['warning_message']=" " ;
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
        $result1=$this->user_model->get_check_company($company_id);
        /*echo '<pre>';
        print_r($result);*/
        $this->data['companyProfile']=$result;
        $this->data['company_check']=$result1;


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
        $this->load->library('babelnet');
    	  $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        prefix xsd: <http://www.w3.org/2001/XMLSchema#>
        select distinct ?id ?FirstName ?LastName ?jobposition ?major ?minor ?degree ?studiedIn ?employedIn ?jobTitle
        where {
          {
            ?resume cv:cvTitle ?id.
            ?resume cv:cvIsActive \"True\".
            ?resume cv:hasEducation ?w .
            ?resume cv:hasWorkHistory ?q .
             ?q cv:employedIn ?employedIn.
             ?q cv:jobTitle ?jobTitle.
             ";

        foreach ($result['education']['results']['bindings'] as $value1) {
            $eduMajor=$value1['eduMajor']['value'];
            $eduMinor=$value1['eduMinor']['value'];
            $eduDegree=$value1['eduDegree']['value'];
            
            $query.="?w cv:eduMajor ?major.
            FILTER (regex(?major,\"$eduMajor\",\"i\")).
            ?w cv:eduMinor ?minor.
            FILTER (regex(?minor,\"$eduMinor\",\"i\")).
            ?w cv:degreeType ?degree.
            FILTER (regex(?degree,\"$eduDegree\",\"i\")).
            ?w cv:studiedIn ?studiedIn.";
        }

        $i=1;
        foreach ($result['skills']['results']['bindings'] as $value2){
            $skillName=$value2['skillName']['value'];
            $query.="?resume cv:hasSkill ?q$i.
            ?q$i cv:skillName ?l$i.
            FILTER (regex(?l$i,\"$skillName\",\"i\")";
            $skill_syn=$this->babelnet->synonymous($skillName);
            if ($skill_syn!=null) {
              foreach ($skill_syn as $syn2) {
                $query.="|| regex(?l$i,\"$syn2\",\"i\")";
              }
            }
            $query.=").";
            $i++;
        }

        $query.="?resume cv:aboutPerson ?person. 
            ?person foaf:firstName ?FirstName .
            ?person foaf:lastName  ?LastName . 
            ?person vcard:hasAddress ?address.";
        $this->load->model('user_model');
        foreach ($result['basic']['results']['bindings'] as  $value3){
            $locality=$value3['locality']['value'];
            $jobTitle=$value3['description']['value'];
            $query.="?address vcard:locality ?locality.
            FILTER regex(?locality,\"$locality\",\"i\").
            ?resume cv:hasTarget ?target.
    		    ?target cv:targetJobDescription ?jobposition.
    		    FILTER (regex(?jobposition,\"$jobTitle\",\"i\")
            ";
            $job_title_syn=$this->babelnet->synonymous($jobTitle);
            if ($job_title_syn!=null) {
              foreach ($job_title_syn as $syn) {
                $query.="|| regex(?jobposition,\"$syn\",\"i\")";
              }
            }
            $query.=").";
            $big_five=$this->user_model->get_big_five($jobTitle);
            if ($big_five!=null) {
              $query.="?resume cv:hasOtherInfo ?info1.
              ?info1 cv:otherInfoType \"openness\".
              ?info1 cv:otherInfoDescription ?openness.
              FILTER(xsd:integer(?openness) >= $big_five->Openness).
              ?resume cv:hasOtherInfo ?info2.
              ?info2 cv:otherInfoType \"extraversion\".
              ?info2 cv:otherInfoDescription ?extraversion.
              FILTER(xsd:integer(?extraversion) >= $big_five->Extraversion).
              ?resume cv:hasOtherInfo ?info3.
              ?info3 cv:otherInfoType \"conscientiousness\".
              ?info3 cv:otherInfoDescription ?conscientiousness.
              FILTER(xsd:integer(?conscientiousness) >= $big_five->Conscientiousness).
              ?resume cv:hasOtherInfo ?info4.
              ?info4 cv:otherInfoType \"agreeableness\".
              ?info4 cv:otherInfoDescription ?agreeableness.
              FILTER(xsd:integer(?agreeableness) >= $big_five->Agreeableness).
              ?resume cv:hasOtherInfo ?info5.
              ?info5 cv:otherInfoType \"neuroticism\".
              ?info5 cv:otherInfoDescription ?neuroticism.
              FILTER(xsd:integer(?neuroticism) >= $big_five->Neuroticism).
              ";}
        }

        $query.="}";
        $comb=$this->combination($result['skills']['results']['bindings']);
        arsort($comb);
        foreach ($comb as $array) {
        $query.="union
            {
              ?resume cv:cvTitle ?id.
              ?resume cv:cvIsActive \"True\".
              ?resume cv:hasWorkHistory ?q .
              ?q cv:employedIn ?employedIn.
              ?q cv:jobTitle ?jobTitle.
              ?resume cv:hasEducation ?w .";

        foreach ($result['education']['results']['bindings'] as $value4) {
            $eduMajor1=$value4['eduMajor']['value'];
            $eduDegree1=$value4['eduDegree']['value'];
            $query.="?w cv:eduMajor ?major.
            FILTER (regex(?major,\"$eduMajor1\",\"i\")).
            ?w cv:eduMinor ?minor.
            ?w cv:degreeType ?degree.
            FILTER (regex(?degree,\"$eduDegree1\",\"i\")).
            ?w cv:studiedIn ?studiedIn.";
        }

        $i=1;
       
        foreach ($array as $value5) {
            $skillName1=$value5['skillName']['value'];
            $query.="?resume cv:hasSkill ?q$i.
            ?q$i cv:skillName ?l$i.
            FILTER (regex(?l$i,\"$skillName1\",\"i\")";
             $skill_syn1=$this->babelnet->synonymous($skillName1);
            if ($skill_syn1!=null) {
              foreach ($skill_syn1 as $syn3) {
                $query.="|| regex(?l$i,\"$syn3\",\"i\")";
              }
            }
            $query.=").";
            $i++;
        }

        $query.="?resume cv:aboutPerson ?person.
                ?person foaf:firstName ?FirstName .
                ?person foaf:lastName  ?LastName .   
                ?person vcard:hasAddress ?address.";

        foreach ($result['basic']['results']['bindings'] as  $value6){
            $locality1=$value6['locality']['value'];
            $jobTitle1=$value6['description']['value'];
            $query.="?address vcard:locality ?locality.
            FILTER regex(?locality,\"$locality1\",\"i\").
            ?resume cv:hasTarget ?target.
            ?target cv:targetJobDescription ?jobposition.
            FILTER (regex(?jobposition,\"$jobTitle1\",\"i\")
            ";
            $job_title_syn1=$this->babelnet->synonymous($jobTitle1);
            if ($job_title_syn1!=null) {
              foreach ($job_title_syn1 as $syn1) {
                $query.="|| regex(?jobposition,\"$syn1\",\"i\")";
              }
            }
            $query.=").";

            $big_five=$this->user_model->get_big_five($jobTitle);
            if ($big_five!=null) {
              $query.="?resume cv:hasOtherInfo ?info1.
              ?info1 cv:otherInfoType \"openness\".
              ?info1 cv:otherInfoDescription ?openness.
              FILTER(xsd:integer(?openness) >= $big_five->Openness).
              ?resume cv:hasOtherInfo ?info2.
              ?info2 cv:otherInfoType \"extraversion\".
              ?info2 cv:otherInfoDescription ?extraversion.
              FILTER(xsd:integer(?extraversion) >= $big_five->Extraversion).
              ?resume cv:hasOtherInfo ?info3.
              ?info3 cv:otherInfoType \"conscientiousness\".
              ?info3 cv:otherInfoDescription ?conscientiousness.
              FILTER(xsd:integer(?conscientiousness) >= $big_five->Conscientiousness).
              ?resume cv:hasOtherInfo ?info4.
              ?info4 cv:otherInfoType \"agreeableness\".
              ?info4 cv:otherInfoDescription ?agreeableness.
              FILTER(xsd:integer(?agreeableness) >= $big_five->Agreeableness).
              ?resume cv:hasOtherInfo ?info5.
              ?info5 cv:otherInfoType \"neuroticism\".
              ?info5 cv:otherInfoDescription ?neuroticism.
              FILTER(xsd:integer(?neuroticism) >= $big_five->Neuroticism).
              ";}
        }
        $query.="}";
      }
        $query.="}";
        /*echo "<pre>";
        echo "$query";*/
        $dataset_path="C:\\tdbCV";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        /*echo '<pre>';
        print_r($query_result);*/
        $user_result=array();  
        $this->load->model('user_model');
        
        foreach ($query_result['results']['bindings'] as $value) {
          if (array_key_exists("id",$value)){
            $this->data['id']=$value['id']['value'];
            $this->data['first_name']=$value['FirstName']['value'];
            $this->data['last_name']=$value['LastName']['value'];
            $this->data['jobposition']=$value['jobposition']['value'];
            $Major[]=$value['major']['value'];
            $Minor[]=$value['minor']['value'];
            $studiedIn[]=$value['studiedIn']['value'];
            $degree[]=$value['degree']['value'];
            $this->data['eduMajor']=$Major;
            $this->data['eduMinor']=$Minor;
            $this->data['studiedIn']=$studiedIn;
            $this->data['degreeType']=$degree;
            $employedIn[]=$value['employedIn']['value'];
            $job[]=$value['jobTitle']['value'];
            $this->data['employedIn']=$employedIn;
            $this->data['jobTitle']=$job;
            $res=$this->user_model->get_user_image($this->data['id']);
            $this->data['image']=$res->Image;
            $user_result[] = $this->data;
          }
        }
       /* echo '<pre>';
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
            select distinct ?job ?id
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

    public function combination($words)
    {   
      $num = count($words); 
      //The total number of possible combinations 
      $total = pow(2, $num);
      //Loop through each possible combination  

      for ($i = 0; $i < $total; $i++) {  

          //For each combination check if each bit is set 

          for ($j = 0; $j < $num; $j++) { 

             //Is bit $j set in $i? 

              if (pow(2, $j) & $i) 
                $result[$i][$j]=$words[$j] ;      

          } 
      }
      /*echo "<pre>";
      print_r($result);*/
      return $result;
    }



    public function find_job($id)
    {
      $seeker=$this->seeker_data($id);
      $jobposition=$seeker[0]['jobposition'];
      $locality=$seeker[0]['City'];
      $eduMajor=$seeker[0]['eduMajor'];
      $eduDegree=$seeker[0]['degreeType'];
      $skills=$seeker[0]['skillName'];

      $comb=$this->combination($skills);
      arsort($comb);

      $FirstEduMajor=$seeker[0]['eduMajor'][0];
      $FirstEduDegree=$seeker[0]['degreeType'][0];

      $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
              PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
              PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
              PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
              PREFIX foaf: <http://xmlns.com/foaf/0.1/>
              prefix xsd: <http://www.w3.org/2001/XMLSchema#>
              select distinct ?id ?company ?description
              where {
                {
                ?ann cv:hasTarget ?w . 
                ?w cv:targetCompanyDescription ?company.
                ?ann cv:cvTitle ?id.
                ?ann cv:aboutPerson ?person.
                ?person vcard:locality ?locality.
                FILTER regex(?locality,\"$locality\",\"i\").
                ?ann cv:hasTarget ?target. 
                ?target cv:targetJobDescription ?description.
                FILTER(regex(?description,\"$jobposition\",\"i\")";
        $this->load->library('babelnet');
        $jobposition_syn1=$this->babelnet->synonymous($jobposition);
        if ($jobposition_syn1!=null) {
          foreach ($jobposition_syn1 as $syn1) {
            $query.="|| regex(?description,\"$syn1\",\"i\")";
          }
        }
      $query.=").
                ?ann cv:hasEducation ?edu.
                ?edu cv:eduMajor ?eduMajor.
                FILTER regex(?eduMajor,\"$FirstEduMajor\",\"i\").
                ?edu cv:degreeType \"$FirstEduDegree\".";
      $i=1;
      foreach ($skills as $value) {
        $query.="?ann cv:hasSkill ?skill$i.
                ?skill cv:skillName ?skillName$i.
                FILTER(regex(?skillName$i,\"$value\",\"i\")";
        $skill_syn1=$this->babelnet->synonymous($value);
        if ($skill_syn1!=null) {
            foreach ($skill_syn1 as $syn2) {
              $query.="|| regex(?skillName$i,\"$syn2\",\"i\")";
            }
          }
      $query.=").";
        $i++;
      }
      $query.="}";
      foreach ($comb as $value1) {
      for ($i=0; $i < sizeof($eduMajor) ; $i++) {
        $major=$eduMajor[$i];
        $degree=$eduDegree[$i];
        $query.="
            union
            {
              ?ann cv:hasTarget ?w . 
              ?w cv:targetCompanyDescription ?company.
              ?ann cv:cvTitle ?id.
              ?ann cv:aboutPerson ?person.
              ?person vcard:locality ?locality.
              FILTER regex(?locality,\"$locality\",\"i\").
              ?ann cv:hasTarget ?target . 
              ?target cv:targetJobDescription ?description.
              FILTER(regex(?description,\"$jobposition\",\"i\")";
        $jobposition_syn2=$this->babelnet->synonymous($jobposition);
        if ($jobposition_syn2!=null) {
          foreach ($jobposition_syn2 as $syn3) {
            $query.="|| regex(?description,\"$syn3\",\"i\")";
          }
        }
        $query.=").
              ?ann cv:hasEducation ?edu.
              ?edu cv:eduMajor ?eduMajor.
              FILTER regex(?eduMajor,\"$major\",\"i\").
              ?edu cv:degreeType \"$degree\".
            ";
        $i=1;
       
          foreach ($value1 as $value2) {
            $query.="?ann cv:hasSkill ?skill$i.
                ?skill cv:skillName ?skillName$i.
                FILTER( regex(?skillName$i,\"$value2\",\"i\")
                ";
            $skill_syn2=$this->babelnet->synonymous($value2);
            if ($skill_syn2!=null) {
              foreach ($skill_syn2 as $syn4) {
                $query.="|| regex(?skillName$i,\"$syn4\",\"i\")";
              }
            }
            $query.=").";
            $i++;
          }
        }
      $query.="}";
      }
      $query.="}";

      /*echo "<pre>";
      echo "$query";*/

      $dataset_path="C:\\tdbAnnouncement";
      $this->load->library('query');
      $this->data['result']=$this->query->querysparql($query,$dataset_path);

      foreach ($this->data['result']['results']['bindings'] as $key => $value){ 
            $id=$value['company']['value'];
            $this->load->model('user_model');
            $en_name=$this->user_model->get_company($id)->en_name;
            $this->data['result']['results']['bindings'][$key]['company']['value']= $en_name;    
        }
      $this->data['pageTitle']='Announcement Search';
      $this->data['subview'] = 'announcement_search';
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

    function seeker_search(){
      $this->load->library('babelnet');
        $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
                PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
                PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
                PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
                PREFIX foaf: <http://xmlns.com/foaf/0.1/>
                prefix xsd: <http://www.w3.org/2001/XMLSchema#>
                select distinct ?company ?id ?description
                where {
                    ?ann cv:cvIsActive \"True\".
                    ?ann cv:cvTitle ?id.
                    ?ann cv:hasTarget ?target. 
                    ?target cv:targetJobDescription ?description.
                    ?target cv:targetCompanyDescription ?company.
                ";  
        $job_title=$this->input->post('job_title');
        if ($job_title!=null) {
            $query.="FILTER (regex(?description,\"$job_title\",\"i\")";
            $job_title_syn=$this->babelnet->synonymous($job_title);
            if ($job_title_syn!=null) {
              foreach ($job_title_syn as $syn) {
                $query.="|| regex(?description,\"$syn\",\"i\")";
              }
            }
            $query.=").";
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

    public function company_search()
    {
      $this->load->library('babelnet');
      $this->load->model('user_model');
    	$query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
        PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
        PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
        PREFIX foaf: <http://xmlns.com/foaf/0.1/>
        prefix xsd: <http://www.w3.org/2001/XMLSchema#>
        select distinct ?id ?FirstName ?LastName ?jobposition ?major ?minor ?degree ?studiedIn ?employedIn ?jobTitle
        where {
            ?resume cv:cvTitle ?id.
            ?resume cv:cvIsActive \"True\".
            ?resume cv:hasEducation ?w .
            ?w cv:eduMajor ?major.
            ?w cv:eduMinor ?minor.
            ?w cv:degreeType ?degree.
            ?w cv:studiedIn ?studiedIn.
            ?resume cv:hasTarget ?target.
            ?target cv:targetJobDescription ?jobposition.
            ?resume cv:aboutPerson ?person.
            ?person foaf:firstName ?FirstName .
            ?person foaf:lastName  ?LastName .
            ?resume cv:hasWorkHistory ?q .
            ?q cv:employedIn ?employedIn.
            ?q cv:jobTitle ?jobTitle.
             ";

        $eduMajor=$this->input->post('cert_name');
        if ($eduMajor!=null) {
            $query.="
            FILTER (regex(?major,\"$eduMajor\",\"i\")).";
        }

        $eduDegree=$this->input->post('degreeType');
        if ($eduDegree!=null) {
            $query.="
            FILTER (regex(?degree,\"$eduDegree\",\"i\")).";
        }
        
        $locality=$this->input->post('locality');
        if ($locality!=null) {
            $query.="  
            ?person vcard:hasAddress ?address.
            ?address vcard:locality ?locality.
            FILTER regex(?locality,\"$locality\",\"i\").";
        } 

        $MaritalStatus=$this->input->post('marital_state');
        if ($MaritalStatus!=null) {
            $query.="
            ?person cv:maritalStatus \"$MaritalStatus\".";
        }

        $jobTitle=$this->input->post('job_Title');

        if ($jobTitle!=null) {
            $query.="
    		    FILTER(regex(?jobposition,\"$jobTitle\",\"i\")";
            $job_title_syn=$this->babelnet->synonymous($jobTitle);
            if ($job_title_syn!=null) {
              foreach ($job_title_syn as $syn) {
                $query.="|| regex(?jobposition,\"$syn\",\"i\")";
              }
            }
            $query.=").";
            $big_five=$this->user_model->get_big_five($jobTitle);
            if ($big_five!=null) {
              $query.="?resume cv:hasOtherInfo ?info1.
              ?info1 cv:otherInfoType \"openness\".
              ?info1 cv:otherInfoDescription ?openness.
              FILTER(xsd:integer(?openness) >= $big_five->Openness).
              ?resume cv:hasOtherInfo ?info2.
              ?info2 cv:otherInfoType \"extraversion\".
              ?info2 cv:otherInfoDescription ?extraversion.
              FILTER(xsd:integer(?extraversion) >= $big_five->Extraversion).
              ?resume cv:hasOtherInfo ?info3.
              ?info3 cv:otherInfoType \"conscientiousness\".
              ?info3 cv:otherInfoDescription ?conscientiousness.
              FILTER(xsd:integer(?conscientiousness) >= $big_five->Conscientiousness).
              ?resume cv:hasOtherInfo ?info4.
              ?info4 cv:otherInfoType \"agreeableness\".
              ?info4 cv:otherInfoDescription ?agreeableness.
              FILTER(xsd:integer(?agreeableness) >= $big_five->Agreeableness).
              ?resume cv:hasOtherInfo ?info5.
              ?info5 cv:otherInfoType \"neuroticism\".
              ?info5 cv:otherInfoDescription ?neuroticism.
              FILTER(xsd:integer(?neuroticism) >= $big_five->Neuroticism).
              ";
            }   
        }

        $query.="}";
        // echo '<pre>';
        // echo "$query";
        $dataset_path="C:\\tdbCV";
        $this->load->library('query');
        $query_result=$this->query->querysparql($query,$dataset_path);
        // echo '<pre>';
        // print_r($query_result);
        $user_result=array();  
        foreach ($query_result['results']['bindings'] as $value) {
	        if (array_key_exists("id",$value)){
            $this->data['id']=$value['id']['value'];
            $this->data['first_name']=$value['FirstName']['value'];
            $this->data['last_name']=$value['LastName']['value'];
            $this->data['jobposition']=$value['jobposition']['value'];
            $eduMajor[]=$value['major']['value'];
            $eduMinor[]=$value['minor']['value'];
            $studiedIn[]=$value['studiedIn']['value'];
            $degreeType[]=$value['degree']['value'];
            $this->data['eduMajor']=$eduMajor;
            $this->data['eduMinor']=$eduMinor;
            $this->data['studiedIn']=$studiedIn;
            $this->data['degreeType']=$degreeType;
            $employedIn[]=$value['employedIn']['value'];
            $jobTitle[]=$value['jobTitle']['value'];
            $this->data['employedIn']=$employedIn;
            $this->data['jobTitle']=$jobTitle;
            $res=$this->user_model->get_user_image($this->data['id']);
            $this->data['image']=$res->Image;
            $user_result[] = $this->data;
          }
        }
        // echo '<pre>';
        // print_r($user_result); 
        $this->data['result']=$user_result;
        $this->data['pageTitle']='Company Home';
        $this->data['subview'] = 'company_home';
        $this->load->view('layouts/layout', $this->data);
    }

    function cv_view()
    {
        $this->data['pageTitle']='Cv View';
        $this->data['subview'] = 'cv-view';
        $this->load->view('layouts/layout', $this->data);
    }

    //to download cv as pdf
    function downloadCV($id)
    {
        $this->seeker_data($id);
        $this->load->library('fpdf_gen');
        $this->load->view('cv',$this->data);
    }

    function rdfStore()
    {
      $query="PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>  
            PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
            PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
            prefix xsd: <http://www.w3.org/2001/XMLSchema#>
            select ?s ?p ?o 
            where {
                ?s ?p ?o.}";
        echo '<pre>';
        echo "$query";
        $dataset_path="C:\\tdbCV";
        $this->load->library('query');
        $this->data['result']=$this->query->querysparql($query,$dataset_path);
        echo '<pre>';
        print_r($this->data['result']);
    }
}