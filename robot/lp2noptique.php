<meta charset="UTF-8">
<?php 


$url = 'https://www.lp2n.institutoptique.fr/Publications-documents/Seminaires';
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

function GetValue($variable,$textToLookIn,$endString)
{

$isFound=0;
$value="";
$pos = strrpos($textToLookIn,$variable );

$stringToSearchLenght=strlen($variable);
$endStringLenght=strlen($endString);
$textToLookInLenght=strlen($textToLookIn);

$compteur=0;
if ( $pos!="")
{
for( $i=$pos+$stringToSearchLenght;$i<$textToLookInLenght;$i++)
{
// On ajoute caractère par caractère la valeur ainsi que la chaine de fin
$value.=$textToLookIn[$i];

// Si le caractère correspond à l'élément $compteur de la chaine de fin
if( $textToLookIn[$i]==$endString[$compteur])
{
$compteur++;
}
// Sinon on réinitialise le compteur
else $compteur=0;

// La chaine de fin a été atteinte quand le compteur est égale à la longueur de la //chaine de fin
if( $compteur==$endStringLenght)
{
// Pour mettre fin au for
$i=$textToLookInLenght+1;
// On supprime la chaine de fin de la valeur
$value= substr($value, 0, strlen($value)-$endStringLenght);
$isFound=1;
}
}
//Si on a pas trouvé la chaine de fin
if ( $isFound==0)
{
$value="La chaîne de fin n'a pas été atteinte";
}
}
else $value="Variable inéxistante";
return $value;
}
/* on enleve les OL */ 
$rr =GetValue('<ol>', $page_content,'</ol>');
$page_content = str_replace($rr, "", $page_content);
$motif='#<li>(.*)</li>#';
preg_match_all($motif,$page_content,$out);

$nb=count($out[0]);

for($i=0;$i<$nb;$i++)
{
		if (!preg_match('#<a#', $out[0][$i])) {
			
					/* AFFICHAGE DE L'ORATEUR */	
			$orateur = strstr($out[0][$i], '(', true);
			// si y'a une phrase avant le nom de l'orateur
				if (preg_match('#:#', $orateur)) {
					$orateur = strstr($orateur, ':');
					$orateur = str_replace(':','' ,$orateur);
					}
			$orateur = str_replace('(','' ,$orateur);
			$orateur = str_replace('<li>','' ,$orateur);
			$orateur = str_replace('</li>','' ,$orateur);
			echo 'ORATEUR : '.$orateur.'';
			
					/* AFFICHAGE DE LA DATE */ 
			$date = $out[0][$i];
			$date = strstr($date, ')');
			$date = str_replace(')','' ,$date);
			$date = str_replace('<b>','</b>' ,$date);
			$date = str_replace(':','' ,$date);
			$date = str_replace(',','' ,$date);
			$date = str_replace('<li>','' ,$date);
			$date = str_replace('</li>','' ,$date);
			echo '<br>DATE :'.$date.'<br> <br>';
		}
} 