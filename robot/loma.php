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


include('simplehtmldom_1_5/simple_html_dom.php');
include('functions.php');
 
// récupère le dom de l'url 

$html = file_get_contents('http://www.loma.cnrs.fr/category/actualite-loma/actualite-congres-seminaires-loma/');
ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
     print_r($html);


?>

</body>

</html>