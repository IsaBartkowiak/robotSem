<?php 

<<<<<<< HEAD

=======
>>>>>>> FETCH_HEAD
$url = 'https://www.loma.cnrs.fr/category/actualite-loma/actualite-congres-seminaires-loma/';
$timeout = 10;

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

if (preg_match('`^https://`i', $url))
{
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
}

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Récupération du contenu retourné par la requête
$page_content = curl_exec($ch);
curl_close($ch);

//Extraction de tous les liens dans un tableau
preg_match_all('/(href|src)=["\']([^"\']+)["\']/i',$page_content,$urls, PREG_SET_ORDER);
foreach($urls as $ur)
{
    $res[]=$ur[2];
}
//Tri du tableau de résultats
sort($res);
//Affichage des résultats
foreach($res as $url)
{
    echo " $url\n ";
    echo "<br>";
}
?>