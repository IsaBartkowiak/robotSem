<?php
require_once 'controller.php';
$routes = array(
	'index',
	'contact',
	'liste'
);
$url = (isset($_GET['page']) AND !empty($_GET['page'])) ? $_GET['page'] : 'index';
$controller = new Controller($url);
// Recherche de l'url dans le tableau de routes
if (in_array($url, $routes)) {
	$action = $url.'Action';
	$controller->$action();
}
?>