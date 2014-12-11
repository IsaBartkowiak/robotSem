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
$html = file_get_html('http://www.lof.cnrs.fr/spip.php?rubrique84');
$seminaire = array();
$x = 0;

// EXTRACTION DES DONNEES
foreach($html->find('div.resume') as $e){

    // TITRE
    foreach($e->find('h3 a') as $titre){
    echo '<span>Sujet: '.$titre->innertext.'</span><br>';

     $seminaire [$x]['titre']=$titre->innertext;

    }

    // ORATEUR ET LIEU 
    foreach($e->find('p.soustitre') as $orlieu){

            $orlieu = $orlieu->plaintext; 
            $orlieu= explode(",", $orlieu, 2);
            echo "<span> orateur : ".$orlieu[0]."</span><br>";
            echo "<span> lieu : ".$orlieu[1]."</span><br>";
            $seminaire [$x]['orateur']=$orlieu[0];
            $seminaire [$x]['lieu']=$orlieu[1];
            
    }

    //DATE 
    foreach($e->find('p p') as $p){ 

        $val= $p->plaintext;
        if($val != "Lire la suite"){  //On exclut les cellules contenant "lire la suite"
        echo '<span class="fuck">'.lof_formatDate($val)."</span><br>";
        $seminaire [$x]['date']='2014-11-23'; //fonction de formatage
        }   
    }

    //LIEN
    foreach($e->find('p.suite a') as $lien){
        echo "<span> lien : http://www.lof.cnrs.fr/".$lien->href."</span><br>";
        $seminaire [$x]['lien']=$lien->href;
    }

     $seminaire [$x]['labo']='lof';

    echo "<br>";

    

}


 try
{
  $pdo = new PDO('mysql:host=localhost;dbname=seminaire', 'root', "");   

}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$pdo->query("SET NAMES 'utf8'");

$y=0;
foreach ($seminaire as $key=>$values){
$titre = $seminaire[$y]['titre'];
$date = $seminaire[$y]['date'];
$orateur = $seminaire[$y]['orateur'];
$lieu = $seminaire[$y]['lieu'];
$labo = $seminaire[$y]['labo'];
$lien = $seminaire[$y]['lien'];

$stmt = $pdo->prepare("INSERT INTO seminaire (titre, date, orateur, lieu, labo, lien) 
SELECT * FROM (SELECT '$titre','$date','$orateur','$lieu','$labo','$lien') AS tmp
WHERE NOT EXISTS (
SELECT titre FROM seminaire WHERE titre = '$titre'
)");


$stmt->execute();

}










print_r($seminaire);


 $html->clear();
 unset($html);
?>

</body>

</html>