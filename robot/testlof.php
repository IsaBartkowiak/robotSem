<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

    <head>
        <title>robot séminaires</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- Elément Google Maps indiquant que la carte doit être affiché en plein écran et
        qu'elle ne peut pas être redimensionnée par l'utilisateur -->
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>

<?php 
include('robotSeminaire.php');
 
// récupère le dom de l'url 
include('simplehtmldom_1_5/simple_html_dom.php');
$dataLof= file_get_html('http://www.lof.cnrs.fr/spip.php?rubrique84');
$dataCenbg = file_get_html('http://www.cenbg.in2p3.fr/-Annee-2014-');

$extractionLof = new RobotSeminaire();
$extractionCenbg = new RobotSeminaire();


echo "<h2>LOF</h2>";
$extractionLof->extract_lof($dataLof);

echo "<h2>CENBG</h2>";
$extractionCenbg->extract_cenbg($dataCenbg);



$dataLof->clear();
unset($dataLof);

$dataCenbg->clear();
unset($dataCenbg);



?>

</body> 

</html>