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
		<!-- DOC: Remove "hide" class to enable the page header actions -->
		<div class="page-actions hide">
			<div class="btn-group">
				<button type="button" class="btn btn-circle red-pink dropdown-toggle" data-toggle="dropdown">
				<i class="icon-bar-chart"></i>&nbsp;<span class="hidden-sm hidden-xs">New&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="#">
						<i class="icon-user"></i> New User </a>
					</li>
					<li>
						<a href="#">
						<i class="icon-present"></i> New Event <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-basket"></i> New order </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="#">
						<i class="icon-flag"></i> Pending Orders <span class="badge badge-danger">4</span>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-users"></i> Pending Users <span class="badge badge-warning">12</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="btn-group">
				<button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
				<i class="icon-bell"></i>&nbsp;<span class="hidden-sm hidden-xs">Post&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="#">
						<i class="icon-docs"></i> New Post </a>
					</li>
					<li>
						<a href="#">
						<i class="icon-tag"></i> New Comment </a>
					</li>
					<li>
						<a href="#">
						<i class="icon-share"></i> Share </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="#">
						<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
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
						Simon Villain-Guillot </span>
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
