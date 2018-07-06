<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once(base_url().'vendor\SwaggerClient-php\autoload.php');
/*
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://wit.istc.cnr.it/stlab-tools/fred?text=&prefix=&namespace=&wsd=&wfd=&wfdProfile=&tense=&roles=&textannotation=&semanticSubgraph=");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);*/

//require_once(APPPATH.'php-sdk-master\autoload.php');
//require_once(APPPATH. 'fred_api\fred_api.php');
require_once(APPPATH.'vendor\SwaggerClient-php\autoload.php');
//9326cde8-bf61-3360-9019-a800f3f94d20
$api_instance = new Swagger\Client\Api\DefaultApi();
$text = "Miles Davis was an american jazz musician."; // String | The input natural language text.
$prefix = "fred:"; // String | The prefix used for the namespace of terms introduced by FRED in the output. If not specified fred: is used as default.
$namespace = "http://www.ontologydesignpatterns.org/ont/fred/domain.owl#"; // String | The namespace used for the terms introduced by FRED in the output. If not specified http://www.ontologydesignpatterns.org/ont/fred/domain.owl# is used as default.
$wsd = true; // Boolean | Perform Word Sense Disambiguation on input terms. By default it is set to false.
$wfd = true; // Boolean | Perform Word Frame Disambiguation on input terms in order to provide alignments to WordNet synsets, WordNet Super-senses and Dolce classes. By default it is set to false.
$wfdProfile = "Base"; // String | The profile associated with the Word Frame Disambiguation
$tense = true; // Boolean | Include temporal relations between events according to their grammatical tense. By default it is set to false.
$roles = true; // Boolean | Use FrameNet roles into the resulting ontology. By default it is set to false.
$textannotation = "EARMARK"; // String | The vocabulary used for annotating the text in RDF. Two possible alternatives are available, i.e. EARMARK and NIF.
$semanticSubgraph = false; // Boolean | Generate a RDF which only expresses the semantics of a sentence without additional RDF triples, such as those containing text spans, part-of-speeches, etc. By default it is set to false.

try {
    $api_instance->stlabToolsFredGet($text, $prefix, $namespace, $wsd, $wfd, $wfdProfile, $tense, $roles, $textannotation, $semanticSubgraph);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->stlabToolsFredGet: ', $e->getMessage(), PHP_EOL;
}
?>