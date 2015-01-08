<!DOCTYPE html>
<!--[if IE 9]><html class="no-js ie9"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"><!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Administration Agenda séminaires</title>
		<meta name="description" content="L'agenda des séminaires scientifiques Bordelais" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link href='http://fonts.googleapis.com/css?family=Metrophobic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="./assets/css/calendar.css" />
		<link rel="stylesheet" href="./assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./assets/css/custom_2.css" />
		<link rel="stylesheet" type="text/css" href="./assets/css/animate.css" />
		<script src="./assets/js/modernizr.custom.63321.js"></script>
		<script type="text/javascript" src="./assets/js/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">	
			<!-- Codrops top bar -->
			
			<header class="clearfix">
				<div class="right">
					<h1><img src="./assets/images/logo.png" width="180px"/></h1>
				</div>

			
			</header>

			<section  class="titre">
			<div>
					<h2>Connexion à l'administration</h2>
			</div>

			
			</section>
			<section id="affichageliste">
			</section>
			<section class="main animated fadeInUp" id="calendrier">
				<form id="login" action="./index.php?page=admin" method="POST">
				<input class="input" type="text" name="login" placeholder="Identifiant">
		
				<input class="input" type="password" name="password" placeholder="Mot de passe">
	
				<input class="input" type="submit" value="Se connecter">
				</form>

			</section>
			</div>
			<div id="pop-contact">
			</div>
		<script type="text/javascript" src="./assets/js/jquery.calendario.js"></script>
		<script type="text/javascript" src="./assets/js/cal.js"></script>
		<script type="text/javascript" src="./assets/js/main.js"></script>
		<script type="text/javascript">	
var codropsEvents = {
	'11-23-2014' : '<a href="http://tympanus.net/codrops/2012/11/23/three-script-updates/">Three Script Updates</a>',
		<?php 
		global $bd;
		$bd->listerSeminairesCal(); ?>
	};
	</script>
	</body>
</html>
