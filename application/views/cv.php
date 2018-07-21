<?php

class myPDF extends FPDF{

	function cvPersonalInfo($birthday,$Nationality,$MaritalStatus,$gender,$Phone,$Email,$Country,$City,$Street){

		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Personal Information',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(40,10,'Birthday:',0,0,'L');
		$this->Cell(40,10,$birthday,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Nationality :',0,0,'L');
		$this->Cell(40,10,$Nationality,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Marital Status :',0,0,'L');
		$this->Cell(40,10,$MaritalStatus,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Gender :',0,0,'L');
		$this->Cell(40,10,$gender,0,1,'L');
		//$this->Ln();	
		$this->Cell(40,10,'Telephone:',0,0,'L');
		$this->Cell(40,10,$Phone,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Email:',0,0,'L');
		$this->Cell(40,10,$Email,0,1,'L');
		
		$this->Cell(40,10,'Country :',0,0,'L');
		$this->Cell(40,10,$Country,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'City :',0,0,'L');
		$this->Cell(40,10,$City,0,1,'L');
		//$this->Ln();
		$this->Cell(40,10,'Street :',0,0,'L');
		$this->Cell(40,10,$Street,0,1,'L');
		$this->Ln();
	}

	function cvEDU($eduMajor,$eduMinor,$eduStartDate,$eduGradDate,$studiedIn,$degreeType){
	
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Education',0,0,'C');
		$this->Ln();

		foreach($eduMajor as $key => $value)
		{
		    $this->SetFont('Times','',16);
			$this->SetTextColor(0,0,0);
			$this->Cell(50,10,'Certificate :',0,0,'L');
			$this->Cell(10,10,$value,0,1,'L');
			$this->Cell(50,10,'Specialization :',0,0,'L');
			$this->Cell(10,10,$eduMinor[$key],0,1,'L');
			$this->Cell(50,10,'Education start date :',0,0,'L');
			$this->Cell(10,10,$eduStartDate[$key],0,1,'L');
			$this->Cell(50,10,'Graduation date :',0,0,'L');
			$this->Cell(40,10,$eduGradDate[$key],0,1,'L');
			$this->Cell(50,10,'University :',0,0,'L');
			$this->Cell(10,10,$studiedIn[$key],0,1,'L');
			$this->Cell(50,10,'Degree :',0,0,'L');
			$this->Cell(10,10,$degreeType[$key],0,1,'L');
			$this->Ln();
			$this->Ln();
		}	
	}

	function cvWork($employedIn,$jobTitle,$startDate,$endDate,$careerLevel,$jobType){
	
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Work Experience',0,0,'C');
		$this->Ln();

		foreach($employedIn as $key => $value)
		{
		    $this->SetFont('Times','',16);
			$this->SetTextColor(0,0,0);
			$this->Cell(40,10,'Company :',0,0,'L');
			$this->Cell(30,10,$value,0,0,'L');
			$this->Ln();
			$this->Cell(40,10,'job Title :',0,0,'L');	
			$this->Cell(30,10,$jobTitle[$key],0,0,'L');
			$this->Ln();
			$this->Cell(40,10,'Start Date :',0,0,'L');
			$this->Cell(30,10,$startDate[$key],0,0,'L');
			$this->Ln();
			$this->Cell(40,10,'End Date :',0,0,'L');
			$this->Cell(30,10,$startDate[$key],0,0,'L');
			$this->Ln();
			$this->Cell(40,10,'Career Level :',0,0,'L');
			$this->Cell(30,10,$careerLevel[$key],0,0,'L');
			$this->Ln();
			$this->Cell(40,10,'Job Type :',0,0,'L');	
			$this->Cell(30,10,$jobType[$key],0,0,'L');
			$this->Ln();
			$this->Ln();	    
		}
	}
	
	function cvSkills($skillName,$skillYearsExperience,$skillLevel){
		
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Skills',0,0,'C');
		$this->Ln();

		foreach($skillName as $key => $value)
		{
		    //$this->fpdf->initialize('P','mm','A4');
		    $this->SetFont('Times','',16);
			$this->SetTextColor(0,0,0);
			$this->Cell(50,10,'Skill Name :',0,0,'L');	
			$this->Cell(30,10,$value,0,0,'L');
			$this->Ln();
			$this->Cell(50,10,'Years Experience :',0,0,'L');	
			$this->Cell(10,10,$skillYearsExperience[$key],0,0,'L');
			$this->Ln();
			$this->Cell(50,10,'Level :',0,0,'L');	
			$this->Cell(10,10,$skillLevel[$key],0,0,'L');
			$this->Ln();
			$this->Ln();		    
		}
	}

	//not work yet by rola
	/*function cvLanguage($Name,$SpokenLevel,$ReadingLevel,$WritingLevel){
	
		$this->SetFont('Courier','',22);
		$this->SetTextColor(10,28,99);
		$this->Cell(276,25,'Language',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',16);
		$this->SetTextColor(0,0,0);
		$this->Cell(20,10,'Name :',0,0,'L');	
		$this->Cell(10,10,$Name,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Spoken Level :',0,0,'L');	
		$this->Cell(10,10,$SpokenLevel,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Reading Level :',0,0,'L');	
		$this->Cell(10,10,$ReadingLevel,0,0,'L');
		$this->Ln();
		$this->Cell(40,10,'Writing Level :',0,0,'L');	
		$this->Cell(10,10,$WritingLevel,0,0,'L');
		$this->Ln();
	}

	//not work yet by rola
	function cvReference(){
	
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
	}*/

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

//$first_name='enas';
/*echo $birthday;
*/
$pdf->SetFont('Times','B',28);
$pdf->SetTextColor(10,28,99);
$pdf->Cell(276,5,$first_name.' '.$last_name,0,0,'C');
$pdf->Ln(10);

$pdf->cvPersonalInfo($birthday,$Nationality,$MaritalStatus,$gender,$Phone,$Email,$Country,$City,$Street);
$pdf->cvEDU($eduMajor,$eduMinor,$eduStartDate,$eduGradDate,$studiedIn,$degreeType);
$pdf->cvWork($employedIn,$jobTitle,$startDate,$endDate,$careerLevel,$jobType);
$pdf->cvSkills($skillName,$skillYearsExperience,$skillLevel);
//$pdf->cvLanguage($Name,$SpokenLevel,$ReadingLevel,$WritingLevel);
//$pdf->cvReference();
$pdf->Output();

?>