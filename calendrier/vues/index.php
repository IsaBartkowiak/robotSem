<!DOCTYPE html>
<!--[if IE 9]><html class="no-js ie9"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"><!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>L'agenda des séminaires scientifiques</title>
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

					<h1><img src="../public/assets/images/logo.png" width="180px"/></h1>


				</div>

				<div class="left">
					<a href="#" id="contact">Contact</a>
					<a href="#" id="newsletter">Abonnement</a>
					<?php if ($admin == 'o') { ?><a href="?page=admin" id="else">Admin</a><?php } ?>
				</div>
			</header>

			<section  class="titre">
			<div>
					<h2>Agenda des séminaires scientifiques</h2>
			</div>

			<nav class="menu">
				<ul>
					<li class="sp"><a href="#" onclick="$('#calendrier').fadeIn();$('#affichageliste').hide();">CALENDRIER</a></li>
					<li class="sep"><a href="#" onclick="$('#affichageliste').fadeIn();$('#affichageliste').load('index.php?page=liste&m=<?php echo date('n'); ?>&a=<?php echo date('Y'); ?>');$('#calendrier').hide();">LISTE</a></li>
				</ul>
			</nav>
			</section>
			<section id="affichageliste">
			</section>
			<section class="main animated fadeInUp" id="calendrier">
				<div class="custom-calendar-wrap">
					<div id="custom-inner" class="custom-inner">
						<div class="custom-header clearfix">
							<nav>
								<span id="custom-prev" class="custom-prev"></span>
								<span id="custom-next" class="custom-next"></span>
							</nav>
							<h2 id="custom-month" class="custom-month"></h2>
							<h3 id="custom-year" class="custom-year"></h3>
						</div>
						<div id="calendar" class="fc-calendar-container"></div>
					</div>
				</div>
			</section>
			</div>
			<div id="pop-contact">
			</div>
		<script type="text/javascript" src="../public/assets/js/jquery.calendario.js"></script>
		<script type="text/javascript" src="../public/assets/js/cal.js"></script>
		<script type="text/javascript">	
var codropsEvents = {
	'11-23-2014' : '<a href="http://tympanus.net/codrops/2012/11/23/three-script-updates/">Three Script Updates</a>',
		<?php 
		global $bd;
		$bd->listerSeminairesCal(); ?>
	};
	</script>

		<script type="text/javascript" src="../public/assets/js/main.js"></script>
	</body>
</html>
