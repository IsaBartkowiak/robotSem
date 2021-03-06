<!DOCTYPE html>
<!--[if IE 9]><html class="no-js ie9"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"><!--<![endif]-->
	<head>
<meta charset="utf-8"/>
<title>Administration robot séminaire</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="../public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../public/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../public/assets/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="../public/assets/css/themes/grey.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="../public/assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
	</head>
	<body class="page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
	<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner container">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="../../calendrier/public/assets/images/logo.png" width="150px" alt="logo" class="logo-default"/>
			</a>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE ACTIONS -->
		<!-- END PAGE ACTIONS -->
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			<form class="search-form search-form-expanded" action="extra_search.html" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Recherche.." name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="../public/assets/img/avatar.png"/>
						<span class="username username-hide-on-mobile">
						<a href="?page=admin&deconnexion=o" id="contact">Se déconnecter ( <?php echo $_SESSION['nom']; ?> )</a></span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="login.html">
								<span class="dropdown-icon"><img alt="icon logout" src="../public/assets/img/icon-logout.png" width="15px"/></span>Se déconnecter</a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>


<div class="clearfix">
</div>

<!-- BEGIN CONTAINER -->
<div class="container">
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
			
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="start active ">
						<a href="index.php">
						<span class="nav-icon"><img alt="icon accueil" src="../public/assets/img/icon-home.png"/></span>
						<span class="title">Accueil</span>
						<span class="selected"></span>
						</a>
					</li>
					<li>
						<a href="index.php?action=syncro">
						<span class="nav-icon"><img alt="icon syncro" src="../public/assets/img/icon-sync.png"/></span>
						<span class="title">Syncronisation</span>
						<span class="arrow "></span>
						</a>
					</li>
					<li>
						<a href="index.php?action=ajouter">
						<span class="nav-icon"><img alt="icon ajouter" src="../public/assets/img/icon-add.png"/></span>
						<span class="title">Ajouter un séminaire</span>
						<span class="arrow"></span>
						</a>
					</li>
					<li>
						<a href="index.php?action=editer">
						<span class="nav-icon"><img alt="icon edit" src="../public/assets/img/icon-edit.png"/></span>
						<span class="title">Modifier un séminaire</span>
						<span class="arrow "></span>
						</a>
					</li>
					<li>
						<a href="index.php?action=editerp">
						<span class="nav-icon"><img alt="icon editp" src="../public/assets/img/icon-editp.png"/></span>
						<span class="title">Editer l'hebdo</span>
						<span class="arrow "></span>
						</a>
					</li>
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>

