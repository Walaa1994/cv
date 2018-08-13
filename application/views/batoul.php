<?php

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 061');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    h1 {
  margin: 0;
  padding: 0;
  outline: 0;
  font-weight: inherit;
  font-style: inherit;
  font-size: 100%;
  font-family: inherit;
  vertical-align: baseline;
width: 100px;
font-size: 24pt;
color: #1b4491;
margin-bottom: 0
text-align: center;

    }

    h1 span{

  font-size: 21px;
display: block;
color: #1b4491;
margin-top: -5px
    }

    h2{

width: 180px;
height: 23px;
text-align: left;
float: left;
padding: 0;
margin: 0;
clear: both;
font-size: 22px;
color: #1b4491;
margin-bottom: -12px;
    }

    .entry {
  width:720px;
  display: block;
  padding-top:55px;
  clear: both;
  margin-right:4px;
}
h3 {
width: 180px;
text-align: left;
float: left;
padding: 0;
clear: both;
font-size: 13pt;
color: black;
}
p {
width: 600px;
margin-right: 40px;
float: right;
}
em {
font-family: Georgia, "Times New Roman", serif;
font-style: italic;
color: #777777;
font-size: 12px;
display: block;
padding-top: 3px;
}

div.content {
  clear: both;
  padding:0;
  margin:0;
  overflow: hidden;
  display:block;
  padding-top:32px;
}
    .self {
width: 500px;
float: left;
padding-top: 11px;
margin-left: 0;
margin-bottom: 15px;
margin-left: 38px;
}
self ul li {
background-repeat: no-repeat;
padding-left: 26px;
background-position: 0 .1em;
height: 25px;
display: block;
margin-top: -2px;
}

    li{

 background-repeat: no-repeat;
padding-left: 0;
background-position: 0 .1em;
height: 25px;
display: block;
margin-top: -2px;
    }
ul.info li {
margin: 0;
padding: 0;
float: left;
display: block;
width: 600px;
padding-left: 0;
background-position: 0 .5em;
margin-top: 12px;
list-style-type: square;
}
ul.info li {
margin: 0;
padding: 0;
float: left;
display: block;
width: 500px;
background-image: url(../images/bullet.gif);
background-repeat: no-repeat;
padding-left: 10px;
background-position: 0 .5em;
margin-top: 12px;
}
ul.info {
list-style: square;
}
ul.info {
list-style-type: none;
}
    
table {
font-family: arial, sans-serif;
border-collapse: collapse;
  width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>
EOF;
//personal info
/*$html = '<div class="self">';
$html = '<h1 class="title">'.$first_name.' '.$last_name.'<br /><i style="color:#990000"></i>';
$html = '<span>'.$eduMajor.'</span></h1>';
//$html ='</h1>';
$html = '<h2 class="title">personal information<i style="color:#990000"></i></h2>';
$html = '<h4><em> First Name</em> : '.$first_name.' - <em>Last Name</em> : '.$last_name.'</h4>';
$html = '<h4><em> Date of Birth</em> : '.$birthday.' - <em>Nationality</em> : '.$Nationality.'</h4>';
$html = '<h4><em>Marital State</em> : '.$MaritalStatus.' - <em> Gender</em> : '.$gender.'</h4>';
$html = '<h4> <em>Country</em> : '.$Country.' - <em>City</em> : '.$City.' - <em>Address</em> : '.$Street.' </h4>';
$html = '<h4><em> Email</em> : '.$Email.' -  <em>Phone Number</em> : '.$Phone.' </h4>';
$html .= '</div>';

//Education
$html = '<div class="entry">';
$html = '<h2>EDUCATION</h2>';
$html = '<div class="content">';

*/
//Languages
$html = '<h2 class="title">Languages<i style="color:#990000"></i></h2>';
$html = '<table>';
$html .= '<tr>
            <th>Language Name</th>
            <th>SpokenLevel</th>
            <th>ReadingLevel</th>
            <th>WritingLevel</th>
        </tr>';

foreach($langName as $key => $value) {
    $html .='<tr>
    <th>'.$value.'</th>
    <th>'.$langspeaking[$key].'</th>
    <th>'.$langReading[$key].'</th>
    <th>'.$langwriting[$key].'</th>
    </tr>';
}
$html .= '</table >';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+