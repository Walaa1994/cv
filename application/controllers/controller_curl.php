<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_curl extends CI_Controller {
public function __construct() {
parent::__construct();
}
public function index(){

    $ch=curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://wit.istc.cnr.it/stlab-tools/fred?text=Miles%20Davis%20was%20an%20american%20jazz%20musician&wfd_profile=b&textannotation=earmark');

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "accept: application/rdf+xml",
        "Authorization: Bearer 9326cde8-bf61-3360-9019-a800f3f94d20",
        "content-type : application/rdf+xml"
    ));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable

    curl_setopt($ch, CURLOPT_TIMEOUT, 4); // times out after 4s

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    /*curl_setopt($ch, CURLOPT_GETPARMS, array(
        "text: Miles%20Davis%20was%20an%20american%20jazz%20musician",
        "wfd_profile : b",
        "textannotation : earmark"
    ));*/

    $response =curl_exec($ch);

    echo($response);

    //$xmlResponse = new SimpleXMLElement($response);


    //echo $xmlResponse ;

    curl_close($ch);

    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    $txt = "John Doe\n";
    fwrite($myfile, $response);
    fclose($myfile);
    }
    }
?>
