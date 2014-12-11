<meta charset="UTF-8">
<?php
include('simple_html_dom.php');
$html = new simple_html_dom();
$html = file_get_html('http://www.obs.u-bordeaux1.fr/seminaires/liste_seminaires.php');
$collection = $html->find('a');
foreach($collection as $e) {
	if(isset($e->title)) { 
		$date  = $e->title;
		$date = strstr($date, '201');
		$titre = $e->title;
		$titre = strstr($titre, '201', true);
		echo 'TITRE: ';
		echo $titre;
		echo '<br>';
		echo 'DATE: '.$date;
		echo '<br><br>';
	}
}