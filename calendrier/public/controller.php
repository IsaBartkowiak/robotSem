<?php 
class Controller {
	private $url;
	public function __construct($url) {
		$this->url = $url;
	}
	public function indexAction() {
		include '../vues/index.php';
	}
	public function listeAction() {
		$months	= array('1'=>'Janvier', '2'=>'Février', '3'=>'Mars', '4'=>'Avril', '5'=>'Mai', '6'=>'Juin', '7'=>'Juillet', '8'=>'Août','9'=> 'Septembre','10'=> 'Octobre', '11'=>'Novembre', '12'=>'Décembre');
				$format = array();
				$annee = date('Y');
				$mois = date('m');
				
				if(isset($_GET['m']) && isset($_GET['a'])){
					$mois= $_GET['m'];
					$annee= $_GET['a'];
					if($mois == 13){
						$mois = 1;
						$annee++;
						
					}
					if($mois == 0){
						$mois = 12;
						$annee--;
						
					}
				}
		include '../vues/liste.php';
	}
	public function contactAction() {
		include '../vues/contact.php';
	}
}
?>