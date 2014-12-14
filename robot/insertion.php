<meta charset="UTF-8"/>

<?php 


include('RobotSeminaire.php');
include('Database.php');
// récupère le dom de l'url 
include('simple_html_dom.php');
$dataLof= file_get_html('http://www.lof.cnrs.fr/spip.php?rubrique84');
$dataCenbg = file_get_html('http://www.cenbg.in2p3.fr/-Annee-2014-');
$dataCrpp = file_get_html('http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite');

// INIT 
$extraction = new RobotSeminaire();
$database = new Database();

// RECUPERATION DES DONNEES
$seminairesLof = $extraction->setSemLof($dataLof);
$seminairesCenbg = $extraction->setSemCenbg($dataCenbg);
$seminairesCrpp = $extraction->setSemCrpp($dataCrpp);

//print_r($seminairesLof);
//print_r($seminairesCrpp);

//INSERTION DANS BD
$database->insertSeminaire($seminairesLof);
$database->insertSeminaire($seminairesCenbg);
$database->insertSeminaire($seminairesCrpp);




$dataLof->clear();
unset($dataLof);

$dataCenbg->clear();
unset($dataCenbg);
?>