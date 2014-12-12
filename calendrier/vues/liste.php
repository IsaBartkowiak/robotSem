			<div class="custom-header clearfix">
							<nav>
							<?php	echo '<span class="custom-prev" onclick="$(\'#affichageliste\').load(\'index.php?page=liste&m='.($mois-1).'&a='.$annee.'\');" id="custom-prev"></span>';
								echo '<span class="custom-next" onclick="$(\'#affichageliste\').load(\'index.php?page=liste&m='.($mois+1).'&a='.$annee.'\');" id="custom-next"></span>'; ?>
							</nav>
							<?
							echo '<h2 class="custom-month" id="custom-month">'.$months[$mois].'</h2>';
							echo '<h3 class="custom-year" id="custom-year">'.$annee.'</h3>'; ?>
						</div>
						<div class="fc-calendar-container" id="calendar">
			   
<?php
			while( $ligne = $select->fetch() ){
	?><div id="imgune"><?php echo date("d", strtotime($ligne->date));?></div><?php
 						echo '<h2>'.$ligne->titre.'</h2>';
 						echo "<p>Orateur :".$ligne->orateur."</p>";
 						echo "<p>Lieu : ".$ligne->lieu."</p>";
 						echo "<p>".$ligne->lien."</p>";
					}



		?></div>