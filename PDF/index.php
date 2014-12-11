<?php
require('fpdf.php');

class PDF extends FPDF
{
function Header()
{
    // Logo
    $this->Image('logo.png',62,-2,90);

    // Rectangle
    $this->SetFillColor(91,91,91);
    $this->Rect(62,28,90,22, 'DF');

    // Texte
    $this->SetTextColor(255,255,255);
    $this->SetFont('helvetica','B',20);
    $this->Text(70,36,utf8_decode("Congrès Annuel SFP :"));
    $this->Text(90,47,utf8_decode("Août 2016"));

}


function CorpsChapitre()
{
	
	
}


function Footer()
{
	// Ligne
    $this->Line(0,266,210,266,'F',false);
    // Informations
    $this->SetFont('Arial','',12);
	$this->MultiCell(0,523,utf8_decode('Société Française de Physique'), 0, 'C');
	$this->MultiCell(0,-513,'33 Rue de Croulebarbe, 75013 Paris', 0, 'C');
	$this->MultiCell(0,523,'http://www.sfpnet.fr/', 0, 'C');
	$this->MultiCell(0,-513,'contact@sfp-aquitaine.fr', 0, 'C');
	$this->MultiCell(0,523,'05 45 78 65 21', 0, 'C');

}



}

$pdf = new PDF();
$pdf->SetTextColor(91,91,91);
$pdf->SetDrawColor(91,91,91);
$titre = 'SeminairesHebdo';
$pdf->SetTitle($titre);
$pdf->SetAuthor('MMI_Students');
$pdf->Output();
?>