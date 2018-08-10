<?php

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('STAR SOFT');
$pdf->SetTitle('Star Soft CV');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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

// IMPORTANT: disable font subsetting to allow users editing the document
$pdf->setFontSubsetting(false);

// set font
$pdf->SetFont('helvetica', '', 10, '', false);

// add a page
$pdf->AddPage();

// set default form properties
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));

$pdf->SetFont('Times', 'BI', 18);
$pdf->SetTextColor(77,77,77);
$pdf->Cell(0, 5, $first_name.' '.$last_name, 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(0,0,0);
//personal info
$pdf->Cell(35, 5, 'Birthday');
$pdf->Cell(35, 5, $birthday);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Nationality');
$pdf->Cell(35, 5, $Nationality);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Marital Status');
$pdf->Cell(35, 5, $MaritalStatus);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Gender');
$pdf->Cell(35, 5, $gender);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Telephone');
$pdf->Cell(35, 5, $Phone);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Email');
$pdf->Cell(35, 5, $Email);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Country');
$pdf->Cell(35, 5, $Country);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'City');
$pdf->Cell(35, 5, $City);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Street');
$pdf->Cell(35, 5, $Street);
$pdf->Ln(6);

//Education
$pdf->SetFont('Times', 'BI', 16);
$pdf->Cell(0,5,'Education',0,0,'C');
$pdf->Ln();
    foreach($eduMajor as $key => $value)
        {
            $pdf->SetFont('helvetica','',12);
            //$pdf->SetTextColor(0,0,0);
            $pdf->Cell(35,5,'Certificate ',0,0,'L');
            $pdf->Cell(35,5,$value,0,1,'L');
            $pdf->Cell(35,5,'Specialization ',0,0,'L');
            $pdf->Cell(35,5,$eduMinor[$key],0,1,'L');
            $pdf->Cell(35,5,'start date ',0,0,'L');
            $pdf->Cell(35,5,$eduStartDate[$key],0,1,'L');
            $pdf->Cell(35,5,'Graduation date ',0,0,'L');
            $pdf->Cell(35,5,$eduGradDate[$key],0,1,'L');
            $pdf->Cell(35,5,'University ',0,0,'L');
            $pdf->Cell(35,5,$studiedIn[$key],0,1,'L');
            $pdf->Cell(35,5,'Degree ',0,0,'L');
            $pdf->Cell(35,5,$degreeType[$key],0,1,'L');
            $pdf->Ln();
            $pdf->Ln();
        }

//work experience
$pdf->SetFont('Times', 'BI', 16);
$pdf->Cell(0,5,'Work Experience',0,0,'C');
$pdf->Ln();
    foreach($employedIn as $key => $value)
        {
            $pdf->SetFont('helvetica','',12);
            $pdf->Cell(35,5,'Company ',0,0,'L');
            $pdf->Cell(35,5,$value,0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'job Title ',0,0,'L');   
            $pdf->Cell(35,5,$jobTitle[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'Start Date ',0,0,'L');
            $pdf->Cell(35,5,$startDate[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'End Date ',0,0,'L');
            $pdf->Cell(35,5,$startDate[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'Career Level ',0,0,'L');
            $pdf->Cell(35,5,$careerLevel[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'Job Type ',0,0,'L');    
            $pdf->Cell(35,5,$jobType[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();        
        }    

//skills
$pdf->SetFont('Times', 'BI', 16);
$pdf->Cell(0,5,'Skills',0,0,'C');
$pdf->Ln();
    foreach($skillName as $key => $value)
        {
            $pdf->SetFont('helvetica','',12);
            $pdf->Cell(35,5,'Skill Name ',0,0,'L');  
            $pdf->Cell(35,5,$value,0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'Years Experience ',0,0,'L');    
            $pdf->Cell(35,5,$skillYearsExperience[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'Level ',0,0,'L');   
            $pdf->Cell(35,5,$skillLevel[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();            
        }    
//Language
$pdf->SetFont('Times', 'BI', 16);
$pdf->Cell(0,5,'Language',0,0,'C');
$pdf->Ln();
    foreach($langName as $key => $value)
        {
            $pdf->SetFont('helvetica','',12);
            $pdf->Cell(35,5,'Name ',0,0,'L');    
            $pdf->Cell(35,5,$value,0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'Spoken Level ',0,0,'L');    
            $pdf->Cell(35,5,$langspeaking[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'Reading Level ',0,0,'L');   
            $pdf->Cell(35,5,$langReading[$key],0,0,'L');
            $pdf->Ln();
            $pdf->Cell(35,5,'Writing Level ',0,0,'L');   
            $pdf->Cell(35,5,$langwriting[$key],0,0,'L');
            $pdf->Ln();
        }

//Reference
$pdf->SetFont('Times', 'BI', 16);
$pdf->Cell(0,5,'Reference',0,0,'C');
$pdf->Ln();
$pdf->SetFont('helvetica','',12);
$pdf->Cell(35, 5, 'Name');
$pdf->Cell(35, 5, $name);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Phone');
$pdf->Cell(35, 5, $Phone);
$pdf->Ln(6);
$pdf->Cell(35, 5, 'Email');
$pdf->Cell(35, 5, $mbox);
$pdf->Ln(6);

//Close and output PDF document
$pdf->Output('CV.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+