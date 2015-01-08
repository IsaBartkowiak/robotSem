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


$link = explode('<h3 class="title"><a href="', $page_content);

print_r($link);
echo $link[1];
?>

</body>

</html>