<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	 <?php include 'head_include.php'; ?>
</head>
<body class="page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">

	<!-- HEADER + SIDEBAR-->
	<?php include 'header.php'; ?>
	<!-- .......................-->

	<!-- CONTENU -->
	<?php if (isset($_GET['action'])) {
	    switch ($_GET['action']) {
	        case "syncro":
	            include '../application/vues/content-syncro.php';
	            break;
	        case "ajouter":
	            include '../application/vues/content-ajouter.php';
	            break;
	        case "editer":
	            include '../application/vues/content-editer.php';
	            break;
	        case "editerp":
	            include '../application/vues/content-editerp.php';
	            break;
	   	 }
	} else {
    	include '../application/vues/content-index.php';
	}
	?>
	<!-- .......................-->


<script src="../public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../public/assets/scripts/layout.js" type="text/javascript"></script>
<script src="../public/assets/scripts/demo.js" type="text/javascript"></script>
<script src="../public/assets/scripts/index.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init();
   Layout.init(); 
});
</script>
</body>
</html>