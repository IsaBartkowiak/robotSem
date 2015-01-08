<meta charset="UTF-8"/>

<?php 


include('RobotSeminaire.php');
include('Database.php');
include('simple_html_dom.php');

$dataLof= file_get_html('http://www.lof.cnrs.fr/spip.php?rubrique84');
$dataCenbg = file_get_html('http://www.cenbg.in2p3.fr/-Annee-2015-');
$dataCrpp = file_get_html('http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite');
$dataObsu = file_get_html('http://www.obs.u-bordeaux1.fr/seminaires/liste_seminaires.php');


// INIT 
$extraction = new RobotSeminaire();
$database = new Database();

// RECUPERATION DES DONNEES
$seminairesLof = $extraction->setSemLof($dataLof);
$seminairesCenbg = $extraction->setSemCenbg($dataCenbg);
$seminairesCrpp = $extraction->setSemCrpp($dataCrpp);
$seminairesObsu = $extraction->setSemObsu($dataObsu);


//INSERTION DANS BD
$database->insertSeminaire($seminairesLof);
$database->insertSeminaire($seminairesCenbg);
$database->insertSeminaire($seminairesCrpp);
$database->insertSeminaire($seminairesObsu);




$dataLof->clear();
unset($dataLof);

$dataCenbg->clear();
unset($dataCenbg);
?>