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

<div class="self">
<h1 class="title">Batoul ALsharef <br /><i style="color:#990000"></i>
<span>Interactive Designer</span></h1>
<h2 class="title">personal information<i style="color:#990000"></i></h2>
<h4><em> First Name</em> : Batoul - <em>Last Name</em> : Alsharef</h4>
<h4><em> Date of Birth</em> : 9/4/2017 - <em>Nationality</em> : syrian</h4>
<h4><em>Marital State</em> : single - <em> Gender</em> : male</h4>
<h4> <em>Country</em> : syria - <em>City</em> : damas - <em>Address</em> : sahnaya </h4>
<h4><em> Email</em> : batoul@gmail.com -  <em>Phone Number</em> : 0987765544 </h4>
</div>

<div class="entry">
<h2>EDUCATION</h2>
<div class="content">
  <h3>Sep 2005 - Feb 2007</h3>
  <p>Academy of Art University, London <br />
    <em>Master in Communication Design</em></p>
</div>
</div>

<div class="entry">
<h2>Work Experience</h2>
<div class="content">
  <h3>Sep 2005 - Feb 2007</h3>
  <p>company Name, job position, jop type <br />
    <em>career level</em></p>
</div>
</div>

<div class="entry">
<h2>Personal Skills</h2>
<div class="content">
  <h3>Skill Name</h3>
  <p>Years of experience <br />
    <em>Skill Level</em></p>
</div>
</div>

<h2 class="title">Languages<i style="color:#990000"></i></h2>
<table>
  <tr>
    <th>Language Name</th>
    <th>SpokenLevel</th>
    <th>ReadingLevel</th>
    <th>WritingLevel</th>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
<h2 class="title">References and Referees<i style="color:#990000"></i></h2>
<ul>
<p class="ad">Name:</p>
<p class="mail">Phone Number:</p>
<p class="tel">Email:</p>
<p class="tel">Job Postion:</p>
</ul>

EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

/*// add a page
$pdf->AddPage();

$html = '
<h1>HTML TIPS & TRICKS</h1>

<h3>REMOVE CELL PADDING</h3>
<pre>$pdf->SetCellPadding(0);</pre>
This is used to remove any additional vertical space inside a single cell of text.

<h3>REMOVE TAG TOP AND BOTTOM MARGINS</h3>
<pre>$tagvs = array(\'p\' => array(0 => array(\'h\' => 0, \'n\' => 0), 1 => array(\'h\' => 0, \'n\' => 0)));
$pdf->setHtmlVSpace($tagvs);</pre>
Since the CSS margin command is not yet implemented on TCPDF, you need to set the spacing of block tags using the following method.

<h3>SET LINE HEIGHT</h3>
<pre>$pdf->setCellHeightRatio(1.25);</pre>
You can use the following method to fine tune the line height (the number is a percentage relative to font height).

<h3>CHANGE THE PIXEL CONVERSION RATIO</h3>
<pre>$pdf->setImageScale(0.47);</pre>
This is used to adjust the conversion ratio between pixels and document units. Increase the value to get smaller objects.<br />
Since you are using pixel unit, this method is important to set theright zoom factor.<br /><br />
Suppose that you want to print a web page larger 1024 pixels to fill all the available page width.<br />
An A4 page is larger 210mm equivalent to 8.268 inches, if you subtract 13mm (0.512") of margins for each side, the remaining space is 184mm (7.244 inches).<br />
The default resolution for a PDF document is 300 DPI (dots per inch), so you have 7.244 * 300 = 2173.2 dots (this is the maximum number of points you can print at 300 DPI for the given width).<br />
The conversion ratio is approximatively 1024 / 2173.2 = 0.47 px/dots<br />
If the web page is larger 1280 pixels, on the same A4 page the conversion ratio to use is 1280 / 2173.2 = 0.59 pixels/dots';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
*/
// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+