<meta charset="UTF-8">
<?php
include('simple_html_dom.php');
$html = new simple_html_dom();
$html = file_get_html('http://www.obs.u-bordeaux1.fr/seminaires/liste_seminaires.php');
$collection = $html->find('a');
foreach($collection as $e) {
	if(isset($e->title)) { 

		// DATE
		$date  = $e->title;
		$date = strstr($date, '201');
		$date = strstr($date, ' ', true);
		echo 'DATE: '.$date;
		
		//TITRE
		$titre = $e->title;
		$titre = strstr($titre, '201', true);


		//ORATEUR 
		if(preg_match("/par/i", $titre)){
            $titre = strstr($titre, "par", false);
        }

        $titre = str_replace('Salle', '', $titre);
        $titre = str_replace('Bouguer', '', $titre);
        $titre = substr($titre, 0, -5);
        $el = explode(' ', $titre, 4);
        $tit = strstr($el[3], ")", false);
        $tit = str_replace(',', '', $tit);
         $tit = str_replace(')', '', $tit);
        $orateur = $el[1].' '.$el[2];
        echo 'orateur: '.$orateur.'<br>';
        echo 'lieu: Salle Bougier<br>';
        echo 'lien : http://www.obs.u-bordeaux1.fr'.$e->href.'<br>';
        echo 'titre: '.$tit.'<br><br>';


	}
}  




