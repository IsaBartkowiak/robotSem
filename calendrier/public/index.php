<?php 
error_reporting(E_ALL);
ini_set('display_error', 1);
require_once 'bdd.php';
$bd = new Database();
include '../vues/index.php';
?>