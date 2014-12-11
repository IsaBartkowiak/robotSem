<?php 


include('RobotSeminaire.php');
include('Database.php');
// récupère le dom de l'url 
include('simplehtmldom_1_5/simple_html_dom.php');
$dataLof= file_get_html('http://www.lof.cnrs.fr/spip.php?rubrique84');
$dataCenbg = file_get_html('http://www.cenbg.in2p3.fr/-Annee-2014-');

// INIT 
$extractionLof = new RobotSeminaire();
$extractionCenbg = new RobotSeminaire();
$database = new Database();

// RECUPERATION DES DONNEES
$seminairesLof = $extractionLof->setSemLof($dataLof);
$seminairesCenbg = $extractionCenbg->setSemCenbg($dataCenbg);

//INSERTION DANS BD
$database->insertSeminaire($seminairesLof);
$database->insertSeminaire($seminairesCenbg);



$dataLof->clear();
unset($dataLof);

$dataCenbg->clear();
unset($dataCenbg);
?>