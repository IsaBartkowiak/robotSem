<!DOCTYPE html>
<!--[if IE 9]><html class="no-js ie9"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"><!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Flexible Calendar</title>
		<meta name="description" content="Flexible Calendar with jQuery and CSS3" />
		<meta name="keywords" content="responsive, calendar, jquery, plugin, full page, flexible, javascript, css3, media queries" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link href='http://fonts.googleapis.com/css?family=Metrophobic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/calendar.css" />
		<link rel="stylesheet" type="text/css" href="css/custom_2.css" />
		<link rel="stylesheet" type="text/css" href="css/animate.css" />
		<script src="js/modernizr.custom.63321.js"></script>
	</head>
	<body>
		<div class="container">	
			<!-- Codrops top bar -->
			
			<header class="clearfix">
				<div class="right">
					<h1><img src="images/logo.png" width="180px"/></h1>
				</div>

				<div class="left">
					<a href="#">contact</a>
				</div>
			</header>

			<section  class="titre">
			<div>
					<h2>Agenda des séminaires scientifiques</h2>
			</div>

			<nav class="menu">
				<ul>
					<li class="sp"><a href="index2.html">CALENDRIER</a></li>
					<li class="sep"><a href="#">LISTE</a></li>
				</ul>
			</nav>
			</section>

			<section class="main">

					<div class="animated fadeInUp"></div>
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

				echo '<a href="liste.php?m='.($mois-1).'&a='.$annee.'">prev</a>';
				echo '<div class="animated fadeIn">'.$months[$mois].' '.$annee.'</div>';
				echo '<a href="liste.php?m='.($mois+1).'&a='.$annee.'">next</a>';

			?>
			
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
	
			</section>
		</div><!-- /container -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.calendario.js"></script>
		<script type="text/javascript" src="js/data.js"></script>
		<script type="text/javascript">	




			$(function() {

		


			$("div.right").mouseenter(function() {
 			 $("div.right").addClass('animated swing');
			});

			$("div.right").bind('oanimationend animationend webkitAnimationEnd', function() { 
  				$("div.right").removeClass('animated swing');
			});


				

				
			
				var transEndEventNames = {
						'WebkitTransition' : 'webkitTransitionEnd',
						'MozTransition' : 'transitionend',
						'OTransition' : 'oTransitionEnd',
						'msTransition' : 'MSTransitionEnd',
						'transition' : 'transitionend'
					},
					transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
					$wrapper = $( '#custom-inner' ),
					$calendar = $( '#calendar' ),

					cal = $calendar.calendario( {
						onDayClick : function( $el, $contentEl, dateProperties ) {

							if( $contentEl.length > 0 ) {
								showEvents( $contentEl, dateProperties );
							}

						},
						caldata : codropsEvents,
						displayWeekAbbr : true
					} ),
					$month = $( '#custom-month' ).html( cal.getMonthName() ),
					$year = $( '#custom-year' ).html( cal.getYear() );

				$( '#custom-next' ).on( 'click', function() {
					cal.gotoNextMonth( updateMonthYear );
				} );
				$( '#custom-prev' ).on( 'click', function() {
					cal.gotoPreviousMonth( updateMonthYear );
				} );

				


				function updateMonthYear() {				
					$month.html( cal.getMonthName() );
					$year.html( cal.getYear() );
				}

				// just an example..
				function showEvents( $contentEl, dateProperties ) {

					hideEvents();
					
					var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4>Evenements du '+ dateProperties.day + ' '+ dateProperties.monthname +' '+ dateProperties.year + '</h4></div>' ),
						$close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents );

					$events.append( $contentEl.html() , $close ).insertAfter( $wrapper );
					
					setTimeout( function() {
						$events.css( 'top', '0%' );
					}, 25 );

				}
				function hideEvents() {

					var $events = $( '#custom-content-reveal' );
					if( $events.length > 0 ) {
						
						$events.css( 'top', '100%' );
						Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();

					}

				}
			
			});






		</script>
	</body>
</html>
