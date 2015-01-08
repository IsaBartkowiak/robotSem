<meta charset="UTF-8">


<?php

include('simple_html_dom.php');
$html = new simple_html_dom();
$html = file_get_html('https://www.lp2n.institutoptique.fr/Publications-documents/Seminaires');
foreach($html->find('div[id$="principal"]') as $div){
	foreach($div->find('li') as $e){

		$a=$e->innertext;
		$a= trim($a);


			$a = explode(' ', $a, 4);
			//print_r($a);
			echo $a[0].' '.$a[1].'<br>';

	}
} //fin foreach1



?>