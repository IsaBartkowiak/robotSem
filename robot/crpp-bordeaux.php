<meta charset="UTF-8">
<?php
include('simple_html_dom.php');
$html = new simple_html_dom();
$html = file_get_html('http://www.crpp-bordeaux.cnrs.fr/spip.php?page=seminaires&type=actualite');
$collection = $html->find('font');
foreach($collection as $e) {
	if(isset($e->face) && !strpos($e,'Calendrier')) { 
			$pattern = '#<a[^<]*>[^<]*</a>#im';
			$e = preg_replace($pattern, '', $e);
			$e = strip_tags($e);
			$date = strstr($e, ',', true);// date OK
			$heur = strstr($e, ',');
			$heur = preg_replace('/,/', '', $heur, 1);
			$heure = strstr($heur, ',', true); // HEURE OK
			$lie = strstr($heur, ',');
			$lie = preg_replace('/,/', '', $lie, 1);
			$lieu = strstr($lie, ',', true);// LIEU OK
			$orateu = strstr($lie, ',');
			$orateu = preg_replace('/,/', '', $orateu, 1);
			$orate = strstr($orateu, ',');
			$orate = preg_replace('/,/', '', $orate, 1);
			if (strpos($orate,'(')){
			$orat = strstr($orate, ')', true); 
			}
			else {
			$orat = strstr($orate, ',', true); 
			}
			$orateu = str_replace('(','', $orat);
			$orateur = str_replace(')','', $orateu); // ORATEUR OK 
			if (strpos($orate,'(')){
			$suj = strstr($orate, ')'); 
			}
			else {
			$suj = strstr($orate, ','); 
			}
			$suj = str_replace(')', '', $suj);
			$suj = str_replace(',', '', $suj);
			$sujet = preg_replace('/,/', '', $suj, 1); // SUJET OK
			echo 'DATE : '.$date.'<br> HEURE : '.$heure.'<br> LIEU : '. $lieu.'<br> ORATEUR : '.$orateur.'<br> SUJET : '.$sujet.'<br><br><br>';
			
	}
}
?>