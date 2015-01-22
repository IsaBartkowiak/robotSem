<?php

require('fpdf.php');

class PDF extends FPDF
{
function Header()
{

//////////HEADER/////////////
    // Logo
    $this->Image('logo.png',75,5,60);



//////////CORPS CHAPITRE/////


$pdo = new PDO('mysql:host=localhost;dbname=seminaires', 'root', 'root');
    $pdo->query("SET NAMES 'utf8'");
    $select = $pdo->query("SELECT * FROM seminaire WHERE date > current_date ORDER BY date ASC LIMIT 0,6;");


$y_default = 30;
$x_default = 51;


$y = 26;

$x_jour = 33;
$y_jour = 35;
$x_mois = 32;
$y_mois = 41;
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
    		$x2_carre = $x2_carre + 28;

    		//JOUR DATE
			$this->SetFont('Arial', 'B', 18);
			$this->SetTextColor(251,251,251);
			$this->Text($x_jour,$y_jour,(date("d", strtotime($ligne->date))));

			//MOIS DATE
			$this->SetFont('Arial', 'B', 12);
			$this->SetTextColor(251,251,251);
			setlocale(LC_TIME, 'fra_fra');
			$this->Text($x_mois,$y_mois,ucfirst(strftime('%b',strtotime($ligne->date))));

			//INFORMATIONS
			$this->SetFont('Arial', '', 11);
			$this->SetTextColor(91,91,91);
			$this->SetXY(50,$y);
			$this->MultiCell(0, 5, ltrim(utf8_decode(html_entity_decode($ligne->titre))), 0, "L", 0);
			$this->MultiCell(0, 5, ltrim(utf8_decode(html_entity_decode($ligne->orateur))), 0, "L", 0);
			$this->MultiCell(0, 5, ltrim(utf8_decode(html_entity_decode($ligne->lieu))), 0, "L", 0);
			$this->SetFont('Arial', 'I', 9);
			$this->MultiCell(0, 5, utf8_decode($ligne->lien), 0, "L", 0);

			$y_default = $y_default + 28;
			$y_orateur = $y_orateur + 28;
			$y_jour = $y_jour + 28;
			$y_mois = $y_mois + 28;
			$y_lieu = $y_lieu + 28;
			$y_labo = $y_lieu + 28;
			$y_lien = $y_lien + 28;
			$y = $y + 28;
			
			}



		

    // Ligne
    $this->Line(45,200,165,200,'F',false);
    // Texte
    $this->SetFont('Arial','',14);
    $this->SetTextColor(91,91,91);
    $this->Text(96,198,utf8_decode("DIVERS"));




//////////FOOTER////////////
	// Rectangle
    $this->SetFillColor(53,194,148);
    $this->Rect(65,245,80,16, 'F');

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
    $this->SetXY(23,269);
	$this->MultiCell(0,5,utf8_decode("Société Française de Physique \n 33 Rue de Croulebarbe, 75013 Paris \n http://www.sfpnet.fr/ \n contact@sfp-aquitaine.fr \n 05 45 78 65 21"), 0, 'C');

}



}

$pdf = new PDF();
$pdf->SetTextColor(91,91,91);
$pdf->SetDrawColor(91,91,91);
$pdf->SetMargins(50,0,20);
$titre = 'SeminairesHebdo';
$pdf->SetTitle($titre);
$pdf->SetAuthor('MMI_Students');
$pdf->Output();
?>