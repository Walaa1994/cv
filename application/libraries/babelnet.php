<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Babelnet {
	  public function synonymous($term)
  {
    //هون بتحطي الكلمة يلي بدك تبحي عنا وبس لا تعدل بالباقي أبداً 
    $word = $term;
    ///////////////////////////////////////////
    $lang = 'EN';
    $key  = '94d3182e-8362-4e47-bfd3-20e1511b0a9c';

    $service_url = "https://babelnet.io/v4/getSenses?word={$word}&lang={$lang}&key={$key}";
    $service_url = preg_replace("/ /", "%20", $service_url);


    $json = file_get_contents($service_url);

    //var_dump(json_decode($json)); //return_object

    $result = json_decode($json, true); //make it return an array:


    $length =  count($result);

    $arr_word = array();

    for ($i=0; $i <sizeof($result); $i++) { 
      if ($result[$i]['lemma']!=$word)
      {
        array_push($arr_word,$result[$i]['lemma']);
        //echo $result[$i]['lemma']."<br>"; // Fetches the first ID
      }
    }
    // return $arr_word;
    if ($arr_word!= null) {
      foreach ($arr_word as  $key=>$value) {
       if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)){
          $string = preg_replace('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', " ", $value);
          $res[] = str_replace(" +", "_", $string);}
        }
      $arr_word = array_intersect_key($res, array_unique(array_map('strtolower', $res))); 
       /* echo "<pre>"; 
        print_r($result);*/
    }
     return $arr_word;
    /*echo "<pre>"; 
    print_r($arr_word);   */
  }
}