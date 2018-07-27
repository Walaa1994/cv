<?php  
ini_set('max_execution_time', 0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL); ini_set('display_errors', 'On');
class Curl extends CI_Controller {
    public function __construct() {
    parent::__construct();
    }

    public function index(){
      $ch2 = curl_init("https://gateway.watsonplatform.net/personality-insights/api/v3/profile?version=2017-10-13&consumption_preferences=true&raw_scores=true");
      $request_headers = array();
      $request_headers[] = 'Content-Type: text/plain;charset=utf-8';
      $request_headers[] = 'Accept: application/json';
      $request_headers[] = 'Content-Language: ar';
      $request_headers[] = 'Accept-Language: en';

      $simple_data =file_get_contents('posts.txt');
      /*$simple_data="The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.The European languages are members of the same family.";*/
      curl_setopt_array( $ch2, array(
          CURLOPT_POST => true,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_POSTFIELDS => $simple_data,
          CURLOPT_HTTPHEADER => $request_headers,
          CURLOPT_USERPWD => "711b221a-9f3e-46b9-9da0-57833e1435fe:lYSGyfpJPCRp",
          CURLOPT_SSL_VERIFYHOST,0,
          CURLOPT_SSL_VERIFYPEER,1,
      )
      );
      $response2 = curl_exec( $ch2 );
      //var_dump(curl_error($ch2));
      $decoded = json_decode($response2, true);

      /*echo '<pre>' ;
      print_r($decoded);*/

      if(array_key_exists('error', $decoded)){
      if ($decoded['error']!=null) {
          $error_message=$decoded['error'];
          redirect('seeker/ErrorBigFiveAPI/'.$error_message);
      }
    }
    else {
      
        $Openness = round($decoded['personality'][0]['percentile']*100);
        //echo $Openness;
        $Conscientiousness = round($decoded['personality'][1]['percentile']*100);
        //echo $Conscientiousness;
        $Extraversion = round($decoded['personality'][2]['percentile']*100);
        //echo $Extraversion;
        $Agreeableness = round($decoded['personality'][3]['percentile']*100);
        //echo  $Agreeableness;
        $neuroticism = round($decoded['personality'][4]['percentile']*100);
        //echo $neuroticism;

        $id=$this->session->userdata('u_id');
        $this->updatesparql($Openness,$Conscientiousness, $Extraversion,$Agreeableness,$neuroticism,$id);

        if ($decoded['word_count']<600) {
            $warning_message=$decoded['word_count_message'];
            redirect('home/seeker_profile/'.$warning_message);
        }
        else
        redirect('/home/seeker_profile');
    }
    }

    public function updatesparql($one,$two,$three,$four,$five,$id){
      $Dataset_path="C:\\tdbCV";
      $filename="savequery.txt";
      $query="PREFIX cv: <http://rdfs.org/resume-rdf/cv.rdfs#> 
              PREFIX vcard: <http://www.w3.org/2006/vcard/ns#>
              PREFIX foaf: <http://xmlns.com/foaf/0.1/>
              INSERT
              { 
                ?a cv:otherInfoDescription \"$one\".
                ?b cv:otherInfoDescription \"$two\".
                ?c cv:otherInfoDescription \"$three\".
                ?d cv:otherInfoDescription \"$four\".
                ?e cv:otherInfoDescription \"$five\".
              } 
              where {
                ?resume cv:hasOtherInfo ?a.
                ?a cv:otherInfoType \"openness\".
                ?resume cv:hasOtherInfo ?b.
                ?b cv:otherInfoType \"conscientiousness\".
                ?resume cv:hasOtherInfo ?c.
                ?c cv:otherInfoType \"extraversion\".
                ?resume cv:hasOtherInfo ?d.
                ?d cv:otherInfoType \"agreeableness\".
                ?resume cv:hasOtherInfo ?e.
                ?e cv:otherInfoType \"neuroticism\".
                ?resume cv:cvTitle \"$id\".
              }";

      $this->WriteFile($query);
      shell_exec("javac -cp  java_RDFStore\\*; java_RDFStore\\UpdateSparql.java");

      shell_exec("java -cp java_RDFStore\\*;java_RDFStore  UpdateSparql $filename $Dataset_path"); 
    }

    public function WriteFile($txt){
      $myfile = fopen("savequery.txt", "w") or die("Unable to open file!");
      fwrite($myfile, $txt);
      fclose($myfile);
    }
}
?>
