<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

    <head>
        <title>TEST</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>

  <body>

<?php 


include('simplehtmldom_1_5/simple_html_dom.php');
include_once('functions.php');

 
// Retrieve the DOM from a given URL
$html = file_get_html('http://www.cenbg.in2p3.fr/-Annee-2014-');

foreach($html->find('ul.spip li') as $e){


  //TITRE
   foreach($e->find('strong') as $titre){
    echo '<span>titre: '.$titre->plaintext.'</span><br>';
    }

  //ORATEUR
   foreach($e->find('i') as $orateur){
    echo '<span>orateur: '.$orateur->innertext.'</span><br>';
    }

  //DATE
    $element= $e; 
    $element= explode('<br>', $element, 3);
    $dtlieu = $element[2];
    $dtlieu = explode('en ', $dtlieu, 2);
    
    if ((array_key_exists(0, $dtlieu)) && (!empty($dtlieu[0]))){
      echo '<span>date: '.format_jour($dtlieu[0]).'</span><br>';  
    } 
   
    if (array_key_exists(1, $dtlieu)){
      echo '<span>lieu: '.$dtlieu[1].'</span><br>';   
    } 

}

?>

</body>

</html>