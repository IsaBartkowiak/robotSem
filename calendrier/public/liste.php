				<?php 
				$months	= array('1'=>'Janvier', '2'=>'Février', '3'=>'Mars', '4'=>'Avril', '5'=>'Mai', '6'=>'Juin', '7'=>'Juillet', '8'=>'Août','9'=> 'Septembre','10'=> 'Octobre', '11'=>'Novembre', '12'=>'Décembre');
				$format = array();
				$annee = date('Y');
				$mois = date('m');

				/*$limitey = $annee+2;
				while($annee < $limitey){
				$format[$annee][$mois]= $months[$mois];
				$mois++;
				if($mois ==13){
					$mois=1;
					$annee++;
				}
				}
				
				print_r($format);*/
			

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
			?><div id="topmois"><?php
				echo '<h2 class="animated fadeIn">'.$months[$mois].' '.$annee.'</h2>';?>
				<div id="precsuiv"><?php 
				echo '<a onclick="$(\'#affichageliste\').load(\'liste.php?m='.($mois-1).'&a='.$annee.'\');" href="#">Mois précedent</a>';
				echo '<a onclick="$(\'#affichageliste\').load(\'liste.php?m='.($mois+1).'&a='.$annee.'\');" href="#">Mois suivant</a>';

			?>
			</div>
			</div>
			<?php

  			try
            {
              $pdo = new PDO('mysql:host=localhost;dbname=seminaires', 'root', 'root');   

            }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $dtdebut= $annee."-0".$mois."-01";
            $dtfin= $annee."-0".$mois."-29";
            

            $pdo->query("SET NAMES 'utf8'");
            $select = $pdo->query("SELECT * FROM seminaire WHERE date BETWEEN '$dtdebut' AND '$dtfin' ORDER BY date ASC");
			$select->setFetchMode(PDO::FETCH_OBJ);

			while( $ligne = $select->fetch() ){
	
 						echo '<h2>'.$ligne->titre.'</h2>';
 						echo "<p>Date: ".$ligne->date."</p>";
 						echo "<p>".$ligne->orateur."</p>";
 						echo "<p>".$ligne->lieu."</p>";
 						echo "<p>".$ligne->lien."</p>";
					}



		?>