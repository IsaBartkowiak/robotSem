<?php

require('fpdf.php');

class PDF extends FPDF
{
function Header()
{

//////////HEADER/////////////
    // Logo
    $this->Image('logo.png',62,-6,90);



//////////CORPS CHAPITRE/////


$pdo = new PDO('mysql:host=localhost;dbname=seminaires', 'root', 'root');
    $pdo->query("SET NAMES 'utf8'");
    $select = $pdo->query("SELECT * FROM seminaire");


$y_default = 30;
$x_default = 51;

$x_jour = 33;
$y_jour = 35;
$x_mois = 32;
$y_mois = 40;
$y_orateur = 35;
$y_lieu = 40;
$y_labo = 45;
$y_lien = 44;

$x1_carre = 28;
$x2_carre = 27;
$largeur_carre = 17;
$hauteur_carre = 17;

while( $ligne = $select->fetch(PDO::FETCH_OBJ) ){

			//CARRE
			$this->SetFillColor(91,91,91);
    		$this->Rect($x1_carre,$x2_carre,$largeur_carre,$hauteur_carre, 'F');
    		//DECALAGE CARRE
    		$x2_carre = $x2_carre + 25;

    		//JOUR DATE
			$this->SetFont('Arial', 'B', 18);
			$this->SetTextColor(251,251,251);
			$this->Text($x_jour,$y_jour,(date("d", strtotime($ligne->date))));

			//MOIS DATE
			$this->SetFont('Arial', 'B', 12);
			$this->SetTextColor(251,251,251);
			setlocale(LC_TIME, 'fra_fra');
			$this->Text($x_mois,$y_mois,ucfirst(strftime('%b',strtotime($ligne->date))));

			//INFORMTIONS
			$this->SetFont('Arial', '', 11);
			$this->SetTextColor(91,91,91);
			$this->Text($x_default,$y_default,$ligne->titre);
			$this->Text($x_default,$y_orateur,$ligne->orateur);
			$this->Text($x_default,$y_lieu,$ligne->lieu);
			$this->SetFont('Arial', 'I', 9);
			$this->Text($x_default,$y_lien,$ligne->lien);

			$y_default = $y_default + 25;
			$y_orateur = $y_orateur + 25;
			$y_jour = $y_jour + 25;
			$y_mois = $y_mois + 25;
			$y_lieu = $y_lieu + 25;
			$y_labo = $y_lieu + 25;
			$y_lien = $y_lien + 25;

}





    // Ligne
    $this->Line(45,186,165,186,'F',false);
    // Texte
    $this->SetFont('Arial','',14);
    $this->SetTextColor(91,91,91);
    $this->Text(96,194,utf8_decode("DIVERS"));




//////////FOOTER////////////
	// Rectangle
    $this->SetFillColor(91,91,91);
    $this->Rect(65,245,80,16, 'DF');

    // Texte
    $this->SetTextColor(255,255,255);
    $this->SetFont('helvetica','B',16);
    $this->Text(76,251,utf8_decode("Congrès Annuel SFP :"));
    $this->Text(92,259,utf8_decode("Août 2016"));

	// Ligne
    $this->Line(0,266,210,266,'F',false);
    // Informations
    $this->SetTextColor(91,91,91);
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