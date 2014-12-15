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
		global $bd;
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
			$dtdebut= $annee."-0".$mois."-01";
            $dtfin= $annee."-0".$mois."-29"; ?>
            			<div class="custom-header clearfix">
							<nav>
							<?php	echo '<span class="custom-prev" onclick="$(\'#affichageliste\').load(\'index.php?page=liste&m='.($mois-1).'&a='.$annee.'\');" id="custom-prev"></span>';
								echo '<span class="custom-next" onclick="$(\'#affichageliste\').load(\'index.php?page=liste&m='.($mois+1).'&a='.$annee.'\');" id="custom-next"></span>'; ?>
							</nav>
							<?php
							echo '<h2 class="custom-month" id="custom-month">'.$months[$mois].'</h2>';
							echo '<h3 class="custom-year" id="custom-year">'.$annee.'</h3>'; ?>
						</div>
						<div class="fc-calendar-container2" id="calendar"><?php
							      $bd->setNames();
            					  $donnees = $bd->seminaireParDate($dtdebut,$dtfin);
									if (!empty($donnees)) {
											include '../vues/liste.php';
									}
						?></div><?php
	}
	public function contactAction() {
		include '../vues/contact.php';
	}
	public function newsletterAction() {
		global $bd;	
		if (!empty($_POST['email'])){
		$mail = $_POST['email'];
		$bd->ajouterAbonne($mail);
		include '../vues/newsletter-ajout.php';
		}
		else {
		include '../vues/newsletter.php';
		}

	}
}
?>