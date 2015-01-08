<?php
$routes = [
	'index'=> ['url' =>'controller','ct' => 'Controller'],
	'contact' => ['url' =>'controller','ct' => 'Controller'],
	'liste' => ['url' =>'controller','ct' => 'Controller'],
	'newsletter' => ['url' => 'controller','ct' => 'Controller'],
	'admin' => ['url' => 'admin-controller','ct' => 'AdminController'],
	'envoi-news' => ['url' => 'newsletter-controller', 'ct' => 'NewsletterController']
];
$url = (isset($_GET['page']) AND !empty($_GET['page'])) ? $_GET['page'] : 'index';
// Recherche de l'url dans le tableau de routes
if (array_key_exists($url, $routes)) {
// Url controller
	$controllerurl = $routes[$url]['url'];
	$ct = $routes[$url]['ct'];
	require_once $controllerurl.'.php';
// Nom controller
	$controller = new $ct($url);
// Action controller
	$action = $url.'Action';
	$controller->$action();
}
?>