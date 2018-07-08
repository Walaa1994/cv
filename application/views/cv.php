<?php

class myPDF extends FPDF{
	
	/*function header(){
		//Get data from xml file
		$xml=simplexml_load_file("cvform.xml") or die("Error: Cannot create object");
		$this->SetFont('Arial','B',28);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,5,$xml->PersonalInfo->firstName.$xml->PersonalInfo->lastName,0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(100,20,$xml->PersonalInfo->locality,0,0,'C');
		$this->Cell(70,20,$xml->PersonalInfo->Telephone,0,0,'C');
		$this->Cell(80,20,$xml->PersonalInfo->Email,0,0,'C');
		$this->Ln(20);
	}*/

	//put $cvPath as a parameter 
	function cvPersonalInfo(){
		//Get data from xml file
		//$xml=simplexml_load_file($cvPath) or die("Error: Cannot create object");
		$xml=simplexml_load_file("cvform.xml") or die("Error: Cannot create object");
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Personal Information',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(40,10,'Birthday :',0,0,'L');
		$this->Cell(40,10,$xml->PersonalInfo->birthday,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Nationality :',0,0,'L');
		$this->Cell(40,10,$xml->PersonalInfo->Nationality,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Marital Status :',0,0,'L');
		$this->Cell(40,10,$xml->PersonalInfo->MaritalStatus,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Gender :',0,0,'L');
		$this->Cell(40,10,$xml->PersonalInfo->gender,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'locality :',0,0,'L');
		$this->Cell(40,10,$xml->PersonalInfo->locality,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Address:',0,0,'L');
		$this->Cell(40,10,$xml->PersonalInfo->street_address,0,1,'L');
		//$this->Ln();	
		$this->Cell(40,10,'Telephone:',0,0,'L');
		$this->Cell(40,10,$xml->PersonalInfo->Telephone,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Email:',0,0,'L');
		$this->Cell(40,10,$xml->PersonalInfo->Email,0,1,'L');
		$this->Ln();
	}

	function cvEDU(){
		//Get data from xml file
		$xml=simplexml_load_file("cvform.xml") or die("Error: Cannot create object");
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Education',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(50,10,'Certificate :',0,0,'L');
		$this->Cell(10,10,$xml->Education->eduMajor,0,1,'L');
		//$this->Ln();
		$this->Cell(50,10,'Specialization :',0,0,'L');
		$this->Cell(10,10,$xml->Education->eduMinor,0,1,'L');
		//$this->Ln();
		$this->Cell(50,10,'Education start date :',0,0,'L');
		$this->Cell(10,10,$xml->Education->eduStartDate,0,1,'L');
		//$this->Ln();
		$this->Cell(50,10,'Graduation date :',0,0,'L');
		$this->Cell(40,10,$xml->Education->eduGradDate,0,1,'L');
		//$this->Ln();
		$this->Cell(50,10,'University :',0,0,'L');
		$this->Cell(10,10,$xml->Education->studiedIn,0,1,'L');
		//$this->Ln();
		$this->Cell(50,10,'Degree :',0,0,'L');
		$this->Cell(10,10,$xml->Education->degreeType,0,1,'L');
		$this->Ln();	
	}

	function cvWork(){
		//Get data from xml file
		$xml=simplexml_load_file("cvform.xml") or die("Error: Cannot create object");
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Work Experience',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(40,10,'Company :',0,0,'L');	
		$this->Cell(30,10,$xml->WorkExperience->employedIn,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'job Position :',0,0,'L');	
		$this->Cell(30,10,$xml->WorkExperience->jobTitle,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Start Date :',0,0,'L');	
		$this->Cell(30,10,$xml->WorkExperience->startDate,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'End Date :',0,0,'L');	
		$this->Cell(30,10,$xml->WorkExperience->endDate,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Career Level:',0,0,'L');	
		$this->Cell(30,10,$xml->WorkExperience->careerLevel,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Job Type :',0,0,'L');	
		$this->Cell(30,10,$xml->WorkExperience->jobType,0,0,'L');
		$this->Ln();
		/*$this->Cell(40,10,'Current :',0,0,'C');	
		$this->Cell(10,10,$xml->WorkExperience->isCurrent,0,0,'C');
		$this->Ln();*/
	}
	
	function cvSkills(){
		//Get data from xml file
		$xml=simplexml_load_file("cvform.xml") or die("Error: Cannot create object");
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Skills',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(50,10,'Skill Name :',0,0,'L');	
		$this->Cell(30,10,$xml->PersonalSkills->skillName,0,0,'L');
		$this->Ln();
		$this->Cell(50,10,'Years Experience :',0,0,'L');	
		$this->Cell(10,10,$xml->PersonalSkills->skillYearsExperience,0,0,'L');
		$this->Ln();
		$this->Cell(50,10,'Level :',0,0,'L');	
		$this->Cell(10,10,$xml->PersonalSkills->skillLevel,0,0,'L');
		$this->Ln();
	}

	function cvLanguage(){
		//Get data from xml file
		$xml=simplexml_load_file("cvform.xml") or die("Error: Cannot create object");
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Language',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(20,10,'Name :',0,0,'L');	
		$this->Cell(10,10,$xml->Language->Name,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Spoken Level :',0,0,'L');	
		$this->Cell(10,10,$xml->Language->SpokenLevel,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Reading Level :',0,0,'L');	
		$this->Cell(10,10,$xml->Language->ReadingLevel,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Writing Level :',0,0,'L');	
		$this->Cell(10,10,$xml->Language->WritingLevel,0,0,'L');
		$this->Ln();
	}

	function cvReference(){
		//Get data from xml file
		$xml=simplexml_load_file("cvform.xml") or die("Error: Cannot create object");
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Reference',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(20,10,'Name :',0,0,'L');	
		$this->Cell(10,10,$xml->References->Name,0,0,'L');
		$this->Ln();
		$this->Cell(20,10,'Phone :',0,0,'L');	
		$this->Cell(10,10,$xml->References->Phone,0,0,'L');
		$this->Ln();
		$this->Cell(20,10,'Email :',0,0,'L');	
		$this->Cell(10,10,$xml->References->Email,0,0,'L');
		$this->Ln();
	}

	// Page footer
	function Footer(){
		$this->SetY(-15 );
		$this->SetFont( "Arial", "I", 12 );
		$this->Cell( 0, 10, "Page " . $this->PageNo() . "/{nb}", 0, 0, "C" );
	}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
//header cv
$xml=simplexml_load_file("cvform.xml") or die("Error: Cannot create object");
	$pdf->SetFont('Times','B',28);
	$pdf->SetTextColor(10,28,99);
	$pdf->Cell(276,5,$xml->PersonalInfo->firstName.$xml->PersonalInfo->lastName,0,0,'C');
	$pdf->Ln(10);
$pdf->cvPersonalInfo();
$pdf->cvEDU();
$pdf->cvWork();
$pdf->cvSkills();
$pdf->cvLanguage();
$pdf->cvReference();
$pdf->Output();

?>